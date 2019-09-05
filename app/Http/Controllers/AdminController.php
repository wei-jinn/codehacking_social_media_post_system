<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Category;
use App\Comment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function index(){

        $usersCount = User::count();
        $postsCount = Post::count();
        $categoriesCount = Category::count();
        $commentsCount = Comment::count();

        return view('admin/index',
            compact(
                'usersCount',
            'postsCount',
            'categoriesCount',
            'commentsCount'));

    }
}
