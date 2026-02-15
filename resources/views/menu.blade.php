@extends('layouts.app')

@section('content')


<div class="container text-center">

  <h2 class="mb-4">メニュー</h2>

  <div class="d-flex flex-column align-items-center gap-3">

    <a href="/school-grades" class="btn btn-lg w-50 simple-btn">
      学年更新
    </a>

    <a href="/students/create" class="btn btn-lg w-50 simple-btn">
      学生登録
    </a>

    <a href="/students" class="btn btn-lg w-50 simple-btn">
      学生表示
    </a>

  </div>

</div>


<style>
.simple-btn {
  background: white !important;
  color: black !important;
  border: 1px solid black !important;
  border-radius: 4px;
  display: inline-block;
}

.simple-btn:hover {
  background: #f5f5f5 !important;
  color: black !important;
}

</style>
