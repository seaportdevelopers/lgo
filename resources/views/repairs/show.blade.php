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
                  <td class="flex-inline">
                     <a href="/repairs/{{encrypt($repair->id)}}/edit" class="btn btn-primary btn-table"><span class="icon icon-white" data-feather="edit"></span> Redaguoti</a>
                      <button onclick="showConfirmationAlert();" type="submit" class="btn btn-table btn-danger" style="margin-top: 2px;"><span class="icon icon-white" data-feather="trash"></span></button>
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
