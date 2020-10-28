<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getDistrict()
    {
        return $this->belongsTo(District::class, 'district' );
    }

    public function bids()
    {
        if ($bids = Bid::where('user_id', $this->id)->WhereNull('rc_cluster_id')->get()) {
            return $bids;
        } else return false;

    }

    public function regionBids()
    {
        if ($bids = Bid::where('user_id', $this->id)->WhereNotNull('rc_cluster_id')->get()) {
            return $bids;
        } else return false;

    }

    public function cluster()
    {
        return $this->hasOne(Cluster::class);
    }

    public function getClusters()
    {
        $clusters = Cluster::all();
        foreach ($clusters as $cluster) {
            $schools = json_decode($cluster->schools, true);
            foreach ($schools as $value) {
                if ($value['school_id'] == $this->id) {
                    return $cluster->User->fullname;
                }
            }
        }
        return "Вы не состоите в муниципальных кластерах";
    }


    // public function sender() {
    //     return $this->belongsTo('Program', 'school_program_id');
    // }
}
