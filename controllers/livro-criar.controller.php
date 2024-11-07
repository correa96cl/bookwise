<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('location: /meus-livros');

    exit();
}

if (!auth()) {
    abort(403);
}


$usuario_id = auth()->id;

$titulo = $_POST['titulo'];
$author = $_POST['author'];
$descricao = $_POST['descricao'];
$ano_de_lancamento = $_POST['ano_de_lancamento'];

$validacao = Validacao::validar([
    'titulo' => ['required', 'min:3'],
    'author' => ['required'],
    'descricao' => ['required'],
    'ano_de_lancamento' => ['required']
], $_POST);

if ($validacao->naoPassou()) {
    header('location: /meus-livros');
    exit();
}

$dir = 'images/';

$novoNome = md5(rand());

$extensao = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);

$imagem = "$dir.$novoNome.$extensao";

move_uploaded_file($_FILES['imagem']['tmp_name'], __DIR__. '/../public/'.$imagem);


$database->query(
    query: "
    insert into livros (titulo, author, descricao, ano_de_lancamento, usuario_id, imagem)
    values ( :titulo, :author, :descricao, :ano_de_lancamento, :usuario_id, :imagem)",
    params: compact('titulo', 'author', 'descricao', 'ano_de_lancamento', 'usuario_id', 'imagem')
);

flash()->push('mensagem', 'Livro criado com sucesso');

header('location: /meus-livros');

exit();