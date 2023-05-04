<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;

class postController extends Controller
{



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth' , ['except' => ['index' , 'show']]);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = post::paginate(3);
        return view('posts.indx', ['post' => $post]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request , [
            'title' => 'required' ,
            'body' => 'required' ,
            'cover_image'=> 'image|nullable|max:1999'
        ]);
        $fileNameToStore =null;
        if($request->hasFile('cover_image'))
        {
            $file = $request->file('cover_image');
            $fileName =$file->getClientOriginalName();
            $fileNameToStore = time() . '_' . $fileName;
            $file->move('covers' , $fileNameToStore);
        }else{
            $fileNameToStore = 'placeholder.jpg';
        }
        $post =new post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();
        // post::create($request->all());
        return redirect('/post')->with('success' , 'post created ');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = post::findOrFail($id);
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = post::findOrFail($id);
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = post::findOrFail($id);
        $post->title = $request->title;
        $post->body =$request->body;
        $post->save();
        return redirect('/post')->with('success','post updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = post::findOrFail($id);
        $post->delete();
        return redirect('/post')->with('delete' , 'post Deleted');
    }
}
