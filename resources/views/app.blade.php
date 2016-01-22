<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
		@include('flash::message')
		@yield('content')
</div>
	<!-- Latest compiled and minified JS -->
	<script src="//code.jquery.com/jquery.js"></script>	
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script type="text/javascript">
	$('#flash-overlay-modal').modal();
	// $('div.alert').not('.alert-important').delay(3000).slideUp(300);
	</script>
	@yield('footer')
</body>
</html>