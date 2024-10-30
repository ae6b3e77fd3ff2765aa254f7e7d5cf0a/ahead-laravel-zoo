<div>
    <form action="{{ route($base . '.destroy', $id) }}" method="POST"
          style="display:inline;">
        @csrf
        @method('DELETE')
        <div class="btn-group">
            <a class="btn btn-primary"
               href="{{ route($base . '.edit', $id) }}">Редактировать</a>
            <button class="btn btn-primary" type="submit">Удалить</button>
        </div>
    </form>
</div>
