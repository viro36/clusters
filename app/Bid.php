<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    protected $table = 'bids';

    protected $fillable = ['subject', 'class', 'content', 'user_id', 'modul', 'hours', 'educational_program',
        'educational_activity', 'form_of_education', 'form_education_implementation', 'date_begin', 'date_end',
         'rc_cluster_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function program()
    {
        return $this->hasOne(Program::class);
    }

    public function programs()
    {
        if ($programs = Program::where('bid_id', $this->id)->get()) {
            return $programs;
        } else return false;

    }

    public function getStatus()
    {
        switch ($this->status) {
            case 0: return '<div class="alert alert-warning" role="alert">Рассмотрение</div>';
            case 1: return '<div class="alert alert-success" role="alert">Одобрена</div>';
            case 2: return '<div class="alert alert-danger" role="alert">Отклонена</div>';
            case 3: return '<div class="alert alert-info" role="alert">Своя программа</div>';

            case 9: return '<div class="alert alert-info" role="alert">Поступило предложение</div>';
        }
    }

    public function getClasses()
    {
        $classes = unserialize($this->class);
        $str = "";
        foreach ($classes as $class) {
            $str .= $class . ", ";
        }

        return substr($str, 0, -2);
    }

    public function getEducationalPrograms()
    {
        $educational_programs = unserialize($this->educational_program);
        $str = "";
        if($educational_programs != NULL) {
            foreach ($educational_programs as $educational_program) {
                $str .= $educational_program . ", ";
            }
            return substr($str, 0, -2);
        }
        else return '';
    }

    public function getEducationalActivities()
    {
        $educational_activities = unserialize($this->educational_activity);
        $str = "";
        if($educational_activities != NULL) {
            foreach ($educational_activities as $educational_activity) {
                $str .= $educational_activity . ", ";
            }
            return substr($str, 0, -2);
        }
        else return '';

    }

    public function getDataBegin()
    {
        $date = $this->date_begin;
        if($date !== NULL) {
            $year = substr($date, 0, -6);
            $month = substr($date, 5, -3);
            $day = substr($date, -2);
            $date_begin = $day . "-" . $month . "-" . $year;
            return $date_begin;
        }
        else return '';
    }

    public function getDataEnd()
    {
        $date = $this->date_end;
        if($date !== NULL) {
            $year = substr($date, 0, -6);
            $month = substr($date, 5, -3);
            $day = substr($date, -2);
            $date_end = $day . "-" . $month . "-" . $year;
            return $date_end;
        }
        else return '';
    }


}
