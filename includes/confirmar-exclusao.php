<?php
    $titulo = $obVaga->titulo;
    $descricao = $obVaga->descricao;
    $ativo = $obVaga->ativo == "n" ? 'checked' : '';

    echo'
    <main>
    <section>
       
    </section>
    <h2 class="mt-3">Excluir Vaga</h2>

    <form method="post">
        <div class="form-group">
            <p>Deseja excluir a vaga <strong>'.$titulo.'</strong>?</p>
        </div>
        
        <div class="form-group">
            <a href="index.php">
                <button type="button" class="btn btn-success">Cancelar</button>
            </a>
            <button type="submit" name="excluir" class="btn btn-danger">Excluir</button>
        </div>

    </form>
</main>
    ';
?>
