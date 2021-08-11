<?php

namespace App\Http\Controllers;

use App\kyc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isUser']);
    }

    public function profile()
    {
        return view('pengguna.profile');
    }

    public function kycverification()
    {
        if (Auth::user()->kyc == 0) {
            return view('pengguna.kyc');
        } else {
            return redirect(route('dashboard'));
        }
    }

    public function kycinput(Request $data)
    {
        kyc::insert([
            'username' => $data->username,
            'status' => '0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        dd($data->all());
    }
}
