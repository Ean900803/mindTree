<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="cloudCreate-url" content="{{ route('cloud.store') }}">
    <meta name="cloudUpdate-url" content="{{ url('cloud/funcTree/admin') }}">
    <meta name="cloudDelete-url" content="{{ url('cloud/funcTree/admin') }}">
    <meta name="sixthCreate-url" content="{{ route('sixth.store') }}">
    <meta name="sixthUpdate-url" content="{{ url('sixth/funcTree/admin') }}">
    <meta name="sixthDelete-url" content="{{ url('sixth/funcTree/admin') }}">
    <title>系統功能樹狀圖</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

    <script>
        // 使用 document.querySelector() 取得 meta 標籤中的 content 值
        window.url = {
            cloudCreateUrl: document.querySelector('meta[name="cloudCreate-url"]').getAttribute('content'),
            cloudUpdateUrl: document.querySelector('meta[name="cloudUpdate-url"]').getAttribute('content'),
            cloudDeleteUrl: document.querySelector('meta[name="cloudDelete-url"]').getAttribute('content'),
            sixthCreateUrl: document.querySelector('meta[name="sixthCreate-url"]').getAttribute('content'),
            sixthUpdateUrl: document.querySelector('meta[name="sixthUpdate-url"]').getAttribute('content'),
            sixthDeleteUrl: document.querySelector('meta[name="sixthDelete-url"]').getAttribute('content')
        };
    </script>

    @vite('resources/js/form.js')
</head>