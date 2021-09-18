<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string(config('phone-verify.user_model_phone_number_field'))->unique();
            $table->string(config('phone-verify.user_model_phone_sms_field'))->nullable();
            $table->timestamp('phone_verified_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn(config('phone-verify.user_model_phone_number_field'));
                $table->dropColumn(config('phone-verify.user_model_sms_number_field'));
                $table->dropColumn('phone_verified_at');
            });
        }
    }
}
