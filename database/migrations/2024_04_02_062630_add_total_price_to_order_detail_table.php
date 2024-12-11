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
            $table->decimal('total_price', 10, 2)->after('product_id')->nullable(); // Đảm bảo kiểu dữ liệu phù hợp với yêu cầu của bạn
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
