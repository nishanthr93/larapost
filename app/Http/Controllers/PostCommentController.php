<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Mail\PostLiked;
use App\Models\Comment;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    public function __construct() {
        $this->middleware(['auth']);
    }

    public function index(Post $post)
    {
        $comments = Comment::with('user')->where('post_id', $post->id)->get();

        return view('comments.index',[
            'post' => $post,
            'comments' => $comments
        ]);
    }

    public function store(Post $post,Request $request)
    {
        $post->comments()->create([
            'user_id' => $request->user()->id,
            'comments' => $request->comment,
        ]);
             /*
        if ( (!$post->likes()->onlyTrashed()->where('user_id',$request->user()->id)->count() )
            &&  (!$post->whoLliked(auth()->user())) ) {

            Mail::to($post->user->email)->send(new PostLiked(auth()->user(),$post));

        }
        */

        return back();
    }

    public function destroy(Post $post,Request $request)
    {
        /*
        $request->user()->likes()->where('post_id',$post->id)->delete();
        */
        return back();
    }
}
