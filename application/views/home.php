<?php
/**
 * Created by PhpStorm.
 * User: Richard
 * Date: 04/12/2016
 * Time: 16:59
 */

?>

<?php $this->load->helper('url'); ?>


<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-with, initial-scale=1.0">

    <title>POMOJOB</title>

    <script> var baseURL = '<?= base_url() ?>'; </script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Morris charts -->
    <link href="<?= base_url() ?>comum/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?= base_url() ?>comum/css/geral.css">
    <link rel="stylesheet" href="<?= base_url() ?>comum/css/font.css">
    <link rel="stylesheet" href="<?= base_url() ?>comum/css/style.css">

</head>
<body>
Olá!

<article>
    <?php $this->load->view('partes/header'); ?>
    <div class="box cont_cronometro tabela">
        <div class="celula" style="width:33%; text-align: right;">        
        	<?php $this->load->view('partes/estatistica'); ?>        
        </div>
        <div class="celula">
        	<?php $this->load->view('partes/cronometro'); ?>            
        </div>
        <div class="celula" style="width:33%; text-align: left;"></div>
    </div>
</article>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?= base_url() ?>comum/plugins/morris/morris.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>comum/js/timer.jquery.min.js"></script>

<script src="<?= base_url() ?>comum/js/util.js"></script>

<script src="<?= base_url() ?>comum/js/cookie.js"></script>
<!-- circulo de progresso -->
<script src="<?= base_url() ?>comum/js/progresso.js"></script>
<!-- estatistica -->
<script src="<?= base_url() ?>comum/js/estatistica.js"></script>

<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip({trigger: "hover"});   
	});
</script>

</body>
</html>