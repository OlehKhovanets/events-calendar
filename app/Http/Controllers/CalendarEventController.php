<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\CalendarEvent;
use App\Services\CloudMessaging\Context;
use App\Services\CloudMessaging\FirebaseCloudMessagingStrategy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CalendarEventController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $calendarEvents = CalendarEvent::query()->where('user_id', Auth::user()->id)->paginate();
        return view('calendar_events.index')->with('calendarEvents', $calendarEvents);
    }

    public function create()
    {
        return view('calendar_events.create');
    }

    public function store(StoreEventRequest $request)
    {
        CalendarEvent::query()->create(array_merge($request->all(),
            [
                'user_id' => Auth::user()->id,
                'file_path' => Storage::disk('local')->put('files/' . rand_path(), $request->file('file'))
            ]
        ));
        (new Context(new FirebaseCloudMessagingStrategy()))->setStrategy($request->title);

        return redirect()->route('calendar_events.index')->with('success', 'Item created successfully.');
    }

    public function show(CalendarEvent $calendarEvent)
    {
        $calendarEvent->user_id === Auth::user()->id ? : abort(404);

        Storage::disk('local')->exists($calendarEvent->file_path)
        ?$fileName = Storage::disk('local')->url($calendarEvent->file_path)
        :$fileName =  '';

        return view('calendar_events.show')->with([
            'calendarEvent'=> $calendarEvent,
            'file' => $fileName
        ]);
    }

    public function edit(CalendarEvent $calendarEvent)
    {
        $calendarEvent->user_id === Auth::user()->id ? : abort(404);

        return view('calendar_events.edit')->with('calendarEvent', $calendarEvent);
    }

    public function update(UpdateEventRequest $request, CalendarEvent $calendarEvent)
    {
        $calendarEvent->user_id === Auth::user()->id ? : abort(404);

        $calendarEvent->title            = $request->title;
        $calendarEvent->start            = $request->start;
        $calendarEvent->end              = $request->end;
        $calendarEvent->is_all_day       = $request->is_all_day;
        $calendarEvent->background_color = $request->background_color;
        $calendarEvent->save();

        return redirect()->route('calendar_events.index')->with('success', 'Item updated successfully.');
    }

    public function destroy(CalendarEvent $calendarEvent)
    {
        $calendarEvent->user_id === Auth::user()->id ? : abort(404);

        $calendarEvent->delete();
        return redirect()->route('calendar_events.index')->with('success', 'Item deleted successfully.');
    }
}