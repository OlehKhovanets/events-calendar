@extends('layouts.main')

@section('content')
    <div class="page-header">
        <h1>CalendarEvents / Show </h1>
    </div>


    <div class="row">
        <div class="col-md-12">

                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static">{{$calendarEvent->id}}</p>
                </div>
                <div class="form-group">
                    <label for="title">TITLE</label>
                    <p class="form-control-static">{{$calendarEvent->title}}</p>
                </div>
                <div class="form-group">
                    <label for="start">START</label>
                    <p class="form-control-static">{{$calendarEvent->start}}</p>
                </div>
                <div class="form-group">
                    <label for="end">END</label>
                    <p class="form-control-static">{{$calendarEvent->end}}</p>
                </div>
                <div class="form-group">
                    <label for="is_all_day">IS_ALL_DAY</label>
                    <p class="form-control-static">{{$calendarEvent->is_all_day}}</p>
                </div>
                <div class="form-group">
                    <label for="background_color">BACKGROUND_COLOR</label>
                    <p class="form-control-static">{{$calendarEvent->background_color}}</p>
                </div>
                <div class="form-group">
                    <label for="background_color">IMAGE</label>
                    <img src="{{$file}}"/>
                </div>



            <a class="btn btn-default" href="{{ route('calendar_events.index') }}">Back</a>
            <a class="btn btn-warning" href="{{ route('calendar_events.edit', $calendarEvent->id) }}">Edit</a>
        </div>
    </div>


@endsection