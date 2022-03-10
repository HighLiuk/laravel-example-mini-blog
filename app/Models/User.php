<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    /*
          ____             __ _           
         / ___|___  _ __  / _(_) __ _ ___ 
        | |   / _ \| '_ \| |_| |/ _` / __|
        | |__| (_) | | | |  _| | (_| \__ \
         \____\___/|_| |_|_| |_|\__, |___/
                                |___/      
    */

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*
         ____      _       _   _                 
        |  _ \ ___| | __ _| |_(_) ___  _ __  ___ 
        | |_) / _ \ |/ _` | __| |/ _ \| '_ \/ __|
        |  _ <  __/ | (_| | |_| | (_) | | | \__ \
        |_| \_\___|_|\__,_|\__|_|\___/|_| |_|___/

    */

    public function articles()
    {
        return $this->hasMany(Article::class);
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
