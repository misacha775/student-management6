<h1>学生登録</h1>

<form method="POST" action="/students">
    @csrf

    <p>
        学生番号：<br>
        <input type="text" name="student_number">
    </p>

    <p>
        名前：<br>
        <input type="text" name="name">
    </p>

    <p>
        学年：<br>
        <input type="text" name="grade">
    </p>

    <p>
        住所：<br>
        <input type="text" name="address">
    </p>

    <p>
        コメント：<br>
        <textarea name="comment"></textarea>
    </p>

    <button type="submit">登録</button>
</form>

<p>
  <a href="/students">一覧へ戻る</a>
</p>
