<h1>学生リスト</h1>

<form method="GET" action="/students">
  <input type="text" name="name" placeholder="学生名で検索" value="{{ request('name') }}">

  <select name="grade">
    <option value="">学年を選択</option>
    @foreach ($grades as $g)
      <option value="{{ $g->id }}" {{ (string)request('grade') === (string)$g->id ? 'selected' : '' }}>
        {{ $g->name ?? ($g->id . '年') }}
      </option>
    @endforeach
  </select>

  <button type="submit">検索</button>
  <a href="/students">クリア</a>
</form>


<hr>

<hr>


<p>
  <a href="/students/create">＋ 学生を登録</a>
</p>

@if ($students->count() === 0)
  <p>学生がまだ登録されていません。</p>
@else
  <table border="1" cellpadding="6">
    <thead>
      <tr>
        <th>ID</th>
        <th>学生番号</th>
        <th>名前</th>
        <th>学年</th>
        <th>操作</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($students as $student)
        <tr>
          <td>{{ $student->id }}</td>
          <td>{{ $student->student_number }}</td>
          <td>{{ $student->name }}</td>
          <td>{{ $student->grade }}</td>
          <td>
            <a href="/students/{{ $student->id }}">詳細</a>
            <a href="/students/{{ $student->id }}/edit">編集</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endif
{{ $students->appends(request()->query())->links() }}

