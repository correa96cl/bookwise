<?php


$livro = $database->query("
    select * from livros
    where id = :id
", Livro::class, ['id' => $_REQUEST['id']])->fetch();



view('livro', compact('livro'));
