<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- SWEET ALERT --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">

    function checker(id, status) {
      id = $(id).attr('id');
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
        url: '/search/status',
        type: 'POST',
        data: {_token: CSRF_TOKEN, id: id, status: status},
        dataType: 'JSON',
        success: function(data) {
          if(data.status != "success") return;
          $("#"+id).popover("hide");
          $("#"+id).parent().load(document.URL + " #"+id);
          location.reload();                              //CAN BE OPTIMIZED IF NEEDED
        }
      });
    }

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
            return;
                if(data.status == "error") {
                  $("input[name=searchQ]").popover('hide');
                  return;
                }



              }
            });
          }

      // function hide() {
      //   var check = document.getElementById("hide").checked;
      //   @if(isset($repairs))
      //   @foreach($repairs as $repair)
      //   @if($repair->deleted_at != NULL)
      //   el = document.getElementById({{$repair->id}});
      //   if(check) el.classList.remove("hidden");
      //   else el.classList.add("hidden");
      //   @endif
      //   @endforeach
      //   @endif
      // }

      $(document).ready(function(){
        $("#hide2").click(function(){
          //alert("clicked");
          @if(isset($repairs))
          @foreach($repairs as $repair)
          @if($repair->deleted_at != NULL)
          el = document.getElementById({{$repair->id}});
          if($("#{{$repair->id}}").hasClass("hidden")) el.classList.remove("hidden");
          else el.classList.add("hidden");
          @endif
          @endforeach
          @endif
        });
      });


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

    <title>{{ config('app.name', 'LGO development') }}</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
      @include('layouts.viewHeader', ['title' => $ViewHeaderTitle, 'subtitle' => $ViewHeaderSubtitle, 'viewName' => $viewName])
<header id="mobileTopNavigation">
  <a href="#" id="openMobileMenu">
    <span class="icon" data-feather="menu"></span>
  </a>
  <a href="{{ route('home') }}">
    <h5 style="color: #fff; text-decoration: none;">LGO</h5>
  </a>
  <a href="#" id="openSearchBtn">
    <span class="icon" data-feather="search"></span>
  </a>

</header>
<header id="topNavigation">
		<form>
			<i class="icon" data-feather="search"></i>
			<input autocomplete="off" data-toggle="popover" data-placement="bottom" onkeyup="ajaxSearch()" class="search-input" type="text" name="searchQ" placeholder="Ieškoti transporto priemonių, žmonių, maršrutų, klientų, pavedimų ir kitos informacijos">
		</form>
		<span style="color: #fff;">{{ Auth::user()->name }}</span>
</header>
	<div class="sideNavigation">
    <div id="NavExpandTriggerBox">
      <h5 href="#" id="NavExpandTrigger" class="ExpandableItem">
        MMB Seaport Developers
      </h5>
    </div>
		<div class="items">
			<a href="{{ route('home') }}" class=" @if (Route::currentRouteName() == "home") active @endif ">
				<span class="icon" data-feather="home"></span> <span class="ExpandableItem">Dokumentacija</span>
			</a>
      <a href="{{ route('drivers.index') }}" class=" @if (Route::currentRouteName() == "drivers.index") active @endif ">
        <span class="icon" data-feather="users"></span> <span class="ExpandableItem">Vairuotojai</span>
      </a>
      <a href="{{ route('routes.index') }}" class=" @if (Route::currentRouteName() == "routes.index") active @endif ">
        <span class="icon" data-feather="map"></span> <span class="ExpandableItem">Maršrutai</span>
      </a>
			<a href="{{ route('repairs.index') }}" class=" @if (Route::currentRouteName() == "repairs.index") active @endif ">
				<span class="icon" data-feather="activity"></span> <span class="ExpandableItem">Gedimai</span>
			</a>
			<a href="{{ route('insurance.index') }}">
				<span class="icon" data-feather="briefcase"></span> <span class="ExpandableItem">Draudimas</span>
			</a>
			<a href="{{ route('transport.index') }}" class=" @if (Route::currentRouteName() == "transport.index") active @endif ">
				<span class="icon" data-feather="truck"></span> <span class="ExpandableItem">Transportas</span>
			</a>
		</div>
	</div>
        <main class="content">
            @yield('content')
        </main>
</body>

 <script>
// Initialize and add the map
// function initMap() {
//   // The location of Uluru
//   var uluru = {lat: -25.344, lng: 131.036};
//   // The map, centered at Uluru
//   var map = new google.maps.Map(
//       document.getElementById('routeChooseMap'), {zoom: 4, center: uluru});
//   // The marker, positioned at Uluru
//   var marker = new google.maps.Marker({position: uluru, map: map});
// }
    </script>
    <!--Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The key parameter will contain your own API key (which is not needed for this tutorial)
    * The callback parameter executes the initMap() function
    -->
    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASn0Aq5_3lrH-dDZCWZjObFbkNnaoIi_M&callback=RouteConfiguratorApp.createMap">
    </script>

<script type="text/javascript">
@if($errors->any())
      showErrorAlert();
@elseif (Session::has('suc') && Session::get('suc') == "1")
      showSuccess();
@endif
</script>

</html>
