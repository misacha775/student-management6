<h1>学生リスト</h1>

<button id="sort-asc">学年 昇順</button>
<button id="sort-desc">学年 降順</button>


<form method="GET" action="/students">
  <input type="text" name="name"  id="name" placeholder="学生名で検索" value="{{ request('name') }}">

  <select name="grade" id ="grade">
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
    <tbody id="student-list">
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

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<
<script>
$(function () {

  let currentSort = ''; // '', 'asc', 'desc'

  function fetchStudents(sort) {
    if (sort !== undefined) {
      currentSort = sort;
    }

    $.ajax({
      url: '/students/ajax',
      type: 'GET',
      data: {
        sort: currentSort,
        name: $('#name').val(),
        grade: $('#grade').val()
      },
      dataType: 'json'
    })
    .done(function (data) {
      let html = '';

      data.forEach(function (s) {
        html += `
          <tr>
            <td>${s.id}</td>
            <td>${s.student_number ?? ''}</td>
            <td>${s.name}</td>
            <td>${s.grade}</td>
            <td>
              <a href="/students/${s.id}">詳細</a>
              <a href="/students/${s.id}/edit">編集</a>
            </td>
          </tr>
        `;
      });

      $('#student-list').html(html);
    })
    .fail(function (xhr) {
      console.log('Ajax失敗', xhr.status, xhr.responseText);
    });
  }

  
  $('#sort-asc').on('click', function () {
    fetchStudents('asc');
  });

  $('#sort-desc').on('click', function () {
    fetchStudents('desc');
  });

  
  $('#name').on('keyup', function () {
    fetchStudents(); 

  $('#grade').on('change', function () {
    fetchStudents();
  });

});
</script>

