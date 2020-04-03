<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookIssuedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_issueds', function (Blueprint $table) {
            $table->id();
            $table->date('issue_date');
            $table->date('return_date');
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            
        });
        
        //Foreign Key
        Schema::table('book_issueds', function($table) {
            
            $table->foreign('book_id')
            ->references('id')
            ->on('books')
            ->onDelete('cascade');

        });

        Schema::table('book_issueds', function($table) {
            
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
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
        Schema::dropIfExists('book_issueds');
    }
}
