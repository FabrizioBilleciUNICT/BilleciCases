@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Dashboard</div>

        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>Model ID</th>
                    <th>Color</th>
                    <th>Measures</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th> </th>
                    <th> </th>
                </tr>
                </thead>
                <tbody>
                @foreach($preventives as $p)
                    <tr>
                        <td>{{$p->model_id}}</td>
                        <td>{{$p->color}}</td>
                        <td>{{$p->measures}}</td>
                        <td>{{$p->name}}</td>
                        <td>{{$p->email}}</td>
                        <td>{{$p->status}}</td>
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
                        @endforeach
                    </tr>
                </tbody>
            </table>

            <br><br>
            <a href="{{action('PagesController@order')}}" class="btn btn-warning">New Case</a>
        </div>
    </div>
</div>
@endsection
