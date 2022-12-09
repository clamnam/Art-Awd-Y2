<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Patron;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PatronController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();


        $patrons = Patron::all();
        return view('admin.patrons.index')->with('patrons', $patrons);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Patron $patron)
    {
        //
        $user = Auth::user();


        // $patrons = Patron::all();
        return view('admin.patrons.create')->with('patron', $patron);


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
        $user = Auth::user();

        //makes each field required, if it does not the form will fail
        $request->validate([
            'name' => 'required',
            'address' => 'required'

        ]);

        //insert acquired data into db
        Patron::create([
            // 'uuid' => Str::uuid(),
            // 'patron_id' => Auth::id(),
            'name' => $request->name,
            'address' => $request->address

        ]);
        return to_route('admin.patrons.index');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Patron $patron)
    {
        //
        $user = Auth::user();


        if (!Auth::id()) {
            return abort(403);
        }

        //this function is used to get a patron by the ID.
        return view('admin.patrons.show')->with('patron', $patron);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Patron $patron)
    {
        $user = Auth::user();

        // if ($art->user_id != Auth::id()) {
        //     return abort(403);
        // }
        return view('admin.patrons.edit')->with('patron', $patron);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patron $patron)
    {
        //
        $user = Auth::user();

        // if ($art->user_id != Auth::id()) {
        //     return abort(403);
        // }
        $request->validate([
            'name' => 'required|max:120',
            'address' => 'required'

        ]);

        //insert and overwrite data in db
        $patron->update([
            'name' => $request->name,
            'address' => $request->address,

        ]);

        return to_route('admin.patrons.show', $patron);


        return to_route('admin.patrons.show', $patron)->with('success', 'patron updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patron $patron)
    {
        $user = Auth::user();

        $patron->arts()->delete();
        $patron->delete();
        return to_route('admin.patrons.index')->with('success', 'Patron successfully deleted ');

        //
    }
}
