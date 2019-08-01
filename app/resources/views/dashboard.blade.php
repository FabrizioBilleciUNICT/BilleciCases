@extends('layouts.app')

@section('content')
<div class="container-admin">
    <div class="cardx-top card-alone">
        <div class="cardx-dark">
            <div class="card-body">
                <p class="p-dashboard-header">Dashboard</p>
                <table class="table">
                <thead>
                <tr>
                    <th>Type</th>
                    <th>Measures</th>
                    <th>Color</th>
                    <th>Handles</th>
                    <th>Shaped</th>
                    <th>Price</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($preventives as $p)
                    <tr>
                        <td>{{$p->type}}</td>
                        <td>{{$p->measures}}</td>
                        <td>{{$p->color}}</td>
                        <td>{{$p->handles}}</td>
                        <td>{{$p->shaped}}</td>
                        <td>{{$p->price}}</td>
                        <td>{{$p->status}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <br><br>
            <button class="btn-standard" style="position: sticky; left: 0px;">
                <a href="{{action('OrderController@newOrder')}}">New Case</a>
            </button>
        </div>
        </div>
    </div>
</div>
@endsection
