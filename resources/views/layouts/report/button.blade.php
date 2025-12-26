@foreach ($types as $type)
    @foreach ($type as $button)
        <form method="POST" action="{{ route('report.handle') }}" class="d-inline">
            @csrf
            <button name="type" type="submit" value="{{ $button }}" class="btn btn-primary m-2">{{ $button }}</button>
        </form>
    @endforeach
@endforeach