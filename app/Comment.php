<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //Creating the relationship to tickets table

    
    protected $guarded = ['id'];
    
    public function ticket()
        {
           
            return $this->belongsTo('App\Ticket');
        
        }
}
