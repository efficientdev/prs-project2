<?php

namespace Modules\Proprietors\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class UserPaymentController extends Controller
{
    public function history()
    {
        // assuming your payments are linked to something that has user_id
        $payments = Payment::whereHas('payable', function ($q) {
            $q->where('user_id', auth()->id());
        })->with('payable')->orderBy('created_at', 'desc')->paginate(20);

        return view('proprietors::payments.history', compact('payments'));
    }
}
