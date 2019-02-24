<div class="viewHeader">
   <div class="textWrapper">
      <h1>{{$title}}</h1>
      <h3>{{$subtitle}}</h3>
      @if ($viewName == "transport.index")
         <button class="btn btn-small btn-white mt-2" data-toggle="modal" data-target="#AddTransport">Pridėti transportą</button>
      @elseif($viewName == "repairs.index")
         <button class="btn btn-small btn-white" data-toggle="modal" data-target="#create">Pranešti apie gedimą</button>
      @elseif($viewName == "insurance.index")
        <button class="btn btn-small btn-white" data-toggle="modal" data-target="#newInsurance">Pridėti draudimo sutartį</button>
      @endif
   </div>
   @if ($viewName == "transport.edit")
        <a href="{!! url()->previous() !!}" class="link wrapperLink mt-3"><span class="icon" data-feather="arrow-left"></span> Grįžti atgal</a>
   @elseif($viewName == "repairs.edit")
        <a href="{!! url()->previous() !!}" class="link wrapperLink mt-3"><span class="icon" data-feather="arrow-left"></span> Grįžti atgal</a>
   @endif

</div>
