<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>


<link rel="stylesheet" href="application/views/assets/css/estilo.css">
</head>
<body>
    
  <div class="loader">
    <div class="spinner"></div>
    </div>
  <img id="myImage" src="application/views/assets/img/logo.png" alt="Minha Imagem" class="hidden">
 

    <script>
     window.onload = function() {
    setTimeout(function() {
        document.querySelector('.spinner').style.display = 'none';
        document.getElementById('myImage').classList.add('visible');
        setTimeout(function() {
        document.getElementById('myImage').classList.remove('visible');
        document.getElementById('myImage').classList.add('hidden');
        document.querySelector('.logingeral').style.display = 'inline-flex';
        }, 6000);
    }, 2000);
    };

    </script>
</body>
</html>
