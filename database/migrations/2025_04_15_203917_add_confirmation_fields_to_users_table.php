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
            $table->string('token_confirmacao', 6)->nullable()->after('password');
            $table->timestamp('token_expira_em')->nullable()->after('token_confirmacao');
            $table->boolean('email_confirmado')->default(false)->after('token_expira_em');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['token_confirmacao', 'token_expira_em', 'email_confirmado']);
        });
    }
};
