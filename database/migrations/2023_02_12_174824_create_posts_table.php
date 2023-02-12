<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->text('detail');
            $table->foreignId('subcategory_id')->constrained('sub_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('author_id')->constrained('authors')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('admin_id')->constrained('admins')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('is_share');
            $table->integer('is_comment');
            $table->integer('visitors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
