<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class apiController extends Controller
{
    public function test_data(Request $request)
    {
        return $request;
    }
}
