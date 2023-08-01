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
        Schema::create('quiz_headers', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->constrained()->onDelete('cascade');
            $table->integer('section_id')->constrained()->onDelete('cascade');
            $table->boolean('completed')->default(false);
            $table->unsignedInteger('quiz_size');
            $table->text('questions_taken')->nullable()->default(null);
            $table->double('score', 2)->default(0);
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
        Schema::dropIfExists('quiz_headers');
    }
};
