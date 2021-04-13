<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\photo;
use DateTime;

class employee extends Model
{
    //
    protected $fillable = [
        'name', 'pc'
    ];

    protected $appends = ['last_screenshot','last_window','pc_status'];

     public function getLastScreenshotAttribute()
    {
    	return photo::where('pc',$this->pc)->orderBy('created_at', 'desc')->first()->path;
    }
         public function getLastWindowAttribute()
    {
        return photo::where('pc',$this->pc)->orderBy('created_at', 'desc')->first()->path;
    }
        public function getPcStatusAttribute()
    {

      $now = new DateTime;
      $now->modify('-2 minutes');
      $now->format('Y-m-d H:i:s');
      if ( photo::where('pc',$this->pc)->orderBy('created_at', 'desc')->first()->created_at  >= $now)
      return 'green';
      else
      return 'red';
    }
}
