@extends('layout.template')


@section('content')
<link href="{{asset('calendar/css/responsive-calendar.css')}}" rel="stylesheet">
<link href="{{asset('calendar/css/fullcalendar.css')}}" rel='stylesheet' />
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="{{asset('calendar/js/fullcalendar.min.js')}}"></script>
<script src="{{asset('calendar/js/lang-all.js')}}"></script>
<script src="{{asset('calendar/js/moment.min.js')}}"></script>
<script>
$(document).ready(function() {
  	// Initialisation du calendrier et de c'est méthode 
    $('#calendar').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},
		lang: 'fr',
		buttonIcons: false, // show the prev/next text
		weekNumbers: true,
		editable: true,
		displayEventEnd: true,
		eventLimit: true, // allow "more" link when too many events      
		timeFormat:  'H:mm',
    });

</script>
<style>

  body {
    margin: 0;
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    font-size: 14px;
  }

  #top {
    background: #eee;
    border-bottom: 1px solid #ddd;
    padding: 0 10px;
    line-height: 40px;
    font-size: 12px;
  }

  #calendar {
    max-width: 900px;
    margin: 40px auto;
    padding: 0 10px;
  }

</style>
</head>
<body>
  	<!-- Div qui affiche le calendrier -->
  	<div id='calendar'></div>
</body>

@endsection