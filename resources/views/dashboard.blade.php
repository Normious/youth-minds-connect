<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Home') }}
        </h2>
    </x-slot>
    @if(auth()->user()->hasRole('superadmin'))
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!, Click the link below to go to the Home ") }}
                    <br><br>
                    <button class="btn btn-primary" background-color="blue"><a href="home"> {{ __('Home') }}</a></button>
                </div>
            </div>
        </div>
    </div>
    @elseif(auth()->user()->hasRole('admin'))
    <h1>data for admin</h1>
    @else
    <h4>Mufuna chani??</h4>
  @endif

</x-app-layout>
