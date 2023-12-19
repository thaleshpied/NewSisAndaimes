<?php
header("Cache-Control: public, max-age=36000"); // Permitir armazenamento em cache por 1 hora
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta Tag -->
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=0.7, maximum-scale=3, user-scalable=no" /> 
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
   
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <meta name="theme-color" content="#018022" />
    
    <link rel="manifest" href="application/views/assets/js/manifest.json">

    <title><?=$title?></title>

    <!-- css -->
    <link rel="stylesheet" href="application/vendors/typicons.font/font/typicons.css">
    <link rel="stylesheet" href="application/views/assets/css/estilo.css">
    <link rel="stylesheet" href="application/views/assets/css/vertical-layout-light/style.css">
    <link rel="shortcut icon" href="application/views/assets/img/icon.ico" />

    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!--ABAIXO DEPENDÊNCIAS DOS CARDS DOS INDICADORES-->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- FONT AWESOME
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />-->

    <link rel="stylesheet" href="application/views/assets/awesome/font-awesome.css"> 





<script>
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('http://localhost/NewSisAndaimes/SisAndaimes-main/service-worker.js')
            .then(() => console.log('Registrado!'))
            .catch((error) => console.error(error));
    }
    const getAll = () => {
        console.log('teste');
        fetch('/api/users', {method: 'GET'}).then(reponse => {
            console.log('Veio uma response');
            return response.json().then(r => {
                return r;
            });
        });
    }
</script>




  </head>