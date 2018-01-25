@if(session()->has('success'))

    @component('layouts.partials.alerts.alert-component', ['category' => 'success', 'tag' => 'Success'])

        {{ session('success') }}
        
    @endcomponent

@endif

@if(session()->has('error'))

    @component('layouts.partials.alerts.alert-component', ['category' => 'danger', 'tag' => 'Oops'])

        {{ session('error') }}

    @endcomponent

@endif


