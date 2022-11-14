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

<h1 style="margin-top:30px;">Bodaboda Management system</h1>
<h1 style="margin-top: 10px;">Date: {{now()}}</h1>
<h1 style="margin-top: 10px;">User Report</h1>

    <table id="customers">
    <tr>
        <th>Fullname</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>County</th>
        <th>Location</th>
        <th>Registration Date</th>
    </tr>
    <tr>
        <td>{{$user->fullname}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->phone}}</td>
        <td>{{$user->county}}</td>
        <td>{{$user->location}}</td>
        <td>{{$user->created_at}}</td>
    </tr>
    </table>

<h1 style="margin-top:30px;">Application Report</h1>
<table id="customers">
    <tr>
        <th>Application Number</th>
        <th>Transaction Status</th>
        <th>Driving School Status</th>
        <th>Generate_card</th>
    </tr>
    <tr>
        <td>{{$application?->application_number}}</td>
        <td>{{$application?->transaction_status}}</td>
        <td>{{$application?->driving_school_status}}</td>
        <td>{{$application?->generate_card}}</td>

    </tr>
</table>

<h1 style="margin-top:30px;">Transaction Report</h1>
<table id="customers">
    <tr>
        <th>Amount</th>
        <th>Mpesa Receipt Number</th>
        <th>Phone Number</th>
        <th>Transaction date</th>
    </tr>
    <tr>
        <td>{{$transaction?->amount}}</td>
        <td>{{$transaction?->referrence_number}}</td>
        <td>{{$transaction?->phone_number}}</td>
        <td>{{$transaction?->created_at}}</td>
    </tr>
</table>

</body>
</html>



