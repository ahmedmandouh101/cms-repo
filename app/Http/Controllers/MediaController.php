<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;

class MediaController extends Controller
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
        $media= Media::paginate(2);
        return view('media.index' , ['media' => $media]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('media.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $file = $request->file('file');
        $photoName = $file->getClientOriginalName();
        $updatedPhotoName = time(). '_' . $photoName;
        $file->move('photos' , $updatedPhotoName);
        $media = new Media;
        $media->name = $updatedPhotoName;
        $media->user_id =auth()->user()->id;
        $media->save();

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $media =Media::findOrFail($id);
        return view('media.show' , ['media' => $media] );
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
        $media = Media::findOrFail($id);
        unlink('./photos/' . $media->name);
        $media->delete();
        return redirect('/media')->with('delete' , 'photo Deleted');
    }
}
