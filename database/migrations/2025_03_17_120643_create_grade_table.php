<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('grade', function (Blueprint $table) {
            $table->id();
            $table->float('grade');
            $table->text('note')->nullable();
            $table->datetime('date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('evaluation_id');
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('evaluation_id')->references('id')->on('evaluation')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grade');
    }
};
