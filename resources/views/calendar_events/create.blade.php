@extends('layouts.app')

@section('content')
    <div class="page-header">
        <h1>CalendarEvents / Create </h1>
    </div>


    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('calendar_events.store') }}" method="POST"  enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label>title</label>
                    <input type="text" class="form-control" name="title" placeholder='title' value="{{ old('title') }}" aria-describedby="basic-addon1">
                    @if ($errors->has('title'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('start') ? ' has-error' : '' }}">
                    <label>start</label>
                    <input type="text" class="form-control" name="start" placeholder='start' value="{{ old('start') }}" aria-describedby="basic-addon1">
                    @if ($errors->has('start'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('start') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('end') ? ' has-error' : '' }}">
                    <label>end</label>
                    <input type="text" class="form-control" name="end" placeholder='end' value="{{ old('end') }}" aria-describedby="basic-addon1">
                    @if ($errors->has('end'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('end') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('is_all_day') ? ' has-error' : '' }}">
                    <label>is_all_day</label>
                    <input type="text" class="form-control" name="is_all_day" placeholder='is_all_day' value="{{ old('is_all_day') }}" aria-describedby="basic-addon1">
                    @if ($errors->has('is_all_day'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('is_all_day') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('background_color') ? ' has-error' : '' }}">
                    <label>background_color</label>
                    <input type="text" class="form-control" name="background_color" placeholder='background_color' value="{{ old('background_color') }}" aria-describedby="basic-addon1">
                    @if ($errors->has('background_color'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('background_color') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                    <label for="exampleFormControlFile1">upload file</label>
                    <input type="file" class="form-control-file" name="file">
                    @if ($errors->has('file'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('file') }}</strong>
                                    </span>
                    @endif
                </div>

                <a class="btn btn-default" href="{{ route('calendar_events.index') }}">Back</a>
                <button class="btn btn-primary" type="submit" >Create</button>
            </form>
        </div>
    </div>


@endsection