@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Dashboard</div>

        <div class="card-body">
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
                        <th colspan="2">Actions</th>
                    @if(Auth::user()->email === 'fabriziobilleci7@gmail.com')
                        <th>Name</th>
                        <th>Email</th>
                    @endif
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
                            <td class="td-status">{{$p->status}}</td>
                        @if(Auth::user()->email === 'fabriziobilleci7@gmail.com' || $p->status <= 1)
                            <td><a href="{{action('OrderController@edit', $p->id)}}" class="btn-edit">Edit</a></td>
                            <td>
                                <form action="{{action('OrderController@delete', $p->id)}}" method="post">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" class="btn-delete">Delete</button>
                                </form>
                            </td>
                        @endif
                        @if(Auth::user()->email === 'fabriziobilleci7@gmail.com')
                            <td>{{$p->name}}</td>
                            <td>{{$p->email}}</td>
                        @endif
                        @endforeach
                    </tr>
                </tbody>
            </table>

            <br><br>
            <button class="btn-standard" style="position: sticky; left: 0px;">
                <a href="{{action('OrderController@newOrder')}}">New Case</a>
            </button>
        </div>
    </div>
</div>
<script src="{{ asset('js/dashboard.js') }}"></script>
@endsection
