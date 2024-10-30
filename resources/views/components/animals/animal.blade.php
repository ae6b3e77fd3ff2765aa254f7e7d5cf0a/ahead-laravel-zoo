<div>
    <p><strong>Айди:</strong> {{ $id }}</p>
    <p><strong>Вид:</strong> {{ $species }}</p>

    <p><strong>Возраст:</strong> {{ $age }}</p>
    <p><strong>Инфо:</strong> {{ $desc }}</p>
    @if($cage != null)
        <p><strong>Проживает в клетке </strong> <a href="{{ route('cages.show', $cage) }}">{{ '№'.$cage }}</a></p>
    @endif
</div>
