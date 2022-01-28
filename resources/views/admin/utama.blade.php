@extends('layout.main_admin')

@section('content')
<div class="section-admin container-fluid mg-tb-30">
    <div class="row admin text-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="admin-content analysis-progrebar-ctn">
                        <h4>KALENDER ACARA</h4>
                        <h4 class="text-center text-uppercase">
                        
                        <body>
                            <div class="calender-area mg-tb-30">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="calender-inner">
                                                <div id='calendar'></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- calendar JS -->
                            <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
                            <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.js'></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
                                integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
                                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                            <script>
                                $(function() {
                                    var todayDate = moment().startOf('day');
                                    var YM = todayDate.format('YYYY-MM');
                                    var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
                                    var TODAY = todayDate.format('YYYY-MM-DD');
                                    var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');

                                    $('#calendar').fullCalendar({
                                        header: {
                                            left: 'prev,next today',
                                            center: 'title',
                                            right: 'month,agendaWeek,agendaDay,listWeek'
                                        },
                                        editable: true,
                                        eventLimit: true, // allow "more" link when too many events
                                        navLinks: true,
                                        backgroundColor: '#1f2e86',   
                                        eventTextColor: '#1f2e86',
                                        textColor: '#378006',
                                        dayClick: function(date, jsEvent, view) {

                                        alert('Clicked on: ' + date.format());

                                        alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);

                                        alert('Current view: ' + view.name);

                                        // change the day's background color just for fun
                                        $(this).css('background-color', 'red');

                                    },
                                        events: [
                                            @foreach($pesanan as $p)
                                                {
                                                title : '{{ $p->User->name }}',
                                                start : '{{ $p->tgl_mulai }}',
                                                end : '{{ $p->tgl_selesai }}',
                                                
                                                },

                                            @endforeach
                                        ]
                                    });
                                });
                            </script>
                        </body>

                        </h4> 
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection