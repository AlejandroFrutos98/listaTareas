<!-- resources/views/tareas/index.blade.php -->

<h1>Tareas</h1>
<ul>
    @foreach($tareas as $tarea)
    <li>
        {{ $tarea->titulo }}
        @if (!$tarea->completada)
        <form method="POST" action="{{ route('tareas.completar', $tarea->id) }}">
            @csrf
            @method('PATCH')
            <button type="submit">Marcar como Completada</button>
        </form>
        @else
        <span style="color: green;">Completada</span>
        @endif
        <form method="POST" action="{{ route('tareas.destroy', $tarea->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Eliminar</button>
        </form>
    </li>
    @endforeach
</ul>

<a href="{{ route('tareas.create') }}">Agregar nueva tarea</a>
