<?php

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

return new class extends Migration
{
    public function up()
    {
        Schema::create('article_tag', function (Blueprint $table) {
            $table->foreignIdFor(Article::class)->constrained();
            $table->foreignIdFor(Tag::class)->constrained();
        });
    }

    public function down()
    {
        Schema::dropIfExists('article_tag');
    }
};
