<?php

namespace App\Entity;

use \App\Db\Database;

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




}