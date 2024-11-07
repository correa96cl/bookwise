<h1 class="mt-6 font-bold text-lg">Meus Livros</h1>

<div class="grid grid-cols-4 gap-4">
    <div class="col-span-3 flex flex-col gap-4">
        <?php foreach ($livros as $livro){
            require 'partials/_livro.php';
        } ?>
           



    </div>

    <div>

        <div class="border border-stone-700 rounded p-4">
            <h1 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">Cadastro livro</h1>
            <form class="p-4 space-y-4" method="POST" action="/livro-criar" enctype="multipart/form-data">

                <?php if ($validacoes = flash()->get('validacoes')): ?>
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
                        <label class="text-stone-400 mb-1" for="username">Imagem</label>
                        <input ty
                            type="file"
                            name="imagem"
                            id="imagem"
                            class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1"/>

                    </div>


                <div class="flex flex-col">

                    <label class="text-stone-400 mb-1" for="username">Titulo</label>
                    <input
                        type="text"
                        name="titulo"
                        id="titulo"

                        class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1" />


                </div>


                <div class="flex flex-col">

                    <label class="text-stone-400 mb-1" for="username">Descrição</label>
                    <textarea
                       
                        name="descricao"
                        id="descricao"

                        class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1">
                                </textarea>



                    </div>

                    <div class="flex flex-col">

                        <label class="text-stone-400 mb-1" for="username">Autor</label>
                        <input
                            type="text"
                            name="author"
                            id="author"

                            class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1"/>
                               



                    </div>

                    <div class="flex flex-col">

                        <label class="text-stone-400 mb-1" for="username">Ano de Lançamento</label>
                        <select
                            type="text"
                            name="ano_de_lancamento"
                            id="ano_de_lancamento"
                            class="border-stone-800 border-2 rounded-md bg-stone-900 text-sm focus:outline-none px-2 py-1">
                            <option value="">Selecione</option>
                            <?php foreach (range(1800, date('Y')) as $ano): ?>
                                <option value="<?= $ano ?>"><?= $ano ?></option>

                            <?php endforeach; ?>
                        </select>
                               



                    </div>

                    

                    

                    

                    <button
                        class="border-stone-800 bg-stone-900 tedxt-stone-400 px-4 py-2 rounded-md border-2 hover:bg-stone-800">
                        Salvar</button>


                </form>
            </div>

    </div>

</div>