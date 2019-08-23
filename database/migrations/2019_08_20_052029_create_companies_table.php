<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('type_id')->nullable();
            $table->foreign('type_id')->references('id')->on('types')->onDelete('set null');
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->text('description')->nullable();
            $table->string('website')->nullable();
            $table->string('phone')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
