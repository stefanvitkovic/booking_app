<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     CREATE TRIGGER after_reservations_insert ON reservations
     BEGIN

     END;

     * @return void
     */
    public function up()
    {
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
