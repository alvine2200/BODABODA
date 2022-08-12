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
            padding-top: 10px;
            padding-left: 10px;
            display:flex !important;
            justify-content: center;
            align-items: center;
        }
        .container .row .card-head h3{
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
                <img  src="images/bak logo.png" alt="card-image" >
            </div>
            <div class="card-body">
                <p> Name: {{$user->fullname}}</p>
                <p> License Number: {{$application->application_number}}</p>
                <p> Date of Issue: <?php $ldate=date('Y-m-d'); echo $ldate; ?> </p>
            </div>
        </div>
    </div>
</body>
</html>