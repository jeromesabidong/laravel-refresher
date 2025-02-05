{{-- @props(['active' => false, 'type' => 'a']) --}}

{{-- @if ($type === 'a')
    <a class="{{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium" aria-current="page"
        aria-current="{{ $active ? 'page' : 'current' }}"
        {{ $attributes }}
    >{{ $slot }}</a>
@else
    <button class="{{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium" aria-current="page"
    aria-current="{{ $active ? 'page' : 'current' }}"
    {{ $attributes }}
    >{{ $slot }}</button>
@endif --}}

<a class="{{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium" aria-current="page"
    aria-current="{{ $active ? 'page' : 'current' }}"
    {{ $attributes }}
>{{ $slot }}</a>