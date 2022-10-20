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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(table:'users')->onDelete('cascade');
            $table->foreignId('handler_id')->constrained(table:'users')->onDelete('cascade');
            $table->foreignId('requests_category_id')->nullable()->constrained(table:'request_categories')->onDelete('cascade');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->integer('status')->comment('(0, 1, 2) -> (pending, solved, rejected)')->default(0);
            $table->timestamp('status_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
};
