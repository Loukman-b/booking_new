<?php

namespace App\Http\Controllers;

use App\Models\Package;

class HomeController extends Controller
{
    public function index()
    {
        // Haal alleen actieve pakketten op voor de eerste 3
        $activePackages = Package::where('active', true)->take(3)->get();
        // Haal de overige pakketten op (voor 'meer pakketten')
        $morePackages = Package::where('active', true)->skip(3)->take(100)->get();
        return view('home', compact('activePackages', 'morePackages'));
    }
}
