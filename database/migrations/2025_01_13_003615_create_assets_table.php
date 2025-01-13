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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->enum('status', ['available', 'damaged', 'missing'])->default('available');
            $table->integer('tahun_pembelian');
            $table->string('nomor_polisi')->nullable()->default(null);
            $table->text('deskripsi')->nullable()->default(null);
            $table->decimal('harga_beli',15, 2);
            $table->string('merk');
            $table->unsignedBigInteger(('category_id'));
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
