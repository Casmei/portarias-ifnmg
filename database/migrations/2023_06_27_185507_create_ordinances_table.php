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
            $table->date('start_date');
            $table->date('end_date');
            $table->string('campus');
            $table->string('description');
            $table->string('pdf_url')->nullable()->after('description');
            $table->boolean('visibility');
            $table->timestamps();
        });

        Schema::create('ordinance_user', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
            $table->foreignId('ordinance_id')->constrained()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordinance_user');
        Schema::dropIfExists('ordinances');
    }
};
