@extends('layouts.admin_app')

@section('content')
<div class="container-admin">
    <div class="card-dark-top">
        <div class="card-header">Dashboard</div>
        <div class="card-body"></div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $($('#mySidenav a')[1]).addClass('color-accent');
    });
</script>
@endsection
