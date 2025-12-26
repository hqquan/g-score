<h2 class="mt-4">{{ $subject }}</h2>
<div class="container">
    <canvas id="{{ $subject }}Chart" data-labels='@json($chart['labels'])' data-values='@json($chart['values'])'>
    </canvas>
</div>