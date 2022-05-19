<?php

namespace App\entity;

use \App\db\Database;
use \PDO;

class Contrato{
    public $id;
    public $imovel;
    public $proprietario;
    public $cliente;
    public $data_inicio;
    public $data_fim;
    public $taxa_administracao;
    public $valor_aluguel;
    public $valor_condominio;
    public $valor_iptu;

    public function cadastrar(){
        $objDatabase = new Database('contrato');

        $dados['imovel'] = $this->imovel;
        $dados['proprietario'] = $this->proprietario;
        $dados['locatario'] = $this->locatario;
        $dados['data_inicio'] = $this->data_inicio;
        $dados['data_fim'] = $this->data_fim;
        $dados['taxa_administracao'] = $this->taxa_administracao;
        $dados['valor_aluguel'] = $this->valor_aluguel;
        $dados['valor_condominio'] = $this->valor_condominio;
        $dados['valor_iptu'] = $this->valor_iptu;

        $this->id = $objDatabase->insert($dados);

        return true;
    }

    public function atualizar(){
        return (new Database('contrato'))->update('id = '.$this->id, [
            'imovel' => $this->imovel,
            'proprietario' => $this->proprietario,
            'locatario' => $this->locatario,
            'data_inicio' => $this->data_inicio,
            'data_fim' => $this->data_fim,
            'taxa_administracao' => $this->taxa_administracao,
            'valor_aluguel' => $this->valor_aluguel,
            'valor_condominio' => $this->valor_condominio,
            'valor_iptu' => $this->valor_iptu
        ]);
    }

    public function excluir(){
        return (new Database('contrato'))->delete('id = '.$this->id);
    }

    public static function getContratos($where = null, $order = null, $limit = null){
        return (new Database('contrato'))->select($where,$order,$limit)->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public static function getContrato($id){
        return (new Database('contrato'))->select('id = '.$id)->fetchObject(self::class);
    }

    public function getcontratoAndProprietario(){
        return (new Database('contrato'))->selectJoin()->fetchAll(PDO::FETCH_CLASS,self::class);
    }
}