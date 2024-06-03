<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Http\Controllers\EsewaController;

class OrderController extends Controller
{
    //
    static public function createOrder($transactionId, $amount)
    {
        $order = new Order();
        $order->transaction_id = $transactionId;
        $order->total_price = $amount;
        $order->user_id = auth()->user()->id;
        $order->save();
    }

    public function validateOrder($transactionId)
    {
        $order = Order::where("transaction_id", $transactionId)->first();
        if (empty($order)) {
            return redirect("/");
        }
        $esewa = EsewaController::validatePayment($transactionId, $order->total_price);
        if($esewa['status'] == "COMPLETE") return view('paymentStatus')->with('status', "success");
        else return view('paymentStatus')->with('status', "failure");
    }
}