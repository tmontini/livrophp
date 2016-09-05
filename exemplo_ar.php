<?php
require_once 'classes/api/Connection.php';
require_once 'classes/ar/Produto.php';

try {
	$conn = Connection::open('estoque');
	Produto::setConnection($conn);
	$produtos = Produto::all();
	foreach ($produtos as $produto) {
		$produto->delete();
	}

	$p1 = new Produto;
	$p1->descricao = 'Vinho Brasileiro Tinto Merlot';
	$p1->estoque = 10;
	$p1->preco_custo = 12;
	$p1->preco_venda = 18;
	$p1->codigo_barras = '12345123455';
	$p1->data_cadastro = date('Y-m-d');
	$p1->origem = 'N';
	$p1->save();

	$p2 = new Produto;
	$p2->descricao = 'Vinho Brasileiro Tinto Merlot';
	$p2->estoque = 10;
	$p2->preco_custo = 12;
	$p2->preco_venda = 18;
	$p2->codigo_barras = '12345123455';
	$p2->data_cadastro = date('Y-m-d');
	$p2->origem = 'N';
	$p2->save();

	$p3 = Produto::find(1);

	print 'Descricao: ' . $p3->getMargemLucro() . "% <br>\n";
	$p3->registraCompra(14, 5);
	$p3->save();

} catch (Exception $e) {
	print $e->getMessage();
}