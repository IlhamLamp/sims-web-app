@props(['segments' => []])

<nav class="text-gray-600 text-sm mb-4">
    <ol class="list-reset flex">
        @foreach ($segments as $key => $segment)
            <li>
                @if ($loop->last)
                    <span class="text-gray-900 font-bold">{{ ucwords(str_replace('-', ' ', $segment)) }}</span>
                @else
                    <a href="{{ url(implode('/', array_slice($segments, 0, $key + 1))) }}" class="text-blue-500 hover:underline">
                        {{ ucwords(str_replace('-', ' ', $segment)) }}
                    </a>
                    <span class="mx-2">/</span>
                @endif
            </li>
        @endforeach
    </ol>
</nav>
