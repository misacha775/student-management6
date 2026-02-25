@extends('layouts.app')

@section('content')

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


<h1>学生編集</h1>

<form method="POST" action="/students/{{ $student->id }}" enctype="multipart/form-data">

    @csrf
    @method('PATCH')

    <p>
        学生id：{{ $student->student_number }}
    </p>

    <p>
      学年：<br>
      <select name="grade">
      @for ($i = 1; $i <= 6; $i++)
        <option value="{{ $i }}"
          {{ (string)$student->grade === (string)$i ? 'selected' : '' }}>
         {{ $i }}年
        </option>
    @endfor
  </select>
</p>


    <p>
        名前：<br>
        <input type="text" name="name" value="{{ $student->name }}">
    </p>



    <p>
        住所：<br>
        <input type="text" name="address" value="{{ $student->address }}">
    </p>


    <p>
        顔写真：<br>
        <input type="file" name="photo">
    </p>


    <p>
        コメント：<br>
        <textarea name="comment">{{ $student->comment }}</textarea>
    </p>

    <button type="submit">編集</button>
</form>

<a href="/students/{{ $student->id }}" class="btn btn-secondary">
  戻る
</a>

@endsection