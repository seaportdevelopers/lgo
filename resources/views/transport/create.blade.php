@section("create")
<div class="modal modal-form fade" id="AddTransport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-form" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title title" id="exampleModalLabel">Nauja transporto priemonė</h5>
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
                           <label for="exampleInput1">Transporto priemonės tipas</label>
                           <select style="width: 100%;" class="form-control" name="category">
                              <option value="1">Vilkikas</option>
                              <option value="2">Puspriekabė (šaldytuvas)</option>
                              <option value="3">Puspriekabė (tentinė)</option>
                              <option value="4">Puspirekabė (kita)</option>
                           </select>
                        </div>
                        <div class="col">
                           <label for="exampleInput1">Transp. priem. valstybinis numeris</label>
                           <input id="exampleInput1" placeholder="XXX123" name="idno" class="form-control">
                        </div>
                     </div>
                     <div class="row mb-3">
                        <div class="col">
                           <label for="exampleInput1">Gamintojas</label>
                           <select style="width: 100%;" class="form-control" name="manufacturer">
                              <option>Sample</option>
                           </select>
                        </div>
                        <div class="col">
                           <label for="exampleInput1">Modelis</label>
                           <input id="exampleInput1" placeholder="" name="model" class="form-control">
                        </div>
                        <div class="col">
                           <label for="exampleInput1">Gamybos metai</label>
                           <input id="exampleInput1" placeholder="XXXX" name="rlYear" class="form-control">
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
