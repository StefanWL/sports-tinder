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
            //$table->foreign('profileable_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('profileable_type')->nullable();
            $table->string('name')->nullable();
            $table->string('bio')->nullable();
            $table->string('sport1')->nullable();
            $table->string('sport2')->nullable();
            $table->string('sport3')->nullable();
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
