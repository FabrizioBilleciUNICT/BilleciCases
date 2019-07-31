@extends('layouts.admin_app')

@section('content')
<div class="container-admin">
    <div class="cardx-top">
        <div class="cardx-dark">
            <div class="card-body">
                <p class="p-dashboard-header">Orders</p>

                <table class="table"
                       data-toggle="table"
                       data-search="false"
                       data-filter-control="true"
                       data-click-to-select="true">
                    <thead>
                    <tr>
                        <th data-field="name" data-filter-control="input" data-sortable="true">Name</th>
                        <th data-field="email" data-filter-control="input" data-sortable="false">Email</th>
                        <th data-field="type" data-filter-control="select" data-sortable="true">Type</th>
                        <th data-field="measures" data-filter-control="select" data-sortable="false">Measures</th>
                        <th data-field="color" data-filter-control="select" data-sortable="true">Color</th>
                        <th data-field="handles" data-filter-control="select" data-sortable="true">Handles</th>
                        <th data-field="shaped" data-filter-control="select" data-sortable="true">Shaped</th>
                        <th data-field="price" data-filter-control="select" data-sortable="true">Price</th>
                        <th data-field="status" data-filter-control="select" data-sortable="true">Status</th>
                        <th data-formatter="editFormatter">Edit</th>
                        <th data-formatter="deleteFormatter">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($preventives as $p)
                    <tr>
                        <td>{{$p->name}}</td>
                        <td>{{$p->email}}</td>
                        <td>{{$p->type}}</td>
                        <td>{{$p->measures}}</td>
                        <td>{{$p->color}}</td>
                        <td>{{$p->handles}}</td>
                        <td>{{$p->shaped}}</td>
                        <td>{{$p->price}}</td>
                        <td>{{$p->status}}</td>
                        <td>{{action('OrderController@edit', $p->id)}}</td>
                        <td>{{action('OrderController@delete', $p->id)}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>
<script>
    function editFormatter(value, row) {
        return '<a href=' + value +' class="btn-edit">Edit</a>';
    }

    function deleteFormatter(value, row) {
        return '<form action=' + value +' method="post">\n' +
                    '@csrf\n' +
                        '<input name="_method" type="hidden" value="DELETE">\n' +
                            '<button type="submit" class="btn-delete">Delete</button>\n' +
                '</form>';
    }
</script>
<script>
    $(document).ready(function() {
        $($('#mySidenav a')[2]).addClass('color-accent');
    });
</script>
@endsection
