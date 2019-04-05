<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insights', function (Blueprint $table) {
            $table->increments('id');
            //abuse
            $table->tinyInteger('abuse_type');
            $table->string('abuse_tags');
            //emotions
            $table->string('bored');
            $table->string('sad');
            $table->string('angry');
            $table->string('happy');
            $table->string('fear');
            $table->string('excited');
            //sentiment
            $table->tinyInteger('sentiment_type');
            $table->double('positive');
            $table->double('negative');
            $table->double('neutral');

            //post forgien key
            $table->integer('pid');

            $table->foreign('pid')
            ->references('id')->on('posts')
            ->onDelete('cascade');
            
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
        Schema::dropIfExists('insights');
    }
}
