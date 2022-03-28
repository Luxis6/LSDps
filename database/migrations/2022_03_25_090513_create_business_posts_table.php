<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_posts', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 200)->unique();
            $table->string('title', 100)->unique();
            $table->integer('category');
            $table->string('job_content', 2000);
            $table->string('job_requirements', 2000);
            $table->string('job_offer', 2000);
            $table->string('job_salary', 2000);
            $table->integer('job_type');
            $table->string('business_link', 500);
            $table->string('city', 100);
            $table->integer('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_posts');
    }
};
