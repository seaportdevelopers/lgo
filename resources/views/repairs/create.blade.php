@section("create")
<div class="modal modal-form fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-form" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title title" id="exampleModalLabel">Naujo gedimo registracijos forma</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form action="" method="post">
           {{csrf_field()}}
            <div class="container">
               <div class="row">
                  <div class="col">
                     <div class="row mb-3">
                           <div class="col">
                              <label for="exampleFormControlSelect1">Atsakingas asmuo</label>
                              <select style="width: 100%;" class="form-control" name="responsible" id="exampleFormControlSelect1">
                                 @foreach ($users as $user)
                                   <option value={{$user->id}}>{{$user->name}} {{$user->surname}}</option>
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
                                <option value={{$user->id}}>{{$user->name}} {{$user->surname}}</option>
                              @endforeach
                           </select>
                        </div>
                      </div>
                      <div class="row mb-3">

                        <div class="col">
                           <label for="exampleFormControlSelect1">Transp. priemonė</label>
                           <select style="width: 100%;" name="idno" class="form-control" id="exampleFormControlSelect1">
                             @foreach ($trucks as $truck)
                                <option value={{$truck->idno}}>{{ $truck->idno }}</option>
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
                              <input type="date" id="exampleInput1" placeholder="XXXX-XX-XX" name="repDate" class="form-control">
                           </div>
                           <div class="col">
                              <label for="exampleInput1">Remonto pabaigos data</label>
                              <input type="date" id="exampleInput1" placeholder="XXXX-XX-XX" name="repDateFinished" class="form-control">
                           </div>
                     </div>
                     <div class="row mb-3">
                        <div class="col">
                           <label for="exampleFormControlSelect1">Remonto vieta</label>
                           <select style="width: 100%;" name="repComp" class="form-control" id="exampleFormControlSelect1">
                             @foreach($providers as $provider)
                               <option>{{$provider->name}}</option>
                             @endforeach
                           </select>
                        </div>
                     </div>
                     <div class="row mb-3">
                       <div class="col">
                         <label for="price">Kaina, &euro;</label>
                         <input id="price" name="price" type="text" class="form-control form-control-classic mb-4 mr-3" placeholder="Kaina">
                      </div>
                     </div>
                     <div class="form-group mt-3" style="width: 100%;">
                        <label for="exampleFormControlSelect1">Gedimo aprašymas</label>
                        <textarea style="width: 100%;" name="desc" class="form-control" placeholder="Aprašymas"></textarea>
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
      </div>
    </div>
  </div>
</div>
@endsection
