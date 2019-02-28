@extends('layouts.navigation', ['ViewHeaderTitle' => 'Maršrutai', 'ViewHeaderSubtitle' => '', 'viewName' => 'routes.index'])
@section('content')
<div class="card big">
    <div class="card-header">
        <h2>
            Naujausi maršrutai
        </h2>

    </div>
    <div class="card-body">
        <table class="table table-hover table-borderless">
            <thead>
                <tr>
                    <th>Krovinio tipas</th>
                    <th>Vežama iš</th>
                    <th>Vežama į</th>
                    <th>Klientas</th>
                    <th>Vairuotojas</th>
                    <th>Vilkikas</th>
                    <th>Puspriekabė</th>
                    <th>Statusas</th>
                    <th>Veiksmai</th>
                </tr>
            </thead>
            <tbody>
               @foreach($routes as $driver)
                <tr>
                    <td>{{$driver->userCreated}}</td>
                    <td>{{$driver->type}}</td>
                    <td>{{$driver->POINT_A}}</td>
                    <td>{{$driver->POINT_B}}</td>
                    <td>{{$driver->client}}</td>
                    <td>{{$driver->driverID}}</td>
                    <td>{{$driver->TruckID}}</td>
                    <td>{{$driver->CargoID}}</td>
                    <td>
                        @if($driver->status == 0)
                        <label class="bg-label bg-label-success">SĖKMINGAI IŠKRAUTAS {{$driver->DriverOut}}</label>
                        @elseif($driver->status == 1)
                        <label class="bg-label bg-label-main">Kelyje</label>
                        @elseif($driver->status == 2)
                        <label class="bg-label bg-label-danger">Vyksta iškrovimas</label>
                        @elseif($driver->status == 3)
                        <label class="bg-label bg-label-error">NESKALNDUMAI</label>
                        @else
                        <label class="bg-label bg-label-error">KLAIDA</label>
                        @endif
                    </td>
                    <td>
                       <a href="{{route('drivers.edit', $driver->id)}}"><button class="btn btn-primary btn-table"><span class="icon icon-white" data-feather="edit"></span> Redaguoti</button>
                    </td>
                </tr>
               @endforeach
            </tbody>
        </table>
    </div>
</div>

@include("routes.create")
@yield("create")

@endsection
