@extends('adminlte::page')

@section('title', 'Khối lớp học')

@section('content_header')
    <h1>Khối lớp học</h1>
@stop

@section('content')
  <p>
    <a href="{{ route('levels.create') }}" class="btn btn-success">
      <i class="fa fa-plus-circle"></i> Thêm mới
    </a>
  </p>
  <section class="content">
    <div class="row">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Danh sách khối lớp học</h3>
        </div>
        <div class="box-body">
          <table class="table table-bordered">
            <tr>
              <th style="width: 50px">#</th>
              <th>Khối lớp học</th>
              <th>Mô tả</th>
              <th style="width: 200px"></th>
            </tr>
            @if (count($levels) > 0)
              @foreach ($levels as $level)
                  <tr data-entry-id="{{ $level->id }}">
                      <td>{{ $level->id }}.</td>
                      <td>{{ $level->title }}</td>
                      <td>{{ $level->description }}</td>
                      <td>
                          <a href="{{ route('levels.show',[$level->id]) }}" class="btn btn-xs btn-primary">
                            <i class="fa fa-eye"></i>
                          </a>
                          <a href="{{ route('levels.edit',[$level->id]) }}" class="btn btn-xs btn-info">
                            <i class="fa  fa-edit "></i>
                          </a>
                          {!! Form::open(array(
                              'style' => 'display: inline-block;',
                              'method' => 'DELETE',
                              'onsubmit' => "return confirm('Bạn có muốn xoá không?');",
                              'route' => ['levels.destroy', $level->id])) !!}
                          {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-xs btn-danger'] )  }}
                          {!! Form::close() !!}
                      </td>
                  </tr>
              @endforeach
            @else
                <tr>
                    <td colspan="3">Không có bản ghi nào</td>
                </tr>
            @endif
          </table>
          {{ $levels->links() }}
        </div>
      </div>
    </div>
  </section>
@stop
