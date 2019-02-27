@extends('layouts.navigation', ['ViewHeaderTitle' => 'Vairuotojai', 'ViewHeaderSubtitle' => '', 'viewName' => 'drivers.index'])
@section('content')
<div class="card big">
    <div class="card-header">
        <h2>
            Varuotojai
        </h2>

    </div>
    <div class="card-body">
        <table class="table table-hover table-borderless">
            <thead>
                <tr>
                    <th>Vardas</th>
                    <th>Pavardė</th>
                    <th>Priskirtas vilkikas</th>
                    <th>Priskirta puspriekabė</th>
                    <th>Dabartinis maršrutas</th>
                    <th>Būsena</th>
                    <th>Veiksmai</th>
                </tr>
            </thead>
            <tbody>
               @foreach($drivers as $driver)
                <tr>
                    <td>{{$driver->Fname}}</td>
                    <td>{{$driver->Lname}}</td>
                    <td>{{$driver->truck}}</td>
                    <td>{{$driver->cargo}}</td>
                    <td>{{$driver->routeN}}</td>
                    <td>{{$driver->status}}</td>
                    <td>
                       <a href="{{route('drivers.edit', $driver->id)}}"><button class="btn btn-primary btn-table"><span class="icon icon-white" data-feather="edit"></span> Redaguoti</button>
                    </td>
                </tr>
               @endforeach
            </tbody>
        </table>
    </div>
</div>

@include("drivers.create")
@yield("create")

@endsection
