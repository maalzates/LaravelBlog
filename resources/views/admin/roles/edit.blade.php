@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<a href="{{route('admin.posts.create')}}" class="btn btn-secondary btn-sm float-right">Nuevo post</a>
<h1>Edtiar Rol</h1>
@stop

@section('content')
@if(session('info'))
<div class="alert alert-success">
    {{session('info')}}
</div>
@endif
<div class="card">
    <div class="card-body">
        {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'put']) !!}
        @include('admin.roles.partials.form')
        {!! Form::submit('Actualizar Rol',['class' => 'btn btn-primary'])!!}
        {!! Form::close() !!}
    </div>
</div>
@stop