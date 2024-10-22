@extends('layouts.master')

@section('title', 'Calendar')

@section('content')
<br> <br><br><br>
  <div class="hero">
{{ $events }}
    <div id="calendar"></div>

  </div>





  <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
  <script src="{{ asset('js/evo-calendar.min.js') }}"></script>

  {{-- <script>
    $(document).ready(function () {
      $('#calendar').evoCalendar({


        theme: 'Midnight Blue',
        calendarEvents: [
          {
            id: 'event1', // Event's ID (required)
            name: "Salima", // Event name (required)
            date: "august/8/2024", // Event date (required)
            description: "will go to salima",
            type: "holiday", // Event type (required)
            everyYear: true // Same event every year (optional)
          },
          {
            name: "Vacation Leave ",
            badge: "02/13 - 02/15", // Event badge (optional)
            date: ["February/13/2020", "February/15/2020"], // Date range
            description: "Vacation leave for 3 days.", // Event description (optional)
            type: "event",
            color: "#63d867" // Event custom color (optional)
          }
        ]

      })
    })
  </script> --}}
  <script>
    $(document).ready(function () {
        // Parse Laravel data into JavaScript
        var eventsData = <?php echo json_encode($events); ?>;

        console.log(eventsData);

        $('#calendar').evoCalendar({
            theme: 'Midnight Blue',
            calendarEvents: eventsData
        });
    });
</script>

@endsection
