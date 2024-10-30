<tr>
    <th scope="row">{{ $id }}</th>
    <td><a class="link-info"
           href="{{ route('animals.show', $id) }}">{{ $name }}</a>
    </td>
    <td>
        {{ $hasCage ? 'Да' : 'Нет' }}
    </td>
    @auth
        <td>
            <x-forms.edit-form-inline :id="$id" base="cages"></x-forms.edit-form-inline>
        </td>
    @endauth
</tr>
