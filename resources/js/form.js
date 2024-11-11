const formDiv = document.getElementById('formDiv');
const formDivb = document.getElementById('formDivb');


//Button
const closeButton = document.getElementById('closeButton');
const createBtn = document.getElementById('createNodeBtn');
const deleteBtn = document.getElementById('deleteNodeBtn');
const editBtn = document.getElementById('editNodeBtn');

//form
const form = document.getElementById('funcForm');
let currentNodeParentId;
let currentNodeId;
let currentSystem;

//作用路由
const cloudCreateUrl = window.url.cloudCreateUrl;
const cloudUpdateUrl = window.url.cloudUpdateUrl;
const cloudDeleteUrl = window.url.cloudDeleteUrl;

const sixthCreateUrl = window.url.sixthCreateUrl;
const sixthUpdateUrl = window.url.sixthUpdateUrl;
const sixthDeleteUrl = window.url.sixthDeleteUrl;
//顯示表單
function showForm() {
    formDiv.style.display = 'flex';
}

//隱藏表單
function hideForm() {
    formDiv.style.display = 'none';
}

// 所有showFormButton按鈕的事件
document.querySelectorAll('.showFormButton').forEach(button => {
    button.addEventListener('click', function(event) {
        event.stopPropagation(); // 阻止事件冒泡
        showForm();

        const nodeValue = event.target.closest('.showFormButton').getAttribute('data-nodeValue');
        currentNodeParentId = event.target.closest('.showFormButton').getAttribute('data-parentId');
        currentNodeId = event.target.closest('.showFormButton').getAttribute('data-nodeId');
        currentSystem = event.target.closest('.showFormButton').getAttribute('data-system');

        console.log('Node ID:', currentNodeId);
        console.log('Parent ID:', currentNodeParentId);
        console.log('Parent value:', nodeValue);
        console.log('system:', currentSystem);
        
        //設定表單資料屬性
        document.getElementById('funcValue').value = nodeValue;
        document.getElementById('funcParentId').value = currentNodeParentId;
        if(currentSystem == "cloud"){
            document.getElementById('cloud').checked = true;
        } else {
            document.getElementById('sixth').checked = true;
        }
        
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