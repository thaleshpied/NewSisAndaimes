<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<link rel="stylesheet" href="application/views/assets/css/estilo.css">

<!------ Include the above in your HEAD tag ---------->

</head>
<body>

<div id="bodyauxiliar">
	
<div class="loader">
    <div class="spinner"></div>
    </div>
  <img id="myImage" src="application/views/assets/img/logo.png" alt="Minha Imagem" class="hidden">
 
</div>

    <script>
    window.onload = function() {
	setTimeout(function() {
		document.querySelector('.spinner').style.display = 'none';
		document.getElementById('myImage').classList.add('visible');
		setTimeout(function() {
		document.getElementById('myImage').classList.remove('visible');
		document.getElementById('myImage').classList.add('hidden');
		setTimeout(function() {
			document.querySelector('.logingeral').style.display = 'inline-flex';
			document.getElementById('bodyauxiliar').style.display = 'none';
		}, 1000);
		}, 1000);
	}, 1000);
	};


    </script>


  <div class="row logingeral">
    
		<div class="col-6">

		<div class="login-wrap col-6">
			<div class="login-html">
				<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Entrar</label>
				<input id="tab-2" type="radio" name="tab" class="for-pwd"><label for="tab-2" class="tab">Recuperar Senha</label>
				<div class="login-form" id="form-login">
					<div class="sign-in-htm">
						<div class="group">
							<label for="user" class="label">E-mail</label>
							<input id="inputEmailLogin" type="email" class="input" name="inputEmailLogin">
						</div>
						<div class="group">
							<label for="pass" class="label">Senha</label>
							<input id="inputSenhaLogin" type="password" class="input" data-type="password" name="inputSenhaLogin">
						</div>
						<div class="group">
							<input type="submit" class="button" value="Entrar" id="btnLogar" name="btnLogar" >
						</div>
						<div class="hr"></div>
					</div>
					<div class="for-pwd-htm">
						<div class="group">
							<label for="user" class="label">E-mail</label>
							<input id="user" type="text" class="input">
						</div>
						<div class="group">
							<input type="submit" class="button" value="Recuperar Senha">
						</div>
						<div class="hr"></div>
					</div>
				</div>
			</div>
				
				
		</div>

		</div>

		<div class="col-6 text-center"> 
			<img src="application/views/assets/img/logo.png" alt="image" class="logologin">
			<header class="header valign bg-img" data-scroll-index="0" data-overlay-dark="7" data-background="img/bg3.jpg" data-stellar-background-ratio="0.5">

            <!-- particles -->
            <div id="particles-js"></div>

    		<div class="container">
    			<div class="text-center caption mt-30">
                    <h1 class="cd-headline clip">
                        <span class="blc">TOP</span>
                        <span class="cd-words-wrapper">
                          <b class="is-visible">ANDAIMES</b>
                          <b>TI</b>
                          <b>SIS ANDAIMES</b>
                        </span>
                    </h1>
                </div>
    		</div>

            <div class="curve curve-bottom curve-center"></div>
    	</header>
			<!--
			<div>
				<img src="application/views/assets/img/qrcode.png" alt="image" class="qrcodelogin text-right">
			</div> -->
		</div>
		
  </div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">

$(document).ready(function(){

	//Logar
	$('#btnLogar').on('click',function(){

		// Pegando valores dos inputs
		var inputEmailLogin = $('#inputEmailLogin').val();
		var inputSenhaLogin = $('#inputSenhaLogin').val();

		console.log('inputEmailLogin');	
		console.log('inputSenhaLoginogin');


		// verificando se os campos estão preenchidos
		if (inputEmailLogin == "" || inputSenhaLogin == "") {
			alert('Todos os campos são obrigatórios!');
		} else {
			// Ajax envia os dados para o Administrador/login
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url('Pagina/login')?>",
				dataType : "JSON",
				data : {
					inputEmailLogin:inputEmailLogin,
					inputSenhaLogin:inputSenhaLogin
				},
				success: function(data){
					alert(data);
					
				}
			});
			window.location.href = "<?php echo base_url()?>";


			
			// Limpando o formulário
			//document.getElementById("form-login").reset();	
			

		}
	});
});

</script>

<!--SCRIPT ANIMAÇÃO DE TEXTO - REFATORAR -->

