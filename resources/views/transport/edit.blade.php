@extends('layouts.navigation')
@section('content')
  <form action="./" method="post">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="put">
     <div class="container">
        <div class="row">
           <div class="col">
              <div class="row mb-3">
                 <div class="col">
                    <label for="exampleInput1">Transporto priemonės tipas</label>
                    <select style="width: 100%;" class="form-control" name="category">
                       <option value="1" @if($truck->category == 1) selected="selected" @endif>Vilkikas</option>
                       <option value="2" @if($truck->category == 2) selected="selected" @endif>Puspriekabė (šaldytuvas)</option>
                       <option value="3" @if($truck->category == 3) selected="selected" @endif>Puspriekabė (tentinė)</option>
                       <option value="4" @if($truck->category == 4) selected="selected" @endif>Puspirekabė (kita)</option>
                    </select>
                 </div>
                 <div class="col">
                    <label for="exampleInput1">Transp. priem. valstybinis numeris</label>
                    <input id="exampleInput1" placeholder="XXX123" name="idno" value={{$truck->idno}} class="form-control">
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
                    <input id="exampleInput1" placeholder="" name="model" value={{$truck->model}} class="form-control">
                 </div>
                 <div class="col">
                    <label for="exampleInput1">Gamybos metai</label>
                    <input id="exampleInput1" placeholder="XXXX" name="rlYear" value={{$truck->rlYear}} class="form-control">
                 </div>
              </div>
           </div>
        </div>
     </div>
     <div class="modal-footer">
       <form action="./" maethod="post">
         {{csrf_field()}}
         <input type="hidden" name="_method" value="delete">
         <input class="btn btn-danger btn-small" type="submit" value="Ištrinti">
       </form>
       <a href="/transport"><button type="button" class="btn btn-muted btn-small" >Uždaryti</button></a>
       <input type="submit" class="btn btn-primary btn-small" value="Išsaugoti" />
     </div>
  </form>
@endsection
