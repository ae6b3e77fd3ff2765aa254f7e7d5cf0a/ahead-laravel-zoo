<div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Табличка</th>
            @auth
                <th scope="col">Управление</th>
            @endauth
        </tr>
        </thead>
        <tbody>
        @foreach ($cages as $cage)
            <x-cages.cage-list-item :id="$cage->id" :name="$cage->name"></x-cages.cage-list-item>
        @endforeach
        </tbody>
        {{ $cages->links() }}
    </table>
</div>
