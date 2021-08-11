<?php

use App\kyc;
use Illuminate\Support\Facades\Auth;

function kycstatus()
{
    $username = Auth::user()->username;
    $kycinput = kyc::where([
        'username' => $username
    ])
        ->count();
    return $kycinput;
}
