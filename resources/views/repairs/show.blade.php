@extends('layouts.navigation')
@section('content')
<div class="mt-6 mb-5">
<h1 class="title">Gedimai ir remontai</h1>
<button class="btn btn-small btn-primary" data-toggle="modal" data-target="#create">Pranešti apie gedimą</button>
</div>
<div class="card big">
    <div class="card-header">
        <h2 style="display: inline;">
            Užfiksuoti gedimai
        </h2>
        <label style="display: inline; float: right;" class="control control--checkbox">Rodyti pašalintus gedimus
           <input type="checkbox" id="hidden" onchange="checkHidden()"/>
           <div class="control__indicator"></div>
        </label>
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
                <tr @if($repair->deleted_at != NULL)style="background-color: #d8d8d8;" class="hidden" @endif id={{$repair->id}}>
                    <td>{{$repair->idno}}</td>
                    <td>
                      {{$repair->description}}
                    </td>
                    <td>{{$repair->repairCompany}}</td>
                    <td>{{$repair->repairDate}}</td>
                    <td>{{$repair->repairDateEnd}}</td>
                  <td>{{$repair->repairsPrice}}</td>
                  <td>
                      @if($repair->deleted_at != NULL)
                        <label class="bg-label bg-label-success">Fixed</label>
                      @else
                       <label class="bg-label bg-label-main">Pranešta</label>
                     @endif
                  </td>
                  @if($repair->deleted_at == NULL)
                  <td>
                     <a href="/repairs/{{encrypt($repair->id)}}/edit"><button class="btn btn-primary btn-small">Redaguoti</button>
                    <form onsubmit="showWarningAlert(); return true;" action="repairs/{{$repair->id}}" method="post">
                      {{csrf_field()}}
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="submit" class="btn btn-small btn-danger" style="margin-top: 2px;" value="Pasalinti gedima">
                  </td>
                @else
                  <td>
                    <b>Patvirtinta</b>: <br/>{{$repair->deleted_at}}
                  </td>
                @endif
                </form>
                </tr>
               @endforeach
            </tbody>
        </table>
    </div>
</div>

@include("repairs/create")
@yield("create")

@endsection
