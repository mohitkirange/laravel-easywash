<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->timestamp('dos');
            $table->integer('user_id');
            $table->integer('sp_id');
            $table->integer('service_id');
            $table->string('washandfold');
            $table->string('dryclean');
            $table->string('tailoring');
            $table->string('voucher')->nullable();

            $table->integer('q_Regular_Laundry')->nullable();
            $table->integer('q_Bedding_Mattress_Duvet_Cover')->nullable();
            $table->integer('q_Bedding_Comforter_laundry')->nullable();
            $table->integer('q_Bedding_Blanket_Throw')->nullable();
            $table->integer('q_Bedding_Pillow_laundry')->nullable();
            $table->integer('q_Bath_Mat_laundry')->nullable();
            $table->integer('q_Every_Hang_Dry_Item')->nullable();

            $table->integer('q_Dress')->nullable();
            $table->integer('q_Shirt')->nullable();
            $table->integer('q_Sweater')->nullable();
            $table->integer('q_Dress_Childrens')->nullable();
            $table->integer('q_Skirt')->nullable();
            $table->integer('q_Tie')->nullable();
            $table->integer('q_Shorts')->nullable();
            $table->integer('q_Jumpsuit')->nullable();
            $table->integer('q_Gown')->nullable();
            $table->integer('q_Mittens')->nullable();
            $table->integer('q_Leggings')->nullable();
            $table->integer('q_Bath_Mat_dry_clean')->nullable();
            $table->integer('q_Jacket_Down')->nullable();
            $table->integer('q_Nightgown')->nullable();
            $table->integer('q_Cummerbund')->nullable();
            $table->integer('q_Bathing_suit_one_piece')->nullable();
            $table->integer('q_Bathing_suit_Bottom')->nullable();
            $table->integer('q_Cardigan')->nullable();
            $table->integer('q_Tank_Top')->nullable();
            $table->integer('q_Tablecloth')->nullable();
            $table->integer('q_Robe')->nullable();
            $table->integer('q_Curtains_Light')->nullable();
            $table->integer('q_Coat_Pea_Coat')->nullable();
            $table->integer('q_Coat_Overcoat')->nullable();
            $table->integer('q_two_Piece_Suit')->nullable();
            $table->integer('q_Romper')->nullable();
            $table->integer('q_Cushion_Cover')->nullable();
            $table->integer('q_Blouse')->nullable();
            $table->integer('q_Cocktail_Dress')->nullable();
            $table->integer('q_Pants')->nullable();
            $table->integer('q_Jeans')->nullable();
            $table->integer('q_Suit_Jacket')->nullable();
            $table->integer('q_Scarf')->nullable();
            $table->integer('q_Polo_Sport_Shirt')->nullable();
            $table->integer('q_Vest')->nullable();
            $table->integer('q_Gloves')->nullable();
            $table->integer('q_Shawl')->nullable();
            $table->integer('q_Napkins')->nullable();
            $table->integer('q_Lab_Coat')->nullable();
            $table->integer('q_Sweatshirt')->nullable();
            $table->integer('q_Overalls')->nullable();
            $table->integer('q_Tuxedo')->nullable();
            $table->integer('q_Jersey')->nullable();
            $table->integer('q_Hoodie')->nullable();
            $table->integer('q_Bra')->nullable();
            $table->integer('q_Belt')->nullable();

            $table->integer('q_Jacket')->nullable();
            $table->integer('q_Coat')->nullable();
            $table->integer('q_Coat_3_4_Coat')->nullable();
            $table->integer('q_Coat_Down')->nullable();
            $table->integer('q_two_Piece_Skirt_Suit')->nullable();
            $table->integer('q_Bedding_Pillow_Case')->nullable();
            $table->integer('q_Bedding_Blanket')->nullable();
            $table->integer('q_Bedding_Bed_Sheet')->nullable();
            $table->integer('q_Bedding_Pillow_dry_clean')->nullable();
            $table->integer('q_Bathing_suit_Top')->nullable();
            $table->integer('q_Bedding_Down_Comforter')->nullable();
            $table->integer('q_Bedding_Comforter_dry_clean')->nullable();

            $table->integer('q_Hemming')->nullable();
            $table->integer('q_Hemming_Pant')->nullable();
            $table->integer('q_Hemming_Sleeve')->nullable();
            $table->integer('q_Taper')->nullable();
            $table->integer('q_Button')->nullable();
            $table->integer('q_Patch')->nullable();
            $table->integer('q_Zipper')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
