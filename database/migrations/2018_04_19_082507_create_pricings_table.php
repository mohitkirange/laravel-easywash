<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricings', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('price_content')->nullable();
            $table->integer('sp_id');
            // $table->integer('price_laundry')->nullable();
            $table->integer('Regular_Laundry')->nullable();
            $table->integer('Bedding_Mattress_Duvet_Cover')->nullable();
            $table->integer('Bedding_Comforter_laundry')->nullable();
            $table->integer('Bedding_Blanket_Throw')->nullable();
            $table->integer('Bedding_Pillow_laundry')->nullable();
            $table->integer('Bath_Mat_laundry')->nullable();
            $table->integer('Every_Hang_Dry_Item')->nullable();

            $table->integer('Dress')->nullable();
          $table->integer('  Shirt')->nullable();
            $table->integer('Sweater')->nullable();
            $table->integer('Dress_Childrens')->nullable();
            $table->integer('Skirt')->nullable();
            $table->integer('Tie')->nullable();
            $table->integer('Shorts')->nullable();
            $table->integer('Jumpsuit')->nullable();
            $table->integer('Gown')->nullable();
            $table->integer('Mittens')->nullable();
            $table->integer('Leggings')->nullable();
            $table->integer('Bath_Mat_dry_clean')->nullable();
            $table->integer('Jacket_Down')->nullable();
          $table->integer('  Nightgown')->nullable();
          $table->integer('  Cummerbund')->nullable();
            $table->integer('Bathing_suit_one_piece')->nullable();
          $table->integer('  Bathing_suit_Bottom')->nullable();
            $table->integer('Cardigan')->nullable();
          $table->integer('  Tank_Top')->nullable();
            $table->integer('Tablecloth')->nullable();
            $table->integer('Robe')->nullable();
            $table->integer('Curtains_Light')->nullable();
            $table->integer('Coat_Pea_Coat')->nullable();
          $table->integer('  Coat_Overcoat')->nullable();
          $table->integer('  two_Piece_Suit')->nullable();
          $table->integer('  Romper')->nullable();
          $table->integer('  Cushion_Cover')->nullable();
          $table->integer('  Blouse')->nullable();
          $table->integer('  Cocktail_Dress')->nullable();
          $table->integer('  Pants')->nullable();
          $table->integer('  Jeans')->nullable();
          $table->integer('  Suit_Jacket')->nullable();
          $table->integer('  Scarf')->nullable();
          $table->integer('  Polo_Sport_Shirt')->nullable();
          $table->integer('  Vest')->nullable();
          $table->integer('  Gloves')->nullable();
          $table->integer('  Shawl')->nullable();
          $table->integer('  Napkins')->nullable();
          $table->integer('  Lab_Coat')->nullable();
          $table->integer('  Sweatshirt')->nullable();
          $table->integer('  Overalls')->nullable();
          $table->integer('  Tuxedo')->nullable();
          $table->integer('  Jersey')->nullable();
          $table->integer('  Hoodie')->nullable();
          $table->integer('  Bra')->nullable();
          $table->integer('  Belt')->nullable();
          $table->integer('  Jacket')->nullable();
          $table->integer('  Coat')->nullable();
          $table->integer('  Coat_3_4_Coat')->nullable();
          $table->integer('  Coat_Down')->nullable();
          $table->integer('  two_Piece_Skirt_Suit')->nullable();
          $table->integer('  Bedding_Pillow_Case')->nullable();
          $table->integer('  Bedding_Blanket')->nullable();
          $table->integer('  Bedding_Bed_Sheet')->nullable();
          $table->integer('  Bedding_Pillow_dry_clean')->nullable();
          $table->integer('  Bathing_suit_Top')->nullable();
          $table->integer('  Bedding_Down_Comforter')->nullable();
          $table->integer('  Bedding_Comforter_dry_clean')->nullable();

          $table->integer('  Hemming')->nullable();
          $table->integer('  Hemming_Pant')->nullable();
          $table->integer('  Hemming_Sleeve')->nullable();
          $table->integer('  Taper')->nullable();
          $table->integer('  Button')->nullable();
          $table->integer('  Patch')->nullable();
          $table->integer('  Zipper')->nullable();


//
// Regular_Laundry
// Bedding_Mattress_Duvet_Cover
// Bedding_Comforter_laundry
// Bedding_Blanket_Throw
// Bedding_Pillow_laundry
// Bath_Mat_laundry
// Every_Hang_Dry_Item
//
// Dress
// Shirt
// Sweater
// Dress_Childrens
// Skirt
// Tie
// Shorts
// Jumpsuit
// Gown
// Mittens
// Leggings
// Bath_Mat_dry_clean
// Jacket_Down
// Nightgown
// Cummerbund
// Bathing_suit_one_piece
// Bathing_suit_Bottom
// Cardigan
// Tank_Top
// Tablecloth
// Robe
// Curtains_Light
// Coat_Pea_Coat
// Coat_Overcoat
// two_Piece_Suit
// Romper
// Cushion_Cover
// Blouse
// Cocktail_Dress
// Pants
// Jeans
// Suit_Jacket
// Scarf
// Polo_Sport_Shirt
// Vest
// Gloves
// Shawl
// Napkins
// Lab_Coat
// Sweatshirt
// Overalls
// Tuxedo
// Jersey
// Hoodie
// Bra
// Belt
// Jacket
// Coat
// Coat_3_4_Coat
// Coat_Down
// two_Piece_Skirt_Suit
// Bedding_Pillow_Case
// Bedding_Blanket
// Bedding_Bed_Sheet
// Bedding_Pillow_dry_clean
// Bathing_suit_Top
// Bedding_Down_Comforter
// Bedding_Comforter_dry_clean
//
// Hemming
// Hemming_Pant
// Hemming_Sleeve
// Taper
// Button
// Patch
// Zipper
//


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pricings');
    }
}
