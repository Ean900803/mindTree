<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增</title>
</head>
<body>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('funcTree.store') }}" method="POST">
        @csrf
        <label for="value">內容:</label>
        <input type="text" id="value" name="value" required>
        <br><br>

        <label for="parent_id">Parent ID:</label>
        <input type="text" id="parent_id" name="parent_id">
        <br><br>

        <label for="cloud">系統:</label>
        <input type="radio" name="system" id="cloud" value="cloud"><label for="cloud">雲</label>
        <input type="radio" name="system" id="sixth" value="sixth"><label for="sixth">六代</label>
        <br><br>

        <button type="submit">建立</button>
    </form>
</body>
</html>

{{-- <input type="checkbox" id="system_sixth" name="system" value="六代">
        <label for="system_sixth">六代</label>
        <input type="checkbox" id="system_cloud" name="system" value="雲">
        <label for="system_cloud">雲</label> --}}