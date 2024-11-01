{{-- <!-- resources/views/mindmap/node.blade.php -->
<li>
    {{ $node->value }} (Layer: {{ $node->layer }})
    
    @if ($node->childNode->isNotEmpty())
        <ul >
            @foreach ($node->childNode as $child)
                @include('node', ['node' => $child])
            @endforeach
        </ul>
    @endif
</li> --}}


<!-- resources/views/mindmap/node.blade.php -->
<li class="flex flex-col items-center">
    <div class="bg-white shadow rounded p-4 mb-4 text-center w-40">
        {{ $node->value }}
    </div>
    
    @if ($node->childNode->isNotEmpty())
    <!-- 顯示連接線 -->
    <div class="h-8 border-l border-gray-400"></div>

    <!-- 子節點的水平排列 -->
    <ul class="flex justify-center items-start space-x-6">
        @foreach ($node->childNode as $child)
            <li class="flex flex-col items-center">
                <!-- 垂直連接線 -->
                <div class="w-px h-8 bg-gray-400"></div>
                @include('node', ['node' => $child])
            </li>
        @endforeach
    </ul>
    @endif
</li>