<script>
	jQuery(document).ready(function($){
	//set animation timing
	var animationDelay = 2500,
		//loading bar effect
		barAnimationDelay = 3800,
		barWaiting = barAnimationDelay - 3000, //3000 is the duration of the transition on the loading bar - set in the scss/css file
		//letters effect
		lettersDelay = 50,
		//type effect
		typeLettersDelay = 150,
		selectionDuration = 500,
		typeAnimationDelay = selectionDuration + 800,
		//clip effect 
		revealDuration = 600,
		revealAnimationDelay = 1500;
	
	initHeadline();
	

	function initHeadline() {
		//insert <i> element for each letter of a changing word
		singleLetters($('.cd-headline.letters').find('b'));
		//initialise headline animation
		animateHeadline($('.cd-headline'));
	}

	function singleLetters($words) {
		$words.each(function(){
			var word = $(this),
				letters = word.text().split(''),
				selected = word.hasClass('is-visible');
			for (i in letters) {
				if(word.parents('.rotate-2').length > 0) letters[i] = '<em>' + letters[i] + '</em>';
				letters[i] = (selected) ? '<i class="in">' + letters[i] + '</i>': '<i>' + letters[i] + '</i>';
			}
		    var newLetters = letters.join('');
		    word.html(newLetters).css('opacity', 1);
		});
	}

	function animateHeadline($headlines) {
		var duration = animationDelay;
		$headlines.each(function(){
			var headline = $(this);
			
			if(headline.hasClass('loading-bar')) {
				duration = barAnimationDelay;
				setTimeout(function(){ headline.find('.cd-words-wrapper').addClass('is-loading') }, barWaiting);
			} else if (headline.hasClass('clip')){
				var spanWrapper = headline.find('.cd-words-wrapper'),
					newWidth = spanWrapper.width() + 10
				spanWrapper.css('width', newWidth);
			} else if (!headline.hasClass('type') ) {
				//assign to .cd-words-wrapper the width of its longest word
				var words = headline.find('.cd-words-wrapper b'),
					width = 0;
				words.each(function(){
					var wordWidth = $(this).width();
				    if (wordWidth > width) width = wordWidth;
				});
				headline.find('.cd-words-wrapper').css('width', width);
			};

			//trigger animation
			setTimeout(function(){ hideWord( headline.find('.is-visible').eq(0) ) }, duration);
		});
	}

	function hideWord($word) {
		var nextWord = takeNext($word);
		
		if($word.parents('.cd-headline').hasClass('type')) {
			var parentSpan = $word.parent('.cd-words-wrapper');
			parentSpan.addClass('selected').removeClass('waiting');	
			setTimeout(function(){ 
				parentSpan.removeClass('selected'); 
				$word.removeClass('is-visible').addClass('is-hidden').children('i').removeClass('in').addClass('out');
			}, selectionDuration);
			setTimeout(function(){ showWord(nextWord, typeLettersDelay) }, typeAnimationDelay);
		
		} else if($word.parents('.cd-headline').hasClass('letters')) {
			var bool = ($word.children('i').length >= nextWord.children('i').length) ? true : false;
			hideLetter($word.find('i').eq(0), $word, bool, lettersDelay);
			showLetter(nextWord.find('i').eq(0), nextWord, bool, lettersDelay);

		}  else if($word.parents('.cd-headline').hasClass('clip')) {
			$word.parents('.cd-words-wrapper').animate({ width : '2px' }, revealDuration, function(){
				switchWord($word, nextWord);
				showWord(nextWord);
			});

		} else if ($word.parents('.cd-headline').hasClass('loading-bar')){
			$word.parents('.cd-words-wrapper').removeClass('is-loading');
			switchWord($word, nextWord);
			setTimeout(function(){ hideWord(nextWord) }, barAnimationDelay);
			setTimeout(function(){ $word.parents('.cd-words-wrapper').addClass('is-loading') }, barWaiting);

		} else {
			switchWord($word, nextWord);
			setTimeout(function(){ hideWord(nextWord) }, animationDelay);
		}
	}

	function showWord($word, $duration) {
		if($word.parents('.cd-headline').hasClass('type')) {
			showLetter($word.find('i').eq(0), $word, false, $duration);
			$word.addClass('is-visible').removeClass('is-hidden');

		}  else if($word.parents('.cd-headline').hasClass('clip')) {
			$word.parents('.cd-words-wrapper').animate({ 'width' : $word.width() + 10 }, revealDuration, function(){ 
				setTimeout(function(){ hideWord($word) }, revealAnimationDelay); 
			});
		}
	}

	function hideLetter($letter, $word, $bool, $duration) {
		$letter.removeClass('in').addClass('out');
		
		if(!$letter.is(':last-child')) {
		 	setTimeout(function(){ hideLetter($letter.next(), $word, $bool, $duration); }, $duration);  
		} else if($bool) { 
		 	setTimeout(function(){ hideWord(takeNext($word)) }, animationDelay);
		}

		if($letter.is(':last-child') && $('html').hasClass('no-csstransitions')) {
			var nextWord = takeNext($word);
			switchWord($word, nextWord);
		} 
	}

	function showLetter($letter, $word, $bool, $duration) {
		$letter.addClass('in').removeClass('out');
		
		if(!$letter.is(':last-child')) { 
			setTimeout(function(){ showLetter($letter.next(), $word, $bool, $duration); }, $duration); 
		} else { 
			if($word.parents('.cd-headline').hasClass('type')) { setTimeout(function(){ $word.parents('.cd-words-wrapper').addClass('waiting'); }, 200);}
			if(!$bool) { setTimeout(function(){ hideWord($word) }, animationDelay) }
		}
	}

	function takeNext($word) {
		return (!$word.is(':last-child')) ? $word.next() : $word.parent().children().eq(0);
	}

	function takePrev($word) {
		return (!$word.is(':first-child')) ? $word.prev() : $word.parent().children().last();
	}

	function switchWord($oldWord, $newWord) {
		$oldWord.removeClass('is-visible').addClass('is-hidden');
		$newWord.removeClass('is-hidden').addClass('is-visible');
	}
});
</script>


</body>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</html>