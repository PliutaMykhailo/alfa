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
		
		$(document).ready(function() { 

			var quotes = $('.quote');
			quotes.hide();
			
			var qlen = quotes.length;
			$( '.quote:eq(' + random(qlen-1) + ')' ).show();
		});
		</script>
	</head>
	<body>
		<div id="entrance">
			<?php include 'application/views/'.$content_view; ?>
		</div>
	</body>
</html>