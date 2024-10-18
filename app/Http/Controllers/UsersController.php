<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Tweet;
use App\Models\Follower;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        //現在の認証ユーザーのIDを取得して他のユーザーを取得する
        $all_users = $user->getAllUsers(auth()->user()->id);

        return view('users.index',[
            'all_users' => $all_users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user , Tweet $tweet , Follower $follower)
    {

        $login_user = auth()->user();
        // ログインユーザーが表示されたユーザーをフォローしているか
        $is_following = $login_user->isFollowing($user->id);
        // ログインユーザーが表示されたユーザーからフォローされているか
        $is_followed = $login_user->isFollowed($user->id);
        //投稿の内容取得
        $timelines = $tweet->getUserTimeLine($user->id);
        //ツイートの数
        $tweet_count = $tweet->getTweetCount($user->id);
        //フォローの数
        $follow_count = $follower->getFollowCount($user->id);
        //フォロワーの数
        $follower_count = $follower->getFollowerCount($user->id);

        return view('users.show',[
            'user' => $user,
            'is_following' => $is_following,
            'is_followed' => $is_followed,
            'timelines' => $timelines,
            'tweet_count' => $tweet_count,
            'follow_count' => $follow_count,
            'follower_count' => $follower_count
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    // フォローする
    public function follow(User $user)
    {
        $follower = auth()->user();
        // フォローしているかを確認
        $is_following = $follower->isFollowing($user->id);
        if (!$is_following) {
            $follower->follow($user->id);
            return back();
        }
    }
    // フォロー解除
    public function unfollow(User $user)
    {
        $follower = auth()->user();
        // フォローしているか確認
        $is_following = $follower->isFollowing($user->id);
        if ($is_following) {
            $follower->unfollow($user->id);
            return back();
        }
    }

}
