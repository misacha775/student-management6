<h1>学年管理</h1>

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

<h2>学年一覧</h2>

<table border="1" cellpadding="6">
  <tr>
    <th>ID</th>
    <th>学年名</th>
    <th>更新</th>
  </tr>

  @foreach ($grades as $g)
    <tr>
      <td>{{ $g->id }}</td>
      <td>
        <form method="POST" action="/school-grades/{{ $g->id }}">
          @csrf
          @method('PATCH')
          <input type="text" name="name" value="{{ $g->name }}">
      </td>
      <td>
          <button type="submit">更新</button>
        </form>
      </td>
    </tr>
  @endforeach
</table>

<hr>

<h2>学年追加</h2>

<form method="POST" action="/school-grades">
  @csrf
  <input type="text" name="name" placeholder="例：1年生">
  <button type="submit">追加</button>
</form>

<p>
  <a href="/menu">メニューへ戻る</a>
</p>
