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

            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        </h2>
    </div>
    <div class="card-body">
       <form action="./" method="post">
         {{csrf_field()}}
          <div class="row">
            <div class="form-group">
               <label for="informer">Pranešėjas</label>
               <input id="informer" name="informer" type="text" class="form-control form-control-classic mb-4 mr-3" placeholder="Pranešėjas">
            </div>
             <div class="select mr-3">
             <select name="idno">
                @foreach ($trucks as $truck)
                   <option value={{$truck->idno}}>{{ $truck->idno }}</option>
                @endforeach
             </select>
             <div class="select__arrow"></div>
            </div>
            <div class="form-group">
              <label for="repComp">Atsakinga įmonė/įstaiga</label>
              <input id="repComp" name="repComp" type="text" class="form-control form-control-classic mb-4 mr-3" placeholder="Kompanija">
           </div>
           <div class="form-group">
             <label for="responsible">Atsakingas asmuo</label>
             <input id="responsible" name="responsible" type="text" class="form-control form-control-classic mb-4 mr-3" placeholder="Atakingas asmuo">
          </div>
          <div class="form-group">
            <label for="category">Kategorija</label>
            <input id="category" name="category" type="text" class="form-control form-control-classic mb-4 mr-3" placeholder="Kategorija">
         </div>
         <div class="form-group">
           <label for="price">Kaina</label>
           <input id="price" name="price" type="text" class="form-control form-control-classic mb-4 mr-3" placeholder="Kaina">
        </div>
        <div class="form-group">
          <label for="repDate">RepDate</label>
          <input id="repDate" name="repDate" type="date" class="form-control form-control-classic mb-4 mr-3" placeholder="Data">
       </div>
       <div class="form-group">
         <label for="repDateFinished">RepDateFinished</label>
         <input id="repDateFinished" name="repDateFinished" type="date" class="form-control form-control-classic mb-4 mr-3" placeholder="Data">
      </div>
      <div class="form-group">
        <label for="desc">Description</label>
        <input id="desc" name="desc" type="text" class="form-control form-control-classic mb-4 mr-3" placeholder="Atakingas asmuo">
     </div>
       <div class="form-group">
         <input type="submit" id="submit" value="SUBMIT" />
       </div>
       </div>
       </form>
    </div>
</div>
@endsection
