<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Swipe;

class UserController extends Controller
{
    public function index()
    {
        // すでにswipeしたuserを省いて、swipeしていないuserを1つ取得する

        // すでにswipeしたuser ids を取得
        $swipedUserIds = Swipe::where('from_user_id', \Auth::user()->id)->get()->pluck('to_user_id');

        // swipeしていないuserを1つ取得

        // auth userではないuserを1つ取得
        // whereNotIn()によって$swipedUserIdsに含まれていないidを取得することができる
        $user = User::where('id', '<>', \Auth::user()->id)-> whereNotIn('id', $swipedUserIds)->first();

        return view('pages.user.index', compact('user'));
    }
}
