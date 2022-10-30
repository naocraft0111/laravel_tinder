<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Swipe;

class SwipeController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());


        // まず現在ログインしているidを取得し、相手側のidを取得、そしていいねの情報を取得
        Swipe::create([
            'from_user_id' => \Auth::user()->id,
            'to_user_id' => $request->input('to_user_id'),
            'is_like' => $request->input('is_like'),
        ]);

        return to_route('users.index');
    }
}
