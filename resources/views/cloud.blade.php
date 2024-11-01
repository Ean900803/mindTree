<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>雲系統功能</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-green-200 flex justify-center py-10">
    <div class="w-full max-w-4xl">
        <ul class="flex flex-col items-center">
            @foreach ($nodes as $node)
                @include('node', ['node' => $node])
            @endforeach
        </ul>
    </div>
</body>
</html>