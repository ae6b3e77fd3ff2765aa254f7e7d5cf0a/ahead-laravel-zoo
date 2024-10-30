<div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Имя</th>
            <th scope="col">Есть клетка?</th>
            @auth
                <th scope="col">Управление</th>
            @endauth
        </tr>
        </thead>
        <tbody>
        @if($animals->isEmpty())
            <tr aria-colspan="{{ auth()->check() ? 2 : 3 }}">Нет данных</tr>
        @else
            @foreach ($animals as $animal)
                <x-animals.animal-list-item :id="$animal->id" :name="$animal->name"
                                            :has-cage="$animal->cage_id !== null"></x-animals.animal-list-item>
            @endforeach
        @endif
        </tbody>
        {{ $animals->links() }}
    </table>
</div>
