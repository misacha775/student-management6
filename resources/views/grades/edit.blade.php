<h1>成績編集</h1>

<form method="POST" action="/students/{{ $student->id }}/grades/{{ $grade->id }}">
  @csrf
  @method('PATCH')

  <p>
    学年：<br>
    <select name="grade">
      @for ($i = 1; $i <= 6; $i++)
        <option value="{{ $i }}" {{ $grade->grade == $i ? 'selected' : '' }}>
          {{ $i }}年
        </option>
      @endfor
    </select>
  </p>

  <p>
    学期：<br>
    <select name="term">
      <option value="1" {{ $grade->term == 1 ? 'selected' : '' }}>1学期</option>
      <option value="2" {{ $grade->term == 2 ? 'selected' : '' }}>2学期</option>
      <option value="3" {{ $grade->term == 3 ? 'selected' : '' }}>3学期</option>
    </select>
  </p>

  <p>
    国語：<br>
    <input type="number" name="japanese" value="{{ $grade->japanese }}" min="0" max="100">
  </p>

  <p>
    数学：<br>
    <input type="number" name="math" value="{{ $grade->math }}" min="0" max="100">
  </p>

  <p>
    英語：<br>
    <input type="number" name="english" value="{{ $grade->english }}" min="0" max="100">
  </p>

  <p>
  理科：<br>
  <input type="number" name="science"
         value="{{ $grade->science }}" min="0" max="100">
</p>

<p>
  社会：<br>
  <input type="number" name="social_studies"
         value="{{ $grade->social_studies }}" min="0" max="100">
</p>

<p>
  音楽：<br>
  <input type="number" name="music"
         value="{{ $grade->music }}" min="0" max="100">
</p>

<p>
  家庭科：<br>
  <input type="number" name="home_economics"
         value="{{ $grade->home_economics }}" min="0" max="100">
</p>

<p>
  美術：<br>
  <input type="number" name="art"
         value="{{ $grade->art }}" min="0" max="100">
</p>

<p>
  保健体育：<br>
  <input type="number" name="health_and_physical_education"
         value="{{ $grade->health_and_physical_education }}" min="0" max="100">
</p>


  <button type="submit">更新</button>
</form>


  <a href="/students/{{ $student->id }}" class="btn btn-secondary">
  戻る
</a>

