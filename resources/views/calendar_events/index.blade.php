@extends('layouts.main')

@section('content')
    <div class="page-header">
        <h1>CalendarEvents</h1>
    </div>


    <div class="row">
        <div class="col-md-12">
            @include('partials.messages')
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>TITLE</th>
                    <th>START</th>
                    <th>END</th>
                    <th>IS_ALL_DAY</th>
                    <th>BACKGROUND_COLOR</th>
                    <th class="text-right">OPTIONS</th>
                </tr>
                </thead>

                <tbody>

                @foreach($calendarEvents as $calendarEvent)
                    <tr>
                        <td>{{$calendarEvent->id}}</td>
                        <td>{{$calendarEvent->title}}</td>
                        <td>{{$calendarEvent->start}}</td>
                        <td>{{$calendarEvent->end}}</td>
                        <td>{{$calendarEvent->is_all_day}}</td>
                        <td>{{$calendarEvent->background_color}}</td>

                        <td class="text-right">
                            <a class="btn btn-primary" href="{{ route('calendar_events.show', $calendarEvent->id) }}">View</a>
                            <a class="btn btn-warning " href="{{ route('calendar_events.edit', $calendarEvent->id) }}">Edit</a>
                            <form action="{{ route('calendar_events.destroy', $calendarEvent->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                <input type="hidden" name="_method" value="DELETE">
                                {{csrf_field()}}
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>
            {{ $calendarEvents->links() }}
            <a class="btn btn-success" href="{{ route('calendar_events.create') }}">Create</a>
        </div>
    </div>


@endsection