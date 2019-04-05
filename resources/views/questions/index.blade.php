@extends('adminlte::page')

@section('title', 'Câu hỏi')

@section('content_header')
    <h1>Câu hỏi</h1>
@stop

@section('content')
  <p>
    <a href="{{ route('questions.create') }}" class="btn btn-success">
      <i class="fa fa-plus-circle"></i> Thêm mới
    </a>
  </p>
  <section class="content">
    <div class="row">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Danh sách câu hỏi</h3>
        </div>
        <div class="box-body">
          <table class="table table-bordered">
            <tr>
              <th style="width: 50px">#</th>
              <th style="width: 500px">Câu hỏi</th>
              <th>Khối lớp học</th>
              <th>Bộ môn học</th>
              <th style="width: 150px"></th>
            </tr>
            @if (count($questions) > 0)
              @foreach ($questions as $question)
                  <tr data-entry-id="{{ $question->id }}">
                      <td>{{ $question->id }}.</td>
                      <td>{{ $question->title }}</td>
                      <td>{{ $question->level->title }}</td>
                      <td>{{ $question->subject->title }}</td>
                      <td>
                          <a href="{{ route('questions.show',[$question->id]) }}" class="btn btn-xs btn-primary">
                            <i class="fa fa-eye"></i>
                          </a>
                          <a href="{{ route('questions.edit',[$question->id]) }}" class="btn btn-xs btn-info">
                            <i class="fa  fa-edit "></i>
                          </a>
                          {!! Form::open(array(
                              'style' => 'display: inline-block;',
                              'method' => 'DELETE',
                              'onsubmit' => "return confirm('Bạn có muốn xoá không?');",
                              'route' => ['questions.destroy', $question->id])) !!}
                          {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-xs btn-danger'] )  }}
                          {!! Form::close() !!}
                      </td>
                  </tr>
              @endforeach
            @else
                <tr>
                    <td colspan="5">Không có bản ghi nào</td>
                </tr>
            @endif
          </table>
          {{ $questions->links() }}
        </div>
      </div>
    </div>
  </section>
@stop
