@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Report Dashboard</h1>
    <h2>Total Students: {{ $total }}</h2>

    @include('layouts.report.button', ['types' => $types])

    @if(isset($chart))
        @include('layouts.report.chart', ['chart' => $chart, 'subject' => $subject])
    @endif

    @if (isset($students))
        @include('layouts.student.table', ['students' => $students])
    @endif
@endsection

@section('scripts')
    <script src="{{ asset('js/report.js') }}"></script>
@endsection