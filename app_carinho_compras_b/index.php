<?php

require __DIR__."/vendor/autoload.php";

use App\CarrinhoCompra;
use App\Item;
use App\Pedido;
use App\EmailService;

echo '<h3>Com SRP</h3>';

$pedido = new Pedido();

$item1 = new Item();
$item2 = new Item();

$item1->setDescricao('Porta copos');
$item1->setValor(4.55);

$item2->setDescricao('Lampada');
$item2->setValor(8.32);

echo '<h4>Pedido Iniciado</h4>';
echo '<pre>';
print_r($pedido);
echo '</pre>';

$pedido->getCarrinhoCompra()->setItens($item1);
$pedido->getCarrinhoCompra()->setItens($item2);

echo '<h4>Pedido com itens</h4>';
echo '<pre>';
print_r($pedido);
echo '</pre>';


echo '<h4>Itens do carrinho</h4>';
echo '<pre>';
print_r($pedido->getCarrinhoCompra()->getItens());
echo'</pre>';

echo '<h4>Valor do pedido</h4>';
echo '<pre>';
forEach($pedido->getCarrinhoCompra()->getItens() as $key => $item) {
    $total += $item->getValor();
}

echo $total;
echo'</pre>';

echo '<h4>Carrinho está valido?</h4>';
echo '<pre>';
echo $pedido->getCarrinhoCompra()->validarCarrinho();
echo'</pre>';

echo '<h4>Status do pedido</h4>';
echo '<pre>';
echo $pedido->getStatus();
echo'</pre>';

echo '<h4>Confirmar pedido</h4>';
echo '<pre>';
echo $pedido->confirmar();
echo'</pre>';

echo '<h4>Status do pedido</h4>';
echo '<pre>';
echo $pedido->getStatus();
echo'</pre>';

echo '<h4>E-mail</h4>';
if ($pedido->getStatus() == 'confirmado') {
   echo EmailService::sendEmail();
}