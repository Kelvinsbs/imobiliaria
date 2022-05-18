<?php

namespace App\entity;

use \App\db\Database;
use \PDO;

class Imovel{
    public $id;
    public $endereco;
    public $proprietario;

    public function cadastrar(){
        $objDatabase = new Database('imoveis');

        $dados['endereco'] = $this->endereco;
        $dados['proprietario'] = $this->proprietario;

        $this->id = $objDatabase->insert($dados);

        return true;
    }

    public function atualizar(){
        return (new Database('imoveis'))->update('id = '.$this->id, [
            'endereco' => $this->endereco,
            'proprietario' => $this->proprietario
        ]);
    }

    public function excluir(){
        return (new Database('imoveis'))->delete('id = '.$this->id);
    }

    public static function getImoveis($where = null, $order = null, $limit = null){
        return (new Database('imoveis'))->select($where,$order,$limit)->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public static function getImovel($id){
        return (new Database('imoveis'))->select('id = '.$id)->fetchObject(self::class);
    }
}