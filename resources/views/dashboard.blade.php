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
                    <button class="btn btn-primary" style="background-color: blue;">
                        <a href="home" style="color: white;"> {{ __('Go to Home') }}</a>
                    </button>
                </div>
            </div>
        </div>
    </div>

    @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('superadmin'))
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <button class="btn btn-primary" style="background-color: blue;">
                        <a href="home" style="color: white;"> {{ __('All Events') }}</a>
                    </button>

                    <button class="btn btn-primary" style="background-color: blue;">
                        <a href="home" style="color: white;"> {{ __('All Mentors') }}</a>
                    </button>

                    <button class="btn btn-primary" style="background-color: blue;">
                        <a href="home" style="color: white;"> {{ __('Go to Home') }}</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
        <div class="py-12">
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
        </div>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h2>Add New Mentor</h2>
                        <form id="mentorForm">
                            @csrf
                            <div class="form-group">
                                <label for="name">Mentor Name:</label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="name">Email:</label>
                                <input type="text" id="email" name="email" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="name">Number:</label>
                                <input type="number" id="number" name="number" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea id="description" name="description" class="form-control" rows="3"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Add Mentor</button>
                        </form>
                        <div id="mentorSuccessMessage" class="alert alert-success mt-3" style="display: none;">
                            Mentor added successfully!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
    <script>
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

        $(document).ready(function() {
            $('#mentorForm').on('submit', function(e) {
                e.preventDefault(); // Prevent default form submission

                // Get form data
                var formData = $(this).serialize();

                // Send AJAX POST request
                $.ajax({
                    type: 'POST',
                    url: "{{ route('mentors.store') }}",
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            $('#mentorSuccessMessage').show(); // Show success message
                            $('#mentorForm')[0].reset(); // Clear form fields
                        }
                    },
                    error: function() {
                        alert('An error occurred while adding the mentor.');
                    }
                });
            });
        });
    </script>
</x-app-layout>