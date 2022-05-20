<?php

namespace App\entity;

use \App\db\Database;
use \PDO;

class Mensalidade{
    public $id;
    public $id_contrato;
    public $numero_parcela;
    public $valor_mensalidade;
    public $valor_repasse;
    public $pago;
    public $realizado;

    public function cadastrarMensalidade(){
        $objDatabase = new Database('mensalidades');

        $dados['id_contrato'] = $this->id_contrato;
        $dados['numero_parcela'] = $this->numero_parcela;
        $dados['valor_mensalidade'] = $this->valor_mensalidade;
        $dados['valor_repasse'] = $this->valor_repasse;
        $dados['pago'] = $this->pago;
        $dados['realizado'] = $this->realizado;

        $this->id = $objDatabase->insert($dados);

        return true;
    }

    public function atualizarPago(){
        return (new Database('mensalidades'))->update('id = '.$this->id, [
            'pago' => $this->pago
        ]);
    }

    public function atualizarRealizado(){
        return (new Database('mensalidades'))->update('id = '.$this->id, [
            'realizado' => $this->realizado
        ]);
    }

    public function excluir(){
        return (new Database('mensalidades'))->delete('id = '.$this->id);
    }

    public static function getMensalidades($where = null, $order = null, $limit = null){
        return (new Database('mensalidades'))->select($where,$order,$limit)->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public static function getMensalidadesByContrato($idContrato){
        return (new Database('mensalidades'))->select('id_contrato = '.$idContrato)->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public static function getMensalidade($id){
        return (new Database('mensalidades'))->select('id = '.$id)->fetchObject(self::class);
    }
}