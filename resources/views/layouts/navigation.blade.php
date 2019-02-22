<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- SWEET ALERT --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>

    <script type="text/javascript">

      function ajaxSearch() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        if($("input[name=searchQ]").val() == ""){
          $("input[name=searchQ]").popover('hide');
          return;
         }
        $.ajax({
          url: "/search",
          type: 'POST',
          data: {_token: CSRF_TOKEN, message:$("input[name=searchQ]").val()},
          dataType: 'JSON',
          success: function(data) {
            console.log(data);
                if(data.status == "error") {
                  $("input[name=searchQ]").popover('hide');
                  return;
                }
                var msg = $('');
                msg.innerHTML="";
                if(data.message.users.length != 0) msg.innerHTML += "<h1>"+data.message.users[0].name+"</h1>" + " " + data.message.users[0].surname+"; ";
                if(data.message.trucks.length != 0) msg.innerHTML += data.message.trucks[0].idno + " " + data.message.trucks[0].model+"; ";
                if(data.message.repairs.length != 0) msg.innerHTML += data.message.repairs[0].idno + " " + data.message.repairs[0].desc+"; ";


                $("input[name=searchQ]").attr('data-content', msg.innerHTML);
                $("input[name=searchQ]").popover('show');
              }
            });
          }

      function hide() {
        var check = document.getElementById("hide").checked;
        @if(isset($repairs))
        @foreach($repairs as $repair)
        @if($repair->deleted_at != NULL)
        el = document.getElementById({{$repair->id}});
        if(check) el.classList.remove("hidden");
        else el.classList.add("hidden");
        @endif
        @endforeach
        @endif
      }

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
      function changeTransportStatus(tpid) {
        swal({
          title: tpid + "statuso keitimas",
          text: "",
          icon: "info",
          buttons: true,
          dangerMode: false,
        })
        .then((willDelete) => {
           if (willDelete){
             // swal("Record, You requested to delete has been destroyed!", {
             //    icon: 'success',
             // });

          }
       });
      }

      function showConfirmationAlert() {
        swal({
          title: "Are You sure?",
          text: "Once deleted, you will not be able to recover this imaginary record!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
           if (willDelete){
             // swal("Record, You requested to delete has been destroyed!", {
             //    icon: 'success',
             // });

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
      @include('layouts.viewHeader', ['title' => $ViewHeaderTitle, 'subtitle' => $ViewHeaderSubtitle, 'viewName' => $viewName])
      <header id="topNavigation">
		<form>
			<i class="icon" data-feather="search"></i>
			<input autocomplete="off" data-toggle="popover" data-placement="bottom" onkeyup="ajaxSearch()" class="search-input" type="text" name="searchQ" placeholder="Ieškoti transporto priemonių, žmonių, maršrutų, klientų, pavedimų ir kitos informacijos">
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
			<a href="{{ route('transport.index') }}" class=" @if (Route::currentRouteName() == "transport.index") active @endif ">
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
