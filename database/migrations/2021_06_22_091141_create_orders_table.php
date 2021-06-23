<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paper_type_id')
                ->nullable()
                ->index()
                ->constrained();
            $table->foreignId('academic_level_id')
                ->nullable()
                ->index()
                ->constrained();
            $table->string('deadline', 5)->nullable();
            $table->unsignedTinyInteger('pages')->default(1);
            $table->unsignedTinyInteger('spaces')->default(1);
            $table->dateTime('deadline_at')
                ->nullable()
                ->index();
            $table->foreignId('user_id')
                ->nullable()
                ->index()
                ->constrained();
            $table->string('status', 5)
                ->default('draft')
                ->index();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
