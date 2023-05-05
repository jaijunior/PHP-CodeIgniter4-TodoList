<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('conteudo') ?>

<header class="container">
    <div class="d-flex justify-content-around align-items-center pt-3">
        <div class="">
            <h3 class="mt-2">TODO LIST</h3>
        </div>
        <div class="">
            <h3>Nova Tarefa</h3>
        </div>
    </div>
</header>
<hr>
<main class="d-flex justify-content-around align-items-center ">

    <?php
    helper('form');
    echo form_open('main/newJobSubmition');
    ?>
    <div class="form-group py-3">
        <label for="job_name">Task</label>
        <input type="text" name="job_name" class="form-control" required>
    </div>
    <div class='row'>
        <div class="col">
            <a href="<?=site_url('main') ?>" class="btn btn-secondary">Cancelar</a>
        </div>
        <div class="col text-right">
            <input type="submit" value="Criar Tarefa" class="btn btn-primary ">
        </div>
    </div>

    <?= form_close() ?>

</main>



<?= $this->endSection() ?>