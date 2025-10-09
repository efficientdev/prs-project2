<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ public_path('css/pdf2.css') }}">
    <title>{{ $title }}</title>
    <style>
        /*body {
            font-family: DejaVu Sans, sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }*/
        h1 {
            /*color: #6366F1;*/
        }
        .g{
            display: grid;
            grid-gap: 1rem;
            grid-template-columns: 1fr 1fr;
        }
        .leftie{
            display: inline-block; width: 48%;  padding: 10px;text-align: right;
        }
        .rightie{
            display: inline-block; width: 48%;  padding: 10px; margin-left: 4%;
        }
    </style>
</head>
<body style="margin: 5% 10%">
    
    <div class="container">
    <table width="100%" height="300">
        <tr>
            <td align="center" valign="middle">
                <div style="padding: 20px;  ">
                   <img src="{{ public_path('img/logo2.jpg') }}" alt="Logo" width="200"> 
                </div>
            </td>
        </tr>
    </table>
 


    <table width="100%" cellpadding="1">
        <tr>
            <td width="50%">
                <div style="    text-transform: uppercase;">{{ $title??'' }} Receipt</div>
            </td>
            <td width="50%">
                <div style=" float: right; ">Paid on: {{$payment_date??''}}</div>
                 
            </td>
        </tr>
        <tr>
            <td width="50%"> 
            </td>
            <td width="50%"> 
            </td>
        </tr>
    </table>
 
    <table width="100%" height="300">
        <tr>
            <td align="center" valign="middle"><!--align="center" valign="middle"-->
                <div style="padding: 20px;  "> 
                  <h1>By {{ $name??'' }}</h1>
                </div>
            </td>
        </tr>
    </table>

    <h1 style="  text-align: center;">{{$type??'n/a'}}</h1>

    <table width="100%" cellpadding="1">
        <tr>
            <td width="50%">
                <div style="    text-transform: uppercase;">Email</div>
            </td>
            <td width="50%">
                <div style=" float: right;text-transform: uppercase; ">Phone</div>
                 
            </td>
        </tr>
        <tr>
            <td width="50%"> 
                <div style=" "> {{ $email??'' }}</div> 
            </td>
            <td width="50%"> 
    <div style=" float: right; text-align: right;">{{ $phone??'' }}</div> 
            </td>
        </tr>
    </table>
 
 
       <!-- <div class="header">
            <div class="receipt-title">Payment Receipt</div>
            <div>Date: {{ date('Y-m-d') }}</div>
        </div>-->

        <table class="table" style="margin-bottom: 5%;margin-top: 5%;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Reference</th>
                    <th>Channel</th>
                    <th class="text-right">Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $i => $item)
                    @if($item['status']=="approved")<tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $item['reference'] }}</td>
                        <td>{{$item['payment_type']??''}}</td>
                        <td class="text-right">₦{{ number_format($item['meta']['amount'], 2) }}</td>
                    </tr>@endif
                @endforeach
            </tbody>
        </table>

<div style="margin-bottom: 5%;margin-top: 5%;">
    <div style=" float: right; text-align: right;">Downloaded on: {{ $date??'' }}</div> </div>
        <div class="footer">
            <p>Thank you for your payment.</p>
        </div>
    </div> 
    <!--<table width="100%" cellpadding="1">
        <tr>
            <td width="50%">
                <div style="  float: right; text-transform: uppercase;">Proprietor Id:</div>
            </td>
            <td width="50%">
                <div style="  ">{{ $id }}</div>
            </td>
        </tr>
    </table>-->

 
  
</body>
</html>
