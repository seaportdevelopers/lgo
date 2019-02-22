@extends('layouts.navigation', ['ViewHeaderTitle' => 'Gedimas '.$truck->idno, 'ViewHeaderSubtitle' => '#'.$repair->id, 'viewName' => 'repairs.edit'])
@section("content")

   <div class="card card-form">
      <div class="card-header">
         <h2 class="container">Gedimo duomenys</h2>
      </div>
      <form action="./" method="post">
       {{csrf_field()}}
       <input type="hidden" name="_method" value="put">
        <div class="card-body">
           <div class="container">
                 <div class="row mb-3">
                    <div class="col">
                       <div>
                          <label class="inputLabel" for="exampleInput1">Atsakingas asmuo</label>
                          <select style="width: 100%;" class="form-control" name="responsible" id="exampleFormControlSelect1">
                            @foreach ($users as $user)
                              <option value={{$user->id}} @if($user->id == $repair->responsible->id) selected="selected"@endif>{{$user->name}} {{$user->surname}}</option>
                            @endforeach
                         </select>

                       </div>
                       <div class="mt-4">
                          <label class="inputLabel" for="exampleInput1">Remonto vieta</label>
                          <select style="width: 100%;" name="repComp" class="form-control" id="exampleFormControlSelect1">
                            <option value="Sample">Sample</option>
                         </select>
                       </div>
                    </div>
                    <div class="col">
                       <div class="mt-0">
                         <label class="inputLabel" for="exampleInput1">Pranešėjas</label>
                         <select style="width: 100%;" class="form-control" name="informer" id="exampleFormControlSelect1">
                            @foreach ($users as $user)
                              <option value={{$user->id}} @if($user->id == $repair->informer->id) selected="selected"@endif>{{$user->name}} {{$user->surname}}</option>
                            @endforeach
                         </select>
                       </div>
                       <div class="mt-4">
                          <label class="inputLabel" for="exampleInput1">Remonto kaina</label>
                          <input id="price" name="price" type="text" class="form-control mb-4 mr-3" placeholder="Kaina" value={{$repair->repairsPrice}}>
                       </div>
                    </div>
                    <div class="col">
                       <div class="mt-0">
                          <label class="inputLabel" for="exampleInput1">Transp. priemonė</label>
                          <select style="width: 100%;" name="idno" class="form-control" id="exampleFormControlSelect1">
                           @foreach ($trucks as $truck)
                              <option value={{$truck->idno}} @if($truck->idno == $repair->idno) selected="selected"@endif>{{ $truck->idno }}</option>
                           @endforeach
                         </select>
                       </div>
                       <div class="mt-4">
                          <label class="inputLabel" for="exampleInput1">Busena</label>
                          <input id="status" name="status" type="text" value="Pranešta" class="form-control mb-4 mr-3" placeholder="Kategorija">
                       </div>
                    </div>
                    <div class="col">
                       <div class="mt-4">
                          <label class="inputLabel" for="exampleInput1">Remonto pradzia</label>
                          <input type="date" id="exampleInput1" placeholder="XXXX-XX-XX" name="repDate" class="form-control" value={{$repair->repairDate}}>
                       </div>
                       <div class="mt-4">
                           <label class="inputLabel" for="exampleInput1">Remonto pabaigos data</label>
                           <input type="date" id="exampleInput1" placeholder="XXXX-XX-XX" name="repDateFinished" class="form-control" value={{$repair->repairDateEnd}}>
                       </div>
                    </div>
                      <div class="mt-3" style="width: 100%;">
                         <label for="exampleFormControlSelect1">Gedimo aprašymas</label>
                         <textarea style="width: 100%;" name="desc" placeholder="Aprašymas">{{$repair->description}}</textarea>
                         <small class="ml-3">Detalus gedimo aprašymas. Jame turįtų būti paminėti šie dalykai:</small>
                    </div>
                 </div>
                 <div class="actionButtons">
                    <input type="submit" class="btn btn-primary" value="Išsaugoti" />
                  </form>
                    <form action="./" method="post">
                      {{csrf_field()}}
                      <input type="hidden" name="_method" value="delete">
                      <input class="btn btn-danger" type="submit" value="Ištrinti">
                    </form>
                    <a href="/repairs"><button type="button" class="btn btn-muted" >Uždaryti</button></a>
                  </div>
               </div>
         </div>
   </div>
@endsection
