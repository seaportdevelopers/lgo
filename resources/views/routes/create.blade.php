@extends('layouts.navigation', ['ViewHeaderTitle' => 'Naujas maršrutas', 'ViewHeaderSubtitle' => '', 'viewName' => 'routes.create'])
@section('content')
<div id="RouteConfiguratorApp">
  <div class="row centeredH"> {{-- START OF row class --}}
    <div class="card info"> {{-- START OF card A class --}}
      <div class="card-header">
        <h2>Pradinis taskas</h2>
      </div>
      <div class="card-body">
        <h2 v-text="P_A_confirmed"></h2>
        <h3 v-text="POINT_A_coords"></h3>
      </div>
    </div> {{-- END OF card A class --}}

    <div class="card info"> {{-- START OF card B class --}}
      <div class="card-header">
        <h2>Galutinis tikslas</h2>
      </div>
      <div class="card-body">
        <h2 v-text="P_B_confirmed"></h2>
        <h3 v-text="POINT_B_coords"></h3>
      </div>
    </div> {{-- END OF card B class --}}

     <div class="card info"> {{-- START OF card C class --}}
      <div class="card-header">
        <h2>Vilkikas</h2>
      </div>
      <div class="card-body">
        <h2 v-text="selectedTruck"></h2>
      </div>
    </div> {{-- END OF card C class --}}

     <div class="card info"> {{-- START OF card D class --}}
      <div class="card-header">
        <h2>Puspriekabe</h2>
      </div>
      <div class="card-body">
        <h2 v-text="selectedCargo"></h2>
      </div>
    </div> {{-- END OF card D class --}}

     <div class="card info"> {{-- START OF card D class --}}
      <div class="card-header">
        <h2>Vairuotojas</h2>
      </div>
      <div class="card-body">
        <h2 v-text="selectedDriver"></h2>
      </div>
    </div> {{-- END OF card D class --}}
    <div class="card info"> {{-- START OF card D class --}}
      <div class="card-header">
        <h2>Atstumas</h2>
      </div>
      <div class="card-body">
        <h2 v-text="DisplayDistanceValue"></h2>
      </div>
    </div> {{-- END OF card D class --}}
  </div> {{-- END OF row class --}}
  <div class="card">
    <div class="card-header flex-inline">
      <h2>
          Marsruto informacija
      </h2>
      <form action="{{route('routes.store')}}" method="POST">
        @csrf
        <input type="hidden" name="FROM" v-text="POINT_A_address" v-bind:value="POINT_A_address">
        <input type="hidden" name="TO" v-text="POINT_B_address" v-bind:value="POINT_B_address">
        <input type="hidden" name="CARGO" v-text="selectedCargo" v-bind:value="selectedCargo">
        <input type="hidden" name="TRUCK" v-text="selectedTruck" v-bind:value="selectedTruck">
        <input type="hidden" name="DRIVER" v-text="selectedDriver" v-bind:value="selectedDriver">
        <button type="submit" class="btn btn-small btn-success" :class="btnClassRouteSuccess">
         <span class="Advanced">Uzbaigti sudaryma</span> <span class="icon-white" data-feather="arrow-right"></span>
       </button>
     </form>
    </div>
    <div class="card-body">
        <div class="row">
          <div class="col">
          <label>Pradinio tikslo adresas</label>
          <input type="text" name="FROM" class="form-control form-control-classic" placeholder="Adresas" v-model="POINT_A_address">
          </div>
          <div class="col">
          <label>Galutinio tikslo adresas</label>
          <input type="text" class="form-control form-control-classic" placeholder="Adresas" v-model="POINT_B_address">
          </div>
          <div class="col">
          <label>Vilkikas</label>
          <select class="form-control form-control-classic" name="TRUCK" style="width: 100%;" v-model="selectedTruck">
            @foreach($trucks as $truck)
            <option value="{{$truck->idno}}">{{$truck->idno}}</option>
            @endforeach
          </select>
          <label class="bg-label bg-label-danger mt-2" v-if="selectedTruckError">Sis laukelis yra butinas</label>
          </div>
          <div class="col">
          <label>Puspriekabe</label>
          <select class="form-control form-control-classic" name="CARGO" style="width: 100%;" v-model="selectedCargo">
            @foreach($cargos as $cargo)
            <option value="{{$cargo->idno}}">{{$cargo->idno}}</option>
            @endforeach
          </select>
          <label class="bg-label bg-label-danger mt-2" v-if="selectedCargoError">Sis laukelis yra butinas</label>
          </div>
          <div class="col">
          <label>Vairuotojas</label>
          <select class="form-control form-control-classic" name="DRIVER" style="width: 100%;" v-model="selectedDriver">
            @foreach($drivers as $driver)
              <option value="{{$driver->Fname}} {{$driver->Lname}}">{{$driver->Fname}} {{$driver->Lname}}</option>
            @endforeach
          </select>
          <label class="bg-label bg-label-danger mt-2" v-if="selectedDriverError">Sis laukelis yra butinas</label>
          </div>
        </div>
        {{-- <button class="btn btn-primary mt-3" v-on:click="checkAddress">Patvirtinti</button> --}}
        <div>
        <button class="btn btn-primary mt-3" :class="btnClassRouteCheck" v-on:click="makeRoute" v-text="Route_btn_TEXT"></button>
        <h6 class="text-muted mt-2">Norėdami patvirtinti, mygtuką paspauskite du kartus</h6>
        </div>
        <div id="map" class="mt-4"></div>
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
