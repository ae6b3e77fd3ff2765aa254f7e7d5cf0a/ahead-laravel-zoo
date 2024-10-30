<div>
    <form action="{{ route($base . '.destroy', $id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <div class="btn-group">
            <a class="btn btn-primary" href="{{ route($base .'.index') }}">К индексу</a>
            <a class="btn btn-primary" href="{{ route($base . '.edit', $id) }}">Редактировать</a>
            <button class="btn btn-primary" type="submit">Удалить</button>
            <a class="btn btn-primary" href="javascript:void(0);" onclick="window.history.back();">Назад</a>
        </div>
    </form>
</div>
