<?php

namespace App\Services\Calendar;

use MaddHatter\LaravelFullcalendar\Calendar;

class CreateCalendar implements CreateCalendarInterface
{
    public function create($userCalendarEvents)
    {
        $events = [];

        foreach ($userCalendarEvents as $calendarEvent) {
            $events[] = Calendar::event(

                $calendarEvent->title,
                $calendarEvent->is_all_day,
                $calendarEvent->start,
                $calendarEvent->end,
                $calendarEvent->id,
                [
                    'color' => $calendarEvent->background_color,
                    'url' => '/events/' . $calendarEvent->id,
                ]
            );
        }

        $calendar = \Calendar::addEvents($events);

        return $calendar;
    }
}