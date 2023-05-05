<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('conteudo') ?>

<header class="container">
    <div class="d-flex justify-content-around align-items-center pt-3">
        <div class="">
            <h3 class="mt-2">TODO LIST</h3>
        </div>
        <div class="">
            <h3>Eliminar Tarefa</h3>
        </div>
    </div>
</header>
<hr>
<main class="d-flex flex-column justify-content-around align-items-center ">

        <div class="card text-center bg-light p-4">
            <h3>Deseja eliminar a tarefa?</h3><br>
            <h4><?= $job->job ?></h4>
        </div>

        <div class = "d-flex justify-content-between p-4" >
            <a href="<?= site_url('main') ?>" class = "btn btn-secondary mx-3">Cancelar</a>
            <a href="<?= site_url('main/deleteJobSubmition/'.$job->id_jobs)?>" class = "btn btn-danger mx-3" ><strong>Confirmar</strong></a>
        </div>
    

</main>



<?= $this->endSection() ?>