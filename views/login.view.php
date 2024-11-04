<div class="mt-6 grid grid-cols-2 gap-2">

    <div class="border border-stone-700 rounded p-4">
        <h1 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">Login</h1>
        <form class="p-4 space-y-4" method="POST">

        <?php if ($validacoes = flash()->get('validacoes_login')): ?>
                <div class="border-red-800 bg-red-900 text-red-400 px-4 py-1 rounded-md border-2
                text-sm font=bold">
                    <ul>
                        <li>Deu Ruim!</li>

                        <?php foreach ($validacoes as $validacao): ?>
                            <li><?= $validacao ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

            <?php endif; ?>

            <div class="flex flex-col">
                <label class="text-stone-400 mb-1" for="username">Email</label>
                <input
                    type="text"
                    name="email"
                    id="email"
                    
                    class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1">



            </div>

            <div class="flex flex-col">
                <label for="senha">Senha</label>
                <input
                    type="password"
                    name="senha"
                    id="senha"
                    class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1">
            </div>

            <button
                class="border-stone-800 bg-stone-900 tedxt-stone-400 px-4 py-2 rounded-md border-2 hover:bg-stone-800">
                Entrar</button>


        </form>
    </div>

    <div class="border border-stone-700 rounded p-4">
        <h1 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">Registro</h1>
        <form class="p-4 space-y-4" method="POST" action="/registrar">



            <?php if ($validacoes = flash()->get('validacoes_registrar')): ?>
                <div class="border-red-800 bg-red-900 text-red-400 px-4 py-1 rounded-md border-2
                text-sm font=bold">
                    <ul>
                        <li>Deu Ruim!</li>

                        <?php foreach ($validacoes as $validacao): ?>
                            <li><?= $validacao ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

            <?php endif; ?>

            <div class="flex flex-col">
                <label class="text-stone-400 mb-1" for="username">Nome</label>
                <input
                    type="text"
                    name="nome"
                    id="nome"

                    class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1">



            </div>

            <div class="flex flex-col">
                <label class="text-stone-400 mb-1" for="username">Email</label>
                <input
                    type="text"
                    name="email"
                    id="email"

                    class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1">



            </div>


            <div class="flex flex-col">
                <label for="email_confirmacao">Confirme Email</label>
                <input
                    type="text"
                    name="email_confirmacao"
                    id="email_confirmacao"
                    class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1">
            </div>

            <div class="flex flex-col">
                <label for="password">Senha</label>
                <input
                    type="password"
                    name="senha"
                    id="senha"
                    class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1">
            </div>

            <button type="reset" class="border-stone-800 bg-stone-900 tedxt-stone-400 px-4 py-2 rounded-md border-2 hover:bg-stone-800">
                Cancelar
            </button>
            <button type="submit"
                class="border-stone-800 bg-stone-900 tedxt-stone-400 px-4 py-2 rounded-md border-2 hover:bg-stone-800">
                Registrar</button>


        </form>
    </div>

</div>