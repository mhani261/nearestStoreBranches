<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_translation', function (Blueprint $table) {
            $table->id();
            $table->integer('store_id')->unsigned();
            $table->string('store_name');
            $table->string('locale')->index();
            $table->unique(['store_id','locale']);

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
        Schema::dropIfExists('store_translation');
    }
}
