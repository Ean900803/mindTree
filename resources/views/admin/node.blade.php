<li>
    <div class="rounded-xl shadow w-[200px] relative">
        <!-- 展開/收合按鈕 -->
        <button onclick="toggleNode(this)" class="w-[200px] rounded-lg hover:bg-slate-300">
            <p class="truncate md:whitespace-normal font-bold text-lg text-slate-900 cursor-default hover:text-red-900" title="{{ $node->value }}">
                {{ $node->value }}
            </p>
        </button>
        
        <!-- 操作按鈕 -->
        <button class="showFormButton rounded-l text-black bg-slate-200
            hover:text-gray-600 hover:bg-slate-400 absolute right-0 top-1/2 transform -translate-y-1/2"
            data-nodeId="{{ $node->id }}" 
            data-parentid="{{ $node->parent_id }}"
            data-nodeValue="{{ $node->value }}"
            data-system="{{ $node->system }}"
        >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
            </svg>          
        </button>
    </div>

    @if ($node->childNode->isNotEmpty())
        <!-- 子節點容器，初始隱藏 -->
        <ul class="hidden">
            @foreach ($node->childNode as $child)
                @include('admin.node', ['node' => $child])
            @endforeach
        </ul>
    @endif
</li>
