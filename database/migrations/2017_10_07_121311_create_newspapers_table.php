<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewspapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up() {

        Schema::create('categories', function (Blueprint $table) {
                $table->increments('id');

                $table->string('titulo');
                $table->integer('status')->default(0);

                $table->timestamps();
                $table->softDeletes();

            });

        Schema::create('newspapers', function (Blueprint $table) {
                $table->increments('id');

                $table->date('data');
                $table->string('titulo');
                $table->text('descricao');
                $table->string('imagem');
                $table->string('fonte');

                $table->integer('status')->default(0);
                $table->string('legenda_imagem');

                $table->integer('category_id')->unsigned()->index();
                $table->foreign('category_id')->references('id')->on('categories');

                $table->timestamps();
                $table->softDeletes();

            });

        Schema::create('newspapers_images', function (Blueprint $table) {

                $table->increments('id');
                $table->integer('newspaper_id')->unsigned()->index();
                $table->foreign('newspaper_id')->references('id')->on('newspapers');
                $table->string('imagem', 250);
                $table->string('legenda', 250);
                $table->timestamps();

            });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('newspapers_images');
        Schema::drop('newspapers');
        Schema::drop('categories');
    }
}
