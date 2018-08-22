<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->increments('id');
            // $table->integer('price_')->default(0);

$table->integer('price_laundry')->nullable();
$table->integer('price_shirt')->nullable();
$table->integer('price_pant')->nullable();
$table->integer('price_blouse')->nullable();
$table->integer('price_sweater')->nullable();
$table->integer('price_dress')->nullable();
$table->integer('price_jacket')->nullable();
$table->integer('price_suit')->nullable();
$table->integer('price_skirt')->nullable();
$table->integer('price_scarf')->nullable();
$table->integer('price_tie')->nullable();
$table->integer('price_shorts')->nullable();
$table->integer('price_coat')->nullable();
$table->integer('price_shawl')->nullable();
$table->integer('price_tunic')->nullable();
$table->integer('price_bra')->nullable();
$table->integer('price_undie')->nullable();

$table->integer('price_comforter')->nullable();
$table->integer('price_blanket')->nullable();
$table->integer('price_pillow')->nullable();
$table->integer('price_pillowcase')->nullable();
$table->integer('price_curtain')->nullable();
$table->integer('price_duvercover')->nullable();
$table->integer('price_rug')->nullable();
$table->integer('price_sheets')->nullable();

$table->integer('price_hemming')->nullable();
$table->integer('price_hemmingpants')->nullable();
$table->integer('price_hemmingsleeve')->nullable();
$table->integer('price_taper')->nullable();
$table->integer('price_button')->nullable();
$table->integer('price_patch')->nullable();
$table->integer('price_zipper')->nullable();

$table->integer('price_content')->nullable();

$table->integer('sp_id');
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
        Schema::dropIfExists('prices');
    }
}
