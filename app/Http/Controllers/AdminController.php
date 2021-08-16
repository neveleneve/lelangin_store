<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin']);
    }

    public function userlist(Request $data)
    {
        $search = null;
        if (isset($data->search)) {
            $user = User::where('role', 'user')
                ->orWhere([
                    ['name', 'LIKE', '%' . $data->search . '%'],
                    ['username', 'LIKE', '%' . $data->search . '%']
                ])
                ->get();
            $search = $data->search;
        } else {
            $user = User::where('role', 'user')->get();
        }
        return view('administrator.user', [
            'datauser' => $user,
            'search' => $search
        ]);
    }

    public function lelangmasuk($id = null)
    {
        if ($id == null) {
        } else {
        }
    }

    // Category Pages
    public function cate()
    {
        $data = Category::get();
        return view('administrator.category', [
            'data' => $data
        ]);
    }

    public function cateedit($id)
    {
        $data = Category::where('id', $id)->get();
        return view('administrator.category_edit', [
            'data' => $data
        ]);
    }

    public function cateupdate(Request $data)
    {
        Category::where('id', $data->id)->update([
            'type' => $data->type
        ]);
        return redirect(route('admincategory'))->with([
            'alert1' => 'Great!',
            'alert2' => 'Data successfully updated.',
            'color' => 'success'
        ]);
    }

    // Brand Pages
    public function brands()
    {
        $data = Brand::get();
        return view('administrator.brand', [
            'data' => $data
        ]);
    }

    public function brandsedit($id)
    {
        $data = Brand::where('id', $id)->get();
        return view('administrator.brand_edit', [
            'data' => $data
        ]);
    }
}
