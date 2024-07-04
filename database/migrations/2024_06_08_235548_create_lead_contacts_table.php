

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadcontactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_contacts', function (Blueprint $table) {
            $table->increments('id', 20);
            $table->integer('business_id');
            $table->integer('campaign_id');
            $table->string('campaign_title', 191);
            $table->string('name', 191);
            $table->string('email', 191);
            $table->string('phone', 191);
            $table->text('message');
            $table->string('status', 191)->default('pending');
            $table->text('note');
            $table->integer('created_by');
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
        Schema::dropIfExists('lead_contacts');
    }
}

