<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>LEGIONER</title>
		<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
		<link href="http://fonts.googleapis.com/css?family=Kreon" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="/css/style.css" />
		<script src="/js/jquery-1.6.2.js" type="text/javascript"></script>
		<script type="text/javascript">

		function random(number) {
			
			return Math.floor( Math.random()*(number+1) );
		};
		
		// show random quote
		$(document).ready(function() { 

			var quotes = $('.quote');
			quotes.hide();
			
			var qlen = quotes.length; //document.write( random(qlen-1) );
			$( '.quote:eq(' + random(qlen-1) + ')' ).show(); //tag:eq(1)
		});
		</script>
	</head>
	<body>
		<div id="wrapper">
			<div id="header">
				<a id="logo-small" href="/"><img src="images/logo-small.png" ></a>
				<div id="sidebar_start" class="colored">
					<div class="side-box">
						<p align="justify" class="quote">
						<!-- Слава Україні! -->
						</p>
						<p align="justify" class="quote">
						<!-- Героям Слава! -->
						</p>
						<p align="justify" class="quote">
						<!-- Україна понад усе! -->
						</p>
					</div>
				</div>
				<div id="input_output">
				<!-- <p><a href="/"      >Вихід</p> -->				
				<!-- 	<button class="btn" name="submit"  onclick="      ">Вихід</button><br> -->
				</div>
				<div id="message">
  				<!-- <p align="justify">Увага!<br>На сайті проводяться регламентні роботи.<br>Просимо припинити роботу з базою даних та вийти з облікового запису.</p> -->
				</div>
				<div id="menu">				
					<ul>
					<?php session_start(); echo($_SESSION['main_menu']); ?> 
					</ul>
					<br class="clearfix" />
				</div>
			</div>
			<div id="page">				
				<div id="content">
					<div class="box">
						<?php include 'application/views/'.$content_view; ?>						
					</div>
					<br class="clearfix" />
				</div>
				<br class="clearfix" />
			</div>			
		</div>
		<div id="footer">

		</div>
	</body>
</html>