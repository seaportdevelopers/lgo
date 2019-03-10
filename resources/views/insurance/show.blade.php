@extends('layouts.navigation', ['ViewHeaderTitle' => 'Draudimo sutartys', 'ViewHeaderSubtitle' => '', 'viewName' => 'insurance.index'])
@section('content')
<div class="card big">
    <div class="card-header">
        <h2>
            Draudimo sutartys
        </h2>

    </div>
    <div class="card-body">
        <table class="table table-hover table-borderless">
            <thead>
                <tr>
                    <th>Draudimo komapinijos pavadinimas</th>
                    <th>Transporto priemonės numeris</th>
                    <th>Draudimo liudijimo Nr.</th>
                    <th>Žaliosios kortelės Nr.</th>
                    <th>Galioja nuo</th>
                    <th>Galioja iki</th>
                    <th>Veiksmai</th>
                </tr>
            </thead>
            <tbody>
               @foreach($insurances as $insurance)
                <tr>
                    <td>{{$insurance->name}}</td>
                    <td>{{$insurance->idnoid}}</td>
                    <td>{{$insurance->serial}}</td>
                    <td>{{$insurance->greenSerial}}</td>
                    <td>{{$insurance->dateFrom}}</td>
                    <td>{{$insurance->dateTo}}</td>
                    <td>
                       <a href="{{route('insurance.edit', $insurance->id)}}"><button class="btn btn-primary btn-table"><span class="icon icon-white" data-feather="edit"></span> Redaguoti</button>
                    </td>
                </tr>
               @endforeach
            </tbody>
        </table>
    </div>
</div>

@include("insurance.create")
@yield("create")

@endsection
