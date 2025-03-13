<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('music', function (Blueprint $table) {
            $table->id(); // Primary Key (bigint, auto-increment)
            $table->string('title'); // Music title
            $table->string('artist'); // Artist name
            $table->string('genre')->nullable(); // Genre (optional)
            $table->string('file_path'); // Path to the music file
            $table->timestamps(); // Created at & Updated at
        });
    }

    public function down() {
        Schema::dropIfExists('music');
    }
};
