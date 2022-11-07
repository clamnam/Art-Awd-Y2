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
        ////////////// Auth::id()v removed
        $arts = Art::where('user_id', Auth::id())->latest('updated_at')->paginate(5);
        return view('arts.index')->with('arts', $arts);
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

        $request->validate([
            'title' => 'required|max:120',
            'description' => 'required',
            'genre' => 'required',
            'artist' => 'required',
            'art_image' => 'file|image'
        ]);

        $art_image = $request->file('art_image');
        $extension = $art_image->getClientOriginalExtension();
        //the filename needs to be unique
        $filename = date('Y-m-d-His') . '_' . $request->input('title') . '.' . $extension;
        $path = $art_image->storeAs('public/images', $filename);



        Art::create([
            'uuid' => Str::uuid(),
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
    public function update(Request $request,Art $art)
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
        $filename = date('Y-m-d-His') . '_' . $request->input('title') . '.'. $extension;
        $path = $art_image->storeAs('public/images', $filename);

        $art->update([
            'title' => $request->title,
            'description' => $request->description,
            'genre' => $request->genre,
            'artist' => $request->artist,
            'art_image' => $filename
               ]);

        return to_route('arts.show',$art)->with('success', 'Art updated successfully');

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
