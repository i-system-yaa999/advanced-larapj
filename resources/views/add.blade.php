@extends('layouts.default')
<style>
  th{
    background-color: #289adc;
    color: white;
    padding: 5px 40px;
  }
  th:nth-child(4) td{
    padding: 10px;
  }
  td{
    padding: 25px 40px;
    background-color: #eeeeee;
    text-align: center;
  }
  input{
    padding: 10px 20px;
    background-color: #289adc;
    border: none;
    color: white;
  }
</style>
@section('title','addblade.php')
@section('content')
@if (count($errors)>0)
  <ul>
    @foreach ($errors->all() as $error)
      <li>{{$error}}</li>
    @endforeach
  </ul>
@endif
  <form action="/add" method="POST">
    <table>
      @csrf
      <tr><th>name<</th><td><input type="text" name="name"></td></tr>
      <tr><th>age<</th><td><input type="text" name="age"></td></tr>
      <tr><th>nationality<</th><td><input type="text" name="nationality"></td></tr>
      <tr><th><</th><td><button>送信</button></td></tr>
    </table>
  </form>
@endsection