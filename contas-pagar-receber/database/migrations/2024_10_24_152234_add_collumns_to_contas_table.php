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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('titulo');
            $table->text('descricao')->nullable();
            $table->decimal('valor', 8, 2);
            $table->date('data_vencimento');
            $table->enum('status', ['pago', 'pendente'])->default('pendente');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contas', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('titulo');
            $table->dropColumn('descricao');
            $table->dropColumn('valor');
            $table->dropColumn('data_vencimento');
            $table->dropColumn('status');
        });
    }
};