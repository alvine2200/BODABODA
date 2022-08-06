<?php

namespace App\Http\Controllers\Transactions;

use Carbon\Carbon;
use Safaricom\Mpesa\Mpesa;
use App\Models\Application;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MpesaController extends Controller
{

    public function index()
    {
        if(Auth::user()->is_admin == true){
            $transaction=Transaction::all();
            return view('transaction.adminindex', compact('transaction'));
        }
        else{
            $user_phone=Auth::user()->phone;
            $phone=str_replace('254', '0', $user_phone);
            $transaction=Transaction::where('phone_number',$phone)->get();
            return view('transaction.index', compact('transaction'));
        }

    }

    public function admin_approval($id)
    {
        $transact=Transaction::findOrFail($id);
        $transact->admin_status='1';
        $transact->update();

        return back()->with('success','Payment Approved successfully');
    }

    public function lipaNaMpesaPassword()
    {
        //timestamps
        $timestamp=Carbon::rawParse('now')->format('YmdHms');
        //lipaNaMpesa_Passkey
        $passKey= "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
        //BusinessShortCode
        $businessShortCode=174379;

        //generate password

        $mpesapassword=base64_encode($businessShortCode.$passKey.$timestamp);

        return  $mpesapassword;
    }

    public function generateAccessToken()
    {
        //initialize consumer key and consumer secret

            $consumer_key = env("MPESA_CONSUMER_KEY");
            $consumer_secret = env("MPESA_CONSUMER_SECRET");


        if(!isset($consumer_key)||!isset($consumer_secret)){
            die("please declare the consumer key and consumer secret as defined in the documentation");
        }

        $url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        $credentials = base64_encode($consumer_key.':'.$consumer_secret);

        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials,'Content-Type: application/json')); //setting a custom header
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

        $curl_response = curl_exec($curl);

        $access_token=json_decode($curl_response);

        return $access_token->access_token;

    }

    public function stkPush(Request $request)
    {
        $user_phone=Auth::user()->phone;
        $mpesa=new Mpesa();

         $BusinessShortCode=174379;
         $LipaNaMpesaPasskey="bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
         $TransactionType="CustomerPayBillOnline";
         $Amount="1";
         $PartyA= "$user_phone";
         $PartyB= 174379;
         $PhoneNumber= $user_phone;
         $CallBackURL= "https://7612-197-232-61-248.ngrok.io/api/mpesa_callback_url";
         $AccountReference ="BodaBoda License Payment";
         $TransactionDesc="BodaBoda Kenya Members";
         $Remarks="Thank you for transacting with us";


     $stkPushSimulation=$mpesa->STKPushSimulation($BusinessShortCode,
         $LipaNaMpesaPasskey,
         $TransactionType,
         $Amount,
         $PartyA,
         $PartyB,
         $PhoneNumber,
         $CallBackURL,
         $AccountReference,
         $TransactionDesc,
         $Remarks
     );

     return back()->with('success','Stk Push successfully initiated, check your phone to complete the payment');

   }

   public function mpesaResponse(Request $request)
   {
     $response=json_decode($request->getContent());
     Log::info(json_encode($response));

     $resData=$response->Body->stkCallback->CallbackMetadata;
     $amountPaid = $resData->Item[0]->Value;
     $mpesaTransactionId = $resData->Item[1]->Value;
     $mpesatransactiontime= $resData->Item[3]->Value;
     $paymentPhoneNumber=$resData->Item[4]->Value;

     //$formatedPhone=str_replace("254","0",$paymentPhoneNumber);

        $transaction= new Transaction;
        $transaction->amount=$amountPaid;
        $transaction->purpose='License Application';
        $transaction->date=$mpesatransactiontime;
        $transaction->status='Paid';
        $transaction->referrence_number=$mpesaTransactionId;
        $transaction->phone_number=$paymentPhoneNumber;
        $transaction->save();

        return back()->with('success','Payment is Successful, Thank you');
     }




}
