@section("create")
<div class="modal modal-form fade" id="newDriver" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-form" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title title" id="exampleModalLabel">Pridėti naują vairuotoją</h5>
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
                           <label for="Fname">Vardas</label>
                           <input id="Fname" placeholder="XXX123" name="Fname" class="form-control">
                        </div>
                     </div>
                     <div class="row mb-3">
                        <div class="col">
                           <label for="Lname">Pavardė</label>
                           <input id="Lname" placeholder="Pavardenis" name="Lname" class="form-control">
                        </div>
                        <div class="col">
                           <label for="birthDate">Gimimo data</label>
                           <input type="date" id="birthDate" name="birthDate" class="form-control">
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
