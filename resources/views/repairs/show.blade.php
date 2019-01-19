@extends('layouts.navigation')
@section('content')
<div class="mt-6 mb-5">
<h1 class="title">Gedimai ir remontai</h1>
<a href="{{ route('repairs.create') }}" class="btn btn-small btn-primary">Pranešti apie gedimą</a>
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
                    <th>Pasirinkti</th>
                    <th>Transp. priemonės valstybinis numeris</th>
                    <th>Aprašymas</th>
                    <th>Remonto vieta</th>
                    <th>Numatyta remonto data</th>
                    <th>Numatyta remonto pabaigos data</th>
                    <th>Remonto kaina</th>
                    <th>Veiksmai</th>
                </tr>
            </thead>
            <tbody>
               @foreach($repairs as $repair)
                <tr>
                    <td>
                       <label class="control control--checkbox">
                          <input type="checkbox"/>
                          <div class="control__indicator"></div>
                       </label>
                    </td>
                    <td>{{$repair->idno}}</td>
                    <td>
                       <p>{{$repair->description}}</p>
                    </td>
                    <td>{{$repair->repairCompany}}</td>
                    <td>{{$repair->repairDate}}</td>
                    <td>{{$repair->repairDateEnd}}</td>
                  <td>{{$repair->repairsPrice}}</td>
                  <td>
                       <button class="btn btn-small btn-primary">Redaguoti</button>
                  </td>
                </tr>
               @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
