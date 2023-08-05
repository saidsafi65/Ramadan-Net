<?php

namespace App\Http\Controllers;

use App\Models\remaining_jawal_balance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViewDataController extends Controller
{
    //
    public function remaining_jawal()
    {
        $jawal = remaining_jawal_balance::all();
        return view('daily_add_balance', ['jawal' => $jawal]);
    }
}
