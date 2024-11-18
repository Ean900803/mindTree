# 功能樹狀圖

- 路由名為.show的是提供給工程師看
- 路由後有admin都是提供給修改人員
- views裡面normal資料夾是沒有編輯按鈕頁面
- views裡面admin資料夾有編輯按鈕頁面
- 主要依parent_id做關聯帶入子節點
- form.js主要做:
    - 點擊網頁背景、closeButton關閉
    - 點擊按鈕帶入那個node的值、屬性
    - 點擊按鈕判斷系統己帶去變更路由以及方法