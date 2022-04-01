@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>lista de categorías</h1>
@stop

@section('content')
@if(session('info'))
<div class="alert alert-danger">
    <strong>{{session('info')}}</strong>
</div>
@endif

<div class="card">
    @can('admin.categories.create')
    <div class="card-header">
        <a href="{{route('admin.categories.create')}}" class="btn btn-dark">Crear Categoría</a>
    </div>
    @endcan
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <th>Name</th>
                <th colspan="2"></th>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    @can('admin.categories.edit')
                    <td width="10px"><a href="{{route('admin.categories.edit', $category)}}" class="btn btn-primary btn-sm">Editar</a>
                    </td>
                    @endcan
                    <td width="10px">
                        <form action="{{route('admin.categories.destroy', $category)}}}" method="POST">
                            @csrf
                            @method('delete')
                            @can('admin.categories.destroy')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar </button>
                            @endcan
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop