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
    <th>Status</th>
    <th>Id Number</th>
    <th>Phone Number</th>
    <th>County</th>
    <th>Location</th>
  </tr>
  @foreach ($user as $us)
  <tr>
    <td>{{$us->fullname}}</td>
    <td>{{$us->status}}</td>
    <td>{{$us->id_number}}</td>
    <td>{{$us->phone}}</td>
    <td>{{$us->county}}</td>
    <td>{{$us->location}}</td>
  </tr>  
  @endforeach  
 
</table>

</body>
</html>



