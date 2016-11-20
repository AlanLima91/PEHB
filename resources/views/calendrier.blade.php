@extends('layout.template')

@section('content')
<link href="{{asset('css/fullcalendar.css')}}" rel='stylesheet' />
<script src="{{asset('js/moment.min.js')}}"></script>
<script src="{{asset('js/fullcalendar.min.js')}}"></script>
<script src="{{asset('js/locale-all.js')}}"></script>
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
    });
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

<!-- Div qui affiche le calendrier -->
<div id='calendar'></div>


@endsection