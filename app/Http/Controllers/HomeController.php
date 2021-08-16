<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $data = Item::get();
        return view('welcome', [
            'data' => $data
        ]);
    }

    public function category()
    {
        $data = DB::table('categories')
            ->join('item_details', 'item_details.id_category', '=', 'categories.id')
            ->select('categories.type', DB::raw('COUNT(item_details.code_item) AS jumlah'))
            ->groupBy('categories.type')
            ->orderBy('categories.type')
            ->get();
        return view('category', [
            'data' => $data
        ]);
    }

    public function categoryview($id)
    {
        // perbaikan query
        // pengambilan data dengan kategori mobil yang sesuai
        $data = Category::where('type', $id)->get();
        return view('category', [
            'data' => $data
        ]);
    }

    public function brand()
    {

        $data = DB::table('brands')
            ->join('item_details', 'item_details.id_brand', '=', 'brands.id')
            ->select('brands.brand', DB::raw('COUNT(item_details.code_item) AS jumlah'))
            ->groupBy('brands.brand')
            ->orderBy('brands.brand')
            ->get();
        return view('brand', [
            'data' => $data
        ]);
    }

    public function brandview($id)
    {
        # code...
    }

    public function profile($id)
    {
        # code...
    }
    public function search()
    {
        echo 'll';
    }
}
