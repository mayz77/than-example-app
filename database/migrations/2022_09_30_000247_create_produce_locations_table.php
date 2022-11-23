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
        Schema::create('produce_locations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_location_id')->constrained();
            $table->foreignId('produce_post_id')->constrained();
            $table->string('status')->default('normal'); //normal=ปกติ, del_admin=ลบโดย admin, del_userlocat=ลบพื้นที่เพาะปลูก
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
        Schema::dropIfExists('produce_locations');
    }
};
