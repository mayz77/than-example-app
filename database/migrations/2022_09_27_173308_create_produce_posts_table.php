<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produce_posts', function (Blueprint $table) {
            $table->id();
            $table->text('name_th');
            $table->text('name_en')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->string('status')->default('normal'); //normal=ปกติ, del_admin=ลบโดย admin
            $table->softDeletes();
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
        Schema::dropIfExists('produce_posts');
    }
};
