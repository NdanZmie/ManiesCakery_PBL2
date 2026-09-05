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
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi');
            $table->decimal('harga', 10, 2);

            $table->string('kategori', 100);
            $table->foreign('kategori')->references('nama')->on('kategori')->onDelete('cascade');

            $table->boolean('status')->default(true);
            $table->string('gambar')->nullable();
            $table->string('link_instagram')->nullable();
            $table->boolean('favourit')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
