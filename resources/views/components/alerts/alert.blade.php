<div>
    @if (session('success'))
        <x-alerts.success :msg="session('success')"></x-alerts.success>
    @endif
    @if (session('errors'))
            <x-alerts.error-list :errors="session('errors')"></x-alerts.error-list>
    @endif
</div>
