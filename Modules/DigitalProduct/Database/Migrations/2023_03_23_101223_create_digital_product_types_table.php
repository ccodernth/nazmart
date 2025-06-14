<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('digital_product_types', function (Blueprint $table) {
            $table->id();
            $table->text("name");
            $table->text("slug");
            $table->text("product_type");
            $table->unsignedBigInteger("image_id")->nullable();
            $table->boolean("status")->comment('active=1, inactive=0')->default(0);
            $table->text('extensions');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('digital_product_types');
    }
};
