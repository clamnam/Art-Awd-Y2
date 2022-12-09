<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Style;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StyleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $styles = Style::all();
        return view('user.styles.index')->with('styles', $styles);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Style $style)
    {
        //
        $user = Auth::user();

        $styles = Style::all();
        return view('user.styles.create')->with('style', $style);


        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $user = Auth::user();
        // //makes each field required, if it does not the form will fail
        // $request->validate([
        //     'name' => 'required',
        //     'description' => 'required'

        // ]);

        // //insert acquired data into db
        // Style::create([
        //     // 'uuid' => Str::uuid(),
        //     // 'patron_id' => Auth::id(),
        //     'name' => $request->name,
        //     'description' => $request->description

        // ]);
        // return to_route('user.styles.index');
        // //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Style $style)
    {
        //
        $user = Auth::user();

        if (!Auth::id()) {
            return abort(403);
        }

        //this function is used to get a style by the ID.
        return view('user.styles.show')->with('style', $style);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Style $style)
    {
        // $user = Auth::user();
        // // if ($art->user_id != Auth::id()) {
        // //     return abort(403);
        // // }
        // return view('user.styles.edit')->with('style', $style);
        // //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Style $style)
    {
        // //
        // $user = Auth::user();
        // // if ($art->user_id != Auth::id()) {
        // //     return abort(403);
        // // }
        // $request->validate([
        //     'name' => 'required|max:120',
        //     'description' => 'required'

        // ]);

        // //insert and overwrite data in db
        // $style->update([
        //     'name' => $request->name,
        //     'description' => $request->description,

        // ]);

        // return to_route('user.styles.show', $style);


        // return to_route('user.styles.show', $style)->with('success', 'style updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Style $style)
    {
        // $user = Auth::user();
        // $style->arts()->delete();
        // $style->delete();
        // return to_route('user.styles.index')->with('success', 'Style successfully deleted ');

        // //
    }
}
