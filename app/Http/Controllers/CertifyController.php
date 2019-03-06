<?php

namespace App\Http\Controllers;

use App\User;

class CertifyController extends Controller
{
    public function show($slug)
    {
        if (! auth()->user()->is_admin) {
            abort(403);
        }

        return view('certify', ['user' => User::where('github_username', $slug)->first()]);
    }
}
