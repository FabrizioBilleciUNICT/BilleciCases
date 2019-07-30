@extends('layouts.admin_app')

@section('content')
<div class="container-admin">
    <div class="cardx-top">
        <div class="cardx-dark">
            <div class="card-body">
                <p class="p-dashboard-header">Orders</p>

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
                        <th>Name</th>
                        <th>Email</th>
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
                        <td><a href="{{action('OrderController@edit', $p->id)}}" class="btn-edit">Edit</a></td>
                        <td>
                            <form action="{{action('OrderController@delete', $p->id)}}" method="post">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="submit" class="btn-delete">Delete</button>
                            </form>
                        </td>
                        <td>{{$p->name}}</td>
                        <td>{{$p->email}}</td>
                        @endforeach
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $($('#mySidenav a')[2]).addClass('color-accent');
    });
</script>
<script src="{{ asset('js/dashboard.js') }}"></script>
@endsection
