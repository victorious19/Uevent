<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->foreignId('company_id')->nullable()->constrained('companies');
            $table->foreignId('theme_id')->constrained('themes');
            $table->string('poster')->default('default.png');
            $table->integer('tickets');
            $table->string('date');
            $table->integer('price');
            $table->string('card_number');
            $table->string('description');
            $table->string('organizer_info')->nullable();
            $table->enum('format',['conference', 'lecture', 'workshop', 'fest'])->default('fest');
            $table->string('location');
            $table->string('publishing_date');
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
        Schema::dropIfExists('events');
    }
}
