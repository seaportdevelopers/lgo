<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>	
       <header id="topNavigation">
		<form>
			<i class="icon" data-feather="search"></i>
			<input class="search-input" type="text" name="searchQ" placeholder="Ieškoti transporto priemonių, žmonių, maršrutų, klientų, pavedimų ir kitos informacijos">
		</form>
		<span>{{ Auth::user()->name }}</span>
	</header>
	<div class="sideNavigation">
		<div class="items">
			<a href="#home" class="active">
				<span class="icon" data-feather="home"></span>
			</a>
			<a href="#home">
				<span class="icon" data-feather="activity"></span>
			</a>
			<a href="#home">
				<span class="icon" data-feather="stop-circle"></span>
			</a>
			<a href="#home">
				<span class="icon" data-feather="truck"></span>
			</a>
		</div>
	</div>
        <main class="content">
            @yield('content')
        </main>
</body>
</html>
