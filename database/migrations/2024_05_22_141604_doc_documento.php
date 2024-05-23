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
        Schema::create('doc_documento', function (Blueprint $table) {
            $table->id();
            $table->string('doc_nombre',50)->nullable();
            $table->string('doc_codigo',50)->nullable();
            $table->text('doc_contenido')->nullable();
            $table->integer("doc_id_tipo")->nullable();
            $table->integer("doc_id_proceso")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doc_documento');
    }
};
