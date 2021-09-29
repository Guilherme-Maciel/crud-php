<?php
$pageHtml = '';

if(!isset($obVaga)){

    echo'
    <main>
    <section>
        <a href="index.php">
            <button class="btn btn-success">Voltar</button>
        </a>
    </section>
    <h2 class="mt-3">Cadastrar Vaga</h2>

    <form method="post">
        <div class="form-group">
            <label for="">Título</label>
            <input type="text" class="form-control" name="titulo">
        </div>
        <div class="form-group">
            <label for="">Descrição</label>
            <textarea name="descricao" class="form-control" rows="5"></textarea>
        </div>
        <div class="form-group">
            <label for="">Status</label>
            <div>
                <div class="form-check form-check-inline">
                    <label for="" class="form-control">
                        <input type="radio" name="ativo" value="s" checked> Ativo
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label for="" class="form-control">
                        <input type="radio" name="ativo" value="n"> Inativo
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>

    </form>
</main>
    ';
}else{
    $titulo = $obVaga->titulo;
    $descricao = $obVaga->descricao;
    $ativo = $obVaga->ativo == "n" ? 'checked' : '';

    echo'
    <main>
    <section>
        <a href="index.php">
            <button class="btn btn-success">Voltar</button>
        </a>
    </section>
    <h2 class="mt-3">Alterar Vaga</h2>

    <form method="post">
        <div class="form-group">
            <label for="">Título</label>
            <input type="text" class="form-control" name="titulo" value="'.$titulo.'">
        </div>
        <div class="form-group">
            <label for="">Descrição</label>
            <textarea name="descricao" class="form-control" rows="5">'.$descricao.'</textarea>
        </div>
        <div class="form-group">
            <label for="">Status</label>
            <div>
                <div class="form-check form-check-inline">
                    <label for="" class="form-control">
                        <input type="radio" name="ativo" value="s" checked> Ativo
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label for="" class="form-control">
                        <input type="radio" name="ativo" value="n" '.$ativo.'> Inativo
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>

    </form>
</main>
    ';


}

echo $pageHtml;
?>
