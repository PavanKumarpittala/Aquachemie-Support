@extends('layouts.app')

@section('content')
<main class="app-content">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                @if (Auth::user()->role == 1 || Auth::user()->role == 2 || Auth::user()->role == 3 || Auth::user()->role == 5)
                <div class="card-header">
                    <h4>Open Tickets</h4>
                </div>
                <div class="card-header">
                    <h4>Today</h4>
                    <a href="{{url('support_view')}}" onclick="setStatusPeriod(0,'today')"><span class="text-danger float-right dashboard-stats-count">{{$open_issues['today']}}</span></a>
                </div>
                <div class="card-header">
                    <h4>Yesterday</h4>
                    <a href="{{url('support_view')}}" onclick="setStatusPeriod(0,'yesterday')"><span class="text-danger float-right dashboard-stats-count">{{$open_issues['yesterday']}}</span></a>
                </div>
                <div class="card-header">
                    <h4>Last 7 Days</h4>
                    <a href="{{url('support_view')}}" onclick="setStatusPeriod(0,'week')"><span class="text-danger float-right dashboard-stats-count">{{$open_issues['week']}}</span></a>
                </div>
                <div class="card-header">
                    <h4>Last 30 Days </h4>
                    <a href="{{url('support_view')}}" onclick="setStatusPeriod(0,'month')"><span class="text-danger float-right dashboard-stats-count">{{$open_issues['month']}}</span></a>
                </div>
                <div class="card-header">
                    <h4>Beyond 30 Days </h4>
                    <a href="{{url('support_view')}}" onclick="setStatusPeriod(0,'beyondmonth')"><span class="text-danger float-right dashboard-stats-count">{{$open_issues['beyondmonth']}}</span></a>
                </div>
                @endif

            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Last Updated Timesheet</h4>
                    <a href="{{url('timesheets_list')}}"><span class="text-danger float-right" style="font-size: 19px;margin-top: -31px;">
                      {{ isset($last_timesheet->created_at) ? date('d-m-Y H:i', strtotime($last_timesheet->created_at)) : null }}
                       </span></a>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
@endsection

@push('scripts')
<script>
   function setStatusPeriod(status, period)
   {
        sessionStorage.setItem('dashboardTicketStatus', status);
        sessionStorage.setItem('dashboardTicketPeriod', period);
   }
</script>
@endpush
