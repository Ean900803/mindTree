{{-- <!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增</title>
</head>
<body> --}}
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('funcTree.store') }}" method="POST" class="p-4 bg-white shadow-md rounded-lg  mx-auto">
        @csrf
        <div class="mb-4">
            <label for="value" class="block text-gray-700 font-bold mb-2">內容:</label>
            <input type="text" id="value" name="value" required class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
    
        <div class="mb-4">
            <label for="parent_id" class="block text-gray-700 font-bold mb-2">Parent ID:</label>
            <input type="text" id="parent_id" name="parent_id" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
    
        <div class="mb-4">
            <span class="block text-gray-700 font-bold mb-2">系統:</span>
            <label class="inline-flex items-center">
                <input type="radio" name="system" id="cloud" value="cloud" class="form-radio text-blue-500">
                <span class="ml-2">雲</span>
            </label>
            <label class="inline-flex items-center ml-4">
                <input type="radio" name="system" id="sixth" value="sixth" class="form-radio text-blue-500">
                <span class="ml-2">六代</span>
            </label>
        </div>
    
        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">
            建立
        </button>
    </form>
{{-- </body>
</html> --}}

{{-- <input type="checkbox" id="system_sixth" name="system" value="六代">
        <label for="system_sixth">六代</label>
        <input type="checkbox" id="system_cloud" name="system" value="雲">
        <label for="system_cloud">雲</label> --}}