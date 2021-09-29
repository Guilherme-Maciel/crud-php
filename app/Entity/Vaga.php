<?php

namespace App\Entity;

use \App\Db\Database;
use PDO;

class Vaga{
    //integer - ID
    public $id;
    //string - titulo
    public $titulo;
    //string - descricao
    public $descricao;
    //vaga ativa ou não (s/n)
    public $ativo;
    //string - data
    public $data;

    //cadastrar nova vaga - return boolean
    public function cadastrar(){
        //Definir data
        $this->data = date('Y-m-d H:i:s');

        //inserir vaga
        $obDatabase = new Database('vagas');
        $this->id = $obDatabase->insert([
                        'titulo' => $this->titulo,
                        'descricao' => $this->descricao,
                        'ativo' => $this->ativo,
                        'data' => $this->data
                    ]);

        return true;
    }

    //atualizar vaga no banco
    public function atualizar(){
        return (new Database('vagas'))->update('id = '.$this->id,[
                                                                    'titulo' => $this->titulo,
                                                                    'descricao' => $this->descricao,
                                                                    'ativo' => $this->ativo,
                                                                    'data' => $this->data
                                                                ]);

    }//exclusão de vaga
    public function excluir(){
        return (new Database('vagas'))->delete('id = '.$this->id);

    }
    
    //Listagem das vagas
    public static function getVagas($where = null, $order = null, $limit = null){
        return (new Database('vagas'))->select($where,$order,$limit)
        ->fetchAll(PDO::FETCH_CLASS,self::class);

    }

    //busca da vaga pelo ID
    public static function getVaga($id){
        return (new Database('vagas'))->select('id = '.$id)
        ->fetchObject(self::class);

    }




}