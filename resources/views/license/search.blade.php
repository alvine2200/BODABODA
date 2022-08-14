<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>License Download</title>
    <style>
        .container{
            display:flex;
            justify-content: center;
            align-items: center;
        }
        .container .row{
            display:flex;
            justify-content: center;
            align-items: center;
            border:1px solid black;
            border-radius:7px;
            column:100%;
        }
        .container .row .card-head{
            column: 100%;
            padding-top: 10px;
            padding-left: 10px;
            display:flex !important;
            justify-content: center;
            align-items: center;
        }
        .container .row .card-head h3{
            column: 100%;
            margin-top: 20px;
            text-align: center;
            margin-bottom:15px;
        }
        .container .row .card-head img{
            margin-left:16.5rem;
            height:150px;
            width:150px;
            object-fit: contain;
        }
        .container .row .card-body{
            columns: 100%;
            text-align:center;
            font-size:16px;
            font-weight:bold;
            padding-left: 30px;

        }
    </style>
</head>
<body>
    <div class="container">
         <div class="row">
            <div class="card-head">
                <h3> BodaBoda Association of Kenya</h3>
                {{-- <img  src="images/bak logo.png" alt="card-image" > --}}
            </div>
            <div class="card-body">
                <p> Name: {{$search->users->fullname}}</p>
                <p> License Number: {{$search->application_number}}</p>
                <p> Date of Issue: {{$search->updated_at}}</p>
            </div>
        </div>
    </div>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @if(session()->has('found'))
      <script>
        swal("Rider Found","enjoy your ride","success");
      </script>
    @endif

</body>
</html>


