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
        Schema::table('etudiants', function (Blueprint $table) {
            // Add foreign key constraint
            $table->foreign('filiere_id')
                ->references('id')
                ->on('filieres')
                ->onDelete('cascade');  // This line means if the referenced record is deleted, also delete the related records in this table.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('etudiants', function (Blueprint $table) {
            // Remove the foreign key constraint
            $table->dropForeign(['filiere_id']);
        });
    }
};
