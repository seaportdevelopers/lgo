@extends('layouts.navigation')
@section('content')

<div class="container">
    <h1 class="mt-6 mb-5">LGO system component styles</h1>
    <h2 class="title">Color sheme</h2>
            <div class="row mb-5">
                    <color style="background-color: white;">White (#ffffff)</color>
                    <color style="background-color: #30323D;color: #fff;">Main color (#30323D)</color>
                    <color style="background-color: #F0F0F7;border: 1px solid #ddd;">Body color (#F0F0F7)</color>
                    <color style="background-color: #5e72e4;color: #fff;">Primary (#5e72e4)</color>
                    <color style="background-color: #FCA311;color: #fff;">Warning (#FCA311)</color>
                    <color style="background-color: #2dce89;color: #fff;">Success (#2dce89)</color>
                    <color style="background-color: #e3342f;color: #fff;">Danger (#e3342f)</color>
                    <color style="background-color: #8898aa;color: #fff;">Muted (#8898aa)</color>
            </div>
    <h2 class="title">Typography</h2>
    <h5 class="sub-info mb-3">Headers</h5>
    <h1>Heading #1</h1>
    <h2>Heading #2</h2>
    <h3>Heading #3</h3>
    <h4>Heading #4</h4>
    <h5>Heading #5</h5>
    <h6>Heading #6</h6>
    <h5 class="sub-info mb-3 mt-4">Paragraph (simple)</h5>
    <p>
        I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at.
    </p>
    <h5 class="sub-info mb-3 mt-4">Paragraph (leading text)</h5>
    <p class="leading-paragraph">
        I will be the leader of a company that ends up being worth billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think that’s a responsibility that I have, to push possibilities, to show people, this is the level that things could be at.
    </p>
    <h5 class="sub-info mb-3 mt-4">Colored text</h5>
    <h6 class="text-ok">Colored text</h6>
    <h6 class="text-danger">Colored text</h6>
    <h6 class="text-warning">Colored text</h6>
    <h6 class="text-success">Colored text</h6>
    <h6 class="text-muted">Colored text</h6>
    <h2 class="mt-5 title">Cards</h2>
    <h5 class="sub-info mb-3">small</h5>
    <div class="row">
        <div class="card info">
            <div class="card-header">
<<<<<<< HEAD
                <span>
                    Transportas
                </span>
=======
                <h2>
                   Card title
                </h2>
            </div>   
            <div class="card-body">
                <div>
                    <h1>000</h1>
                    <span class="text-danger">Krito 13.8% lyginant su 2018</span>
                </div>
            </div>
        </div>
        <div class="card info">
            <div class="card-header">
                <h2>
                   Card title
                </h2>
            </div>   
            <div class="card-body">
                <div>
                    <h1>000</h1>
                    <span class="text-danger">Krito 13.8% lyginant su 2018</span>
                </div>
            </div>
        </div>
        <div class="card info">
            <div class="card-header">
                <h2>
                   Card title
                </h2>
            </div>   
            <div class="card-body">
                <div>
                    <h1>000</h1>
                    <span class="text-danger">Krito 13.8% lyginant su 2018</span>
                </div>
            </div>
        </div>
        <div class="card info">
            <div class="card-header">
                <h2>
                   Card title
                </h2>
            </div>   
            <div class="card-body">
                <div>
                    <h1>000</h1>
                    <span class="text-danger">Krito 13.8% lyginant su 2018</span>
                </div>
>>>>>>> fe58c73a3e452ec08b1b402bdb83e1b855a903c2
            </div>
        </div>
    </div>
    <h5 class="sub-info mb-3">big</h5>
    <div class="row">
        <div class="card big">
            <div class="card-header">
                <h2>
                    Transportas
<<<<<<< HEAD
                </span>
            </div>
=======
                </h2>
            </div>   
>>>>>>> fe58c73a3e452ec08b1b402bdb83e1b855a903c2
            <div class="card-body">
                <table class="table table-hover table-borderless">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Valstybinis numeris</th>
                            <th>Pradirbta valandų (h)</th>
                            <th>Gamintojas</th>
                            <th>Modelis</th>
                            <th>Gamybos metai</th>
                            <th>Būsena</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $truck)
                        <tr>
<<<<<<< HEAD
                          <td>{{$truck->id}}</td>
                          <td>{{$truck->idno}}</td>
=======
                            <td>001</td>
                            <td>ABC132</td>
                            <td>254</td>
                            <td>Iveco</td>
                            <td>MC-612C3</td>
                            <td>2008</td>
                            <td>Aktyvys</td>
                        </tr>
                       <tr>
                            <td>001</td>
                            <td>ABC132</td>
                            <td>254</td>
                            <td>Iveco</td>
                            <td>MC-612C3</td>
                            <td>2008</td>
                            <td>Aktyvys</td>
                        </tr>
                       <tr>
                            <td>001</td>
                            <td>ABC132</td>
                            <td>254</td>
                            <td>Iveco</td>
                            <td>MC-612C3</td>
                            <td>2008</td>
                            <td>Aktyvys</td>
>>>>>>> fe58c73a3e452ec08b1b402bdb83e1b855a903c2
                        </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <h2 class="title">Buttons</h2>
    <h5 class="sub-info mb-3">Big</h5>
    <button class="btn">Click me</button>
    <button class="btn btn-primary">Click me</button>
    <button class="btn btn-danger">Click me</button>
    <button class="btn btn-warning">Click me</button>
    <button class="btn btn-success">Click me</button>
    <button class="btn btn-disabled" disabled>Click me</button>
    <h5 class="sub-info mb-3 mt-3">Small</h5>
    <button class="btn btn-small">Click me</button>
    <button class="btn btn-primary btn-small">Click me</button>
    <button class="btn btn-danger btn-small">Click me</button>
    <button class="btn btn-warning btn-small">Click me</button>
    <button class="btn btn-success btn-small">Click me</button>
    <button class="btn btn-disabled btn-small" disabled>Click me</button>
    <div class="container">
    <h2 class="title mt-5">Inputs</h2>
    <h5 class="sub-info mb-3">Dashboard</h5>
        <div class="row">
             <input type="text" class="form-control mb-4 mr-3" placeholder="Simple text">
             <input type="email" class="form-control mb-4 mr-3" placeholder="admin@lgo.lt">
             <input type="email" class="form-control mb-4 mr-3" placeholder="disabled text" disabled="">
             <input type="email" class="form-control form-control-success mb-4 mr-3" placeholder="Success input text">
             <input type="email" class="form-control form-control-error mb-4 mr-3" placeholder="Error input text">
        </div>
    <h5 class="sub-info mb-3">Login & forgot password</h5>
            <div class="row">
                 <input type="text" class="form-control form-control-login mb-4 mr-3" placeholder="Simple text">
                 <input type="password" class="form-control form-control-login mb-4 mr-3" placeholder="Simple text">
                 <input type="email" class="form-control form-control-login mb-4 mr-3" placeholder="admin@lgo.lt">
            </div>


</div>
<div class="container">
        <h2 class="title mt-5">Tables</h2>
        <h5 class="sub-info mb-3">Simple</h5>
        <table class="table table-hover table-borderless">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Valstybinis numeris</th>
                            <th>Pradirbta valandų (h)</th>
                            <th>Gamintojas</th>
                            <th>Modelis</th>
                            <th>Gamybos metai</th>
                            <th>Būsena</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>001</td>
                            <td>ABC132</td>
                            <td>254</td>
                            <td>Iveco</td>
                            <td>MC-612C3</td>
                            <td>2008</td>
                            <td>Aktyvys</td>
                        </tr>
                       <tr>
                            <td>001</td>
                            <td>ABC132</td>
                            <td>254</td>
                            <td>Iveco</td>
                            <td>MC-612C3</td>
                            <td>2008</td>
                            <td>Aktyvys</td>
                        </tr>
                       <tr>
                            <td>001</td>
                            <td>ABC132</td>
                            <td>254</td>
                            <td>Iveco</td>
                            <td>MC-612C3</td>
                            <td>2008</td>
                            <td>Aktyvys</td>
                        </tr>
                    </tbody>
        </table>
</div>
<div class="container">
    <h2 class="title mt-5">Modals</h2>
    <h5 class="sub-info mb-3">Information</h5>
    <button type="button" class="btn btn-primary" onclick="showInfoAlert();">
        Launch informational alert
    </button>
    <button type="button" class="btn btn-success" onclick="showSuccessAlert();">
        Launch success alert
    </button>
     <button type="button" class="btn btn-danger" onclick="showErrorAlert();">
        Launch error alert
    </button>
     <button type="button" class="btn btn-warning mt-3" onclick="showWarningAlert();">
        Launch warning alert
    </button>
    <button type="button" class="btn btn-secondary mt-3" onclick="showEditAlert();">
        Launch warning alert
    </button>
   <script type="text/javascript">
       function showInfoAlert(){
            swal({
                icon: "info",
                title: 'It is a title of the modal alert',
                text: 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.',
            });
        }
        function showSuccessAlert(){
            swal({
                icon: "success",
                title: 'Your operation is succesfuly completed!',
                text: 'Contrary to popular belief, Lorem Ipsum is not simply random text.',
            });
        }
        function showErrorAlert(){
            swal({
                icon: "error",
                title: 'Something went wrong...',
                text: 'We apoligise for the current issue. Our development team is alerted and will fix this problem as soon as posible',
            });
        }
        function showWarningAlert(){
            swal({
                icon: "warning",
                title: 'Account deletion confirmation',
                text: 'Are You sure, that you want to delete this account?',
            });
        }
        function showEditAlert(){
            swal({
                  content: {
                    element: "input",
                    attributes: {
                      placeholder: "Type your password",
                      type: "password",
                    },
                  },
            });
        }
   </script>
</div>
@endsection
