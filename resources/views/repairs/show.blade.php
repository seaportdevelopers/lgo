@extends('layouts.navigation')
@section('content')
<div class="mt-6 mb-5">
<h1 class="title">Gedimai ir remontai</h1>
<button class="btn btn-small btn-primary" data-toggle="modal" data-target="#newFailure">Pranešti apie gedimą</button>
</div>
<div class="card big">
    <div class="card-header">
        <h2>
            Užfiksuoti gedimai
        </h2>
    </div>
    <div class="card-body">
        <table class="table table-hover table-borderless">
            <thead>
                <tr>
                    <th>Transp. priem. valst. numeris</th>
                    <th>Aprašymas</th>
                    <th>Remonto vieta</th>
                    <th>Remonto data</th>
                    <th>Remonto pabaigos data</th>
                    <th>Kaina</th>
                    <th>Būsena</th>
                    <th>Veiksmai</th>
                </tr>
            </thead>
            <tbody>
               @foreach($repairs as $repair)
                <tr>
                    <td>{{$repair->idno}}</td>
                    <td>
                      {{$repair->description}}
                    </td>
                    <td>{{$repair->repairCompany}}</td>
                    <td>{{$repair->repairDate}}</td>
                    <td>{{$repair->repairDateEnd}}</td>
                  <td>{{$repair->repairsPrice}}</td>
                  <td>

                       <label class="bg-label bg-label-main">Pranešta</label>
                  </td>
                  <td>
                       <button class="btn btn-small btn-primary">Redaguoti</button></td>
<td>
                      <a href="repairs/{{$repair->idno}}/edit"> <button class="btn btn-small btn-primary">Redaguoti</button></a>
                  </td>
                </tr>
               @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal modal-form fade" id="newFailure" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <div class="container">
               <div class="row">
                  <div class="col">
                     <div class="row mb-3">
                           <div class="col">
                              <label for="exampleFormControlSelect1">Atsakingas asmuo</label>
                              <select style="width: 100%;" class="form-control" id="exampleFormControlSelect1">
                                 <option>Vardenis Pavardenis</option>
                                 <option>Vardenis Pavardenis</option>
                                 <option>Vardenis Pavardenis</option>
                                 <option>Vardenis Pavardenis</option>
                                 <option>Vardenis Pavardenis</option>
                                 <option>Vardenis Pavardenis</option>
                                 <option>Vardenis Pavardenis</option>
                                 <option>Vardenis Pavardenis</option>
                                 <option>Vardenis Pavardenis</option>
                                 <option>Vardenis Pavardenis</option>
                              </select>
                              <small class="ml-3">Asmuo, kuris atsakingas už nurodytos transp. priemonės gedimo pašalinimą</small>
                           </div>
                     </div>
                     <div class="row mb-3">
                        <div class="col">
                           <label for="exampleInput1">Pranešėjas</label>
                           <input id="exampleInput1" placeholder="Vardas" name="" class="form-control">
                        </div>
                        <div class="col">
                           <label for="exampleFormControlSelect1">Transp. priemonė</label>
                           <select style="width: 100%;" class="form-control" id="exampleFormControlSelect1">
                              <option>ABC123</option>
                              <option>ABC123</option>
                              <option>ABC123</option>
                              <option>ABC123</option>
                              <option>ABC123</option>
                              <option>ABC123</option>
                              <option>ABC123</option>
                           </select>
                        </div>
                     </div>
                     <div class="row mb-3">
                           <div class="col">
                              <label for="exampleInput1">Num. remonto data</label>
                              <input type="date" id="exampleInput1" placeholder="XXXX-XX-XX" name="" class="form-control">
                           </div>
                           <div class="col">
                              <label for="exampleInput1">Remonto pabaigos data</label>
                              <input type="date" id="exampleInput1" placeholder="XXXX-XX-XX" name="" class="form-control">
                           </div>
                     </div>
                     <div class="row mb-3">
                        <div class="col">
                           <label for="exampleFormControlSelect1">Remonto vieta</label>
                           <select style="width: 100%;" class="form-control" id="exampleFormControlSelect1">
                              <option>Skuba</option>
                              <option>Skuba</option>
                              <option>Skuba</option>
                              <option>Skuba</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group mt-3" style="width: 100%;">
                        <label for="exampleFormControlSelect1">Gedimo aprašymas</label>
                        <textarea style="width: 100%;" class="form-control" placeholder="Aprašymas">
                        </textarea>
                        <small class="ml-3">Detalus gedimo aprašymas. Jame turįtų būti paminėti šie dalykai:</small>
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
