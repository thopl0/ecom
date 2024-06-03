<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Wslib\Esewa;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;

class EsewaController extends Controller
{
    public function initiateEsewa(Request $request)
    {
        $esewa = Esewa::init();
        $transactionId = time();
        $userId = $request->user()->id;
        $amount = CartController::getTotalCartAmount($userId);
        OrderController::createOrder($transactionId, $amount);
        CartController::deleteCart($userId);
        $esewa->config($transactionId, "http://localhost:8000/order/".$transactionId, "http://localhost:8000/order/".$transactionId, $amount);
    }

    static public function validatePayment($transactionId, $amount)
    {
        $esewa = Esewa::init();
        $status = $esewa->validate($transactionId, $amount);
        return $status;
    }
    
}