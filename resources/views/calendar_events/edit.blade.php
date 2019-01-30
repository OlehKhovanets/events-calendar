@extends('layouts.main')

@section('content')
    <div class="page-header">
        <h1>CalendarEvents / Edit </h1>
    </div>


    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('calendar_events.update', $calendarEvent->id) }}" method="POST">
                @method('PUT')
                {{csrf_field()}}
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label>title</label>
                    <input type="text" class="form-control" name="title" placeholder='title' value="{{$calendarEvent->title}}" aria-describedby="basic-addon1">
                    @if ($errors->has('title'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('start') ? ' has-error' : '' }}">
                    <label>start</label>
                    <input type="text" class="form-control" name="start" placeholder='start' value="{{$calendarEvent->start}}" aria-describedby="basic-addon1">
                    @if ($errors->has('start'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('start') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('end') ? ' has-error' : '' }}">
                    <label>end</label>
                    <input type="text" class="form-control" name="end" placeholder='end' value="{{$calendarEvent->end}}" aria-describedby="basic-addon1">
                    @if ($errors->has('end'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('end') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('is_all_day') ? ' has-error' : '' }}">
                    <label>is_all_day</label>
                    <input type="text" class="form-control" name="is_all_day" placeholder='is_all_day' value="{{$calendarEvent->is_all_day}}" aria-describedby="basic-addon1">
                    @if ($errors->has('is_all_day'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('is_all_day') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('background_color') ? ' has-error' : '' }}">
                    <label>background_color</label>
                    <input type="text" class="form-control" name="background_color" placeholder='background_color' value="{{$calendarEvent->background_color}}" aria-describedby="basic-addon1">
                    @if ($errors->has('background_color'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('background_color') }}</strong>
                                    </span>
                    @endif
                </div>

                <a class="btn btn-default" href="{{ route('calendar_events.index') }}">Back</a>
                <button class="btn btn-primary" type="submit" >Save</button>
            </form>
        </div>
    </div>


@endsection