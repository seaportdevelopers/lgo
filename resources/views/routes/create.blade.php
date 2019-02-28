@section("create")
<div class="modal modal-form fade" id="newRoute" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-form" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title title" id="exampleModalLabel">Naujas maršrutas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form action="{{action('InsuranceController@create')}}" method="post">
           {{csrf_field()}}
            <div class="container">
               <div class="row">
                  <div class="col">
                     <div class="row mb-3">
                        <div class="col">
                           <label for="exampleInput1">Transp. priem. valstybinis numeris</label>
                           <input id="exampleInput1" placeholder="XXX123" name="idnoid" class="form-control">
                        </div>
                         <div class="col">
                           <label for="exampleInput1">Tipas</label>
                          <select name="TYPE" class="form-control">
                            <option selected value="0">Paprastas krovinys</option>
                          </select>
                        </div>
                         <div class="col">
                           <label for="exampleInput1">Puspriekabė</label>
                           <input id="exampleInput1" placeholder="XX123" name="CARGO" class="form-control">
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
                           <input type="text" id="exampleInput1" placeholder="Vardenis Pavardenis" name="DRIVER" class="form-control form-control-warning">
                        </div>
                        <div class="col">
                           <label for="exampleInput1">Vilkikas</label>
                           <input id="exampleInput1" placeholder="XXX123" name="TRUCK" class="form-control">
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
</div>
@endsection
