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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();  // Khóa chính
            $table->foreignId('user_id')->constrained()->onDelete('cascade');  // Liên kết đến bảng users (khách hàng)
            $table->decimal('total_amount', 10, 2);  // Tổng giá trị đơn hàng
            $table->string('status')->default('pending');  // Trạng thái đơn hàng
            $table->text('shipping_address');  // Địa chỉ giao hàng
            $table->string('payment_method');  // Phương thức thanh toán (ví dụ: 'credit_card', 'paypal')
            $table->string('tracking_number')->nullable();  // Mã theo dõi (nếu có)
            $table->timestamps();  // Thời gian tạo và cập nhật đơn hàng
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
