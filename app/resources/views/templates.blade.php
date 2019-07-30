<script>
    var templates = {!! json_encode($templates, JSON_HEX_TAG) !!};
</script>
@extends('layouts.app')

@section('content')
    <p id="show-templates"></p>

    <script src="{{ asset('js/templates.js') }}"></script>
@endsection

