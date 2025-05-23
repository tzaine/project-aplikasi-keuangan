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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete(); //ketika kategori dihapus maka transaksi nya juga terhapus
            $table->date('date');
            $table->integer('jumlah');
            $table->string('catatan');
            $table->string('gambar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            // kembalikan ke NOT NULL jika rollback
            $table->string('catatan')->nullable(false)->change();
            $table->string('gambar')->nullable(false)->change();
    });
}
};
