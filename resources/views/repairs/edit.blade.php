@extends("layouts.navigation")
@section("content")
  <form action="./" method="post">
    {{csrf_field()}}
    <input type="hidden" value="put" name="_method" />
     <div class="container">
        <div class="row">
           <div class="col">
              <div class="row mb-3">
                    <div class="col">
                       <label for="exampleFormControlSelect1">Atsakingas asmuo</label>
                       <select style="width: 100%;" class="form-control" name="responsible" id="exampleFormControlSelect1">
                          @foreach ($users as $user)
                            <option value={{$user->id}} @if($user->id == $repair->responsible->id) selected="selected"@endif>{{$user->name}} {{$user->surname}}</option>
                          @endforeach
                       </select>
                       <small class="ml-3">Asmuo, kuris atsakingas už nurodytos transp. priemonės gedimo pašalinimą</small>
                    </div>
              </div>
              <div class="row mb-3">
                 <div class="col">
                    <label for="exampleInput1">Pranešėjas</label>
                    <select style="width: 100%;" class="form-control" name="informer" id="exampleFormControlSelect1">
                       @foreach ($users as $user)
                         <option value={{$user->id}} @if($user->id == $repair->informer->id) selected="selected"@endif>{{$user->name}} {{$user->surname}}</option>
                       @endforeach
                    </select>
                 </div>
               </div>
               <div class="row mb-3">

                 <div class="col">
                    <label for="exampleFormControlSelect1">Transp. priemonė</label>
                    <select style="width: 100%;" name="idno" class="form-control" id="exampleFormControlSelect1">
                      @foreach ($trucks as $truck)
                         <option value={{$truck->idno}} @if($truck->idno == $repair->idno) selected="selected"@endif>{{ $truck->idno }}</option>
                      @endforeach
                    </select>
              </div>
                <div class="col">
                  <label for="status">Būsena</label>
                  <input id="status" name="status" type="text" value="Pranešta" class="form-control form-control-classic mb-4 mr-3" placeholder="Kategorija">
               </div>
              </div>
              <div class="row mb-3">
                    <div class="col">
                       <label for="exampleInput1">Num. remonto data</label>
                       <input type="date" id="exampleInput1" placeholder="XXXX-XX-XX" name="repDate" class="form-control" value={{$repair->repairDate}}>
                    </div>
                    <div class="col">
                       <label for="exampleInput1">Remonto pabaigos data</label>
                       <input type="date" id="exampleInput1" placeholder="XXXX-XX-XX" name="repDateFinished" class="form-control" value={{$repair->repairDateEnd}}>
                    </div>
              </div>
              <div class="row mb-3">
                 <div class="col">
                    <label for="exampleFormControlSelect1">Remonto vieta</label>
                    <select style="width: 100%;" name="repComp" class="form-control" id="exampleFormControlSelect1">
                       <option value="Sample">Sample</option>
                    </select>
                 </div>
              </div>
              <div class="row mb-3">
                <div class="col">
                  <label for="price">Kaina</label>
                  <input id="price" name="price" type="text" class="form-control form-control-classic mb-4 mr-3" placeholder="Kaina" value={{$repair->repairsPrice}}>
               </div>
              </div>
              <div class="form-group mt-3" style="width: 100%;">
                 <label for="exampleFormControlSelect1">Gedimo aprašymas</label>
                 <textarea style="width: 100%;" name="desc" class="form-control" placeholder="Aprašymas">{{$repair->description}}</textarea>
                 <small class="ml-3">Detalus gedimo aprašymas. Jame turįtų būti paminėti šie dalykai:</small>
              </div>
           </div>
        </div>
     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-muted btn-small" data-dismiss="modal">Uždaryti</button>
       <button type="submit" class="btn btn-primary btn-small">Išsaugoti</button>
     </div>
  </form>
@endsection
