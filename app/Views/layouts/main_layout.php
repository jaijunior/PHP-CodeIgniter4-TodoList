<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To do List</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/font-awesome-4.7.0/css/font-awesome.min.css')?>">
</head>
<body>


    
    <?= $this->renderSection('conteudo') ?>


<hr>
<footer class="container">
    <div class="d-flex justify-content-around align-items-center ">
        <p class="">TODO List &copy; <?= date('Y') ?></p>
    </div>
</footer>

    <script src="<?= base_url('assets/jss/javascript.min.css') ?>"></script>
</body>
</html>