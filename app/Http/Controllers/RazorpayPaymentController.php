<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\Payment;
use Session;

use Exception;

class RazorpayPaymentController extends Controller
{
     /**

     * Write code on Method

     *

     * @return response()

     */

     public function index()

     {        
 
         return view('razorpayView');
 
     }
 
   
 
     /**
 
      * Write code on Method
 
      *
 
      * @return response()
 
      */
 
      public function store(Request $request)
      {
          $input = $request->all();
          $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
          $payment = $api->payment->fetch($input['razorpay_payment_id']);
      
          if (count($input) && !empty($input['razorpay_payment_id'])) {
              try {
                  $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
      
           
                  $paymentRecord = new Payment(); 
                  $paymentRecord->user_id = auth()->id(); 
                  $paymentRecord->webinar_id = $request->webinar_id; 
                  $paymentRecord->amount = $payment['amount'] / 100; 
                  $paymentRecord->status = 'success';
                  $paymentRecord->payment_date = now();
                  $paymentRecord->save();
      
              } catch (Exception $e) {
                  Session::put('error', $e->getMessage());
                  return redirect()->back();
              }
          }
      
          Session::put('success', 'Payment successful');
          return redirect()->back();
      }
}
