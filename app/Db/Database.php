<?php
//carrybuilder - não escreve sql - classe gera sql

namespace App\Db;

use \PDO;
use \PDOException;

class Database{
    const HOST = 'localhost';
    const NAME = 'wdev_vagas';
    const USER = 'root';
    const PASS = '';

    private $table;
    private $connection;

    public function __construct($table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }

    //conexão BD
    private function setConnection(){
        try{
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        }catch(PDOException $e){
            die('ERROR:'.$e->getMessage());

        }

    }

    //executa as querys
    public function execute($query,$params = []){
        try{
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        }catch(PDOException $e){
            die('ERROR:'.$e->getMessage());

        }

    }

    //inserir dados

    public function insert($values){
        //DADOS QUERY
        $fields = array_keys($values);
        $binds = array_pad([],count($fields),'?');

        $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';

        $this->execute($query,array_values($values));

        //retorna ID inserido

        return $this->connection->lastInsertId();

    }
}