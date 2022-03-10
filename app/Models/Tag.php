<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory;
    use SoftDeletes;

    /*
          ____             __ _           
         / ___|___  _ __  / _(_) __ _ ___ 
        | |   / _ \| '_ \| |_| |/ _` / __|
        | |__| (_) | | | |  _| | (_| \__ \
         \____\___/|_| |_|_| |_|\__, |___/
                                |___/      
    */



    /*
         ____      _       _   _                 
        |  _ \ ___| | __ _| |_(_) ___  _ __  ___ 
        | |_) / _ \ |/ _` | __| |/ _ \| '_ \/ __|
        |  _ <  __/ | (_| | |_| | (_) | | | \__ \
        |_| \_\___|_|\__,_|\__|_|\___/|_| |_|___/

    */

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    /*
            _   _   _        _ _           _            
           / \ | |_| |_ _ __(_) |__  _   _| |_ ___  ___ 
          / _ \| __| __| '__| | '_ \| | | | __/ _ \/ __|
         / ___ \ |_| |_| |  | | |_) | |_| | ||  __/\__ \
        /_/   \_\__|\__|_|  |_|_.__/ \__,_|\__\___||___/

    */



    /*
         ____                            
        / ___|  ___ ___  _ __   ___  ___ 
        \___ \ / __/ _ \| '_ \ / _ \/ __|
         ___) | (_| (_) | |_) |  __/\__ \
        |____/ \___\___/| .__/ \___||___/
                        |_|              
    */
}
