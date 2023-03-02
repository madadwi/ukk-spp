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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('bulan_dibayar');
            $table->string('jumlah_bayar');
            $table->string('total');
            $table->string('status')->default('Lunas');
            $table->date('date');
            $table->foreignUuid('tunggakan_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('siswa_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            // $table->foreignUuid('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
