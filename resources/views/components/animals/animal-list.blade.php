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
        @foreach ($animals as $animal)
            <x-animals.animal-list-item :id="$animal->id" :name="$animal->name" :has-cage="$animal->cage_id !== null"></x-animals.animal-list-item>
        @endforeach
        </tbody>
        {{ $animals->links() }}
    </table>
</div>
