<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect; 

use Inertia\Inertia;

class TestController extends Controller
{

    public function test3()
    {

        return Inertia::render('Blank');
    }

    function test()
    {
        $path = storage_path() . "/app/public/customers-large.json";
        return Inertia::render('Test', [
            'demo' => file_get_contents($path)
        ]);
    }

    function upload()
    {
        return true;
    }

    public function store()
    {
        $slug = Str::slug('Laravel 5 Frameworkü', '-');
        return Redirect::route('test3')->with('success', 'Contact created.->' . $slug);
    }
}
