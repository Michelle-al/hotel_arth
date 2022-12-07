<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname')->nullable(false);
            $table->string('lastname')->nullable(false);
            $table->string('email')->unique();
            //$table->timestamp('email_verified_at')->nullable(); // TODO - enable ?
            $table->string('phone')->nullable(false);
            $table->string('avatar')->nullable(false);
            $table->string('password')->nullable(false); // TODO - Remplacer le password par son hash
            //$table->rememberToken(); // TODO - Ask if this line is compulsory there and in the CustomerFactory
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
