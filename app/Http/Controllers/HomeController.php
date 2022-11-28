<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
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
    public function publisherIndex(Request $request)
    {
        $user = Auth::user();
        $home = 'home';

        if ($user->hasRole('admin')) {
            $home = 'admin.label.index';
        } else if ($user->hasRole('user')) {
            $home = 'user.label.index';
        }
        return redirect()->route($home);
    }
}
