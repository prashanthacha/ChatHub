<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Logout extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        Auth::Logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success','you\'ve successfully logged out!');
    }
}
