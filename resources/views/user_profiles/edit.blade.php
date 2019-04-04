@extends('adminlte::page')

@section('title', 'Vai trò')

@section('content_header')
    <h1>Cập nhật thông tin người dùng</h1>
@stop

@section('content')
  <div class="col col-md-6">
      {!! Form::model($userProfile, ['method' => 'PUT', 'route' => ['user_profiles.update', $userProfile->id]]) !!}
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
                  {!! Form::label('address', 'Địa chỉ', ['class' => 'control-label']) !!}
                  {!! Form::text('address', old('title'), ['class' => 'form-control', 'placeholder' => '']) !!}
                  {!! Form::label('phone_number', 'Số điện thoại', ['class' => 'control-label']) !!}
                  {!! Form::text('phone_number', old('phone_number'), ['class' => 'form-control', 'placeholder' => '']) !!}
                  {!! Form::label('job', 'Nghề nghiệp', ['class' => 'control-label']) !!}
                  {!! Form::text('job', old('job'), ['class' => 'form-control', 'placeholder' => '']) !!}
              </div>
            </div>
          </div>
        </div>
      {!! Form::submit('Lưu thông tin', ['class' => 'btn btn-success']) !!}
      {!! Form::close() !!}
  </div>
@stop
