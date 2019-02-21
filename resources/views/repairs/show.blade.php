@extends('layouts.navigation', ['ViewHeaderTitle' => 'Gedimai ir remontai', 'ViewHeaderSubtitle' => '', 'viewName' => 'repairs.index'])
@section('content')
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
                    <td>{{$repair->repairCompany}}</td>
                    <td>{{$repair->repairDate}}</td>
                    <td>{{$repair->repairDateEnd}}</td>
                  <td>{{$repair->repairsPrice}}</td>
                  <td>
                       <label class="bg-label bg-label-main StatusPopOver">Pranešta</label>
                  </td>
                  @if($repair->deleted_at == NULL)
                  <td>
                     <a href="/repairs/{{encrypt($repair->id)}}/edit"><button class="btn btn-primary btn-table">Redaguoti</button>
                    <form onsubmit="showWarningAlert(); return true;" action="repairs/{{$repair->id}}" method="post">
                      {{csrf_field()}}
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="submit" class="btn btn-table btn-danger" style="margin-top: 2px;" value="Pašalinti gedimą">
                  </td>
                @else
                  <td>
                    <b>Patvirtinta</b>: <br/>{{$repair->deleted_at}}
                  </td>
                </tr>
              @endif
               @endforeach
            </tbody>
        </table>
    </div>
</div>

@include("repairs/create")
@yield("create")

@endsection
