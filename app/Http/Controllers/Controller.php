<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function uploadImage($location = 'upload/', $image)
    {
        $filename = Str::uuid()->toString() . '-' . time() . '.' . $image->getClientOriginalExtension();
        $image->move($location, $filename);

        return $filename;
    }
}