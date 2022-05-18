<?php

namespace App\entity;

use \App\db\Database;
use \PDO;

class Proprietario{
    public $id;
    public $nome;
    public $email;
    public $telefone;
    public $dia_repasse;

    public function cadastrar(){
        $objDatabase = new Database('proprietario');

        $dados['nome'] = $this->nome;
        $dados['email'] = $this->email;
        $dados['telefone'] = $this->telefone;
        $dados['dia_repasse'] = $this->dia_repasse;

        $this->id = $objDatabase->insert($dados);

        return true;
    }

    public function atualizar(){
        return (new Database('proprietario'))->update('id = '.$this->id, [
            'nome' => $this->nome,
            'email' => $this->email,
            'telefone' => $this->telefone,
            'dia_repasse' => $this->dia_repasse,
        ]);
    }

    public function excluir(){
        return (new Database('proprietario'))->delete('id = '.$this->id);
    }

    public static function getProprietarios($where = null, $order = null, $limit = null){
        return (new Database('proprietario'))->select($where,$order,$limit)->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public static function getProprietario($id){
        return (new Database('proprietario'))->select('id = '.$id)->fetchObject(self::class);
    }
}