<?php

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

return new class extends Migration
{
    public function up()
    {
        Schema::create('article_category', function (Blueprint $table) {
            $table->foreignIdFor(Article::class)->constrained();
            $table->foreignIdFor(Category::class)->constrained();
        });
    }

    public function down()
    {
        Schema::dropIfExists('article_category');
    }
};
