@extends('layouts.navigation')
@section('content')
<div class="mt-6 mb-5">
<h1 class="title">Gedimai ir remontai</h1>
<button class="btn btn-small btn-danger">Atšaukti</button>
</div>
<div class="card big">
    <div class="card-header">
        <h2>
            Pranešimo apie gedimą forma.
        </h2>
    </div>
    <div class="card-body">
       <form action="" method="post">
          <div class="row">
            <div class="form-group">
               <label for="responder">Pranešėjas</label>
               <input id="responder" type="text" class="form-control form-control-classic mb-4 mr-3" placeholder="Pranešėjas">
            </div>
             <div class="select mr-3">
             <select>
                @foreach ($trucks as $truck)
                   <option>{{ $truck->idno }}</option>
                @endforeach
             </select>
             <div class="select__arrow"></div>
            </div>
            <div class="form-group">
              <label for="company">Atsakinga įmonė/įstaiga</label>
              <input id="company" type="text" class="form-control form-control-classic mb-4 mr-3" placeholder="Pranešėjas">
           </div>
       </div>
       </form>
    </div>
</div>
@endsection
