@extends('layouts.default')
<style>
  th{
    background-color: #289adc;
    color: white;
    padding: 5px 40px;
  }
  tr:nth-child(odd) td{
    background-color: #ffffff;
  }
  td{
    padding: 25px 40px;
    background-color: #eeeeee;
    text-align: center;
  }
</style>
@section('title','直接指定する場合は第2引数に指定する')
@section('content')
  <table>
    <tr>
      {{-- <th>id</th>
      <th>name</th>
      <th>age</th>
      <th>nationality</th> --}}
      <th>Data</th>
    </tr>
    @foreach ($items as $tbl_item)
        <tr>
          {{-- <td>{{$tbl_item->id}}</td>
          <td>{{$tbl_item->name}}</td>
          <td>{{$tbl_item->age}}</td>
          <td>{{$tbl_item->nationality}}</td> --}}
          <td>{{$tbl_item->getDetail()}}</td>
        </tr>
    @endforeach
  </table>
@endsection