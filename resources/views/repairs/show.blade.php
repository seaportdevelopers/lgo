@extends('layouts.navigation')
@section('content')
<div class="mt-6 mb-5">
<h1 class="title">Gedimai ir remontai</h1>
<button class="btn btn-small btn-primary" data-toggle="modal" data-target="#create">Pranešti apie gedimą</button>
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
                     <a href="/repairs/{{encrypt($repair->id)}}/edit"><button class="btn btn-primary btn-small">Redaguoti</button>
                    <form onsubmit="showWarningAlert(); return true;" action="repairs/{{$repair->id}}" method="post">
                      {{csrf_field()}}
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="submit" class="btn btn-small btn-danger" style="margin-top: 2px;" value="Pasalinti gedima">
                  </form>
                  </td>
                </tr>
               @endforeach
            </tbody>
        </table>
    </div>
</div>

@include("repairs/create")
@yield("create")

@endsection
