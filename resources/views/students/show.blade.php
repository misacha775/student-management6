<h1>学生詳細</h1>
<h2>学生表示</h2>
<p>名前：{{ $student->name }}</p>
<p>学年：{{ $student->grade }}</p>
<p>住所：{{ $student->address }}</p>

@if($student->img_path)
  <p>
    顔写真：<br>
    <img src="{{ asset('storage/'.$student->img_path) }}" width="150">
  </p>
@endif

<p>コメント：{{ $student->comment }}</p>



<p>
  <a href="/students/{{ $student->id }}/edit" class="btn btn-secondary">学生編集</a>
</p>


<hr>

<h2>成績表示</h2>


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
<a href="{{ url()->previous() }}" class="btn btn-secondary">
  戻る
</a>


@if ($grades->isEmpty())
  <p>成績はまだありません。</p>
@else




  <ul id="grade-list">
    @foreach ($grades as $g)
      <li>
        学年: {{ $g->grade }} / 学期: {{ $g->term }}<br>
        国語: {{ $g->japanese }}
        数学: {{ $g->math }}
        理科: {{ $g->science }}
        社会: {{ $g->social_studies }}
        音楽: {{ $g->music }}
        家庭科: {{ $g->home_economics }}
        英語: {{ $g->english }}
        美術: {{ $g->art }}
        保健体育: {{ $g->health_and_physical_education }}
        <br>
        <a href="/students/{{ $student->id }}/grades/{{ $g->id }}/edit">
           成績編集
        </a>
      </li>

 
    @endforeach
  </ul>
@endif

<p style="margin-top:15px;">
  <a href="/students/{{ $student->id }}/grades/create"
     class="btn btn-secondary">
     成績登録(追加)
  </a>
</p>



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
  学年: ${g.grade} / 学期: ${g.term}<br>
  国語: ${g.japanese}
  数学: ${g.math}
  理科: ${g.science}
  社会: ${g.social_studies}
  音楽: ${g.music}
  家庭科: ${g.home_economics}
  英語: ${g.english}
  美術: ${g.art}
  保健体育: ${g.health_and_physical_education}
  <br>
  <a href="/students/{{ $student->id }}/grades/${g.id}/edit">
    成績編集
  </a>
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
