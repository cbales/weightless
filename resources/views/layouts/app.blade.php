<html>
	<head>
		<title>@yield('title') - weightless</title>
		<link href="/css/weightless.css" rel="stylesheet" type="text/css">
		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
	</head>
	<body>
	<div class="container">
		@section('header')
			<div class="header">
				<a href="/"><h1>weightless</h1></a>
				<div class="menu">
					<div class="menu-item" id="active">
						Log
					</div>
					<div class="menu-item">
						Recipes
					</div>
					<div class="menu-item">
						Goals
					</div>
				</div>
			</div>
			
		@show

		<div class="content">
			@yield('content')
		</div>

		<div class="footer">

		</div>
	</body>
</html>