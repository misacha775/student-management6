<h1>学生表示</h1>

<button id="sort-grade-asc">学年昇順</button>
<button id="sort-grade-desc">学年降順</button>

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
    <td>{{ $student->grade }}年</td>
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

  let currentSort = ''; 

  function fetchStudents(sort) {
    if (sort !== undefined) {
      currentSort = sort;
    }

    $.ajax({
      url: '/students/ajax',
      type: 'GET',
      data: {
        sort: currentSort,
        sort_by: 'grade', 
        name: $('#name').val(),
        grade: $('#grade').val()
      },
      dataType: 'json'
    })
    .done(function (data) {
      let html = '';

      if (data.length === 0) {
        html = '<tr><td colspan="3">該当する学生がいません。</td></tr>';
      } else {

        data.forEach(function (s) {
          html += `
            <tr>
              <td>${s.grade}年</td>
              <td>${s.name}</td>
              <td>
                <a href="/students/${s.id}">詳細表示</a>
              </td>
            </tr>
          `;
        });
      }

      $('#student-list').html(html);
    })
    .fail(function (xhr) {
      console.log('Ajax失敗', xhr.status, xhr.responseText);
    });
  }

  $('#sort-grade-asc').on('click', function () {
    fetchStudents('asc');
  });

  $('#sort-grade-desc').on('click', function () {
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

     <p>
      学年：<br>
       <select name="grade" id="grade">
       <option value="">選択してください</option>
       @for ($i = 1; $i <= 6; $i++)
       <option value="{{ $i }}">{{ $i }}年</option>
       @endfor
       </select>
    </p>


  
    

   
    <button type="submit" class="btn btn-primary">検索</button>
    <a href="/students" class="btn btn-secondary">クリア</a>
</form>





