<tr>
    <th scope="row">{{ $id }}</th>
    <td><a class="link-info"
           href="{{ route('animals.show', $id) }}">{{ $name }}</a>
    </td>
    @auth
        <td>
            <x-forms.edit-form-inline :id="$id" base="animals"></x-forms.edit-form-inline>
        </td>
    @endauth
</tr>
