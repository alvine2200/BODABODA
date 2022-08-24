<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>User Report Table</h1>

    <table id="customers">
    <tr>
        <th>Fullname</th>
        <th>Email</th>
        <th>Id Number</th>
        <th>Phone Number</th>
        <th>County</th>
        <th>Subcounty</th>
        <th>Location</th>
    </tr>  
    <tr>
        <td>{{$user->fullname}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->id_number}}</td>
        <td>{{$user->phone}}</td>
        <td>{{$user->county}}</td>
        <td>{{$user->subcounty}}</td>
        <td>{{$user->location}}</td>
    </tr>  
    </table>

<h1 style="margin-top:30px;">Application Table</h1>
<table id="customers">
    <tr>
        <th>Application Number</th>
        <th>Transaction Status</th>
        <th>Driving School Status</th>
        <th>Generate_card</th>
        
    </tr>  
    <tr>
        <td>{{$application->application_number}}</td>
        <td>{{$application->transaction_status}}</td>
        <td>{{$application->driving_school_status}}</td> 
        <td>{{$application->generate_card}}</td>
             
       
    </tr>  
    </table>
</body>
</html>



