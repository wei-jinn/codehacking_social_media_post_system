<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersCreateRequest;
use App\Http\Requests\UsersEditRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    //

    public function index()
    {

        $users = User::all();

        return view('admin.users.index', compact('users'));
//        return view('admin.users.index', $users);
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
        $user = User::findOrFail($id);

        $roles = Role::lists('name' , 'id') ->all();

       return view('admin.users.edit', compact('user' , 'roles'));
    }

    public function update(UsersEditRequest $request, $id)
    {

        $user = User::findOrFail($id);

        if(trim($request->password) == ''){

            $input = $request->except('password');

        }else{
            $input = $request->all();
            $input['password'] = bcrypt($request->password);

        }

        if($file = $request->file('photo_id')){

            $name = time() . $file->getClientOriginalName();

            $file->move('images' , $name);

            $photo=Photo::create(['file' => $name]);

            $input['photo_id'] = $photo->id;
        }
        $user->update($input);
        return redirect('/admin/users');
    }

    public function store(UsersCreateRequest $request)
    {

        if(trim($request->password) == ''){

            $input = $request->except('password');

        }else{
            $input = $request->all();
            $input['password'] = bcrypt($request->password);

        }


     if($file = $request->file('photo_id'))
     {
         $name = time() . $file->getClientOriginalName();
         $file->move('images', $name);
         $photo = Photo::create(['file'=> $name]);
         $input['photo_id'] = $photo->id;
     }

     User::create($input);

     return redirect('/admin/users');


    }


    public function destroy($id)
    {
        $name = User::find($id)->name;
        $user = User::findOrFail($id);
        unlink(public_path() . $user->photo->file);
        $user->delete();

        Session::flash('deleted_user', 'The user ' . $name . ' has been deleted');

        return redirect('/admin/users');

    }

}
