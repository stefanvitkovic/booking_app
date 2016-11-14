<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcedureMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE PROCEDURE filldates( IN reservations_id VARCHAR(256), IN apartment VARCHAR(256), IN dateStart DATE, IN dateEnd DATE)  BEGIN 

                DECLARE adate date;

                WHILE dateStart <= dateEnd DO

                    SET adate = (SELECT dates FROM days WHERE dates = dateStart AND apartment_id = apartment);

                    IF adate IS NULL THEN BEGIN

                        INSERT INTO days (reservations_id,apartment_id,dates) VALUES (reservations_id,apartment,dateStart);

                    END; END IF;

                    SET dateStart = date_add(dateStart, INTERVAL 24 HOUR);

                END WHILE;
        END');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS filldates');
    }
}
