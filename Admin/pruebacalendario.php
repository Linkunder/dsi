


      <!--Calendario-->
<link href='css/fullcalendar.css' rel='stylesheet' />
<link href='css/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='js/moment.min.js'></script>
<script src='js/jquery.min.js'></script>
<script src='js/fullcalendar.min.js'></script>
<script>

	$(document).ready(function() {

		$('#calendar1').fullCalendar({
			defaultDate: '2016-06-12',
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: [
				{
					title: 'All Day Event',
					start: '2016-06-01'
				},
				{
					title: 'Long Event',
					start: '2016-06-07',
					end: '2016-06-10'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: '2016-06-09T16:00:00'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: '2016-06-16T16:00:00'
				},
				{
					title: 'Partido',
					start: '2016-07-04',
					end: '2016-06-13'
				},
				{
					title: 'Meeting',
					start: '2016-06-12T10:30:00',
					end: '2016-06-12T12:30:00'
				},
				{
					title: 'Lunch',
					start: '2016-06-12T12:00:00'
				},
				{
					title: 'Meeting',
					start: '2016-06-12T14:30:00'
				},
				{
					title: 'Happy Hour',
					start: '2016-06-12T17:30:00'
				},
				{
					title: 'Dinner',
					start: '2016-06-12T20:00:00'
				},
				{
					title: 'Birthday Party',
					start: '2016-06-13T07:00:00'
				},
				{
					title: 'Click for Google',
					url: 'http://google.com/',
					start: '2016-06-28'
				}
			]
		});
		
	});

</script>
<style>


	#calendar1 {
		max-width: 800px;
		margin: 0 auto;
	}

</style>

	<div id='calendar1'></div>

