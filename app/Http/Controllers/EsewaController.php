<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Wslib\Esewa;

class EsewaController extends Controller
{
    public function initiateEsewa()
    {
        $esewa = Esewa::init();
        $esewa->config(time(), "https://google.com", "https://youtube.com", 12);
    }

    public function validatePayment()
    {
        $esewa = Esewa::init();
        $status = $esewa->validate('dafsfsfgdrdfbdfhg', 12);
        dd($status);
    }
    
}
