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
                    <td>
                        @switch($driver->type)
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
                    <td>{{$driver->POINT_A}}</td>
                    <td>{{$driver->POINT_B}}</td>
                    <td>{{$driver->client}}</td>
                    <td>

                        @foreach($driver->driver as $d)
                            <span class="icon mr-1" data-feather="user"></span>
                            {{$d->Fname}} {{$d->Lname}}
                        @endforeach
                    </td>
                    <td>
                        @foreach($driver->truck as $truck)
                            <span class="icon mr-1" data-feather="truck"></span>
                            {{ $truck->idno}}
                        @endforeach
                    </td>
                    <td>
                        @foreach($driver->cargo as $truck)
                            <span class="icon mr-1" data-feather="truck"></span>
                            {{ $truck->idno}}
                        @endforeach
                    </td>
                    <td>
                        @if($driver->statys == 0)
                        <label class="bg-label bg-label-primary">Neseniai sukurtas</label>
                        @elseif($driver->status == 4)
                        <label class="bg-label bg-label-success">
                        <span class="icon-white mr-1" data-feather="check"></span>  SĖKMINGAI IŠKRAUTAS {{$driver->DriverOut}}</label>
                        @elseif($driver->status == 1)
                        <label class="bg-label bg-label-main">Kelyje</label>
                        @elseif($driver->status == 2)
                        <label class="bg-label bg-label-danger">Laukiantis eileje</label>
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

{{-- @include("routes.create", ['trucks' => $trucks, 'cargos' => $cargos])
@yield("create") --}}

@endsection
