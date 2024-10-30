<?php

require 'functions.php';

class Livro
{
    public $id;
    public $titulo;
    public $autor;
    public $avaliacoes;
    public $imagem;
    public $descricao;


    public function ler(){
        echo 'Lendo...';
    }

   
}

$livro = new Livro;
$livro->ler();