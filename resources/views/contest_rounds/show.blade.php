@extends('adminlte::page')

@section('title', 'Vòng kiểm tra')

@section('content_header')
    <h1>Vòng kiểm tra</h1>
@stop

@section('content')
  <div class="panel panel-default">
      <div class="panel-heading">
          Thông tin 
      </div>
      
      <div class="panel-body">
          <div class="row">
              <div class="col-md-6">
                  <table class="table table-bordered table-striped">
                      <tr>
                        <th>Vai trò</th>
                        <td>{{ $contest_round->title }}</td>
                      </tr>
                      <tr>
                        <th>Tổng số câu hỏi</th>
                        <td>{{ $contest_round->quantity_questions }}</td>
                      </tr>
                      <tr>
                        <th>Số câu hỏi dễ</th>
                        <td>{{ $contest_round->quantity_easys }}</td>
                      </tr>
                      <tr>
                        <th>Số câu hỏi trung bình</th>
                        <td>{{ $contest_round->quantity_normals }}</td>
                      </tr>
                      <tr>
                        <th>Số câu hỏi khó</th>
                        <td>{{ $contest_round->quantity_hards }}</td>
                      </tr>
                  </table>
              </div>
          </div>

          <p>&nbsp;</p>

          <a href="{{ route('contest_rounds.index') }}" class="btn btn-default">Danh sách vòng kiểm tra</a>
      </div>
  </div>
@stop
