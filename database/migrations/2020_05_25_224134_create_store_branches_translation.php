<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreBranchesTranslation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_branches_translation', function (Blueprint $table) {
            $table->id();
            $table->integer('store_branch_id')->unsigned();
            $table->string('branch_name');
            $table->string('locale')->index();
            $table->unique(['store_branch_id','locale']);
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
        Schema::dropIfExists('store_branches_translation');
    }
}
