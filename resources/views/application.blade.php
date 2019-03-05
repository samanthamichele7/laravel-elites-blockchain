@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="max-w-2xl rounded overflow-hidden shadow-lg bg-white m-8 pb-16">
            <h2 class="text-grey-darker text-center font-thin text-4xl mb-6 pt-16 pb-8">
                Laravel Elites Application
            </h2>

            <div class="px-8 md:px-32">
                @if ($errors->any())
                    <div class="bg-red-lightest border border-red-light text-red-dark px-4 py-5 mb-8 rounded relative" role="alert">
                        <p class="font-bold pb-4">Oops! We are missing some required info for your application. Do you even want to be elite?</p>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="block text-grey-darker text-lg font-bold mb-8">
                    Hello, {{ auth()->user()->name }}! Let's find out if you're elite.
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                    <a href="{{ route('logout') }}"
                        class="text-orange hover:text-orange-darker text-sm"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        (Change user)
                    </a>
                </div>
                
                <form action="/application" method="POST">
                    @csrf
                    @foreach($questions as $question)
                        <fieldset class="pb-8">
                            <legend class="block text-grey-darker text-sm font-bold mb-4">{{ $question->text }}</legend>

                            @foreach($question->answers as $answer)
                                <div class="block text-left pb-4">
                                    <input type="radio" id="{{ $answer->id }}" value="{{ $answer->id }}" name="{{ $question->id }}" class="mr-4 shadow py-2 px-3 text-grey-darker leading-tight focus:outline-none">
                                    <label for="{{ $answer->id }}" class="text-sm font-grey-darker">{{ $answer->text }}</label>
                                </div>
                            @endforeach
                        </fieldset>
                    @endforeach

                    <div class="text-center">
                        <button type="submit" class="bg-orange-dark hover:bg-orange-darker text-white font-bold py-2 px-4 rounded-full">
                            Am I Elite?
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
