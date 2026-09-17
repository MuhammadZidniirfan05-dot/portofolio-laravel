<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            if (!Schema::hasColumn('site_settings', 'cta_title')) {
                $table->string('cta_title')->default('Punya proyek yang ingin dikerjakan?');
            }
            if (!Schema::hasColumn('site_settings', 'cta_subtitle')) {
                $table->text('cta_subtitle')->nullable();
            }
            if (!Schema::hasColumn('site_settings', 'cta_button_text')) {
                $table->string('cta_button_text')->default('Hubungi Saya');
            }
            if (!Schema::hasColumn('site_settings', 'cta_image')) {
                $table->string('cta_image')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn(['cta_title', 'cta_subtitle', 'cta_button_text', 'cta_image']);
        });
    }
};