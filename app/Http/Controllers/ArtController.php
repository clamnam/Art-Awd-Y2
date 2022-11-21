<?php

namespace App\Http\Controllers;

use App\Models\Art;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class ArtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // acquire the table data when the user id of the user matches user_id values in the user column .also make it into 5 pages
        $arts = Art::where('user_id', Auth::id())->latest('updated_at')->paginate(5);
        return view('arts.index')->with('arts', $arts);
        //
        // $arts->each(function($art){
        //     dump($art->title);

        // $arts = Art::all();
        // dd($arts);
        // return view('arts.index')->with('arts',$arts);
        // });
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('arts.create');
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //makes each field required, if it does not the form will fail
        $request->validate([
            'title' => 'required|max:120',
            'description' => 'required',
            'genre' => 'required',
            'artist' => 'required',
            'art_image' => 'file|image'
        ]);
        //images
        $art_image = $request->file('art_image');
        $extension = $art_image->getClientOriginalExtension();
        $filename = date('Y-m-d-His') . '_' . $request->input('title') . '.' . $extension;
        $path = $art_image->storeAs('public/images', $filename);


        //insert acquired data into db
        Art::create([
            // 'uuid' => Str::uuid(),
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'genre' => $request->genre,
            'artist' => $request->artist,
            'art_image' => $filename


        ]);

        return to_route('arts.index')->with('success', 'Art created successfully');
        //
    }
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Art $art)
    {
        //if the id of the user who generated does not match the current user forbid access
        if ($art->user_id != Auth::id()) {
            return abort(403);
        }
        return view('arts.show')->with('art', $art);
    }
    /**
     * Show the form for editing the specified resource
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Art $art)
    {
        if ($art->user_id != Auth::id()) {
            return abort(403);
        }
        return view('arts.edit')->with('art', $art);
        //
    }
    public function update(Request $request, Art $art)
    {
        if ($art->user_id != Auth::id()) {
            return abort(403);
        }
        $request->validate([
            'title' => 'required|max:120',
            'description' => 'required',
            'genre' => 'required',
            'artist' => 'required',
            'art_image' => 'required'
        ]);
        $art_image = $request->file('art_image');
        //the filename needs to be unique
        $extension = $art_image->getClientOriginalExtension();
        $filename = date('Y-m-d-His') . '_' . $request->input('title') . '.' . $extension;
        $path = $art_image->storeAs('public/images', $filename);

        //insert and overwrite data in db
        $art->update([
            'title' => $request->title,
            'description' => $request->description,
            'genre' => $request->genre,
            'artist' => $request->artist,
            'art_image' => $filename
        ]);

        return to_route('arts.show', $art)->with('success', 'Art updated successfully');
    }


    public function destroy(Art $art)
    {
        if ($art->user_id != Auth::id()) {
            return abort(403);
        }
        $art->delete();
        return to_route('arts.index')->with('success', 'Art successfully deleted ');
    }
}
