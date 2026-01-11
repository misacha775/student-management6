@if (session('success'))
  <p style="color:green;">{{ session('success') }}</p>
@endif

@if ($errors->any())
  <ul style="color:red;">
    @foreach ($errors->all() as $e)
      <li>{{ $e }}</li>
    @endforeach
  </ul>
@endif


<h1>学生編集</h1>

<form method="POST" action="/students/{{ $student->id }}">
    @csrf
    @method('PATCH')

    <p>
        学生番号：<br>
        <input type="text" name="student_number" value="{{ $student->student_number }}">
    </p>

    <p>
        名前：<br>
        <input type="text" name="name" value="{{ $student->name }}">
    </p>

    <p>
        学年：<br>
        <input type="text" name="grade" value="{{ $student->grade }}">
    </p>

    <p>
        住所：<br>
        <input type="text" name="address" value="{{ $student->address }}">
    </p>

    <p>
        コメント：<br>
        <textarea name="comment">{{ $student->comment }}</textarea>
    </p>

    <button type="submit">更新</button>
</form>

<p>
  <a href="/students/{{ $student->id }}">詳細へ戻る</a>
</p>
