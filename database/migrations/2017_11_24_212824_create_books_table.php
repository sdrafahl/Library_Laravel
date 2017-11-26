<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id')->nullable(false);
            $table->string('book_name')->nullable(false);
            $table->string('author')->nullable(false);
            $table->integer('shelf_id')->nullable(false);
            $table->integer('availability')->default(true)->nullable(false);
            $table->timestamps();

            //$table->foreign('shelf_id')->reference('id')->on('shelf');

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
