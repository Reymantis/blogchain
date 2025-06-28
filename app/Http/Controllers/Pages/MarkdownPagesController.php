<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class MarkdownPagesController extends Controller
{
    public function about_us(): View
    {
        return view('pages.markdown', [
            'title' => 'About Us',
            'file' => 'about-us'
        ]);
    }


    public function privacy_policy(): View
    {
        return view('pages.markdown', [
            'title' => 'Privacy Policy',
            'file' => 'privacy-policy'
        ]);
    }
}
