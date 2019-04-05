@extends('adminlte::page')

@section('title', 'Vòng kiểm tra')

@section('content_header')
    <h1>Vòng kiểm tra</h1>
@stop

@section('content')
  <div class="col col-md-6">
      {!! Form::model($contest_round, ['method' => 'PUT', 'route' => ['contest_rounds.update', $contest_round->id]]) !!}
        <div class="panel panel-default">
          <div class="panel-heading">
              Sửa thông tin
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-xs-12 form-group">
                  @if(count($errors))
                    <div class="alert alert-danger">
                      <strong>Lỗi!</strong>
                      <br/>
                      <ul>
                        @foreach($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                  @endif
                  {!! Form::label('title', 'Tên vòng kiểm tra*', ['class' => 'control-label']) !!}
                  {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '']) !!}
                  {!! Form::label('quantity_questions', 'Tổng số câu hỏi*', ['class' => 'control-label']) !!}
                  {!! Form::number('quantity_questions', old('quantity_questions'), ['class' => 'form-control', 'placeholder' => '']) !!}
                  {!! Form::label('quantity_easys', 'Số lượng câu hỏi dễ*', ['class' => 'control-label']) !!}
                  {!! Form::number('quantity_easys', old('quantity_easys'), ['class' => 'form-control', 'placeholder' => '']) !!}
                  {!! Form::label('quantity_normals', 'Số lượng câu hỏi trung bình*', ['class' => 'control-label']) !!}
                  {!! Form::number('quantity_normals', old('quantity_normals'), ['class' => 'form-control', 'placeholder' => '']) !!}
                  {!! Form::label('quantity_hards', 'Số lượng câu hỏi khó*', ['class' => 'control-label']) !!}
                  {!! Form::number('quantity_hards', old('quantity_hards'), ['class' => 'form-control', 'placeholder' => '']) !!}
              </div>
            </div>
          </div>
        </div>
      {!! Form::submit('Lưu thông tin', ['class' => 'btn btn-success']) !!}
      {!! Form::close() !!}
  </div>
@stop
