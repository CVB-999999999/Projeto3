<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutoringTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutoring', function (Blueprint $table) {
            $table->id();                                                //  Row ID
            $table->timestamps();                                        //  Timestamps -> created and updated
            $table->unsignedBigInteger('tutorId');                //  Tutor id from table users
            $table->unsignedBigInteger('categoryId');             //  category id from table categories
            $table->boolean('active')->default(true);       //  Status
            // Foreign key associations
            $table->foreign('tutorId')->references('id')->on('users');
            $table->foreign('categoryId')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tutoring');
    }
}
