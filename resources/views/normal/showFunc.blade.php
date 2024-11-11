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



<script>
        
    // const formDiv = document.getElementById('formDiv');
    // const formDivb = document.getElementById('formDivb');
    // const closeButton = document.getElementById('closeButton');
    // const contentSpan = document.getElementById('contentSpan');
    // const createBtn = document.getElementById('createNodeBtn');
    // const deleteBtn = document.getElementById('deleteNodeBtn');
    // const editBtn = document.getElementById('editNodeBtn');
    // const form = document.getElementById('funcForm');

    // //作用路由
    // const createUrl = `{{ route('cloud.store') }}`;
    // const updateUrl = `{{ url('cloud/funcTree') }}`;
    // const deleteUrl = `{{ url('cloud/funcTree') }}`;
    
    // //顯示表單
    // function showForm() {
    //     formDiv.style.display = 'flex';
    // }

    // //隱藏表單
    // function hideForm() {
    //     formDiv.style.display = 'none';
    // }

    // // 所有showFormButton按鈕的事件
    // document.querySelectorAll('.showFormButton').forEach(button => {
    //     button.addEventListener('click', function(event) {
    //         event.stopPropagation(); // 阻止事件冒泡
    //         showForm();

    //         const nodeValue = event.target.closest('.showFormButton').getAttribute('data-nodeValue');
    //         currentNodeParentId = event.target.closest('.showFormButton').getAttribute('data-parentId');
    //         currentNodeId = event.target.closest('.showFormButton').getAttribute('data-nodeId');


    //         console.log('Node ID:', currentNodeId);
    //         console.log('Parent ID:', currentNodeParentId);
    //         console.log('Parent value:', nodeValue);

    //         //設定表單資料屬性
    //         document.getElementById('funcValue').value = nodeValue;
    //         document.getElementById('funcParentId').value = currentNodeParentId;

    //     });
    // });

    // // 點擊背景隱藏表單
    // document.addEventListener('click', function(event) {
    //     // 如果點擊的區域不在 formDiv 內且表單顯示，則隱藏表單
    //     if (!formDivb.contains(event.target)) {
    //         hideForm();
    //     }
    // });
    
    // //點擊closeButton隱藏表單
    // document.getElementById('closeButton').addEventListener('click', function(event) {
    //     hideForm();
    // });


    // editNodeBtn.addEventListener('click',function(event){
    //     const isConfirmed = confirm("確定要更新此筆資料?");
    //     if(isConfirmed){
    //         if(currentNodeId){
    //             form.action = `${updateUrl}/${currentNodeId}`;
    //             form.querySelector('input[name="_method"]').value = "PUT";
    //         }
    //     }
    // })

    

    // createBtn.addEventListener('click', function(event) {

    //     const isConfirmed = confirm("確定要新增此筆資料?");
    //     if(isConfirmed){
    //         form.action = createUrl;
    //         form.querySelector('input[name="_method"]').value = "";
    //         document.getElementById('funcParentId').value = currentNodeId;
    //     }

    // });
    
    // deleteBtn.addEventListener('click', function(event) {
    //     const isConfirmed = confirm("確定要刪除此筆資料?");
    //     if(isConfirmed){
    //        if(currentNodeId){
    //             form.action = `${deleteUrl}/${currentNodeId}`;
    //             form.querySelector('input[name="_method"]').value = "Delete";
    //         } 
    //     }
    // })

</script>