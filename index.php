<?php

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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Book wise</title>
</head>

<body class="bg-stone-950 text-stone-400">
    <header class="bg-stone-900">
        <nav class="mx-auto max-w-screen-lg flex justify-between py-4">
            <div class="font-bold text-xl tracking-wide">Book wise</div>
            <ul class="flex space-x-4">
                <li><a href="/" class="text-lime-500">Explorar</a></li>
                <li><a href="/meus-livros.php" class="hover:underline">Meu livros</a></li>



            </ul>
            <ul>
                <li><a href="/login.php" class="hover:underline">Fazer Login</a></li>
            </ul>
        </nav>
    </header>

    <main class="mx-auto max-w-screen-lg space-y-6">
        <h1 class="mt-6 font-bold text-lg">Explorar</h1>
        <form class="w-full flex space-x-2 mt-6">
            <input type="text" class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1"
                placeholder="Pesquisar..." name="pesquisar" />

            <button type="submit">🔍</button>
        </form>

        <section class="grid gap-4 grids-cols-1 md:grid-cols-2 lg:grid-cols-3">

            <?php foreach ($livros as $livro): ?>
                <div class="p-2 rounded border-stone-800 border-2 bg-stone-900">
                    <div class="flex">
                        <div class="w-1/3">Imagem</div>
                        <div class="space-y-1">
                            <a href="/livro.php?id=<?= $livro["id"] ?>" class="font-semibold hover:underline"><?= $livro["titulo"] ?></a>
                            <div class="text-xs italic"><?= $livro["autor"] ?></div>
                            <div class="text-xs italic">⭐️⭐️⭐️(3 Avaliaçoes)</div>
                        </div>

                    </div>

                    <div class="text-sm mt-2">
                        <?= $livro["descrição"] ?>
                    </div>
                </div>
            <?php endforeach; ?>


        </section>
    </main>
</body>

</html>