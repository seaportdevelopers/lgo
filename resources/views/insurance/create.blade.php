@section("create")
<div class="modal modal-form fade" id="newInsurance" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-form" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title title" id="exampleModalLabel">Nauja draudimo sutartis</h5>
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
                     </div>
                     <div class="row mb-3">
                        <div class="col">
                           <label for="exampleInput1">Draudimo kompanijos pavadinimas</label>
                           <input id="exampleInput1" placeholder="UAB Draudimas" name="name" class="form-control">
                        </div>
                        <div class="col">
                           <label for="exampleInput1">Draudimo liudijimo numeris</label>
                           <input id="exampleInput1" placeholder="000000000000000" name="serial" class="form-control">
                        </div>
                        <div class="col">
                           <label for="exampleInput1">Žaliosios kortlelės numeris</label>
                           <input id="exampleInput1" placeholder="000000000000000" name="greenSerial" class="form-control">
                        </div>
                        <div class="col">
                           <label for="exampleInput1">Galioja nuo</label>
                           <input type="date" id="exampleInput1" placeholder="2000-01-01" name="dateFrom" class="form-control">
                        </div>
                        <div class="col">
                           <label for="exampleInput1">Galioja iki</label>
                           <input id="exampleInput1" placeholder="2000-01-01" name="dateTo" class="form-control">
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
