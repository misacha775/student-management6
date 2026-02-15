@if ($errors->any())
  <ul style="color:red;">
    @foreach ($errors->all() as $e)
      <li>{{ $e }}</li>
    @endforeach
  </ul>
@endif



<h1>成績登録</h1>

<p>
  学生番号：{{ $student->student_number }}<br>
  名前：{{ $student->name }}
</p>

<form method="POST" action="/students/{{ $student->id }}/grades">
  @csrf

  <p>
    学年：<br>
    <select name="grade">
      @for ($i = 1; $i <= 6; $i++)
        <option value="{{ $i }}">{{ $i }}年</option>
      @endfor
    </select>
  </p>

  <p>
    学期：<br>
    <select name="term">
      <option value="1">1学期</option>
      <option value="2">2学期</option>
      <option value="3">3学期</option>
    </select>
  </p>

  <p>
    国語：<br>
    <input type="number" name="japanese" min="0" max="100">
  </p>

  <p>
    数学：<br>
    <input type="number" name="math" min="0" max="100">
  </p>

  <p>
    英語：<br>
    <input type="number" name="english" min="0" max="100">
  </p>

  <p>
  理科：<br>
  <input type="number" name="science" min="0" max="100">
</p>

<p>
  社会：<br>
  <input type="number" name="social_studies" min="0" max="100">
</p>

<p>
  音楽：<br>
  <input type="number" name="music" min="0" max="100">
</p>

<p>
  家庭科：<br>
  <input type="number" name="home_economics" min="0" max="100">
</p>

<p>
  美術：<br>
  <input type="number" name="art" min="0" max="100">
</p>

<p>
  保健体育：<br>
  <input type="number" name="health_and_physical_education" min="0" max="100">
</p>


  <button type="submit">登録</button>
</form>

<p>
 <a href="/students/{{ $student->id }}" class="btn btn-secondary">
  戻る
</a>

</p>
