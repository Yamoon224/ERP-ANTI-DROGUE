@props(['status'])

@if ($status)
    <p class="text-muted mb-4 text-danger">{{ $status }}</p>
@endif
