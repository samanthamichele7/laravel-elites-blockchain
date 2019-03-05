<?php

namespace App\Http\Controllers;

use App\User;

class CertificateController extends Controller
{
    public function show($slug)
    {
        return view('certificate', ['user' => User::where('github_username', $slug)->first()]);
    }
}
