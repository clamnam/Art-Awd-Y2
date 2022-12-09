<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Art;
use App\Models\Patron;
use App\Models\Style;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Auth;



class ArtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $arts = Art::with('patron')
            ->with('style')
            ->get();

        // acquire the table data when the user id of the user matches user_id values in the user column .also make it into 5 pages
        // $arts = Art::where('user_id', Auth::id())->latest('updated_at')->paginate(5);
        return view('admin.arts.index')->with('arts', $arts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $patrons = Patron::all();
        $styles = Style::all();
        return view('admin.arts.create')->with('patrons', $patrons)->with('styles', $styles);
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
        $user = Auth::user();
        $user->authorizeRoles('admin');
        //makes each field required, if it does not the form will fail
        $request->validate([
            'title' => 'required|max:120',
            'description' => 'required',
            'genre' => 'required',
            'styles' => ['required', 'exists:styles,id'],
            'patron_id' => 'required',
            'artist' => 'required',
            'art_image' => 'file|image'
        ]);
        //images
        $art_image = $request->file('art_image');
        $extension = $art_image->getClientOriginalExtension();
        $filename = date('Y-m-d-His') . '_' . $request->input('title') . '.' . $extension;
        $path = $art_image->storeAs('public/images', $filename);


        //insert acquired data into db
        $art = Art::create([
            // 'uuid' => Str::uuid(),
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'patron_id' => $request->patron_id,

            'genre' => $request->genre,
            'artist' => $request->artist,
            'art_image' => $filename


        ]);
        $art->style()->attach($request->styles);

        return to_route('admin.arts.index');
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
        $user = Auth::user();
        $user->authorizeRoles('admin');

        if (!Auth::id()) {
            return abort(403);
        }

        //this function is used to get a art by the ID.
        return view('admin.arts.show')->with('art', $art);
    }
    /**
     * Show the form for editing the specified resource read the
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Art $art)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
        // if ($art->user_id != Auth::id()) {
        //     return abort(403);
        // }
        $patrons = Patron::all();
        return view('admin.arts.edit')->with('art', $art)->with('patrons', $patrons);
    }
    public function update(Request $request, Art $art)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
        // if ($art->user_id != Auth::id()) {
        //     return abort(403);
        // }
        $request->validate([
            'title' => 'required|max:120',
            'description' => 'required',
            'patron_id' => 'required',
            'styles' => ['required', 'exists:styles,id'],
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
            'patron_id' => $request->patron_id,
            'genre' => $request->genre,
            'artist' => $request->artist,
            'art_image' => $filename

        ]);



        return to_route('admin.arts.show', $art);


        return to_route('admin.arts.show', $art)->with('success', 'Art updated successfully');
    }


    public function destroy(Art $art)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
        // if ($art->user_id != Auth::id()) {
        //     return abort(403);
        // }
        $art->delete();
        return to_route('admin.arts.index')->with('success', 'Art successfully deleted ');
    }
}
