<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetail;
use App\Models\TransactionHeader;

class TransactionController extends Controller
{
    public function index()
    {
        $transaction_headers = TransactionHeader::whereBelongsTo(auth()->user())->get();
        if (sizeof($transaction_headers) == 0)
        {
            $transactions = [];
            return view('transactions', compact('transactions'));    
        }
        $transactions = TransactionDetail::whereBelongsTo($transaction_headers)->get();
        return view('transactions', compact('transactions'));
    }
}
