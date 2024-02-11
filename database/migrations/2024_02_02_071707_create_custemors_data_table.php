<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('custemors_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->tinyText('address');
<<<<<<< HEAD
            $table->bigInteger('phone');
=======
            $table->integer('phone');
>>>>>>> f5230a190c03d0bbad64a3a01af4bafff271fe00
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custemors_data');
    }
};
