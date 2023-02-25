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
        Schema::create('associations', function (Blueprint $table) {
            $table->id();
            $table->string('Name')->unique();
            $table->string('Slug')->unique();
            $table->string('NIA')->unique();
            $table->string('SIRET')->unique();
            $table->longText('Address');
            $table->longText('Address2')->nullable()->default(null);
            $table->string('City')->default(null);
            $table->string('PostalCode')->default(null);
            $table->string('Country')->default('France');
            $table->string('Phone')->nullable();
            $table->string('Type')->nullable();
            $table->string('Email')->nullable()->default(null);
            $table->string('Logo')->nullable()->default(null);
            $table->string('Agree')->nullable()->default(null);
            $table->string('Description')->nullable()->default(null);
            $table->string('Website')->nullable()->default(null);
            $table->string('Facebook')->nullable()->default(null);
            $table->string('Twitter')->nullable()->default(null);
            $table->string('Instagram')->nullable()->default(null);
            $table->string('Youtube')->nullable()->default(null);
            $table->string('Linkedin')->nullable()->default(null);
            $table->string('Tiktok')->nullable()->default(null);
            $table->string('Pinterest')->nullable()->default(null);
            $table->string('Snapchat')->nullable()->default(null);
            $table->string('Twitch')->nullable()->default(null);
            $table->string('Discord')->nullable()->default(null);
            $table->string('Telegram')->nullable()->default(null);
            $table->string('Whatsapp')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('associations');
    }
};
