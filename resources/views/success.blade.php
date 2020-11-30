@if ($status->{ $bag ?? 'default' }->any())
    <ul class="field mt-6 list-reset">
        @foreach ($status->{ $bag ?? 'default' }->all() as $status)
            <li class="text-sm text-success">{{ $status }}</li>
        @endforeach
    </ul>
@endif
