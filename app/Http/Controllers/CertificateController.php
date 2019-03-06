<?php

namespace App\Http\Controllers;

use App\User;

class CertificateController extends Controller
{
    public function index()
    {
        return view('status');
    }

    public function show($slug)
    {
        $user = User::where('github_username', $slug)->first();

        if (!$user) {
            abort(404);
        }
        
        return view('certificate', ['user' => $user]);
    }
}
