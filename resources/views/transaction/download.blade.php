<!DOCTYPE html>
<html lang="en">
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
<h1>Date: {{now()}}</h1>
<h1 style="margin-top:10px;">Transaction Report</h1>
<table id="customers">
    <tr>
        <th>Amount</th>
        <th>Mpesa Receipt Number</th>
        <th>Phone Number</th>
        <th>Status</th>
        <th>Transaction date</th>
    </tr>
   
     @foreach ($transactions as $transaction)
        <tr>
           <td>{{$transaction?->amount}}</td>
           <td>{{$transaction?->referrence_number}}</td>
           <td>{{$transaction?->phone_number}}</td>
           <td>{{$transaction?->status}}</td>
           <td>{{$transaction?->created_at}}</td>            
        </tr>
     @endforeach

     <tr style="padding-top:30px; padding-left:50px;">
        <td>Total Amount Paid: <b> {{ !empty($transaction) ? $transaction->sum('amount') : 'No transactions yet'}} </b></td>
        <td>Date: <b> {{now()->format('Y-m-d')}} </b></td>
     </tr>
        
</table>

</body>
</html>



