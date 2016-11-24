@extends('layout.template')

@section('content')
<<<<<<< HEAD
<link href="{{asset('Calendar/css/responsive-calendar.css')}}" rel="stylesheet">
<link href="{{asset('Calendar/css/fullcalendar.css')}}" rel='stylesheet' />
<script src="{{asset('lib/js/jquery.min.js')}}"></script>
<script src="{{asset('Calendar/js/fullcalendar.min.js')}}"></script>
<script src="{{asset('Calendar/js/lang-all.js')}}"></script>
<!-- <script src="{{asset('Calendar/js/jquery.min.js')}}"></script> -->
<script src="{{asset('Calendar/js/moment.min.js')}}"></script>
=======
<link href="{{asset('css/fullcalendar.css')}}" rel='stylesheet' />
<script src="{{asset('js/moment.min.js')}}"></script>
<script src="{{asset('js/fullcalendar.min.js')}}"></script>
<script src="{{asset('js/locale-all.js')}}"></script>
>>>>>>> 4798f408774a0892fc92121c43cb2addc0429040
<script>
$(document).ready(function() {
  	// Initialisation du calendrier et de c'est méthode 
    $('#calendar').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},
		locale: 'fr',
		buttonIcons: false, // show the prev/next text
		weekNumbers: true,
		editable: true,
		displayEventEnd: true,
		eventLimit: true, // allow "more" link when too many events      
		timeFormat:  'H:mm',
<<<<<<< HEAD
    })
=======
    });
>>>>>>> 4798f408774a0892fc92121c43cb2addc0429040
});
</script>
<style>
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
<<<<<<< HEAD
  	<!-- Div qui affiche le calendrier -->
  	<div id='calendar'></div>
=======

<!-- Div qui affiche le calendrier -->
<div id='calendar'></div>

>>>>>>> 4798f408774a0892fc92121c43cb2addc0429040

@endsection