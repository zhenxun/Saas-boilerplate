@if(session()->has('success'))

    @component('layouts.partials.alerts.alert-component', ['category' => 'success'])

        {{ session('success') }}
        
    @endcomponent

@endif

@if(session()->has('error'))

    @component('layouts.partials.alerts.alert-component', ['category' => 'danger'])

        {{ session('error') }}

    @endcomponent

@endif


