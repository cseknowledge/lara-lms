<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {

            $table->id();
            $table->string('generated_book_id')->nullable();
            $table->string('book_name');
            $table->string('short_description')->nullable();
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('publisher_id');
            $table->float('price');
            $table->boolean('is_available');
            $table->timestamps();

        });

        //Foreign Key
        Schema::table('books', function($table) {
            
            $table->foreign('author_id')
            ->references('id')
            ->on('authors')
            ->onDelete('cascade');

            $table->foreign('publisher_id')
            ->references('id')
            ->on('publishers')
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
        Schema::dropIfExists('books');
    }
}
