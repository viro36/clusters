<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    protected $table = 'bids';

    protected $fillable = ['subject', 'class', 'content', 'user_id', 'modul', 'form_of_education', 'form_education_implementation'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function program()
    {
        return $this->hasOne(Program::class);
    }

    public function getStatus()
    {
        switch ($this->status) {
            case 0: return '<div class="alert alert-warning" role="alert">Рассмотрение</div>';
            case 1: return '<div class="alert alert-success" role="alert">Одобрена</div>';
            case 2: return '<div class="alert alert-danger" role="alert">Отклонена</div>';
            case 3: return '<div class="alert alert-info" role="alert">Своя программа</div>';
        }
    }

    public function getClasses()
    {
        $classes = unserialize($this->getClasses);
        $str = "";
        foreach ($classes as $class) {
            $str .= $class . ", ";
        }

        return substr($str, 0, -2);
    }
}
