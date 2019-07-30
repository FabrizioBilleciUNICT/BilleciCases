@extends('layouts.admin_app')

@section('content')
<div class="container-admin">
    <div class="cardx-top">
        <div class="cardx-dark card-3col">
            <div class="card-body" style="display: flex;">
                <div class="card-dashboard-image"><img src="{{asset('img/menu.png')}}"></div>
                <div class="card-dashboard-text">
                    <div>
                        <p id="p-dashboard-clients" class="p-dashboard-value">0</p>
                        <p class="p-dashboard-title">CLIENTS</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="cardx-dark card-3col">
            <div class="card-body" style="display: flex;">
                <div class="card-dashboard-image"><img width="100" height="100" src="{{asset('img/menu.png')}}"></div>
                <div class="card-dashboard-text">
                    <div>
                        <p id="p-dashboard-works" class="p-dashboard-value">0</p>
                        <p class="p-dashboard-title">WORKS</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="cardx-dark card-3col">
            <div class="card-body" style="display: flex;">
                <div class="card-dashboard-image"><img width="100" height="100" src="{{asset('img/menu.png')}}"></div>
                <div class="card-dashboard-text">
                    <div>
                        <p id="p-dashboard-earned" class="p-dashboard-value">0€</p>
                        <p class="p-dashboard-title">EARNED</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="cardx-dark">
        <div class="card-body">
            <p class="p-dashboard-header">New Orders</p>
            <table class="table">
                <thead>
                <tr>
                    <th>Type</th>
                    <th>Measures</th>
                    <th>Color</th>
                    <th>Handles</th>
                    <th>Shaped</th>
                    <th>Price</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $p)
                <tr>
                    <td>{{$p->type}}</td>
                    <td>{{$p->measures}}</td>
                    <td>{{$p->color}}</td>
                    <td>{{$p->handles}}</td>
                    <td>{{$p->shaped}}</td>
                    <td>{{$p->price}}</td>
                    <td>{{$p->name}}</td>
                    <td>{{$p->email}}</td>
                    @endforeach
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="cardx-dark">
        <div class="card-body">
            <p class="p-dashboard-header">Stats</p>

        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $($('#mySidenav a')[1]).addClass('color-accent');
    });
</script>
@endsection
