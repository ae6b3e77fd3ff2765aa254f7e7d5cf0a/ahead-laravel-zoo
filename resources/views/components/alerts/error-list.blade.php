@foreach ($errors->all() as $error)
    <x-alerts.error :msg="$error"></x-alerts.error>
@endforeach

