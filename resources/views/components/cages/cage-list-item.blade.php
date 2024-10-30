<tr>
    <th scope="row">{{ $id }}</th>
    <td><a class="link-info" href="{{ route('cages.show', $id) }}">{{ $name }}</a>
    </td>
    @auth
    <td>
        <x-forms.edit-form-inline :id="$id" base="cages"></x-forms.edit-form-inline>
    </td>
    @endauth
</tr>
