<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;

class Quiz extends Model
{
    use Sluggable;

    use HasFactory;
    protected $fillable = [
        'title','status', 'description', 'finished_at'
    ];

    protected $appends=['details'];

    public function getDetailsAttribute(){
        return [
            'average'=>$this->results()->avg('point'),
            'join_count'=>$this->results()->count(),
        ];
    }


public function results(){
    return $this->hasMany('App\Models\Result');
}

public function my_result(){
    return $this->hasOne('App\Models\Result')->Where('user_id',auth()->user()->id);
}

    public function sluggable()
    {
        return [
            'slug' => [
                'onUpdate' => true,
                'source' => 'title'
            ]
        ];
    }

    protected $dates=['finished_at'];

    public function getFinishedAtAttribute($date){
        return $date ? Carbon::parse($date) :null;
    }


    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }
}
