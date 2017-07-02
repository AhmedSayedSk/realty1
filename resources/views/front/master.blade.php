<!DOCTYPE html>
<html lang="en">
<head>
	<base href='<?= URL::to('./'); ?>'>
    <script>var base = '<?= URL::to('./'); ?>';</script>
	<meta charset="utf-8">
    <link rel="shortcut icon" href="">
    <meta name="author" content="Development: Ahmed Sayed, Rania Sayed, Nada Moawad">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="csrf-token" content="{!! csrf_token() !!}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">

	<title>@yield('page_title')</title>

	<link rel="stylesheet" type="text/css" href="./packages/bootstrap/css/bootstrap.min.css">
	@yield('head-css')
	<link rel="stylesheet" type="text/css" href="./front/assets/css/style.css">

	<script type="text/javascript" src="./assets/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="./packages/bootstrap/js/bootstrap.min.js"></script>
	@yield('head-js')
	<script type="text/javascript" src="./front/assets/js/script.js"></script>
</head>
<body>
	@include('front.add-ons.navbar')
	@yield('content')

	<footer class="container">
		Wish you have enjoyed our journey :D
	</footer>

	@yield('footer-js')
</body>
</html>