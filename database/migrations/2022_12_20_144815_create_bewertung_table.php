<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bewertung', function (Blueprint $table) {
            $table->id();
            //$table->timestamps();
            $table->timestamp('zeitpunkt')->useCurrent();
            $table->unsignedInteger('level');
            // 0 = sehr schlecht, 1 = schlecht, 2 = gut, 3 = sehr gut

            $table->text('bemerkung');
            $table->boolean('hervorgehoben')->default(false);
            $table->bigInteger('gericht_id');
            $table->bigInteger('benutzer_id')->unsigned();
            $table->foreign('gericht_id')->references('id')->on('gericht')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('benutzer_id')->references('id')->on('benutzer')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bewertung');
    }
};
