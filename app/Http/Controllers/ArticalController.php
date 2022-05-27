<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\URL;
use App\Models\Artical;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ArticalController extends Controller
{
    public function index () {
        return view('articals.index', [
            'articals' => Artical::latest()->paginate(5),
        ]);
    }

    public function detail ($id) {
        return view('articals.detail', [
            'artical' =>Artical::find($id),
            
        ]);
    }

    public function add () {
        
        return view('articals.add', [
            'categories' => Category::all(),
        ]);
    }

    public function create () {
        $formData = request()->validate([
            'title'=>'required',
            'body'=>'required',
            'category_id'=>'required',
        ]);
        $formData['user_id']=auth()->user()->id;
        
        Artical::create($formData);

        return redirect('/dashboard')->with('success', 'Blog created successfully!');
    }

    public function edit ($id) {
        return view('articals.edit', [
            'artical' => Artical::find($id),
            'categories' => Category::all()
        ]);
    }

    public function update ($id) {
        $artical = Artical::find($id);
        $formData = request()->validate([
            'title'=>'required',
            'body'=>'required',
            'category_id'=>'required',
        ]);
        $formData['user_id']=auth()->user()->id;
        
        $artical->update($formData);

        return redirect('/dashboard')->with('success', 'Blog updated successfully!');
    }


    public function delete ($id) {
        $artical = Artical::find($id);
        if (Gate::allows('artical', $artical)) {
            $comments = $artical->comments;
            foreach ($comments as  $comment) {
                $comment->delete();
            }
            $artical->delete();
            return redirect('/dashboard')->with('success', 'Blog deleted successfully!');
        }else{
        return redirect('/')->with('success', 'Unthorize!');
        }

    }
    
}
