@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('funcTree.store') }}" id="createForm" method="POST" class="p-4 bg-white shadow-md rounded-lg  mx-auto">
    @csrf
    <div class="mb-4">
        <label for="value" class="block text-gray-700 font-bold mb-2">新增內容:</label>
        <textarea name="value" id="value" cols="65" rows="1" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
    </div>

    <div class="mb-4">{{--parent_id 透過button帶入--}}
        <input type="text" value="" id="parent_id" name="parent_id" required class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    <div class="mb-4">
        <span class="block text-gray-700 font-bold mb-2">系統:</span>
        <label class="inline-flex items-center">
            <input type="radio" name="system" id="cloud" value="cloud" class="form-radio text-blue-500" checked>
            <span class="ml-2">雲</span>
        </label>
        <label class="inline-flex items-center ml-4">
            <input type="radio" name="system" id="sixth" value="sixth" class="form-radio text-blue-500">
            <span class="ml-2">六代</span>
        </label>
    </div>

    <button type="submit" id="formSubmit" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">
        建立
    </button>
</form>