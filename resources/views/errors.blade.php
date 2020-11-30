@if ($errors->{ $bag ?? 'default' }->any())
    <ul class="field list-reset @if (isset($bag) && $bag == 'invitations') mt-6 @else my-6 @endif">
        @foreach ($errors->{ $bag ?? 'default' }->all() as $error)
            <li class="text-sm text-red-light">{{ $error }}</li>
        @endforeach
    </ul>
@endif
