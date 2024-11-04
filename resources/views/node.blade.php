<li class="tree flex flex-col items-center relative">
    <a class="node bg-white shadow rounded p-4 mb-4 text-center w-40 sm:w-32" id="node-{{$node->id}}">
        {{ $node->value }}
    </a>

    @if ($node->childNode->isNotEmpty())
        <ul class="flex justify-center items-start space-x-4 sm:space-x-2">
            @foreach ($node->childNode as $child)
                @include('node', ['node' => $child])
            @endforeach
        </ul>
    @endif
</li>