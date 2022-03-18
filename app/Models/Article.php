<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
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

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /*
            _   _   _        _ _           _            
           / \ | |_| |_ _ __(_) |__  _   _| |_ ___  ___ 
          / _ \| __| __| '__| | '_ \| | | | __/ _ \/ __|
         / ___ \ |_| |_| |  | | |_) | |_| | ||  __/\__ \
        /_/   \_\__|\__|_|  |_|_.__/ \__,_|\__\___||___/

    */

    /**
     * Returns the markup with links to articles of the same categories
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    public function categoriesLinks(): Attribute
    {
        return new Attribute(
            get: function () {
                if ($this->categories->isEmpty()) {
                    return 'none';
                }

                return $this->categories
                    ->map(function (Category $category) {
                        return '<a href="'
                            . route('articles.index')
                            . '?category_id='
                            . $category->id
                            . '">'
                            . $category->name
                            . '</a>';
                    })
                    ->implode(' | ');
            }
        );
    }

    /**
     * Returns the markup with links to articles of the same tags
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    public function tagsLinks(): Attribute
    {
        return new Attribute(
            get: function () {
                if ($this->tags->isEmpty()) {
                    return 'none';
                }

                return $this->tags
                    ->map(function (Tag $tag) {
                        return '<a href="'
                            . route('articles.index')
                            . '?tag_id='
                            . $tag->id
                            . '">'
                            . $tag->name
                            . '</a>';
                    })
                    ->implode(' | ');
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
