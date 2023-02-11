<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?=$titulo??'Brasa - Novo Projeto Ci4'?></title>
    <meta name="description" content="Novo Projeto Ci4">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    
    <!-- estilos brasa -->
    <!-- envio do parametro v com a versão em importações CSS e JS para cache-bursting  -->
    <link rel="stylesheet" href="<?=base_url('brasa.css?v='.VERSION??'')?>">
</head>
<body>

<?php if( usuario('logado') ): ?>
   <!-- Como renderizar algo apenas se o usuário estiver logado -->
<?php endif; ?>

<?php if( url_is('/login') ): ?>
   <!-- Como renderizar algo baseado na url -->
<?php endif; ?>