<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function morebrands(Request $request)
    {
        $data = null;
        if ($request->ajax()) {
            $data = Brand::skip(8)->take(1000)->orderBy('brand')->get();
        }        
        return response($data);
    }
}
