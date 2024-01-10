<!-- resources/views/tareas/create.blade.php -->

<h1>Agregar nueva tarea</h1>
<form method="POST" action="{{ route('tareas.store') }}">
    @csrf
    <input type="text" name="titulo" placeholder="Nueva tarea" required>
    <button type="submit">Agregar</button>
</form>

<a href="{{ route('tareas.index') }}">Volver a la lista de tareas</a>
