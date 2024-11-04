<li class="tree flex flex-col items-center relative pl-10">
    <div class="bg-white shadow rounded-xl p-2 mb-2 text-center h-16 w-40 sm:w-32 relative" id="node-{{$node->id}}">
        {{ $node->value }}<br>
        <button @click="toggleForm()" class="absolute bottom-0 left-1/2 transform -translate-x-1/2 rounded-xl text-gray-400 bg-slate-200 hover:text-gray-600 hover:bg-slate-400">
            <svg width="24px" height="24px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <title>加號圖標</title>
                <g id="Complete">
                    <g data-name="add" id="add-2">
                        <g>
                            <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="12" x2="12" y1="19" y2="5"/>
                            <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="5" x2="19" y1="12" y2="12"/>
                        </g>
                    </g>
                </g>
            </svg>
        </button>
    </div>
    @if ($node->childNode->isNotEmpty())
        <ul class="child-container flex flex-row justify-center space-x-4 sm:space-x-2 relative p-5">
            @foreach ($node->childNode as $child)
                @include('node', ['node' => $child])
            @endforeach
        </ul>
    @endif
</li>