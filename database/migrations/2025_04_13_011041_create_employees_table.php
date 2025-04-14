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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->constrained()->onDelete('cascade');
            $table->foreignId('position_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('phone', 20)->unique();
            $table->string('emergency_phone', 20);
            $table->string('email', 40)->unique();
            $table->string('postal_code', 10)->nullable();
            $table->string('address_line1', 50)->nullable();
            $table->string('address_line2', 50)->nullable();
            $table->enum('gender', ['man', 'woman'])->nullable();
            $table->enum('is_status', ['employed', 'leave', 'resigned', 'intern']);
            $table->string('created_by');
            $table->string('updated_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
