<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{

    public function add () {
        $formData = request()->validate([
            'content'=>'required',
            'artical_id'=>'required',
        ]);
        $formData['user_id']=auth()->user()->id;
        
        Comment::create($formData);
        return back();
    }

    public function delete ($id) {
        $comment=Comment::find($id);
        if (Gate::allows('comment', $comment)) {
            $comment->delete();
        }
        return back();
    }
}
