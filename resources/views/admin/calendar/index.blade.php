@extends('layouts.master')

@section('title', 'Admin Calendar Dashboard')

@section('content')
    <div class="container">
        <h1>Calendar Events</h1>

        <!-- Success message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Add Event Form -->
        <form action="{{ route('admin.calendar.add') }}" method="POST">
            @csrf
            <h2>Add Event</h2>
            <div class="form-group">
                <label for="name">Event Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="date">Event Date</label>
                <input type="date" name="date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="type">Event Type</label>
                <select name="type" class="form-control" required>
                    <option value="holiday">Holiday</option>
                    <option value="event">Event</option>
                    <option value="meeting">Meeting</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Event Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Event</button>
        </form>

        <!-- List of Events -->
        <h2 class="mt-4">Manage Events</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>{{ $event->name }}</td>
                        <td>{{ $event->date }}</td>
                        <td>{{ $event->type }}</td>
                        <td>{{ $event->description }}</td>
                        <td>
                            <!-- Edit Event -->
                            <form action="{{ route('admin.calendar.update', $event->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-info">Edit</button>
                            </form>
                            <!-- Delete Event -->
                            <form action="{{ route('admin.calendar.delete', $event->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
