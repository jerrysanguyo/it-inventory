<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DataTables;

class AccountsController extends Controller
{
    public function index()
    {
        return view('admin.account');
    }

    public function accountsData()
    {
        $listOfAccount = User::select('id', 'name', 'email', 'role_id', 'created_at')->get();
        return DataTables::of($listOfAccount)
            ->addColumn('role', function ($account) {
                return $account->role_id == 1 ? 'admin' : 'encoder';
            })
            ->addColumn('action', function ($account) {
                return '<button class="btn btn-primary nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Role
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#" class="dropdown-item">Admin</a></li>
                                <li><a href="#" class="dropdown-item">User</a></li>
                            </ul>
                        </button>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}