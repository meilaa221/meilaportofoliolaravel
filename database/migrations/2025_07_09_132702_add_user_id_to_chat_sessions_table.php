<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('chat_sessions', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->after('id')->constrained()->onDelete('cascade');
            $table->string('visitor_name')->nullable()->change();
            $table->string('visitor_email')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('chat_sessions', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            $table->string('visitor_name')->nullable(false)->change();
            $table->string('visitor_email')->nullable(false)->change();
        });
    }
};
