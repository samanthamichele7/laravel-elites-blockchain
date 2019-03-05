<?php

namespace App\Http\Controllers;

use App\Question;
use App\User;
use Exception;
use GuzzleHttp\Client;

class ApplicationController extends Controller
{
    public function index()
    {
        return view('application', ['questions' => Question::with('answers')->get()]);
    }

    public function store()
    {
        auth()->user()->answers()->attach(request()->except('_token', 'name', 'github_username'));

        return redirect()->to('/certificate/' . auth()->user()->slug);
    }
}
