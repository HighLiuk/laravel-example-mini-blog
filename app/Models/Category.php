<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
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

    /**
     * Returns the markup with links to articles of this category
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    public function link(): Attribute
    {
        return new Attribute(
            get: function () {
                return '<a class="text-decoration-none" href="'
                    . route('articles.index')
                    . '?category_id='
                    . $this->id
                    . '">'
                    . $this->name
                    . '</a>';
            }
        );
    }

    /*
         ____                            
        / ___|  ___ ___  _ __   ___  ___ 
        \___ \ / __/ _ \| '_ \ / _ \/ __|
         ___) | (_| (_) | |_) |  __/\__ \
        |____/ \___\___/| .__/ \___||___/
                        |_|              
    */
}
