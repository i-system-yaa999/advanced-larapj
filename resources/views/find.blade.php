@extends('layouts.default')
<style>
  th{
    background-color: #289adc;
    color: white;
    padding: 5px 40px;
  }
  td{
    padding: 25px 40px;
    background-color: #eeeeee;
    text-align: center;
  }
</style>
@section('title','find.blade.php')
@section('content')
  <form action="find" method="POST">
    @csrf
    <input type="text" name="input" value="{{$input}}">
    <input type="submit" value="見つける">
  </form>
  @if (@isset($item))
    <table>
      <tr>
        <th>Data</th>
      </tr>
      <tr><td>{{$item->getDetail()}}</td></tr>
    </table>
  @endif
@endsection