<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedBigInteger('role_id')->nullable();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('set null');
            $table->timestamp('registered_at')->useCurrent();
            $table->timestamps();
            $table->rememberToken();
            $table->string('profile_picture')->nullable();
            $table->softDeletes(); // Add this line to enable soft deletes
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
