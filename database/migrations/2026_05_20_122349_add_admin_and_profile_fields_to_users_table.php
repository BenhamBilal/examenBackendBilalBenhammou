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
            Schema::table('users', function (Blueprint $table) {
                $table->boolean('is_admin')->default(false);
                $table->string('username')->nullable()->unique();
                $table->date('birthday')->nullable();
                $table->string('profile_photo_path')->nullable();
                $table->text('about_me')->nullable();
            });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::table('admin', function (Blueprint $table) {
            $table->dropColumn(['is_admin', 'username', 'birthday', 'profile_photo_path', 'about_me']);
        });

    }
};
