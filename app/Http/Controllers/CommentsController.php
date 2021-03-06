<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentFormRequest;
use App\Comment;
use App\Http\Requests;

class CommentsController extends Controller


{
     public function newComment(CommentFormRequest $request)

     {

        $comment = new Comment(array(
        'post_id' => $request->get('post_id'),
        'content' => $request->get('content')
        ));
       
       
        $comment->save();
        
        return redirect()->back()->with('status', 'Your comment has been created!');
}
}