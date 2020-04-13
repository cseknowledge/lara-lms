<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('message');
            $table->string('department');
            $table->unsignedBigInteger('wishlist_id')->nullable();
            $table->unsignedBigInteger('message_from_user_id');
            $table->boolean('is_viewed')->nullable();
            $table->boolean('is_read')->nullable();
            $table->timestamps();
        });

        //Foreign Key
        Schema::table('messages', function($table) {
            
            $table->foreign('message_from_user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
            
            $table->foreign('wishlist_id')
            ->references('id')
            ->on('wishlists')
            ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
