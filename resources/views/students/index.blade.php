<h1>学生表示</h1>

@if ($students->count() === 0)
  <p>学生がまだ登録されていません。</p>
@else
  <table border="1" cellpadding="6">
    <thead>
  <tr>
    <th>学年</th>
    <th>名前</th>
    <th>詳細表示</th>
  </tr>
</thead>

<tbody id="student-list">
@foreach ($students as $student)
  <tr>
    <td>{{ $student->grade }}</td>
    <td>{{ $student->name }}</td>
    <td>
      <a href="/students/{{ $student->id }}"
   style="display:inline-block;
          padding:4px 10px;
          border:1px solid black;
          text-decoration:none;
          color:black;
          background:white;">
    詳細表示
</a>

</a>

    </td>
  </tr>
@endforeach
</tbody>

  </table>
@endif
{{ $students->appends(request()->query())->links() }}

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>


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
  });

  $('#grade').on('change', function () {
    fetchStudents();
  });

});
</script>


<hr>

<form method="GET" action="/students" class="d-flex gap-2 align-items-center">
    
    <input type="text" name="name" id="name" placeholder="学生名で検索"
           value="{{ request('name') }}" class="form-control">

   <select name="grade" id="grade" class="form-select">
    <option value="" disabled {{ request('grade') ? '' : 'selected' }}>学年を選択</option>
    @foreach ($grades as $g)
        <option value="{{ $g->id }}" {{ (string)request('grade') === (string)$g->id ? 'selected' : '' }}>
            {{ !empty($g->name) ? $g->name : $g->id . '年' }}
        </option>
    @endforeach
   </select>
    

   
    <button type="submit" class="btn btn-primary">検索</button>
    <a href="/students" class="btn btn-secondary">クリア</a>
</form>





