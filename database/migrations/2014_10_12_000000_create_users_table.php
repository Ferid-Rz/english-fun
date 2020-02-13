<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('profile_pic')->default('default.jpg');
            $table->boolean('location_enabled')->default(false);
            $table->boolean('notification_enabled')->default(true);
            $table->boolean('status')->default(true);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->float('lat', 10, 8)->nullable();
            $table->float('lng', 11, 8)->nullable();
            $table->char('user_type', 10)->default('customer');
            $table->string('account_code', 20)->nullable()->unique();
            $table->string('player_id', 50)->default('');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
