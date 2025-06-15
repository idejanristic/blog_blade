<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class PagesController extends Controller
{
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
