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
        // query untuk tampilkan kategori dengan mobil yang tersedia
        // $data = DB::table('categories')
        //     ->join('item_details', 'item_details.id_category', '=', 'categories.id')
        //     ->select('categories.type', DB::raw('COUNT(item_details.code_item) AS jumlah'))
        //     ->groupBy('categories.type')
        //     ->orderBy('categories.type')
        //     ->get();

        // query untuk tampilkan semua kategori
        $data = Category::get();
        return view('category', [
            'data' => $data
        ]);
    }

    public function categoryview($id)
    {
        // perbaikan query
        // pengambilan data dengan kategori mobil yang sesuai
        $data = DB::table('item_details')
            ->join('items', 'item_details.code_item', '=', 'items.code_item')
            ->select('items.nama', 'items.views')
            ->get();
        // $data = Category::where('type', $id)->get();
        return view('category_view', [
            'data' => $data,
            'nama' => $id
        ]);
    }

    public function brand()
    {
        // query untuk tampilkan brand dengan mobil yang tersedia
        // $data = DB::table('brands')
        //     ->join('item_details', 'item_details.id_brand', '=', 'brands.id')
        //     ->select('brands.brand', DB::raw('COUNT(item_details.code_item) AS jumlah'))
        //     ->groupBy('brands.brand')
        //     ->orderBy('brands.brand')
        //     ->get();

        // query untuk tampilkan semua brand
        $data = Brand::get();
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
