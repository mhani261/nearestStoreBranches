<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores_categories_translation', function (Blueprint $table) {
            $table->id();
            $table->integer('store_category_id')->unsigned();
            $table->string('category_name');
            $table->string('locale')->index();
            $table->unique(['store_category_id','locale']);
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
        Schema::dropIfExists('stores_categories_translation');
    }
}
