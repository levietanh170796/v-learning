@extends('adminlte::page')

@section('title', 'Câu hỏi')

@section('content_header')
    <h1>Câu hỏi</h1>
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
                        <th>Câu hỏi</th>
                        <td>{{ $question->title }}</td>
                      </tr>
                      <tr>
                        <th>Khối lớp học</th>
                        <td>{{ $question->level->title }}</td>
                      </tr>
                      <tr>
                        <th>Bộ môn học</th>
                        <td>{{ $question->subject->title }}</td>
                      </tr>
                  </table>
              </div>
          </div>

          <p>&nbsp;</p>
					<div class="box-body">
						<table class="table table-bordered">
							<tr>
								<th style="width: 50px">#</th>
								<th>Đáp án</th>
								<th>Đáp án đúng</th>
								<th style="width: 100px"></th>
							</tr>
							@foreach ($question->question_options as $answer)
								<tr data-entry-id="{{ $answer->id }}">
									<td>{{ $answer->id }}.</td>
									<td>{{ $answer->option }}</td>
									<td>{{ $answer->correct }}</td>
									<td>
										<a href="{{ route('question_options.show',[$answer->id]) }}" class="btn btn-xs btn-primary">
											<i class="fa fa-eye"></i>
										</a>
										<a href="{{ route('question_options.edit',[$answer->id]) }}" class="btn btn-xs btn-info">
											<i class="fa  fa-edit "></i>
										</a>
									</td>
								</tr>
							@endforeach
						</table>
					</div>
          <p>&nbsp;</p>

          <a href="{{ route('questions.index') }}" class="btn btn-default">Danh sách câu hỏi</a>
      </div>
  </div>
@stop
