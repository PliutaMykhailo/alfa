<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>LEGIONER</title>
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
		<div>
			<?php include 'application/views/'.$content_view; ?>
		</div>
	</body>
</html>