<?php

namespace App\Model;


//abstract class: não é possivel criar objetos dela
abstract class Model {

    /**
     * Propriedade que armazenará o array retornado da DAO com a listagem das pessoas.
     */
    public $rows;

}