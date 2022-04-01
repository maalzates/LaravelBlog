<div class="form-group">
    {!! Form::label('name', 'Nombre:')!!}
    {!! Form::text('name', null ,['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la etiqueta...'])!!}
    @error('name')
    <small>{{$message}}</small>
    @enderror
</div>
<!-- Input Slug -->
<div class="form-group">
    {!! Form::label('slug', 'Slug')!!}
    {!! Form::text('slug', null ,['class' => 'form-control', 'placeholder' => 'Ingrese el slug de la etiqueta...', 'readonly'])!!}
    @error('slug')
    <small>{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('color', 'Color')!!}
    {!! Form::select('color', $colors , null ,['class' => 'form-control'])!!}
    @error('color')
    <small>{{$message}}</small>
    @enderror
</div>