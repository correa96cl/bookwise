<?php



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $validacao = Validacao::validar([
        'email' => ['required', 'email'],
        'senha' => ['required']
    ], $_POST);

    if ($validacao->naoPassou('login')) {
        header('location: /login');
        exit();
    }


    $usuario = $database->query(
        query: "select * from usuarios where email = :email",
        class: Usuario::class,
        params: compact('email')
    )->fetch();


    if ($usuario) {


        if (!password_verify($_POST['senha'], $usuario->senha)) {
            flash()->push('validacoes_login', ['Usuario ou senha nao encontrados']);
            header('location: /login');
            exit();
        }


        $_SESSION['auth'] = $usuario;
        flash()->push('mensagem', 'Seja bem vindo ' . $usuario->nome);
        header('location: /');
        exit();
    }
}

view('login');
