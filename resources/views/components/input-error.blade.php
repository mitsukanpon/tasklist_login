@props(['messages'])

@if ($messages)
    @foreach ($messages as $message)
        <p class="ml-2">{{$message}}</p>
    @endforeach
@endif
