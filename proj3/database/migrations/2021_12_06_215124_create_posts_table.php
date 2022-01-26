<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
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
            $table->foreignId('registration_id');
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('arquivo')->nullable();
            $table->string('arquivo_aluno')->nullable();
            $table->text('body');
            $table->boolean('deleted')->default(false);
            $table->boolean('hidden')->default(false);
            $table->string('fileName')->nullable();
            $table->dateTime('submit_date')->nullable();
            $table->dateTime('submited_date')->nullable();
            $table->float('grade')->default(-99);
            $table->timestamps();

            $table->foreign('registration_id')->references('id')->on('registrations');
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
}
