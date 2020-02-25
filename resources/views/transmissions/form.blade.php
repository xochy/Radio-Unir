<div class="form-group">
    <label for="">Nombre</label>
    <input type="text" name="name" class="form-control" value="@isset($transmission->name){{$transmission->name}}@endisset">
</div>
<div class="form-group">
    <label for="">Tema</label>
    <input type="text" name="theme" class="form-control" value="@isset($transmission->theme){{$transmission->theme}}@endisset">
</div>

<div class="row" style="margin-bottom: 15px;">
    <div class="col">
        <label for="">Fecha</label>
        <input type="text" name="date" class="form-control" placeholder="Ejemplo: 12/11/2020" value="@isset($transmission->date){{$transmission->date}}@endisset">
    </div>
    <div class="col">
        <label for="">Hora</label>
        <input type="text" name="hour" class="form-control" placeholder="Ejemplo: 18:00" value="@isset($transmission->hour){{$transmission->hour}}@endisset">
    </div>
    <div class="col">
        <label>Estación de radio</label>
        <select name="listaEstaciones" class="form-control">
            <option class="hidden" selected disabled>Estación</option>               

                @foreach ($stations as $station)
                <option
                @isset($transmission->station_id)
                    @if ($transmission->station_id == $station->id)
                        selected 
                    @endif
                @endisset
                value="{{ $station->id }}">{{ $station->name }}</option>
                @endforeach


        </select>
    </div>
</div>

<div class="form-group">
    <label for="">Punto de montaje</label>
    <input type="text" name="url" class="form-control" value="@isset($transmission->url){{$transmission->url}}@endisset">
</div>

