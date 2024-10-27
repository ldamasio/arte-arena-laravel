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
        Schema::table('contas', function (Blueprint $table) {
            $table->enum('status', ['pago', 'pendente', 'recebido'])->default('pendente')->change();
            $table->enum('tipo', ['a pagar', 'a receber'])->default('a pagar')->after('status');
        });
    }

    public function down(): void
    {
        Schema::table('contas', function (Blueprint $table) {
            $table->dropColumn('tipo');
            $table->enum('status', ['pago', 'pendente'])->default('pendente')->change();
        });
    }
};
