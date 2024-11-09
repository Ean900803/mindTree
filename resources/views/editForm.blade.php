@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form id="editForm"  method="POST" class="p-4 bg-white shadow-md rounded-lg  mx-auto relative">
    @csrf
    @method('PUT')
    <div class="mb-4">
        <label for="value" class="block text-gray-700 font-bold mb-2">內容:</label>
        <textarea name="value" id="editValue" cols="65" rows="1" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
    </div>

    <div class="mb-4">{{--parent_id 透過button帶入--}}
        <input type="text" value="" id="editParentId" name="parent_id"class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    {{-- <div class="mb-4">
        <input type="text" value="" id="editId" name="parent_id" required class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div> --}}

    <div class="mb-4">
        <span class="block text-gray-700 font-bold mb-2">系統:</span>
        <label class="inline-flex items-center">
            <input type="radio" name="system" id="editCloud" value="cloud" class="form-radio text-blue-500" checked>
            <span class="ml-2">雲</span>
        </label>
        <label class="inline-flex items-center ml-4">
            <input type="radio" name="system" id="editSixth" value="sixth" class="form-radio text-blue-500">
            <span class="ml-2">六代</span>
        </label>
    </div>

    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">
        更新
    </button>
    <button id="createNodeBtn" type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg ml-2 hover:bg-blue-600">
        新增
    </button>
    <button id="deleteNodeBtn" type="submit" class="bg-red-500 text-white  py-2 px-4 rounded-lg ml-2 absolute right-2 hover:bg-blue-600">
        刪除
    </button>
</form>