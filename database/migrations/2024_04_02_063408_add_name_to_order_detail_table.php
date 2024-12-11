<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('order_detail', function (Blueprint $table) {
            $table->string('name')->after('product_id')->nullable(); // Định nghĩa cột 'name' có kiểu dữ liệu là string và được đặt sau cột 'product_id'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_detail', function (Blueprint $table) {
            //
        });
    }
};
