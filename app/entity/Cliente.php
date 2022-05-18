<?php

namespace App\entity;

use \App\db\Database;
use \PDO;

class Cliente{
    public $id;
    public $nome;
    public $email;
    public $telefone;

    public function cadastrar(){
        $objDatabase = new Database('clientes');

        $dados['nome'] = $this->nome;
        $dados['email'] = $this->email;
        $dados['telefone'] = $this->telefone;

        $this->id = $objDatabase->insert($dados);

        return true;
    }

    public function atualizar(){
        return (new Database('clientes'))->update('id = '.$this->id, [
            'nome' => $this->nome,
            'email' => $this->email,
            'telefone' => $this->telefone,
        ]);
    }

    public function excluir(){
        return (new Database('clientes'))->delete('id = '.$this->id);
    }

    public static function getClientes($where = null, $order = null, $limit = null){
        return (new Database('clientes'))->select($where,$order,$limit)->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public static function getCliente($id){
        return (new Database('clientes'))->select('id = '.$id)->fetchObject(self::class);
    }
}