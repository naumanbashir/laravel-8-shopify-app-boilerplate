<x-app-layout>
    <x-slot name="header">{{ __('Dashboard') }}</x-slot>

    <livewire:dashboard.widget/>

    @push('scripts')
        <script src="{{ asset('js/custom-chart.js') }}"></script>

{{--        @parent--}}

        <script type="text/javascript">
            var AppBridge = window['app-bridge'];
            var actions = AppBridge.actions;
            var TitleBar = actions.TitleBar;
            var Button = actions.Button;
            var Redirect = actions.Redirect;
            var titleBarOptions = {
                title: 'Dashboard',
            };
            var myTitleBar = TitleBar.create(app, titleBarOptions);
        </script>
    @endpush
</x-app-layout>
