<div class="form-group">
    <label for="">Nombre</label>
    <input type="text" name="name" class="form-control" value="@isset($station->name){{$station->name}}@endisset">
</div>
<div class="form-group">
    <label for="">Descripción</label>
    <input type="text" name="description" class="form-control" value="@isset($station->description){{$station->description}}@endisset">
</div>
<div class="form-group">
    <label for="">Imagen</label>
    <input type="file" name="image">
</div>