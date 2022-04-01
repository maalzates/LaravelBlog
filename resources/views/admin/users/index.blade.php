@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Listado de usuarios</h1>
@stop

@section('content')
@livewire('admin.users-index')
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"> </script>
<script>
    console.log("Hello World");
</script>
@endsection