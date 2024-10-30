<?php


$db = new PDO('sqlite:bookwise.db');
dd($db);

if (!$db) {
    die('Error: Could not connect to the database.');
} else {
    echo 'Database connected successfully!';
}

//$query = $db->prepare('SELECT * FROM livros');
//$query->execute();

//$livros = $query->fetchAll();

$livros = [
    [
        "id" => 1,
        "titulo" => "Livro 1",
        "autor" => "Autor 1",
        "avaliacoes" => 3,
        "imagem" => "livro1.jpg",
        "descrição" => "Descrição 1",
    ],
    [
        "id" => 2,
        "titulo" => "Livro 2",
        "autor" => "Autor 2",
        "avaliacoes" => 2,
        "imagem" => "livro2.jpg",
        "descrição" => "Descrição 2",
    ],
    [
        "id" => 3,
        "titulo" => "Livro 3",
        "autor" => "Autor 3",
        "avaliacoes" => 1,
        "imagem" => "livro3.jpg",
        "descrição" => "Descrição 3",
    ],
]
?>