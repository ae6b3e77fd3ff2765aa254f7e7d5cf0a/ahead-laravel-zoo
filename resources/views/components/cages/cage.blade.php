<div class="col">
    <p><strong>Айди:</strong> {{ $id }}</p>
    <p><strong>Табличка:</strong> {{ $name }}</p>
    <p><strong>Занято:</strong> {{ $count }}</p>
    <p><strong>Свободно:</strong> {{ $size - $count  }}</p>
    <p><strong>Размер:</strong> {{ $size }}</p>
    @auth
        <x-forms.edit-form :id="$id" base="cages"></x-forms.edit-form>
    @endauth
</div>
