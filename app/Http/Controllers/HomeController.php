<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventSearchRequest;
use App\Models\CalendarEvent;
use App\Services\Calendar\CreateCalendarInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    protected $createCalendar;

    public function __construct(CreateCalendarInterface $createCalendar)
    {
        $this->middleware('auth');
        $this->createCalendar = $createCalendar;
    }

    public function index(EventSearchRequest $request)
    {
        $userCalendarEvents = CalendarEvent::query()
            ->when($request->search !== '', function(Builder $builder) use ($request){
                return $builder->where('title', 'LIKE', '%' . $request->search . '%');

            })
            ->where('user_id', Auth::user()->id)
            ->get();

        $calendar = $this->createCalendar->create($userCalendarEvents);


        return view('home', compact('calendar'));
    }
}
