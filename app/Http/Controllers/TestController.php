<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function index(): string
    {
        $user = Auth::user();

        return 'Hello ' . $user;
    }
}
