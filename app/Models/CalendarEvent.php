<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use MaddHatter\LaravelFullcalendar\Event;

/**
 * @property string title
 * @property DateTime start
 * @property DateTime end
 * @property string is_all_day
 * @property string background_color
 * @property integer id
 * @property string file_path
 * @property integer user_id
 */
class CalendarEvent extends Model implements Event
{

    protected $fillable = [
        'title',
        'start',
        'end',
        'is_all_day',
        'background_color',
        'user_id',
        'file_path'
    ];

    protected $dates = ['start', 'end'];

    public function getId() {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function isAllDay()
    {
        return (bool)$this->all_day;
    }

    public function getStart()
    {
        return $this->start;
    }

    public function getEnd()
    {
        return $this->end;
    }
}