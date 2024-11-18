const formDiv = document.getElementById('formDiv');
const formDivb = document.getElementById('formDivb');

// Button
const closeButton = document.getElementById('closeButton');
const createBtn = document.getElementById('createNodeBtn');
const deleteBtn = document.getElementById('deleteNodeBtn');
const editBtn = document.getElementById('editNodeBtn');
const showNodeBtn = document.getElementById('showNodeBtn');

// Form
const form = document.getElementById('funcForm');
let currentNodeParentId;
let currentNodeId;
let currentSystem;

// API URLs
const cloudCreateUrl = window.url.cloudCreateUrl;
const cloudUpdateUrl = window.url.cloudUpdateUrl;
const cloudDeleteUrl = window.url.cloudDeleteUrl;

const sixthCreateUrl = window.url.sixthCreateUrl;
const sixthUpdateUrl = window.url.sixthUpdateUrl;
const sixthDeleteUrl = window.url.sixthDeleteUrl;

// 顯示表單
function showForm() {
    formDiv.style.display = 'flex';
}

// 隱藏表單
function hideForm() {
    formDiv.style.display = 'none';
}

// 處理所有 showFormButton 按鈕事件
document.querySelectorAll('.showFormButton').forEach(button => {
    button.addEventListener('click', function (event) {
        event.stopPropagation();
        showForm();

        const nodeValue = event.target.closest('.showFormButton').getAttribute('data-nodeValue');
        currentNodeParentId = event.target.closest('.showFormButton').getAttribute('data-parentId');
        currentNodeId = event.target.closest('.showFormButton').getAttribute('data-nodeId');
        currentSystem = event.target.closest('.showFormButton').getAttribute('data-system');

        // 設定表單資料屬性
        document.getElementById('funcValue').value = nodeValue;
        document.getElementById('funcParentId').value = currentNodeParentId;

        if (currentSystem === "cloud") {
            document.getElementById('cloud').checked = true;
        } else {
            document.getElementById('sixth').checked = true;
        }
    });
});

// 點擊背景隱藏表單
document.addEventListener('click', function (event) {
    if (!formDivb.contains(event.target)) {
        hideForm();
    }
});

// 點擊 closeButton 隱藏表單
closeButton.addEventListener('click', function () {
    hideForm();
});

// 表單 AJAX 請求函數
async function sendAjaxRequest(url, method, formData) {
    const headers = {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    };

    const options = {
        method: method,
        headers: method !== 'GET' ? headers : undefined,
        body: method !== 'GET' && method !== 'DELETE' ? formData : undefined,
    };

    try {
        const response = await fetch(url, options);
        if (!response.ok) {
            console.error(`HTTP 錯誤碼: ${response.status}`);
            throw new Error(`伺服器返回錯誤: ${response.statusText}`);
        }
        return await response.json();
    } catch (error) {
        console.error('AJAX 請求錯誤:', error);
        throw error;
    }
}

editNodeBtn.addEventListener('click',function(event){
    const isConfirmed = confirm("確定要更新此筆資料?");
    if(isConfirmed){
        if(currentNodeId){
            if(currentSystem == "cloud"){
                form.action = `${cloudUpdateUrl}/${currentNodeId}`;
            } else if(currentSystem == "sixth"){
                form.action = `${sixthUpdateUrl}/${currentNodeId}`;
            }   
            form.querySelector('input[name="_method"]').value = "PUT";
        }
    }
})



createBtn.addEventListener('click', function(event) {

    const isConfirmed = confirm("確定要新增此筆資料?");
    if(isConfirmed){
        if(currentSystem == "cloud"){
            form.action = cloudCreateUrl;
        } else if(currentSystem == "sixth"){
            form.action = sixthCreateUrl;
        }
        
        form.querySelector('input[name="_method"]').value = "";
        document.getElementById('funcParentId').value = currentNodeId;
    }

});

deleteBtn.addEventListener('click', function(event) {
    const isConfirmed = confirm("確定要刪除此筆資料?");
    if(isConfirmed){
        if(currentNodeId){
            if(currentSystem == "cloud"){
                form.action = `${cloudDeleteUrl}/${currentNodeId}`;
            } else if(currentSystem == "sixth"){
                form.action = `${sixthDeleteUrl}/${currentNodeId}`;
            }
            form.querySelector('input[name="_method"]').value = "Delete";
        } 
    }
})
// 切換節點可見性
window.toggleNode = function (button) {
    const childNodes = button.parentElement.nextElementSibling;

    if (childNodes) {
        childNodes.classList.toggle('hidden');
    }
};
