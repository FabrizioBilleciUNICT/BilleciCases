<?php

namespace App\Http\Controllers;

use App\FlightCaseComponent;
use App\Order;
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

    public function admin() {
        if(Auth::user() == null) return view('login');

        if(Auth::user()->email === 'fabriziobilleci7@gmail.com')//superuser
            return view ('admin_dashboard');

        return view('welcome');
    }


    public function dashboard() {
        if(Auth::user() == null) return view('login');

        if(Auth::user()->email === 'fabriziobilleci7@gmail.com') {//superuser
            return view('admin_dashboard');
        } else {
            $preventives_ = Order::all();
            $preventives = $preventives_->where('name', $preventives_->get('name'), Auth::user()->name);
            return view('dashboard', compact('preventives'));
        }
    }
}
