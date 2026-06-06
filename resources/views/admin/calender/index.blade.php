@extends('admin.layouts.master')
@section('title', 'Kalender Keberangkatan')

@section('css')
<link rel="stylesheet" href="{{env('APP_URL')}}/assets/admin/extensions/simple-datatables/style.css">
<link rel="stylesheet" href="{{env('APP_URL')}}/assets/admin/compiled/css/table-datatable.css">
@endsection

@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Kalender Keberangkatan</h3>
                <p class="text-subtitle text-muted">Jadwal keberangkatan pada kalender dapat dilihat pada :</p>
            </div>
        
        </div>
    </div>
<div id='calendar'></div>

@endsection

<script>

document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
    
        var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    events: @json($events)
});
        calendar.render();
      });
</script>