<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocsController extends Controller
{
    /**
     * Display the full interactive project documentation page.
     */
    public function index()
    {
        return view('pages.docs');
    }
}
