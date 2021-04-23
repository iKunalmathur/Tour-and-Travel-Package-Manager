<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('pkg_id');
            $table->foreignId('category_id')->constrained();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->double('price')->nullable();
            $table->string('duration')->nullable();
            $table->text('overview')->nullable();
            $table->boolean('status')->default(false);
            $table->mediumText('includes')->nullable();
            $table->mediumText('excludes')->nullable();
            $table->longText('itineraries')->nullable();
            $table->text('image')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
}
