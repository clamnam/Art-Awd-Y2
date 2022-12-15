<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // all change home route depending on user role
    public function index(Request $request)
    {
        $user = Auth::user();
        $home = 'home';

        if ($user->hasRole('admin')) {
            $home = 'admin.arts.index';
        } else if ($user->hasRole('user')) {
            $home = 'user.arts.index';
        }
        return redirect()->route($home);
    }
    public function patronIndex(Request $request)
    {
        $user = Auth::user();
        $home = 'home';

        if ($user->hasRole('admin')) {
            $home = 'admin.patrons.index';
        } else if ($user->hasRole('user')) {
            $home = 'user.patrons.index';
        }
        return redirect()->route($home);
    }
    public function styleIndex(Request $request)
    {
        $user = Auth::user();
        $home = 'home';

        if ($user->hasRole('admin')) {
            $home = 'admin.styles.index';
        } else if ($user->hasRole('user')) {
            $home = 'user.styles.index';
        }
        return redirect()->route($home);
    }
}
