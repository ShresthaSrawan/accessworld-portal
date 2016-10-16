<?php

namespace App\Http\Controllers;

use App\Models\Page;

use App\Http\Requests;

class PageController extends Controller
{
    /**
     * @param Page $page
     * @return mixed
     */
    public function show(Page $page)
    {
        return view($page->view, compact('page'));
    }
}
