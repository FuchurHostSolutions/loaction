<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_visits', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address', 45);
            $table->string('url', 255)->default('/');
            $table->string('method', 10)->default('GET');
            $table->text('referer')->nullable();
            $table->text('user_agent')->nullable();
            $table->string('device', 20)->default('desktop'); // desktop, mobile, tablet, bot
            $table->date('visited_date');
            $table->timestamps();

            $table->index(['visited_date', 'ip_address']);
            $table->index('url');
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_visits');
    }
};
