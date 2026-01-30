<h1>学生詳細</h1>

<p>ID：{{ $student->id }}</p>
<p>学生番号：{{ $student->student_number }}</p>
<p>名前：{{ $student->name }}</p>
<p>学年：{{ $student->grade }}</p>
<p>住所：{{ $student->address }}</p>
<p>コメント：{{ $student->comment }}</p>

<p>
  <a href="/students">一覧へ</a>
  <a href="/students/{{ $student->id }}/edit">編集へ</a>
  <a href="/students/{{ $student->id }}/grades/create">成績を登録</a>
</p>

<form method="POST" action="/students/{{ $student->id }}" onsubmit="return confirm('削除しますか？')">
  @csrf
  @method('DELETE')
  <button type="submit">削除</button>
</form>

<hr>

<h2>成績</h2>

<h3>成績検索</h3>

<p>
  学年：
  <select id="filter-grade">
    <option value="">すべて</option>
    @for ($i = 1; $i <= 6; $i++)
      <option value="{{ $i }}">{{ $i }}年</option>
    @endfor
  </select>

  学期：
  <select id="filter-term">
    <option value="">すべて</option>
    <option value="1">1学期</option>
    <option value="2">2学期</option>
    <option value="3">3学期</option>
  </select>
</p>


<form method="GET" action="/students/{{ $student->id }}">
  <select name="grade">
    <option value="">学年（全て）</option>
    @for ($i = 1; $i <= 6; $i++)
      <option value="{{ $i }}" {{ (string)request('grade') === (string)$i ? 'selected' : '' }}>
        {{ $i }}年
      </option>
    @endfor
  </select>

  <select name="term">
    <option value="">学期（全て）</option>
    <option value="1" {{ (string)request('term') === '1' ? 'selected' : '' }}>1学期</option>
    <option value="2" {{ (string)request('term') === '2' ? 'selected' : '' }}>2学期</option>
    <option value="3" {{ (string)request('term') === '3' ? 'selected' : '' }}>3学期</option>
  </select>

  <button type="submit">検索</button>
  <a href="/students/{{ $student->id }}">クリア</a>
</form>

<hr>


@if ($grades->isEmpty())
  <p>成績はまだありません。</p>
@else
  <ul>
  <ul id="grade-list">
    @foreach ($grades as $g)
      <li>
        成績ID: {{ $g->id }}
        / 学年: {{ $g->grade }}
        / 学期: {{ $g->term }}
        / 国語: {{ $g->japanese }}
        <a href="/students/{{ $student->id }}/grades/{{ $g->id }}/edit">編集</a>
        <form method="POST"
              action="/students/{{ $student->id }}/grades/{{ $g->id }}"
              onsubmit="return confirm('この成績を削除しますか？')"
              style="display:inline;">
          @csrf
          @method('DELETE')
          <button type="submit">削除</button>
        </form>
      </li>
    @endforeach
  </ul>
@endif

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
$(function () {

  function fetchGrades() {
    $.ajax({
      url: '/students/{{ $student->id }}/grades/ajax',
      type: 'GET',
      data: {
        grade: $('#filter-grade').val(),
        term: $('#filter-term').val()
      },
      dataType: 'json'
    })
    .done(function (data) {
      let html = '';

      if (data.length === 0) {
        html = '<li>該当する成績がありません。</li>';
      } else {
        data.forEach(function (g) {
          html += `
            <li>
              成績ID: ${g.id}
              / 学年: ${g.grade}
              / 学期: ${g.term}
              / 国語: ${g.japanese}
              <a href="/students/{{ $student->id }}/grades/${g.id}/edit">編集</a>
            </li>
          `;
        });
      }

      $('#grade-list').html(html);
    })
    .fail(function (xhr) {
      console.log('Ajax失敗', xhr.status, xhr.responseText);
      alert('通信エラーが発生しました');
    });
  }

  // 学年・学期を変えたら検索
  $('#filter-grade, #filter-term').on('change', fetchGrades);

});
</script>
