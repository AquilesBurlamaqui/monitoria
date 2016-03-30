 <?php
	class Conexao
        {
       		//usuario do banco
                private $usuario = "bdweb";
                //senha do banco
                private $senha  = "bdweb2016";
                //nome do host
                private $host = "localhost";
                //nome do banco
                private $banco = "bdweb";
                //porta de conexao
                private $porta = "5432";
                //variavel conexao
                private $conexao;

                //metodo construtor default
                function __construct()
                {

                }

                //metodo que abre a conexao
                public function abrirConexao()
                {
                    $this->conexao = pg_connect("host=$this->host port=$this->porta dbname=$this->banco user=$this->usuario password=$this->senha ") or die("Falha na conexão de dados");
                    return($this->conexao);
                }

                //metodo que encerra a conexao
                public function fecharConexao()
                {
                    pg_close($this->conexao);
                }

                //metodo que verifica a conexao
                public function verificarConexao()
                {
                    if(!$this->conexao)
                    {
                        echo("</h3>o sistema não está conectado à [$this->banco] em [$this->host].</h3>");
                        exit();
                    }
                    else
                    {
                        echo("</h3>o sistema está conectado à [$this->banco] em [$this->host].</h3>");
                    }
                }

                //retorna o nome de usuario do banco
                public function getNomeUsuarioBanco()
                {
                    return($this->usuario);
                }

                //retorna a senha do banco
                public function getSenhaBanco()
                {
                    return($this->senha);
                }

                //retorna o host do banco
                public function getHostBanco()
                {
                    return($this->host);
                }

                //retorna o nome do banco de dados
                public function getNomeBanco()
                {
                    return($this->banco);
                }

                //retorna a porta de conexao com o banco
                public function getPortaBanco()
                {
                    return($this->porta);
                }
	}
?>
