<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>雲系統功能</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body x-data="{ showForm: false, toggleForm() { this.showForm = !this.showForm } }" class="bg-green-100 flex flex-col items-center py-10">
    <div class="text-4xl font-medium text-gray-700 mb-3">
        <h1>雲系統開發功能樹狀圖</h1>
    </div>

    <!-- 將 x-data 放在包含整個區塊的 div 上 -->
        <div x-show="showForm" class="mt-2">
            @include('create')
        </div>

        <div class="tree-container max-w-4xl sm:pr-2 sm:pl-2 mt-24">
            <ul class="tree flex flex-col items-center">
                <ul class="tree flex flex-col items-center">
                    @foreach ($nodes as $node)
                        @include('node', ['node' => $node])
                    @endforeach
                </ul>
            </ul>
        </div>
</body>
</html>