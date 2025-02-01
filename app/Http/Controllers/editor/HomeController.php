<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman dashboard editor.
     *
     * @return View
     */
    public function index(): View
    {
        return view('pages.editor.dashboard.index');
    }
}
