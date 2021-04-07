<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\photo;

class employee extends Model
{
    //
    protected $fillable = [
        'name', 'pc'
    ];

    protected $appends = ['last_screenshot'];

     public function getLastScreenshotAttribute()
    {
        // if ($this->hotel_id == null) {
        //     return '';
        // }
        // else
        // {   
        //     return GlobalHotel::find($this->hotel_id)->name;
        // }
    
    	return photo::where('pc',$this->pc)->orderBy('created_at', 'desc')->first()->path;
    }

}
