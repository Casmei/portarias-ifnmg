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
        Schema::create('ordinances', function (Blueprint $table) {
            $table->id();
            $table->integer('ordinance_number');
            $table->date('initial_date');
            $table->date('finish_date');
            $table->integer('members_ordinances_id')->nullable();
            $table->string('campus_or_rectory');
            $table->string('description');
            $table->boolean('visibility');
            $table->timestamps();

            $table->foreign('members_ordinances_id')->references('id')->on('member_ordinances')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordinances');
    }
};
