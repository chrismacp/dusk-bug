<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TestController extends Controller
{
    public function show()
    {

        Log::info("TestController::show - APP_ENV=" . env('APP_ENV'));
        Log::info("TestController::show - DB_DATABASE=" . env('DB_DATABASE'));

        return view('test');
    }
}
