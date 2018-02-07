<?php

namespace Modules\Pages\Http\Controllers;

use App\Http\Controllers\Controller;
use Location;
use Modules\Pages\Page;

class PagesController extends Controller
{
    public function index()
    {
        echo Location::getLocale();

        dd();

        $pages = Page::all();

        return view('Page::index', [
            'pages' => $pages
        ]);
    }
}