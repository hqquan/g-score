@extends('layouts.app')

@section('content')
    <!-- Search Card -->
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title mb-3">
                Search Student Score
            </h5>

            <form class="row g-3 align-items-end" action="{{ route('search.search') }}" method="POST">
                @csrf

                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="Enter SBD" name="sbd">
                </div>

                <div class="col-md-2">
                    <button class="btn btn-primary w-100" type="submit">
                        <i class="bi bi-search"></i> Search
                    </button>
                </div>

                @if ($errors->first('sbd'))
                    <p class="text-danger">{{ $errors->first('sbd') }}</p>
                @endif
            </form>
        </div>
    </div>

    <!-- Result / Detail -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title mb-3">Detailed Scores</h5>
            <p class="text-muted">
                Student score details will be displayed here after searching.
            </p>
            @include('layouts.student.table', ['student' => $student ?? null])
        </div>
    </div>
@endsection