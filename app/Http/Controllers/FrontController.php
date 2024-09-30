<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function about ()
    {
        return view('about');
    }
    public function bible_search ()
    {
        return view('bible-search');
    }
    public function blog ()
    {
        return view('blog');
    }
    public function blog_detail ()
    {
        return view('blog-detail');
    }
    public function calculator ()
    {
        return view('calculator');
    }
    public function calendar ()
    {
        return view('calendar');
    }
    public function contact ()
    {
        return view('contact');
    }
    public function custom_ciphers ()
    {
        return view('custom-ciphers');
    }
    public function date_calculator ()
    {
        return view('date-calculator');
    }
    public function faq ()
    {
        return view('faq');
    }
    public function greek_calculator ()
    {
        return view('greek-calculator');
    }
    public function hebrew_calculator ()
    {
        return view('hebrew-calculator');
    }
    public function memberships ()
    {
        return view('memberships');
    }
    public function monthly_calendar ()
    {
        return view('monthly-calendar');
    }
    public function nostalgia_calculators ()
    {
        return view('nostalgia-calculators');
    }
    public function nostalgia_calculators_basic ()
    {
        return view('nostalgia-calculators-basic');
    }
    public function nostalgia_calculators_classic ()
    {
        return view('nostalgia-calculators-classic');
    }
    public function nostalgia_calculators_date ()
    {
        return view('nostalgia-calculators-date');
    }
    public function nostalgia_calculators_nextgen ()
    {
        return view('nostalgia-calculators-nextgen');
    }
    public function number_properties ()
    {
        return view('number-properties');
    }
    public function product_detail ()
    {
        return view('product-detail');
    }
    public function shop ()
    {
        return view('shop');
    }
}
