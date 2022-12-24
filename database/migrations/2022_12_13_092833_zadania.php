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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('requser');
            $table->string('requsername');
            $table->string('exeuser');
            $table->string('exename');
            $table->string('title');
            $table->string('status');
            $table->string('date');
            $table->string('description', 1000);
            $table->string('updated_at');
            $table->string('created_at');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
