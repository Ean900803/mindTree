<form id="funcForm"  method="POST" class="p-4 bg-white shadow-md rounded-lg  mx-auto relative">
    @csrf
    <div class="mb-4">
        <label for="value" class="block text-gray-700 font-bold mb-2">內容:</label>
        <textarea name="value" id="funcValue" cols="65" rows="1" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
    </div>


    {{--parent_id 透過button帶入--}}
    <div class="mb-4">
        <input type="text" hidden id="funcParentId" name="parent_id"class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    {{-- 發送方式 --}}
    <input type="hidden" name="_method" value="">

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

    <button id="editNodeBtn" type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">
        更新
    </button>
    <button id="createNodeBtn" type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg ml-2 hover:bg-blue-600">
        新增
    </button>
    <button id="deleteNodeBtn" type="submit" class="bg-red-500 text-white  py-2 px-4 rounded-lg ml-2 absolute right-2 hover:bg-blue-600">
        刪除
    </button>
</form>