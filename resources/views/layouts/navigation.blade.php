<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- SWEET ALERT --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>

    <script type="text/javascript">
      function showWarningAlert() {
        swal({
          icon: "warning",
          title: "Are you sure?",
          text: "Do you really want to delete this?",
          cancel: {
              text: "Cancel",
              value: null,
              visible: false,
              className: "",
              closeModal: true,
            },
            confirm: {
              text: "OK",
              value: true,
              visible: true,
              className: "",
              closeModal: true
            }
        });
      }

      function showErrorAlert() {
        swal({
            type: "error",
            title: 'Something went wrong...',
            text: "Try filling out all of the fields",
        });
      }

      function showSuccess() {
        swal({
            type: "success",
            title: 'All done!',
            text: "The data has been written to the registry",
        });
      }


    </script>

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
			<a href="{{ route('home') }}" class=" @if (Route::currentRouteName() == "home") active @endif ">
				<span class="icon" data-feather="home"></span>
			</a>
			<a href="{{ route('repairs.index') }}" class=" @if (Route::currentRouteName() == "repairs.index") active @endif ">
				<span class="icon" data-feather="activity"></span>
			</a>
			<a href="#">
				<span class="icon" data-feather="stop-circle"></span>
			</a>
			<a href="{{ route('transport.index') }}" class=" @if (Route::currentRouteName() == "transport") active @endif ">
				<span class="icon" data-feather="truck"></span>
			</a>
		</div>
	</div>
        <main class="content">
            @yield('content')
        </main>
</body>
<script type="text/javascript">
@if($errors->any())
      showErrorAlert();
@elseif (Session::has('suc') && Session::get('suc') == "1")
      showSuccess();
@endif
</script>

</html>
