@extends('layouts.navigation')

@section('content')
<h1>Pagrindinis</h1>
<div class="container-fluid mt-5">
    <div class="row">
        <div class="card">
            <div class="card-header">
                <span>
                    Transportas
                </span>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <span>
                    Transportas
                </span>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Transporto priemones numeris</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $truck)
                        <tr>
                          <td>{{$truck->id}}</td>
                          <td>{{$truck->idno}}</td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
