<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
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

        if(AdminController::isAdmin())//superuser
            return view ('admin_dashboard');

        return view('welcome');
    }


    public function dashboard() {
        if(Auth::user() == null) return view('login');

        if(AdminController::isAdmin()) {//superuser
            $clients = count(User::all());
            $orders_ = Order::all();
            $orders = $orders_->where('status', $orders_->get('status'), AdminController::STATUS_ORDER[0]);
            $works = count($orders_);
            $done_orders = $orders_->where('status', $orders_->get('status'), AdminController::STATUS_ORDER[4]);
            $earned = 0 + $done_orders->reduce(function($carry, $value) { return $carry + (int)$value['price']; });

            return view('admin_dashboard', compact('clients', 'orders', 'works', 'earned'));
        } else {
            $preventives_ = Order::all();
            $preventives = $preventives_->where('name', $preventives_->get('name'), Auth::user()->name);
            return view('dashboard', compact('preventives'));
        }
    }
}
