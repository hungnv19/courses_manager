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
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->constrained()->onDelete('cascade');
            $table->integer('quiz_header_id')->constrained()->onDelete('cascade');
            $table->integer('section_id')->constrained()->onDelete('cascade');
            $table->integer('question_id')->constrained()->onDelete('cascade');
            $table->integer('answer_id')->constrained()->onDelete('cascade');
            $table->tinyInteger('correct')->default(0);
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
        Schema::dropIfExists('quizzes');
    }
};
