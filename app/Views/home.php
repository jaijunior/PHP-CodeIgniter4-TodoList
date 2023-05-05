<?= $this->extend('layouts/main_layout') ?>
<?= $this->section('conteudo') ?>

   <header class="container">
    <div class="d-flex justify-content-around align-items-center pt-3">
        <div class="">
            <h3 class="mt-2">TODO LIST</h3>            
        </div>
        <div class="">
            <a href="<?= site_url('main/newJob') ?>" class="btn btn-primary">Nova Tarefa</a>
        </div>
    </div>
</header>
   <hr>
<main class="d-flex justify-content-around align-items-center ">

    <?php if(count($jobs) == 0):?>
        <p>Não há tarefas para completar!</p>
    <?php else:?>
        <table class="table table-striped table-sm">
            <thead class="table-dark">
                <th class="text-center">Tarefa</th>
                <th class="text-center">Criação</th>
                <th class="text-center">Finalização</th>
                <th class="text-center">Ações</th>
            </thead>
            <tbody>
                <?php foreach($jobs as $job):?>
                    <tr>
                        <td class="text-center"><?= $job->job ?></td>
                        <td class="text-center"><?= $job->datetime_created ?></td>
                        <td class="text-center"><?= $job->datetime_finished ?></td>
                        <td class="text-center">

                            <!--Terminar em aberto--> 
                            <?php if(empty($job->datetime_finished)): ?>
                                <a href="<?= site_url("main/jobdone/".$job->id_jobs."") ?>" class="btn btn-success btn-sm mx-2"><i class="fa fa-check"></i></a>
                            <?php else: ?>
                                <button class="mx-2 btn btn-light text-danger btn-sm" disabled>&#10006;</button>
                            <?php endif ?>

                            <!--Editar em aberto--> 
                            <?php if(empty($job->datetime_finished)): ?>
                                <a href="<?= site_url("main/editJob/".$job->id_jobs) ?>" class="btn btn-primary btn-sm mx-2"><i class="fa fa-pencil"></i></a>
                            <?php else: ?>
                                <button class="mx-2 btn btn-light text-muted btn-sm" disabled><i class="fa fa-pencil"></i></button>
                            <?php endif ?>

                            <!--Deletar Tarefa--> 
                            <a href="<?= site_url('main/deleteJob/'.$job->id_jobs) ?>" class="btn btn-danger btn-sm mx-2"><i class="fa fa-trash"></i></a>                                                                                 
                        </td>
                    </tr>
                <?php endforeach?>
            </tbody>
        </table>
    <?php endif?>        
</main>
<p>Nº de tarefas: <strong><?= count($jobs) ?></strong></p>


<?= $this->endSection() ?>


