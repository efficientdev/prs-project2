<?php

namespace Modules\PrivateValidations\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\PrivateValidations\Http\Controllers\PrivateValidationsController;

class SectionFController  extends PrivateValidationsController
{
    protected $sectionKey = 'sectionF';

    protected $validationRules = [
        'last_renewal_date' => 'required|date',
        'renewal_receipt_2022' => 'required|file|mimes:pdf,jpg,png|max:5120',
        'renewal_receipt_2023' => 'required|file|mimes:pdf,jpg,png|max:5120',
        'renewal_receipt_2024' => 'required|file|mimes:pdf,jpg,png|max:5120',
        'renewal_receipt_2025' => 'required|file|mimes:pdf,jpg,png|max:5120',
        'expiry_date' => 'required|date',
        'paid_renewal_fees' => 'required|in:YES,NO',
    ];
}
