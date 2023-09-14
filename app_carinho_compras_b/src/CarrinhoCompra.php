<?php

namespace App;

use App\Item;

class CarrinhoCompra {
    // atributos
    private $itens;
    private $status;
    private $valorTotal;


    //métodos
    public function __construct() {
        $this->itens = [];
    }

    public function getItens() {
        return $this->itens;
    }

    public function setItens(Item $item) {
        array_push($this->itens, $item);
        return true;
    }

    public function validarCarrinho() {
        return count($this->itens) > 0;
    }
}