<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    protected $fillable = [
    'id',
    'dos',
    'user_id',
    'sp_id',
    'service_id',
    'washandfold',
    'dryclean',
    'tailoring',
    'voucher',
    'q_Regular_Laundry',
    'q_Bedding_Mattress_Duvet_Cover',
    'q_Bedding_Comforter_laundry',
    'q_Bedding_Blanket_Throw',
    'q_Bedding_Pillow_laundry',
    'q_Bath_Mat_laundry',
    'q_Every_Hang_Dry_Item',
    'q_Dress',
    'q_Shirt',
    'q_Sweater',
    'q_Dress_Childrens',
    'q_Skirt',
    'q_Tie',
    'q_Shorts',
    'q_Jumpsuit',
    'q_Gown',
    'q_Mittens',
    'q_Leggings',
    'q_Bath_Mat_dry_clean',
    'q_Jacket_Down',
    'q_Nightgown',
    'q_Cummerbund',
    'q_Bathing_suit_one_piece',
    'q_Bathing_suit_Bottom',
    'q_Cardigan',
    'q_Tank_Top',
    'q_Tablecloth',
    'q_Robe',
    'q_Curtains_Light',
    'q_Coat_Pea_Coat',
    'q_Coat_Overcoat',
    'q_two_Piece_Suit',
    'q_Romper',
    'q_Cushion_Cover',
    'q_Blouse',
    'q_Cocktail_Dress',
    'q_Pants',
    'q_Jeans',
    'q_Suit_Jacket',
    'q_Scarf',
    'q_Polo_Sport_Shirt',
    'q_Vest',
    'q_Gloves',
    'q_Shawl',
    'q_Napkins',
    'q_Lab_Coat',
    'q_Sweatshirt',
    'q_Overalls',
    'q_Tuxedo',
    'q_Jersey',
    'q_Hoodie',
    'q_Bra',
    'q_Belt',
    'q_Jacket',
    'q_Coat',
    'q_Coat_3_4_Coat',
    'q_Coat_Down',
    'q_two_Piece_Skirt_Suit',
    'q_Bedding_Pillow_Case',
    'q_Bedding_Blanket',
    'q_Bedding_Bed_Sheet',
    'q_Bedding_Pillow_dry_clean',
    'q_Bathing_suit_Top',
    'q_Bedding_Down_Comforter',
    'q_Bedding_Comforter_dry_clean',
    'q_Hemming',
    'q_Hemming_Pant',
    'q_Hemming_Sleeve',
    'q_Taper',
    'q_Button',
    'q_Patch',
    'q_Zipper',
  ];


    public function drycleanings()
    {
      return $this->belongsToMany('App\drycleaning')
      ->withPivot('$cart_id','drycleaning_id','q_drycleaning_id');
    }




    public function products()
    {
        return $this->belongsToMany('App\Product');

    }

    public function washandfolds()
    {
      return $this->belongsToMany('App\washandfold');
    }

    public function tailorings()
    {
      return $this->belongsToMany('App\tailoring');
    }

}
