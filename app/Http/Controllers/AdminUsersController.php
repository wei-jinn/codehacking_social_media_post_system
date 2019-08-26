<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersCreateRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminUsersController extends Controller
{
    //

    public function index()
    {

        $users = User::all();

        return view('admin.users.index', compact('users'));
    }


    public function create()
    {
        $roles = Role::lists('name', 'id')->all();

        return view('admin.users.create',compact('roles'));
    }

    public function show($id)
    {
        return view('admin.users.show');
    }

    public function edit($id)
    {
        return view('admin.users.edit');
    }

    public function store(UsersCreateRequest $request)
    {
     User::create($request->all());
     return redirect('/admin/users');
//        return $request->all();

    }


}
