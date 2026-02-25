<h1>学生登録</h1>

<form method="POST" action="/students" enctype="multipart/form-data">
    @csrf

    <p>
      学年：<br>
       <select name="grade" required>
       <option value="">選択してください</option>
       @for ($i = 1; $i <= 6; $i++)
       <option value="{{ $i }}">{{ $i }}年</option>
       @endfor
       </select>
    </p>

    <p>
        名前：<br>
        <input type="text" name="name" required>
    </p>

    <p>
        住所：<br>
        <input type="text" name="address" required>
    </p>

    <p>
        顔写真：<br>
        <input type="file" name="photo" accept="image/*">
    </p>

    <button type="submit" class="btn btn-secondary">登録</button>

    <a href="{{ url()->previous() }}" class="btn btn-secondary">戻る</a>
</form>
