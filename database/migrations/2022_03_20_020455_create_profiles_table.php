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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profileable_id');
            $table->string('profileable_type')->nullable();
            $table->string('name')->nullable();
            $table->string('bio')->nullable();
            $table->string('sport')->nullable();
            $table->string('skillLevel')->nullable();
            $table->boolean('baseball')->nullable();
            $table->boolean('basketball')->nullable();
            $table->boolean('football')->nullable();
            $table->boolean('hockey')->nullable();
            $table->boolean('ultimate')->nullable();
            $table->boolean('soccer')->nullable();
            $table->boolean('bowling')->nullable();
            $table->boolean('sparring')->nullable();
            $table->boolean('cycling')->nullable();
            $table->boolean('running')->nullable();
            $table->boolean('golf')->nullable();
            $table->boolean('tennis')->nullable();
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
        Schema::dropIfExists('profiles');
    }
};
