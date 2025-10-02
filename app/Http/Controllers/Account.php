<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Account extends Controller
{
    public function index(){
        $balance = Auth::user()->balance;

        return view('account.sumary', [
            'balance' => $balance
        ]);
    }

    public function money(){
        return view('account.money');
    }
}
