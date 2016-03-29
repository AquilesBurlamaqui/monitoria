<?php
require_once ('Person.class.php');

class User extends Person {
    private $password;  /**< Senha */
    private $login;         /**< Username */
    private $status = 2; /**< Valor padrao eh 2 (Usuario Ativo) */

/*
     Seleciona todos os campos do Banco de dados e atribui os valores das colunas aos atributos da classe ja descriptografados.
*/
    public function get() {
        $result = Dbcommand::select('tb_administradores', array('ADM_ID' => $this->id));
        $results = Dbcommand::rows($result);

        foreach ($results as $key => $value) {
            $results[$key] = Criptography::BASE64($value, 0);
        }

        $this->name = $results['ADM_NOME'];
        $this->login = $results['ADM_LOGIN'];
        $this->password = $results['ADM_SENHA'];
        $this->date_in = $results['ADM_DATA'];
        $this->log = $results['ADM_LOG'];
        return $this;
    }

/*
    Atualiza no Banco de dados todos os valores já criptgrofados checando se o texto não está vazio.
*/
    public function update() {
        $this->name = Dbcommand::post("name_user");
        if (empty($this->name)) {
            return "erro_campos";
        }
        if (!ValidationData::name($this->name)) {
            return "erro_campo";
        } else {
            $this->name = Criptography::BASE64($this->name, 1);
            $this->log = Criptography::BASE64(date("Y-m-d H:i:s"), 1);
            $this->password = Dbcommand::post("password1_user");
            $passtmp = Dbcommand::post("password2_user");
            if (!empty($this->password) && !empty($passtmp)) {
                if ($this->password !== $passtmp) {
                    return "erro_senhas";
                } else {
                    $this->password = Criptography::Bcrypt($this->password);
                    Dbcommand::update('tb_administradores', array('ADM_NOME' => $this->name, 'ADM_LOG' => $this->log,
                     'ADM_SENHA' => $this->password), array('ADM_ID' => $this->id));
                    return "sucesso_alterar_dados";
                }
            } else {
                Dbcommand::update('tb_administradores', array('ADM_NOME' => $this->name, 'ADM_LOG' => $this->log), array('ADM_ID' => $this->id));
                return "sucesso_alterar_dados";
            }
        }
    }

    public function getId() {
        return $this->id;
    }

    /**
     * @brief Function setId
     *      armazena o id do usuario.
     * @param id do usuario logado
     * @return int
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

/*
     Insere no Banco de dados todos os valores já criptografados checando se o texto não está vazio.
*/
    public function set() {
        $this->name = Dbcommand::post("name_user");
        $this->login = Dbcommand::post("username_user");
        $this->password = Dbcommand::post("password1_user");
        if (empty($this->password) || $this->password !== Dbcommand::post('password2_user')) {
            return "erro_senha";
        } else {
            $this->password = Criptography::Bcrypt($this->password);
        }
        if (!ValidationData::username($this->login) || !ValidationData::name($this->name)) {
            return "erro_campo";
        }
        $this->login = Criptography::BASE64($this->login, 1);
        $result = Dbcommand::select('tb_administradores', array('ADM_LOGIN' => $this->login));
        if (Dbcommand::count_rows($result) > 0) {
            return "campos_cadastrados";
        }
    }

    /**
     * @brief Function login
     *      verifica os dados de entrada e valida caso o usuario esteja cadastrado e ativo.
     *      Assim recebe do banco os dados cadastrado e criptografados do usuario. Ao validar o acesso, é criado uma sessão com 1800s.
     * @param void
     * @return mensagem indicador de erro ou sucesso
     */
    public function login() {
        $this->login = Dbcommand::post("username_user");
        $this->password = Dbcommand::post("password_user");
        if (!empty($this->login) && !empty($this->password)) {
            $this->login = Criptography::BASE64($this->login, 1);
            $result = Dbcommand::select('tb_administradores', array('ADM_LOGIN' => $this->login));
            if (Dbcommand::count_rows($result) > 0) {
                $results = Dbcommand::rows($result);
                if (Criptography::CheckBcrypt($this->password, $results['ADM_SENHA']) == FALSE) {
                    return "erro_senha";
                } else {
                    $this->id = $results['ADM_ID'];
                    $this->status = $results['ADM_STATUS'];
                    if ($this->status != 2) {
                        return "usuario_inativo";
                    } else {
                        if (!isset($_SESSION)) {
                            session_start();
                            // seta configurações fuso horario e tempo limite de inatividade em segundos
                            date_default_timezone_set("Brazil/Recife");
                            $tempolimite = 1800; // (s)
                            /*fim das configurações de fuso horario e limite de inatividade
                            aqui ta o seu script de autenticação no momento em que ele for validado você seta as configurações abaixo.
                            seta as configurações de tempo permitido para inatividade*/
                            $_SESSION['registro'] = time(); // armazena o momento em que autenticado
                            $_SESSION['limite'] = $tempolimite; // armazena o tempo limite sem atividade
                            // fim das configurações de tempo inativo
                        }
                        $_SESSION['usuario_logado'] = $this->id;
                        $this->log = Criptography::BASE64(date("Y-m-d H:i:s"), 1);
                        Dbcommand::update('tb_administradores', array('ADM_LOG' => $this->log), array('ADM_ID' => $this->id));
                        return "usuario_logado";
                    }
                }
            } else {
                return "erro_entrada_usuario";
            }
        } else {
            return "erro_entrada_usuario";
        }
    }
    /**
     * @brief Function verifyAccess
     *      verifica se o tempo de sessão do usuario expirou.
     * @param void
     * @return void
     */
    public function verifyAccess(){
        session_start();
        if (!isset($_SESSION['usuario_logado'])) {
            header("location: ". Dbcommand::getServer() ."/login.php?msg=entrada_usuario");
        }else{
            $this->id = ($_SESSION['usuario_logado']);
            $registro = $_SESSION['registro'];
            $limite = $_SESSION['limite'];
            if($registro) {// verifica se a session  registro esta ativa
             $segundos = time() - $registro;
            } // fim da verificacao da session registro

            /* verifica o tempo de inatividade
            se ele tiver ficado mais do tempo limite sem atividade ele destroi a session
            se nao ele renova o tempo e ai eh contado mais o tempo limite */
            if($segundos > $limite){
                session_destroy();
                echo "<script>alert('". utf8_decode("Sua sessão expirou, favor logar novamente!")."');
                              location.reload()</script>";
                die();  //destroi pagina para que nao carregue
            }else{
              $_SESSION['registro'] = time();
            }   // fim da verificacao de inatividade
        }
    }
}