<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\View;

class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');

        View::share('action', 'no_add');
        View::share('nav', 'users');
    }

    public function index()
    {
        return view('admin.pages.users.index');
    }
    public function users_list(){
          $users = User::all();
          dd($users);

    }
}
