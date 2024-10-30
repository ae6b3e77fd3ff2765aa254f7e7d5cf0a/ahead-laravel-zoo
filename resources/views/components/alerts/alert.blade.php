<div>
    @if (session('success'))
        <x-alerts.success :msg="session('success')"></x-alerts.success>
    @endif
    @if (session('error'))
        <x-alerts.error :msg="session('error')"></x-alerts.error>
    @endif
</div>
