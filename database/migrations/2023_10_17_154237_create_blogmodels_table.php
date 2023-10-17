<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blogmodels', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('cat_id');
            $table->string('title');
            $table->text('description');
            $table->string('writer_name');
            $table->string('meta_tag');  
            $table->string('short_des')->nullable();
            $table->string('pic');
            $table->string('slug')->nullable();  
            $table->unsignedTinyInteger('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogmodels');
    }
};
