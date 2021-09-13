<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\photo;
use App\entry;
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
    	$photo = photo::where('pc',$this->pc)->orderBy('created_at', 'desc')->first();
     if($photo)
      return $photo->path;
    else
      return "https://images.drivereasy.com/wp-content/uploads/2018/09/VGA-no-signal-image.jpg";
    }
         public function getLastWindowAttribute()
    {
        $photo = photo::where('pc',$this->pc)->orderBy('created_at', 'desc')->first();
     if($photo)
      return $photo->path;
    else
      return "https://images.drivereasy.com/wp-content/uploads/2018/09/VGA-no-signal-image.jpg";
    }
        public function getPcStatusAttribute()
    { 
      $entry =  entry::where('computer',$this->pc)->orderBy('created_at', 'desc')->first();
      if ($entry)
      {
      $now = new DateTime;
      $now->modify('-2 minutes');
      $now->format('Y-m-d H:i:s');
      if (strpos($entry->process, 'inactive') !== false  )
      return 'yellow';
      elseif ( $entry->created_at  >= $now)
      return 'green';
      else
      return 'red';
      }
      else
        return 'red';
    }
}
