@include('layouts.header')
<body class="bg-green-100 flex flex-col items-center py-10">
    <div class="text-4xl font-bold text-gray-700 mb-3 flex">
        
        <h1>
            {{$system}}
        </h1>
        <button class="rounded-xl border bg-blue-200 text-lg w-[60px] mx-2 hover:text-black hover:bg-slate-400">
            <a href="{{route('cloud.show')}}" >
                雲
            </a>
        </button>
        <button class="rounded-xl border bg-blue-200 text-lg w-[60px] mx-2 hover:text-black hover:bg-slate-400">
            <a href="{{route('sixth.show')}}" >
                六代
            </a>
        </button>
    </div>


    <div class="tree-container w-full sm:w-4/5 lg:w-2/3">
        <ul class="tree">
            @foreach ($nodes as $node)
                @include('normal.node', ['node' => $node])
            @endforeach
        </ul>
    </div>


    
</body>
</html>

