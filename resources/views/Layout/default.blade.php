<!DOCTYPE html>
<html lang="en">
<head>
	@include('complements.head')
	<title>@yield('title')</title>
</head>
<body>

	<header>
		@include('complements.header')
	</header>
	<main role="main" class="container">
		<div class="row">
			<div class="col-sm-6">
				@yield('content')
			</div>
			<div class="col-sm-6">
				@yield('historial')
			</div>
		</div>
	</main>

	<footer class="footer fixed-bottom">
		@include('complements.footer')
	</footer>

</body>
</html>
