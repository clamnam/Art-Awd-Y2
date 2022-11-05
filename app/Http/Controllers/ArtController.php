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
        'artist' => 'required'
        ]);


       art::create([
            'uuid' => Str::uuid(),
            'user_id' => Auth::id(),
            'title'=> $request->title,
            'description' =>$request->description,
            'genre' => $request->genre,
            'artist' => $request->artist,


        ]);

        return to_route('arts.index');
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
        if ($art->user_id != Auth::id()){
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
    public function edit($id)
    {
        //
    }
}
