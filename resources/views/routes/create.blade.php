@extends('layouts.navigation', ['ViewHeaderTitle' => 'Naujas maršrutas', 'ViewHeaderSubtitle' => '', 'viewName' => 'routes.create'])
@section('content')
<div id="RouteConfiguratorApp">
  <div class="card">
    <div class="card-header flex-inline">
      <h2>
              <b>Pirmas žingsnis:</b> pasirinkite maršruto pradinį {{-- ir galutinį --}} tikslą
      </h2>
     <button class="btn btn-small btn-success" :class="btnClassRouteSuccess">
       <span class="Advanced">Sekantis</span> <span class="icon-white" data-feather="arrow-right"></span>
     </button>
    </div>
    <div class="card-body">
      <div class="container">
        <div class="row">
          <div class="col">
          <label>Pradinio tikslo adresas</label>
          <input type="text" class="form-control form-control-classic" placeholder="Adresas" v-model="POINT_A_address">
          </div>
          <div class="col">
          <label>Galutinio tikslo adresas</label>
          <input type="text" class="form-control form-control-classic" placeholder="Adresas" v-model="POINT_B_address">
          </div>
        </div>
        {{-- <button class="btn btn-primary mt-3" v-on:click="checkAddress">Patvirtinti</button> --}}
        <div>
        <button class="btn mt-3" :class="btnClassRouteCheck" v-on:click="makeRoute" v-text="Route_btn_TEXT"></button>
        <h6 class="text-muted mt-2">Norėdami patvirtinti, mygtuką paspauskite du kartus</h6>
        </div>
        <hr>
        <h3>Apytikslis atstumas: <b v-text="DisplayDistanceValue"></b> <b>kilometrai</b>
        <div>
          <div class="mt-2" v-for="point in POINTS"> <h5 v-text="point"></h5> </div>
        </div>
        <div id="map" class="mt-4"></div>
      </div>

    </div>
  </div>

   <div class="card mt-5">
      <div class="card-header flex-inline">
        <h2>
                <b>Antras žingsnis:</b> pasirinkite krovinio tipą, vilkiką bei puspriekabę
        </h2>
       <button class="btn btn-small btn-success" :class="btnClassRouteSuccess">
         <span class="Advanced">Sekantis</span> <span class="icon-white" data-feather="arrow-right"></span>
       </button>
      </div>
      <div class="card-body">
        <div class="container">
          <div class="row">
            <div class="col">
            <label>Krovinio tipas</label>
            {{-- <input type="text" class="form-control form-control-classic" placeholder="Adresas" v-model="POINT_A_address"> --}}
            <select class="form-control" v-model="selectedType">
              <option value="0">Paprastas krovinys</option>
              <option value="0">Mėsa</option>
              <option value="0">Maisto produktai</option>
            </select>
            </div>
            <div class="col">
              <label>Pasirinkite vilkiką</label>
              <select class="form-control" name="TRUCK" v-model="selectedTruck">
                @foreach($trucks as $truck)
                <option value="{{$truck->id}}">{{$truck->idno}}</option>
                @endforeach
              </select>
            </div>
            <div class="col">
              <label>Pasirinkite puspriekabę</label>
              <select class="form-control" name="TRUCK" v-model="selectedCargo">
                @foreach($cargos as $cargo)
                <option value="{{$cargo->id}}">{{$cargo->idno}}</option>
                @endforeach
              </select>
            </div>
          </div>
          {{-- <button class="btn btn-primary mt-3" v-on:click="checkAddress">Patvirtinti</button> --}}
          <div>
          <button class="btn mt-3" :class="btnClassRouteCheck" v-on:click="makeTransportChoice">Patvirtinti pasirinkima</button>
          <h6 class="text-muted mt-2">Norėdami patvirtinti, mygtuką paspauskite du kartus</h6>
          </div>
          <hr>
          <h4>Krovinio tipas: <b v-text="selectedType"></b></h4>
          <h4>Vilkikas: <b v-text="selectedTruck"></b></h4>
          <h4>Puspriekabe: <b v-text="selectedCargo"></b></h4>
       </div>

      </div>
  </div>
</div>



{{-- OLD CREATE MODAL IS COMMENTED HERE
 --}}{{-- <div class="modal modal-form fade" id="newRoute" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-form" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title title" id="exampleModalLabel">Naujas maršrutas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form action="{{action('RoutesController@store')}}" method="post">
           {{csrf_field()}}
            <div class="container">
               <div class="row">
                  <div class="col">
                     <div class="row mb-3">
                         <div class="col">
                           <label for="exampleInput1">Tipas</label>
                          <select name="TYPE" class="form-control">
                            <option selected value="0">Paprastas krovinys</option>
                          </select>
                        </div>
                         <div class="col">
                           <label for="exampleInput1">Puspriekabė</label>
                           <select name="CARGO" class="form-control">
                            @foreach($cargos as $cargo)
                            <option value="{{$cargo->id}}">{{$cargo->idno}}</option>
                            @endforeach
                           </select>
                        </div>
                     </div>
                     <div class="row mb-3">
                        <div class="col">
                           <label for="exampleInput1">Vežama iš</label>
                           <input id="exampleInput1" placeholder="Kalvarijų g., Vilnius, Lietuva" name="FROM" class="form-control">
                        </div>
                        <div class="col">
                           <label for="exampleInput1">Vežama į</label>
                           <input id="exampleInput1" placeholder="Kalvarijų g., Vilnius, Lietuva" name="TO" class="form-control">
                        </div>
                        <div class="col">
                           <label for="exampleInput1">Klientas</label>
                           <input id="exampleInput1" placeholder="UAB, SALUNE" name="CLIENT" class="form-control">
                        </div>
                        <div class="col">
                           <label for="exampleInput1">Vairuotojas</label>
                           <select name="DRIVER" class="form-control">
                            @foreach($drivers as $driver)
                            <option value="{{$driver->id}}">{{$driver->Fname}} {{$driver->Lname}}</option>
                            @endforeach
                           </select>
                        </div>
                        <div class="col">
                           <label for="exampleInput1">Vilkikas</label>
                           <select name="TRUCK" class="form-control">
                             @foreach($trucks as $truck)
                              <option value="{{$truck->id}}">{{$truck->idno}}</option>
                             @endforeach
                          </select>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-muted btn-small" data-dismiss="modal">Uždaryti</button>
              <input type="submit" class="btn btn-primary btn-small" value="Išsaugoti" />
            </div>
         </form>
      </div>
    </div>
  </div>
</div> --}}

@endsection