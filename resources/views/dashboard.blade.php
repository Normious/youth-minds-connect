<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3>{{ __("You're logged in!") }}</h3>
                    <br>
                    <a href="{{ route('home') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        {{ __('Go to Home') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('superadmin'))
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 space-x-4">
                    <a href="{{ route('all-events') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        {{ __('All Events') }}
                    </a>
                    <a href="{{ route('all-mentors') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        {{ __('All Mentors') }}
                    </a>
                    <a href="{{ route('home') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        {{ __('Go to Home') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
        <!-- <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h2>Add New Event</h2>
                        <form id="eventForm">
                            @csrf
                            <div class="form-group">
                                <label for="name">Event Name:</label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea id="description" name="description" class="form-control" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="date_from">Date From:</label>
                                <input type="date" id="date_from" name="date_from" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="date_to">Date To:</label>
                                <input type="date" id="date_to" name="date_to" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Add Event</button>
                        </form>
                        <div id="successMessage" class="alert alert-success mt-3" style="display: none;">
                            Event added successfully!
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    @endif

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
    <!-- <script>
        $(document).ready(function() {
            $('#eventForm').on('submit', function(e) {
                e.preventDefault(); // Prevent default form submission

                // Get form data
                var formData = $(this).serialize();

                // Send AJAX POST request
                $.ajax({
                    type: 'POST',
                    url: "{{ route('events.store') }}",
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            $('#successMessage').show(); // Show success message
                            $('#eventForm')[0].reset(); // Clear form fields
                        }
                    },
                    error: function() {
                        alert('An error occurred while adding the event.');
                    }
                });
            });
        });
    </script> -->
</x-app-layout>