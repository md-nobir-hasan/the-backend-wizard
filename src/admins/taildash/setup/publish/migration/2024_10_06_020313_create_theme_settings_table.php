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
        Schema::create('theme_settings', function (Blueprint $table) {
            $table->id();
            $table->enum('layout',['default','compact','thin'])->default('default');
            $table->enum('primary_color',['theme-red','theme-yellow','theme-green','theme-blue','theme-purple','theme-pink'])->nullable();
            $table->enum('color_scheme',['dark'])->nullable();
            $table->enum('sidebar_color',['sidebar-dark'])->nullable();
            $table->enum('direction',['ltr','rtl'])->default('ltr');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('theme_settings');
    }
};
