<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>雲系統功能</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-green-200 flex flex-col items-center py-10">
    <div class=" mx-auto w-1/2 p-4 bg-white shadow-md rounded-xl top-0  inline-block">
        @include('create')
    </div>
    <div class="max-w-4xl sm:pr-2 sm:pl-2 mt-24">
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