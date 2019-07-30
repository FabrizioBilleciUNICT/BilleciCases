<script>
    var templates = {!! json_encode($templates, JSON_HEX_TAG) !!};
</script>
@extends('layouts.admin_app')

@section('content')
    <p id="show-templates"></p>

    <script src="{{ asset('js/templates.js') }}"></script>
<script>
    $(document).ready(function() {
        $($('#mySidenav a')[3]).addClass('color-accent');
    });
</script>
@endsection

