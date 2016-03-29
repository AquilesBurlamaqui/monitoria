<?php
require_once ('Photo.class.php');

class Album {
    private $name;               /**< Nome do Album */
    public $photo = array();  /**< Array com todas as fotos */
    public $size;                   /**< Quantidade de fotos guardadas */

    /*
        seta o nome do Album passado como parametro e chama o metodo get.
     */
    public function __construct($name) {
        $this->name = $name;
        $this->get();
    }

    /*
        seleciona todos os campos do Banco de dados e retorna os valores das colunas ja descriptografado.
     */
    public function get() {
        $i = 0;
        $name = Criptography::BASE64($this->name, 1);
        $result = Dbcommand::select('tb_fotos', array('FOTO_NOME_ALBUM' => $name), 'ORDER BY FOTO_ID DESC');
        while ($results = Dbcommand::arrays($result)) {
            $this->photo[$i] = new Photo();
            $this->photo[$i]->setId($results['FOTO_ID']);
            $this->photo[$i]->setId_adm($results['FOTO_ID_ADM']);
            foreach ($results as $key => $value) {
                $results[$key] = Criptography::BASE64($value, 0);
            }
            $this->photo[$i]->log = $results['FOTO_LOG'];
            $this->photo[$i]->date_in = $results['FOTO_DATA'];
            $this->photo[$i]->name = $results['FOTO_NOME'];
            $this->photo[$i]->albumName = $results['FOTO_NOME_ALBUM'];
            $this->photo[$i]->url = $results['FOTO_URL'];

            $i++;
        }
        $this->size = $i;
        return $this;
    }

    public function delete() {
        for ($i = 0; $i < $this->size; $i++) {
            $this->photo[$i]->delete();
        }
        return "sucesso_deletar";
    }

    public function addPhoto($id_adm) {
        $name = Photo::getSendName();          /* Guarda diretorio com novo nome e envia a imagem */
        if (is_array($name) && array_key_exists('ERRO', $name)) { /* Verificando se eh o nome da imagem ou a mensagem de erro */
            return $name['ERRO'];
        } else {
            $morephoto = new Photo();
            $morephoto->albumName = $this->name;
            return $morephoto->set($id_adm, Dbcommand::getServer() . $name);
        }
    }
}