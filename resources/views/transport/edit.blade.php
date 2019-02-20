@extends('layouts.navigation', ['ViewHeaderTitle' => $truck->idno, 'ViewHeaderSubtitle' => $truck->model, 'viewName' => 'transport.edit'])

@section('content')
   <div class="card card-form">
      <div class="card-header">
         <h2 class="container">Pagrindiniai duomenys</h2>
      </div>
      <form action="./" method="post">
       {{csrf_field()}}
       <input type="hidden" name="_method" value="put">
        <div class="card-body">
           <div class="container">
                 <div class="row mb-3">
                    <div class="col">
                       <div>
                          <label class="inputLabel" for="exampleInput1">Transporto priemonės tipas</label>
                          <select style="width: 100%;" class="form-control" name="category">
                             <option value="1" @if($truck->category == 1) selected="selected" @endif>Vilkikas</option>
                             <option value="2" @if($truck->category == 2) selected="selected" @endif>Puspriekabė (šaldytuvas)</option>
                             <option value="3" @if($truck->category == 3) selected="selected" @endif>Puspriekabė (tentinė)</option>
                             <option value="4" @if($truck->category == 4) selected="selected" @endif>Puspirekabė (kita)</option>
                          </select>
                       </div>
                       <div class="mt-4">
                          <label class="inputLabel" for="exampleInput1">Transp. priem. valstybinis numeris</label>
                          <input id="exampleInput1" placeholder="XXX123" name="idno" value={{$truck->idno}} class="form-control">
                       </div>
                    </div>
                    <div class="col">
                       <div class="mt-0">
                         <label class="inputLabel" for="exampleInput1">Gamintojas</label>
                         <select style="width: 100%;" class="form-control" name="manufacturer">
                            <option>Sample</option>
                         </select>
                       </div>
                       <div class="mt-4">
                          <label class="inputLabel" for="exampleInput1">Identifikavimo numeris (VIN)</label>
                          <input id="exampleInput1" placeholder="XXX123" name="VIN" value="12345678910874238" class="form-control form-control-error">
                       </div>
                    </div>
                    <div class="col">
                       <div class="mt-0">
                          <label class="inputLabel" for="exampleInput1">Modelis</label>
                          <input id="exampleInput1" placeholder="" name="model" value={{$truck->model}} class="form-control">
                       </div>
                       <div class="mt-4">
                          <label class="inputLabel" for="exampleInput1">Tech. apžiūros pabaigos data</label>
                          <input type="date" id="exampleInput1" placeholder="" name="VIN" value="" class="form-control form-control-error">
                       </div>
                    </div>
                    <div class="col">
                       <div class="mt-0">
                          <label class="inputLabel" for="exampleInput1">Gamybos metai</label>
                          <input id="exampleInput1" placeholder="XXXX" name="rlYear" value={{$truck->rlYear}} class="form-control">
                       </div>
                       <div class="mt-4">
                          <label class="inputLabel" for="exampleInput1">Serfitikato tipas</label>
                          <select style="width: 100%;" class="form-control form-control-error" name="certificate">
                            <option value="none">Nėra</option>
                            <option value="ATP">ATP</option>
                            <option value="FRC">FRC</option>
                          </select>
                       </div>
                       <div class="mt-4">
                          <label class="inputLabel" for="exampleInput1">Serfitikato galiojimo pabaiga</label>
                          <input type="date" id="exampleInput1" placeholder="" name="certificateEndDate" value="" class="form-control form-control-error">
                       </div>
                    </div>
                 </div>
                 <div class="actionButtons">
                    <input type="submit" class="btn btn-primary" value="Išsaugoti" />
                    <form action="./" maethod="post">
                      {{csrf_field()}}
                      <input type="hidden" name="_method" value="delete">
                      <input class="btn btn-danger" type="submit" value="Ištrinti">
                    </form>
                    <a href="/transport"><button type="button" class="btn btn-muted" >Uždaryti</button></a>
                 </div>
              </div>
        </div>
    </form>
   </div>
   <div class="row">
     <div class="mt-5 card card-form">
        <div class="card-header">
           <h2 class="container">Draudimo
            duomenys</h2>
        </div>
        <form action="./" method="post">
         {{csrf_field()}}
         <input type="hidden" name="_method" value="put">
          <div class="card-body">
             <div class="container">
                   <div class="row mb-3">
                      <div class="col">
                         <div class="mt-0">
                            <label class="inputLabel" for="exampleInput1">Draudimo kompanijos pavadinimas</label>
                            <input id="exampleInput1" placeholder="----" name="insuranceName" value="Gjensidige" class="form-control form-control-error">
                         </div>
                      </div>
                      <div class="col">
                         <div class="mt-0">
                            <label class="inputLabel" for="exampleInput1">Draudimo liudijimo Nr.</label>
                            <input id="exampleInput1" placeholder="0000" name="insuranceSerial" value="00000000" class="form-control form-control-error">
                         </div>
                      </div>
                      <div class="col">
                         <div class="mt-0">
                            <label class="inputLabel" for="exampleInput1">Žaliosios kortelės Nr.</label>
                            <input id="exampleInput1" placeholder="0000" name="insuranceGreenCardSerial" value="00000000" class="form-control form-control-error">
                         </div>
                      </div>
                      <div class="col">
                         <div class="mt-0">
                            <label class="inputLabel" for="exampleInput1">Galioja nuo</label>
                            <input type="date" id="exampleInput1" placeholder="0000" name="insuranceStart" value="" class="form-control form-control-error">
                         </div>
                         <div class="mt-4">
                            <label class="inputLabel" for="exampleInput1">Galioja iki</label>
                            <input type="date" id="exampleInput1" placeholder="0000" name="insuranceEnd" value="" class="form-control form-control-error">
                         </div>
                      </div>
                    </div>
                   <div class="actionButtons">
                      <input type="submit" class="btn btn-primary" value="Išsaugoti" />
                   </div>
                </div>
          </div>
      </form>
     </div>

    </div>
@endsection
