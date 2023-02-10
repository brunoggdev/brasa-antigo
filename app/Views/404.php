<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?=$titulo??'Brasa - Novo Projeto Ci4'?></title>
    <meta name="description" content="Novo Projeto Ci4">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
    <!-- bootstrap -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> -->
    
    <!-- estilos brasa -->
    <!-- envio do parametro v com a versão em importações CSS e JS para cache-bursting  -->
    <link rel="stylesheet" href="<?=base_url('brasa.css?v='.VERSION??'')?>">
</head>
<body>
    <main>
        <h1 class="titulo" style="width: 250px; margin: 10% auto; font-weight: 600;">
            B
            R
            A
            S
            A
        </h1>
        <h1 style="margin-top: 10%;">Oops! Página não encontrada...</h1>
        <br>
        <h2 style="color: gray; text-align: center;">404</h2>
    </main>
</body>
</html>