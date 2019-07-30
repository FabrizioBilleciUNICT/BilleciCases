<?php

namespace App\Http\Controllers;

use App\FlightCaseComponent;
use App\FlightCaseTemplate;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function components() {
        if(Auth::user() == null) return view('login');

        if(Auth::user()->email === 'fabriziobilleci7@gmail.com') { //superuser
            $components_ = FlightCaseComponent::all();

            $components = [];
            foreach ($components_ as $c){
                $components[$c->name] = $c->price;
            }

            return view('admin_components', compact('components'));
        }

        return view('welcome');
    }


    protected function createComponent(string $name, string $price){
        $component = new FlightCaseComponent();

        $component->name = $name;
        $component->price = $price;

        return $component;
    }

    public function createComponents(){
        if(Auth::user() == null) return view('login');

        if(Auth::user()->email === 'fabriziobilleci7@gmail.com') {
            $components = FlightCaseComponent::all();
            if(count($components) > 0) FlightCaseComponent::truncate();

            $this->createComponent('surface', '0.01')->save();
            $this->createComponent('surface_black', '0.01')->save();
            $this->createComponent('surface_blue', '0.03')->save();
            $this->createComponent('surface_red', '0.02')->save();
            $this->createComponent('surface_yellow', '0.03')->save();
            $this->createComponent('handle', '30')->save();
            $this->createComponent('shape', '60')->save();
            $this->createComponent('noShape', '20')->save();

            return $this->components();
        }

        return redirect('welcome');
    }

    public function updateComponent(string $name, Request $request){
        $component = new FlightCaseComponent();

        $component->name = $name;
        $component->price = $request->get($name);

        return $component;
    }

    public function updateComponents(Request $request) {
        $this->updateComponent('surface', $request)->save();
        $this->updateComponent('surface_black', $request)->save();
        $this->updateComponent('surface_blue', $request)->save();
        $this->updateComponent('surface_red', $request)->save();
        $this->updateComponent('surface_yellow', $request)->save();
        $this->updateComponent('handle', $request)->save();
        $this->updateComponent('shape', $request)->save();
        $this->updateComponent('noShape', $request)->save();

        return $this->components();
    }



    public function templates() {
        if(Auth::user() == null) return view('login');

        if(Auth::user()->email === 'fabriziobilleci7@gmail.com') { //superuser
            $templates_ = FlightCaseTemplate::all();

            $templates = [];
            foreach ($templates_ as $c){
                $templates[$c->name] = [
                    'name' => $c->name,
                    'color' => $c->color,
                    'measures' => $c->measures,
                    'shaped' => $c->shaped,
                    'handles' => $c->handles
                ];
            }

            return view('admin_templates', compact('templates'));
        }

        return view('welcome');
    }



    protected function createTemplate(string $name, string $color, string $measures, string $shaped, string $handles){
        $template = new FlightCaseTemplate();

        $template->name = $name;
        $template->color = $color;
        $template->measures = $measures;
        $template->shaped = $shaped;
        $template->handles = $handles;

        return $template;
    }

    public function createTemplates(){
        if(Auth::user() == null) return view('login');

        if(Auth::user()->email === 'fabriziobilleci7@gmail.com') {
            $templates = FlightCaseTemplate::all();
            if(count($templates) > 0) FlightCaseTemplate::truncate();

            $this->createTemplate('Custom', 'Black', '40*40*40', '0', '1')->save();
            $this->createTemplate('Piano', 'Black', '50*100*30', '1', '2')->save();
            $this->createTemplate('Pizza', 'Red', '40*40*60', '0', '1')->save();
            $this->createTemplate('Telescope', 'Yellow', '100*60*60', '1', '4')->save();
            $this->createTemplate('Cables', 'Blue', '60*50*50', '0', '4')->save();

            return redirect('admin_templates');
        }

        return redirect('welcome');
    }

    public function orders() {
        if(Auth::user() == null) return view('login');

        if(Auth::user()->email === 'fabriziobilleci7@gmail.com') {//superuser
            $preventives = Order::all();
            return view('admin_orders', compact('preventives'));
        }

        return view('welcome');

    }




}
