@include('layouts.header')
<body class="bg-green-100 flex flex-col items-center py-10">
    <div class="text-4xl font-bold text-gray-700 mb-3">
        <h1>雲系統開發功能樹狀圖</h1>
    </div>

    <!-- 使用 display 屬性來控制表單顯示 -->
    <div id="formDiv" style="display: none; position: fixed;" class="mb-5 flex justify-center items-center top-0 left-0 z-10 w-full h-screen bg-[rgba(0,0,0,0.5)]">
        <div id='formDivb' class="text-gray-900 rounded-lg z-20 relative">
            <button id="closeButton" class="text-gray  bg-gray absolute top-0 right-0 transform translate-x-0 translate-y-1 z-10">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-9 h-9">
                    <path strokeLinecap="round" strokeLinejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
              </button>
            @include('editForm')
        </div>
    </div>

    <div class="tree-container w-full sm:w-4/5 lg:w-2/3">
        <ul class="tree">
            @foreach ($nodes as $node)
                @include('node', ['node' => $node])
            @endforeach
        </ul>
    </div>

    <script>
        
        const formDiv = document.getElementById('formDiv');
        const formDivb = document.getElementById('formDivb');
        const closeButton = document.getElementById('closeButton');
        const contentSpan = document.getElementById('contentSpan');
        const createBtn = document.getElementById('createNodeBtn');
        const deleteBtn = document.getElementById('deleteNodeBtn');
        const form = document.getElementById('editForm');

        //作用路由
        const createUrl = `{{ route('cloud.store') }}`;
        const updateUrl = `{{ url('cloud/funcTree') }}`;
        const deleteUrl = `{{ url('cloud/funcTree') }}`;
        
        //顯示表單
        function showForm() {
            formDiv.style.display = 'flex';
        }
    
        //隱藏表單
        function hideForm() {
            formDiv.style.display = 'none';
        }
    
        // 選取所有帶有 class "showFormButton" 的按鈕
        document.querySelectorAll('.showFormButton').forEach(button => {
            button.addEventListener('click', function(event) {
                event.stopPropagation(); // 阻止事件冒泡
                showForm();
    
                // 獲取當前點擊的節點 id
                // const nodeId = event.target.closest('.showFormButton').getAttribute('data-nodeId');
                // const nodeParentId = event.target.closest('.showFormButton').getAttribute('data-parentId');
                const nodeValue = event.target.closest('.showFormButton').getAttribute('data-nodeValue');
                currentNodeParentId = event.target.closest('.showFormButton').getAttribute('data-parentId');
                currentNodeId = event.target.closest('.showFormButton').getAttribute('data-nodeId');


                console.log('Node ID:', currentNodeId);
                console.log('Parent ID:', currentNodeParentId);
                console.log('Parent value:', nodeValue);

                //設定表單資料屬性
                document.getElementById('editValue').value = nodeValue;
                document.getElementById('editParentId').value = currentNodeParentId;


                //更改表單發送方式
                if(currentNodeId){
                    form.action = `${updateUrl}/${currentNodeId}`;
                    form.method = "POST";
                    form.querySelector('input[name="_method"]').value = "PUT";
                }

                // document.getElementById('editId').value = nodeId;
            });
        });
    
        // 點擊背景隱藏表單
        document.addEventListener('click', function(event) {
            // 如果點擊的區域不在 formDiv 內且表單顯示，則隱藏表單
            if (!formDivb.contains(event.target)) {
                hideForm();
            }
        });
        
        //點擊closeButton隱藏表單
        document.getElementById('closeButton').addEventListener('click', function(event) {
            hideForm();
        });

        createBtn.addEventListener('click', function(event) {
            form.action = createUrl;
            form.method = "POST";
            form.querySelector('input[name="_method"]').value = "";
            form.getAttribute('');
            document.getElementById('editParentId').value = currentNodeId;
            
        });
        
        deleteBtn.addEventListener('click', function(event) {
            if(currentNodeId){
                form.action = `${deleteUrl}/${currentNodeId}`;
                form.method = "POST";
                form.querySelector('input[name="_method"]').value = "Delete";
            }
        })

        
        
    </script>
    
</body>
</html>
