<?php

namespace App\Http\Controllers;

use App\Preventive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller {

    public function welcome() {
        return view('welcome');
    }

    public function contact() {
        return view('contact');
    }

    public function about() {
        return view('about');
    }

    public function login() {
        return view('login');
    }

    public function order() {
        return view('neworder');
    }

    public function preventives() {
        $preventives_ = Preventive::all();
        if(Auth::user()->email === 'fabriziobilleci7@gmail.com')//superuser
            $preventives = $preventives_;
        else
            $preventives = $preventives_->where('name', $preventives_->get('name'), Auth::user()->name);
        return view('dashboard', compact('preventives'));
    }
}
