<?php 

namespace App\db;

use \PDO;
use \PDOException;

class Database {
    const HOST = '127.0.0.1';
    const NAME = 'imobiliaria';
    const USER = 'root';
    const PASSWORD = '';

    private $table;

    private $connection;

    public function __construct($table = null){
        $this->table = $table;
        $this->setConnection();
    }

    private function setConnection(){
        try {
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASSWORD);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('ERROR: '.$e->getMessage());
        }
    }

    public function execute($query, $params = []){
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        } catch (PDOException $e) {
            die('ERROR: '.$e->getMessage());
        }
    }

    public function insert($values){
        $fields = array_keys($values);
        $binds = array_pad([], count($fields),'?');

        $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';

        $this->execute($query, array_values($values));

        return $this->connection->lastInsertId();
    }

    public function select($where = null, $order = null, $limit = null, $fields = '*'){
        $where = (!empty($where)) ? 'WHERE '. $where : '';
        $order = (!empty($order)) ? 'ORDER BY '. $order : '';
        $limit = (!empty($limit)) ? 'LIMIT '. $limit : '';

        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;

        return $this->execute($query);
    }

    public function update($where, $values){
        $fields = array_keys($values);

        $query = 'UPDATE '.$this->table.' SET '.implode('=?,',$fields).'=? WHERE '.$where;

        $this->execute($query, array_values($values));

        return true;
    }

    public function delete($where){
        
        $query = 'DELETE FROM '.$this->table.' WHERE '.$where;

        $this->execute($query);

        return true;
    }

    public function selectJoin(){

        $query = 'SELECT imoveis.*, proprietario.nome as nome_proprietario FROM imoveis LEFT JOIN proprietario ON imoveis.proprietario = proprietario.id';

        return $this->execute($query);
    }

    public function selectDadosContrato(){

        $query = 'SELECT contrato.*, imoveis.endereco, proprietario.nome AS nome_proprietario, clientes.nome AS nome_locatario FROM contrato  
                    LEFT JOIN imoveis ON contrato.imovel = imoveis.id
                    LEFT JOIN proprietario ON contrato.proprietario = proprietario.id
                    LEFT JOIN clientes ON contrato.locatario = clientes.id';

        return $this->execute($query);
    }

   
}


?>