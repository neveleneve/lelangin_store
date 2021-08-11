<?php

namespace App\Http\Controllers;

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

    public function cateedit($id)
    {
        $data = Category::where('id', $id)->get();
        return view('administrator.category_edit', [
            'data' => $data
        ]);
    }

    public function cateupdate(Request $data)
    {
        // dd($data->all());
        Category::where('id', $data->id)->update([
            'type' => $data->type
        ]);
        return redirect(route('category'))->with([
            'alert1' => 'Great!',
            'alert2' => 'Data successfully updated.',
            'color' => 'success'
        ]);
    }
}
