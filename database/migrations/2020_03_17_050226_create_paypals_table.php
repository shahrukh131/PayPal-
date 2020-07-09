<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Str;

class CreatePaypalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paypals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('payment_date')->timestamps();
            $table->string('customer_info');
            $table->string('currency');
            $table->double('actual_payment');
            $table->boolean('status')->default(0);
            $table->double('customer_amount')->default(15.00);
            $table->string('transaction_id')->unique();
            $table->string('admin_transaction_id')->default("");
            $table->string('customer_email');
            $table->string('image');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paypals');
    }
}
