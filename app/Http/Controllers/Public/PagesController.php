<?php

namespace App\Http\Controllers\Public;

use Auth;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function __construct()
    {
        view()->share('currentUser', Auth::user());
    }
    public function home(): View
    {
        return view(view: 'public.home');
    }
    public function about(): View
    {
        return view(view: 'public.about');
    }
    public function contact(): View
    {
        return view(view: 'public.contact');
    }
}
