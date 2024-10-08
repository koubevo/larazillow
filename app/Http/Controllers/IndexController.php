<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        //dd(Auth::check());
        return inertia('Index/Index', [
            'message' => 'hello'
        ]);
    }

    public function show()
    {
        return inertia('Index/Show');
    }
}
