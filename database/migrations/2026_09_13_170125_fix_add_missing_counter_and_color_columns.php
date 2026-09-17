<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            if (!Schema::hasColumn('site_settings', 'counter_label_1')) {
                $table->string('counter_label_1')->default('Project Selesai');
            }
            if (!Schema::hasColumn('site_settings', 'counter_label_2')) {
                $table->string('counter_label_2')->default('Skill Dikuasai');
            }
            if (!Schema::hasColumn('site_settings', 'counter_label_3')) {
                $table->string('counter_label_3')->default('Pengalaman Kerja');
            }
            if (!Schema::hasColumn('site_settings', 'counter_label_4')) {
                $table->string('counter_label_4')->default('Tahun Pengalaman');
            }
            if (!Schema::hasColumn('site_settings', 'text_color')) {
                $table->string('text_color')->default('#000000');
            }
        });
    }

    public function down(): void
    {
        //
    }
};