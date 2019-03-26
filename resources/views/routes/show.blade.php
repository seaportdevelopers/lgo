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
               @foreach($routes as $route)
                <tr>
                    <td>
                        @switch($route->type)
                            @case(0)
                            Paprastas krovinys
                            @break
                            @case(1)
                            Maisto produktai
                            @break
                            @case(2)
                            Maisto produktai
                            @break
                            @default
                            Nenurodyta

                        @endswitch
                    </td>
                    <td>{{$route->POINT_A}}</td>
                    <td>{{$route->POINT_B}}</td>
                    <td>{{$route->client}}</td>
                    <td>
                            <span class="icon mr-1" data-feather="user"></span>
                            {{$route->driver->Fname}} {{$route->driver->Lname}}
                    </td>
                    <td>
                            <span class="icon mr-1" data-feather="truck"></span>
                            {{ $route->truck->idno}}
                    </td>
                    <td>
                            <span class="icon mr-1" data-feather="truck"></span>
                            {{ $route->cargo->idno}}
                    </td>
                    <td>
                        @if($route->status == 0)
                        <label class="bg-label bg-label-primary">Neseniai sukurtas</label>
                        @elseif($route->status == 4)
                        <label class="bg-label bg-label-success">
                        <span class="icon-white mr-1" data-feather="check"></span>  SĖKMINGAI IŠKRAUTAS {{$route->DriverOut}}</label>
                        @elseif($route->status == 1)
                        <label class="bg-label bg-label-main">Kelyje</label>
                        @elseif($route->status == 2)
                        <label class="bg-label bg-label-danger">Laukiantis eileje</label>
                        @elseif($route->status == 3)
                        <label class="bg-label bg-label-error">NESKALNDUMAI</label>
                        @else
                        <label class="bg-label bg-label-error">KLAIDA</label>
                        @endif
                    </td>
                    <td>
                       <a href="{{route('routes.edit', encrypt($route->id))}}"><button class="btn btn-primary btn-table"><span class="icon icon-white" data-feather="edit"></span> Redaguoti</button>
                    </td>
                </tr>
               @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- @include("routes.create", ['trucks' => $trucks, 'cargos' => $cargos])
@yield("create") --}}

@endsection
