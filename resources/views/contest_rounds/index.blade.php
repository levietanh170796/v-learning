@extends('adminlte::page')

@section('title', 'Vòng kiểm tra')

@section('content_header')
    <h1>Vòng kiểm tra</h1>
@stop

@section('content')
  <p>
    <a href="{{ route('contest_rounds.create') }}" class="btn btn-success">
      <i class="fa fa-plus-circle"></i> Thêm mới
    </a>
  </p>
  <section class="content">
    <div class="row">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Danh sách vòng kiểm tra</h3>
        </div>
        <div class="box-body">
          <table class="table table-bordered">
            <tr>
              <th style="width: 50px">#</th>
              <th style="width: 500px">Tên vòng kiểm tra</th>
              <th>Tổng số câu hỏi</th>
              <th>Số câu hỏi dễ</th>
              <th>Số câu hỏi trung bình</th>
              <th>Số câu khó</th>
              <th style="width: 100px"></th>
            </tr>
            @if (count($contest_rounds) > 0)
              @foreach ($contest_rounds as $contest_round)
                  <tr data-entry-id="{{ $contest_round->id }}">
                      <td>{{ $contest_round->id }}.</td>
                      <td>{{ $contest_round->title }}</td>
                      <td>{{ $contest_round->quantity_questions }}</td>
                      <td>{{ $contest_round->quantity_easys }}</td>
                      <td>{{ $contest_round->quantity_normals }}</td>
                      <td>{{ $contest_round->quantity_hards }}</td>
                      <td>
                          <a href="{{ route('contest_rounds.show',[$contest_round->id]) }}" class="btn btn-xs btn-primary">
                            <i class="fa fa-eye"></i>
                          </a>
                          <a href="{{ route('contest_rounds.edit',[$contest_round->id]) }}" class="btn btn-xs btn-info">
                            <i class="fa  fa-edit "></i>
                          </a>
                          {!! Form::open(array(
                              'style' => 'display: inline-block;',
                              'method' => 'DELETE',
                              'onsubmit' => "return confirm('Bạn có muốn xoá không?');",
                              'route' => ['contest_rounds.destroy', $contest_round->id])) !!}
                          {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-xs btn-danger'] )  }}
                          {!! Form::close() !!}
                      </td>
                  </tr>
              @endforeach
            @else
                <tr>
                    <td colspan="7"><b>Không có bản ghi nào</b></td>
                </tr>
            @endif
          </table>
          {{ $contest_rounds->links() }}
        </div>
      </div>
    </div>
  </section>
@stop
