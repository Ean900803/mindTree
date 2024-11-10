document.addEventListener('DOMContentLoaded', function() {
    const formDiv = document.getElementById('formDiv');
    const formDivb = document.getElementById('formDivb');
    const closeButton = document.getElementById('closeButton');
    const createBtn = document.getElementById('createNodeBtn');
    const deleteBtn = document.getElementById('deleteNodeBtn');
    const form = document.getElementById('editForm');

    // 获取路由 URL
    const createUrl = document.querySelector('meta[name="create-url"]').content;
    const updateUrl = document.querySelector('meta[name="update-url"]').content;
    const deleteUrl = document.querySelector('meta[name="delete-url"]').content;

    // 显示表单
    function showForm() {
        if (formDiv) {
            formDiv.style.display = 'flex';
        }
    }

    // 隐藏表单
    function hideForm() {
        if (formDiv) {
            formDiv.style.display = 'none';
        }
    }

    // 绑定 "showFormButton" 按钮事件
    document.querySelectorAll('.showFormButton').forEach(button => {
        button.addEventListener('click', function(event) {
            event.stopPropagation(); // 阻止事件冒泡
            showForm();

            // 获取节点信息
            const nodeValue = event.target.closest('.showFormButton').getAttribute('data-nodeValue');
            const currentNodeParentId = event.target.closest('.showFormButton').getAttribute('data-parentId');
            const currentNodeId = event.target.closest('.showFormButton').getAttribute('data-nodeId');

            console.log('Node ID:', currentNodeId);
            console.log('Parent ID:', currentNodeParentId);
            console.log('Parent value:', nodeValue);

            // 设置表单数据
            document.getElementById('editValue').value = nodeValue;
            document.getElementById('editParentId').value = currentNodeParentId;

            // 设置表单的 action 和 method 为更新
            if (currentNodeId) {
                form.action = `${updateUrl}/${currentNodeId}`;
                form.method = "POST";
                form.querySelector('input[name="_method"]').value = "PUT";
            }
        });
    });

    // 点击背景隐藏表单
    document.addEventListener('click', function(event) {
        // 如果点击的区域不在 formDivb 内且表单显示，则隐藏表单
        if (formDiv && formDiv.style.display === 'flex' && !formDivb.contains(event.target)) {
            hideForm();
        }
    });

    // 点击关闭按钮隐藏表单
    if (closeButton) {
        closeButton.addEventListener('click', function(event) {
            hideForm();
        });
    }

    // 创建按钮的点击事件
    if (createBtn) {
        createBtn.addEventListener('click', function(event) {
            form.action = createUrl;
            form.method = "POST";
            form.querySelector('input[name="_method"]').value = "";
            document.getElementById('editParentId').value = ""; // 清空父节点ID以表示创建新节点
        });
    }

    // 删除按钮的点击事件
    if (deleteBtn) {
        deleteBtn.addEventListener('click', function(event) {
            if (currentNodeId) {
                form.action = `${deleteUrl}/${currentNodeId}`;
                form.method = "POST";
                form.querySelector('input[name="_method"]').value = "DELETE";
            }
        });
    }
});