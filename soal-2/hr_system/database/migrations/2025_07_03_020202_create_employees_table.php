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
            // Data utama
            $table->string('nomor', 15)->unique();
            $table->string('nama', 150);
            $table->string('jabatan', 200)->nullable();
            $table->date('talahir')->nullable();
            $table->string('photo_upload_path')->nullable();

            // Audit trail
            $table->string('created_by', 150)->nullable();
            $table->string('updated_by', 150)->nullable();

            // Laravel built‑ins
            $table->timestamps();
            $table->softDeletes();
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
