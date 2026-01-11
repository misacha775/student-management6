<h1>メニュー</h1>

<ul>
  <li><a href="/students">学生表示（一覧）</a></li>
  <li><a href="/students/create">学生追加</a></li>
</ul>

<hr>

<form method="POST" action="/logout">
  @csrf
  <button type="submit">ログアウト</button>
</form>
