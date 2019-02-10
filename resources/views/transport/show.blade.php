@extends('layouts.navigation')
@section('content')
<h1 class="mt-6 title">Transportas</h1>
<button class="btn btn-small btn-primary mb-4" data-toggle="modal" data-target="#AddTransport">Pridėti transportą</button>
<h5 class="sub-info mb-3 mt-2">Visa informacija</h5>
<div class="card big">
    <div class="card-header">
        <h2>
            Transportas
        </h2>

    </div>
    <div class="card-body">
        <table class="table table-hover table-borderless">
            <thead>
                <tr>
                    <th>Pasirinkti</th>
                    <th>Valstybinis numeris</th>
                    <th>Gamintojas ir modelis</th>
                    <th>Būsena</th>
                    <th>Veiksmai</th>
                </tr>
            </thead>
            <tbody>
               @foreach($trucks as $truck)
                <tr>
                    <td>
                       <label class="control control--checkbox">
                          <input type="checkbox"/>
                          <div class="control__indicator"></div>
                       </label>
                    </td>
                    <td>{{$truck->idno}}</td>
                    <td>{{$truck->manufacturer}} {{$truck->model}}</td>
                    <td>
                       @if($truck->status == 0)
                       <label class="bg-label bg-label-success">Stovi parke</label>
                       @elseif($truck->status == 1)
                       <label class="bg-label bg-label-primary">Kelyje</label>
                       @elseif($truck->status == 2)
                       <label class="bg-label bg-label-warning">Vyksta išsikrovimas</label>
                       @else
                       <label class="bg-label bg-label-danger">Gedimas</label>
                       @endif
                    </td>
                    <td>
                       <button class="btn btn-small btn-primary">Redaguoti</button>
                    </td>
                </tr>
               @endforeach
            </tbody>
        </table>
    </div>
</div>

<h5 class="sub-info mb-3 mt-4">Pagal būseną</h5>
<div class="row">
   @foreach($trucks as $truck)
   <div class="card" style="
   @if($truck->status == 0)
   @elseif($truck->status == 1)
   background-color: #FCA311;
   color: #fff;
   @elseif($truck->status == 2)
   background-color: #2dce89;
   color: #fff;
   @else
   background-color: #e3342f;
   color: #fff;
   @endif
   width: 20%;
   ">
      <div class="card-header">
          <h2>
              {{$truck->idno}}
          </h2>
          <h5 class="sub-info">
             {{ $truck->manufacturer }}  {{ $truck->model }}
          </h5>
       </div>
       <div class="card-body" style="text-align: center;">
          @if($truck->status == 0)
          kelyje
          @elseif($truck->status == 1)
          iškraunama
         @elseif($truck->status == 2)
          stovi parke
         @else
            gedimas
         @endif
       </div>
   </div>
   @endforeach
</div>


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
            <div class="container">
               <div class="row">
                  <div class="col">
                     <div class="row mb-3">
                        <div class="col">
                           <label for="exampleInput1">Transporto priemonės tipas</label>
                           <select style="width: 100%;" class="form-control" id="">
                              <option>Vilkikas</option>
                              <option>Puspriekabė (šaldytuvas)</option>
                              <option>Puspriekabė (tentinė)</option>
                              <option>Puspirekabė (kita)</option>
                           </select>
                        </div>
                        <div class="col">
                           <label for="exampleInput1">Transp. priem. valstybinis numeris</label>
                           <input id="exampleInput1" placeholder="XXX123" name="" class="form-control">
                        </div>
                     </div>
                     <div class="row mb-3">
                        <div class="col">
                           <label for="exampleInput1">Gamintojas</label>
                           <select style="width: 100%;" class="form-control" id="">
                              <option>Vilkikas</option>
                              <option>Puspriekabė (šaldytuvas)</option>
                              <option>Puspriekabė (tentinė)</option>
                              <option>Puspirekabė (kita)</option>
                           </select>
                        </div>
                        <div class="col">
                           <label for="exampleInput1">Modelis</label>
                           <input id="exampleInput1" placeholder="" name="" class="form-control">
                        </div>
                        <div class="col">
                           <label for="exampleInput1">Gamybos metai</label>
                           <input id="exampleInput1" placeholder="XXXX" name="" class="form-control">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-muted btn-small" data-dismiss="modal">Uždaryti</button>
        <button type="button" class="btn btn-primary btn-small">Išsaugoti</button>
      </div>
    </div>
  </div>
</div>
@endsection
