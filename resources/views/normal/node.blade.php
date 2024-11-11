<li>
    <div class="rounded-xl shadow w-[200px] relative ">
        
        <p class="truncate md:whitespace-normal font-bold text-lg text-slate-900 cursor-default hover:text-red-900" title="{{ $node->value }}">
            {{ $node->value }}
        </p>
    </div>
    @if ($node->childNode->isNotEmpty())
        <ul>
            @foreach ($node->childNode as $child)
                @include('normal.node', ['node' => $child])
            @endforeach
        </ul>
    @endif
</li>
