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
        Schema::create('posts', function (Blueprint $table) {
            //id , title , body , user_id , created at , update at
            $table->id(); // auto increament
            $table->string('title'); // not null
            $table->text('body');
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // user_i   -> users
            $table->timestamps(); // created_at  , updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts'); // rollback
    }
};
