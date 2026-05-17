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
            $table->string('nik', 20)->unique();
            $table->string('full_name', 100);
            $table->string('email', 100)->unique();
            $table->string('phone_number', 20);
            $table->enum('gender', ['Laki-laki', 'Perempuan']);
            $table->string('birth_place', 50);
            $table->date('birth_date');
            $table->string('religion', 30);
            $table->enum('marital_status', ['Belum Kawin', 'Kawin', 'Cerai']);
            $table->text('address');
            $table->string('city', 50);
            $table->date('join_date');
            $table->enum('employment_status', ['Tetap', 'Kontrak', 'Magang']);
            $table->decimal('basic_salary', 15, 2);
            $table->boolean('is_active')->default(true);

            // Foreign Keys
            $table->foreignId('department_id')->constrained('departments')->onDelete('cascade');
            $table->foreignId('position_id')->constrained('positions')->onDelete('cascade');
            $table->foreignId('education_id')->constrained('educations')->onDelete('cascade');

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
