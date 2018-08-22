@if ( $carts->washandfold == "none")
    @php  $waf1=0; $waf2=0; $waf3=0; $waf4=0; $waf5=0; $waf6=0; $waf7=0; @endphp
    <!-- {{$waf1+$waf2+$waf3+$waf4+$waf5+$waf6+$waf7}} -->
@else
      @if (is_null($carts->q_Regular_Laundry))
      @php  $waf1=0; @endphp
      @else
            @php
            $a1= $carts->q_Regular_Laundry;
            $b1 =$price->Regular_Laundry;
            $waf1= $a1*$b1;
            @endphp
      @endif
      @if (is_null($carts->q_Bedding_Mattress_Duvet_Cover))
        @php  $waf2=0; @endphp
      @else
            @php
            $a2= $carts->q_Bedding_Mattress_Duvet_Cover;
            $b2 =$price->Bedding_Mattress_Duvet_Cover;
            $waf2= $a2*$b2;
            @endphp
      @endif
      @if (is_null($carts->q_Bedding_Comforter_laundry))
        @php  $waf3=0; @endphp
      @else
            @php
            $a3= $carts->q_Bedding_Comforter_laundry;
            $b3 =$price->Bedding_Comforter_laundry;
            $waf3= $a3*$b3;
            @endphp
      @endif
      @if (is_null($carts->q_Bedding_Blanket_Throw))
      @php  $waf4=0; @endphp
      @else
            @php
            $a4= $carts->q_Bedding_Blanket_Throw;
            $b4 =$price->Bedding_Blanket_Throw;
            $waf4= $a4*$b4;
            @endphp
      @endif
      @if (is_null($carts->q_Bedding_Pillow_laundry))
        @php  $waf5=0; @endphp
      @else
            @php
            $a5= $carts->q_Bedding_Pillow_laundry;
            $b5 =$price->Bedding_Pillow_laundry;
            $waf5= $a5*$b5;
            @endphp
      @endif
      @if (is_null($carts->q_Bath_Mat_laundry))
        @php  $waf6=0; @endphp
      @else
            @php
            $a6= $carts->q_Bath_Mat_laundry;
            $b6 =$price->Bath_Mat_laundry;
            $waf6= $a6*$b6;
            @endphp
      @endif
      @if (is_null($carts->q_Every_Hang_Dry_Item))
        @php  $waf7=0; @endphp
      @else
            @php
            $a7= $carts->q_Every_Hang_Dry_Item;
            $b7 =$price->Every_Hang_Dry_Item;
            $waf7= $a7*$b7;
            @endphp
      @endif
      <!-- {{$waf1+$waf2+$waf3+$waf4+$waf5+$waf6+$waf7}} -->
@endif



@if ( $carts->dryclean == "none")
@php
$dc1=0;  $dc2=0;  $dc3=0;  $dc4=0;  $dc5=0;  $dc6=0;  $dc7=0;  $dc8=0;  $dc9=0;  $dc10=0;  $dc11=0;  $dc12=0;  $dc13=0;  $dc14=0;  $dc15=0;  $dc16=0;  $dc17=0;  $dc18=0;  $dc19=0;  $dc20=0;  $dc21=0;  $dc22=0;  $dc23=0;  $dc24=0;  $dc25=0;  $dc26=0;  $dc27=0;  $dc28=0;  $dc29=0;  $dc30=0;  $dc31=0;  $dc32=0;  $dc33=0;  $dc34=0;  $dc35=0;  $dc36=0;  $dc37=0;  $dc38=0;  $dc39=0;  $dc40=0;  $dc41=0;  $dc42=0;  $dc43=0;  $dc44=0;  $dc45=0;  $dc46=0;  $dc47=0;  $dc48=0;  $dc49=0;  $dc50=0;  $dc51=0;  $dc52=0;  $dc53=0;  $dc54=0;  $dc55=0;  $dc56=0;  $dc57=0;  $dc58=0;
@endphp
<!-- {{$dc1 + $dc2 + $dc3 + $dc4 + $dc5 + $dc6 + $dc7 + $dc8 + $dc9 + $dc10 + $dc11 + $dc12 + $dc13 + $dc14 + $dc15 + $dc16 + $dc17 + $dc18 + $dc19 + $dc20 + $dc21 + $dc22 + $dc23 + $dc24 + $dc25 + $dc26 + $dc27 + $dc28 + $dc29 + $dc30 + $dc31 + $dc32 + $dc33 + $dc34 + $dc35 + $dc36 + $dc37 + $dc38 + $dc39 + $dc40 + $dc41 + $dc42 + $dc43 + $dc44 + $dc45 + $dc46 + $dc47 + $dc48 + $dc49 + $dc50 + $dc51 + $dc52 + $dc53 + $dc54 + $dc55 + $dc56 + $dc57 + $dc58}} -->

@else
      @if (is_null($carts->q_Dress))
        @php  $dc1=0; @endphp
      @else
            @php
            $dca1= $carts->q_Dress;
            $dcb1 =$price->Dress;
            $dc1= $dca1*$dcb1;
            @endphp
      @endif
      @if (is_null($carts->q_Shirt))
        @php  $dc2=0; @endphp
      @else
            @php
            $dca2= $carts->q_Shirt;
            $dcb2 =$price->Shirt;
            $dc2= $dca2*$dcb2;
            @endphp

      @endif
      @if (is_null($carts->q_Sweater))
        @php  $dc3=0; @endphp
      @else

            @php
            $dca3= $carts->q_Sweater;
            $dcb3 =$price->Sweater;
            $dc3= $dca3*$dcb3;
            @endphp

      @endif
      @if (is_null($carts->q_Dress_Childrens))
        @php  $dc4=0; @endphp
      @else
            @php
            $dca4= $carts->q_Dress_Childrens;
            $dcb4 =$price->Dress_Childrens;
            $dc4= $dca4*$dcb4;
            @endphp

      @endif
      @if (is_null($carts->q_Skirt))
          @php  $dc5=0; @endphp
      @else

            @php
            $dca5= $carts->q_Skirt;
            $dcb5 =$price->Skirt;
            $dc5= $dca5*$dcb5;
            @endphp

      @endif
      @if (is_null($carts->q_Tie))
          @php  $dc6=0; @endphp
      @else

            @php
            $dca6= $carts->q_Tie;
            $dcb6 =$price->Tie;
            $dc6= $dca6*$dcb6;
            @endphp

      @endif
      @if (is_null($carts->q_Shorts))
          @php  $dc7=0; @endphp
      @else

            @php
            $dca7= $carts->q_Shorts;
            $dcb7 =$price->Shorts;
            $dc7= $dca7*$dcb7;
            @endphp
                  @endif

      @if (is_null($carts->q_Jumpsuit))
          @php  $dc8=0; @endphp
      @else
      @php
            $a8= $carts->q_Jumpsuit;
            $b8 =$price->Jumpsuit;
            $dc8= $a8*$b8;
            @endphp
                  @endif
      @if (is_null($carts->q_Gown))
          @php  $dc9=0; @endphp
      @else
      @php
            $a9= $carts->q_Gown;
            $b9 =$price->Gown;
            $dc9= $a9*$b9;
            @endphp
                  @endif
      @if (is_null($carts->q_Mittens))
          @php  $dc10=0; @endphp
      @else
      @php
            $a10= $carts->q_Mittens;
            $b10 =$price->Mittens;
            $dc10= $a10*$b10;
            @endphp

      @endif
      @if (is_null($carts->q_Leggings))
          @php  $dc11=0; @endphp
      @else
      @php
            $a11= $carts->q_Leggings;
            $b11 =$price->Leggings;
            $dc11= $a11*$b11;
            @endphp

      @endif
      @if (is_null($carts->q_Bath_Mat_dry_clean))
          @php  $dc12=0; @endphp
      @else
      @php
            $a12= $carts->q_Bath_Mat_dry_clean;
            $b12 =$price->Bath_Mat_dry_clean;
            $dc12= $a12*$b12;
            @endphp

      @endif
      @if (is_null($carts->q_Jacket_Down))
          @php  $dc13=0; @endphp
      @else
      @php
            $a13= $carts->q_Jacket_Down;
            $b13 =$price->Jacket_Down;
            $dc13= $a13*$b13;
            @endphp

      @endif
      @if (is_null($carts->q_Nightgown))
          @php  $dc14=0; @endphp
      @else
      @php
            $a14= $carts->q_Nightgown;
            $b14 =$price->Nightgown;
            $dc14= $a14*$b14;
            @endphp

      @endif
      @if (is_null($carts->q_Cummerbund))
          @php  $dc15=0; @endphp
      @else
      @php
            $a15= $carts->q_Cummerbund;
            $b15 =$price->Cummerbund;
            $dc15= $a15*$b15;
            @endphp

      @endif
      @if (is_null($carts->q_Bathing_suit_one_piece))
          @php  $dc16=0; @endphp
      @else
      @php
            $a16= $carts->q_Bathing_suit_one_piece;
            $b16 =$price->Bathing_suit_one_piece;
            $dc16= $a16*$b16;
            @endphp

      @endif
      @if (is_null($carts->q_Bathing_suit_Bottom))
          @php  $dc17=0; @endphp
      @else
      @php
            $a17= $carts->q_Bathing_suit_Bottom;
            $b17 =$price->Bathing_suit_Bottom;
            $dc17= $a17*$b17;
            @endphp

      @endif
      @if (is_null($carts->q_Cardigan))
          @php  $dc18=0; @endphp
      @else
      @php
            $a18= $carts->q_Cardigan;
            $b18 =$price->Cardigan;
            $dc18= $a18*$b18;
            @endphp

      @endif
      @if (is_null($carts->q_Tank_Top))
          @php  $dc19=0; @endphp
      @else
      @php
            $a19= $carts->q_Tank_Top;
            $b19 =$price->Tank_Top;
            $dc19= $a19*$b19;
            @endphp

      @endif
      @if (is_null($carts->q_Shorts))
          @php  $dc20=0; @endphp
      @else
      @php
            $a20= $carts->q_Tablecloth;
            $b20 =$price->Tablecloth;
            $dc20= $a20*$b20;
            @endphp

      @endif
      @if (is_null($carts->q_Robe))
            @php  $dc21=0; @endphp
      @else
      @php
            $a21= $carts->q_Robe;
            $b21 =$price->Robe;
            $dc21= $a21*$b21;
            @endphp

      @endif
      @if (is_null($carts->q_Curtains_Light))
            @php  $dc22=0; @endphp
      @else
      @php
            $a22= $carts->q_Curtains_Light;
            $b22 =$price->Curtains_Light;
            $dc22= $a22*$b22;
            @endphp

      @endif
      @if (is_null($carts->q_Coat_Pea_Coat))
            @php  $dc23=0; @endphp
      @else
      @php
            $a23= $carts->q_Coat_Pea_Coat;
            $b23 =$price->Coat_Pea_Coat;
            $dc23= $a23*$b23;
            @endphp

      @endif
      @if (is_null($carts->q_Coat_Overcoat))
            @php  $dc24=0; @endphp
      @else
      @php
            $a24= $carts->q_Coat_Overcoat;
            $b24 =$price->Coat_Overcoat;
            $dc24= $a24*$b24;
            @endphp

      @endif
      @if (is_null($carts->q_two_Piece_Suit))
            @php  $dc25=0; @endphp
      @else
      @php
            $a25= $carts->q_two_Piece_Suit;
            $b25 =$price->two_Piece_Suit;
            $dc25= $a25*$b25;
            @endphp

      @endif
      @if (is_null($carts->q_Romper))
            @php  $dc26=0; @endphp
      @else
      @php
            $a26= $carts->q_Romper;
            $b26 =$price->Romper;
            $dc26= $a26*$b26;
            @endphp

      @endif
      @if (is_null($carts->q_Cushion_Cover))
            @php  $dc27=0; @endphp
      @else
      @php
            $a27= $carts->q_Cushion_Cover;
            $b27 =$price->Cushion_Cover;
            $dc27= $a27*$b27;
            @endphp

      @endif
      @if (is_null($carts->q_Blouse))
            @php  $dc28=0; @endphp
      @else
      @php
            $a28= $carts->q_Blouse;
            $b28 =$price->Blouse;
            $dc28= $a28*$b28;
            @endphp

      @endif

      @if (is_null($carts->q_Cocktail_Dress))
            @php  $dc29=0; @endphp
      @else
      @php
            $a29= $carts->q_Cocktail_Dress;
            $b29 =$price->Cocktail_Dress;
            $dc29= $a29*$b29;
            @endphp

      @endif
      @if (is_null($carts->q_Pants))
            @php  $dc30=0; @endphp
      @else
      @php
            $a30= $carts->q_Pants;
            $b30 =$price->Pants;
            $dc30= $a30*$b30;
            @endphp

      @endif
      @if (is_null($carts->q_Jeans))
            @php  $dc31=0; @endphp
      @else
      @php
            $a31= $carts->q_Jeans;
            $b31 =$price->Jeans;
            $dc31= $a31*$b31;
            @endphp

      @endif
      @if (is_null($carts->q_Suit_Jacket))
            @php  $dc32=0; @endphp
      @else
      @php
            $a32= $carts->q_Suit_Jacket;
            $b32 =$price->Suit_Jacket;
            $dc32= $a32*$b32;
            @endphp

      @endif
      @if (is_null($carts->q_Scarf))
            @php  $dc33=0; @endphp
      @else
      @php
            $a33= $carts->q_Scarf;
            $b33 =$price->Scarf;
            $dc33= $a33*$b33;
            @endphp

      @endif
      @if (is_null($carts->q_Polo_Sport_Shirt))
            @php  $dc34=0; @endphp
      @else
      @php
            $a34= $carts->q_Polo_Sport_Shirt;
            $b34 =$price->Polo_Sport_Shirt;
            $dc34= $a34*$b34;
            @endphp

      @endif
      @if (is_null($carts->q_Vest))
            @php  $dc35=0; @endphp
      @else
      @php
            $a35= $carts->q_Vest;
            $b35 =$price->Vest;
            $dc35= $a35*$b35;
            @endphp

      @endif
      @if (is_null($carts->q_Gloves))
            @php  $dc36=0; @endphp
      @else
      @php
            $a36= $carts->q_Gloves;
            $b36 =$price->Gloves;
            $dc36= $a36*$b36;
            @endphp

      @endif
      @if (is_null($carts->q_Shawl))
            @php  $dc37=0; @endphp
      @else
      @php
            $a37= $carts->q_Shawl;
            $b37 =$price->Shawl;
            $dc37= $a37*$b37;
            @endphp

      @endif
      @if (is_null($carts->q_Napkins))
            @php  $dc38=0; @endphp
      @else
      @php
            $a38= $carts->q_Napkins;
            $b38 =$price->Napkins;
            $dc38= $a38*$b38;
            @endphp

      @endif
      @if (is_null($carts->q_Lab_Coat))
          @php  $dc39=0; @endphp
      @else
      @php
            $a39= $carts->q_Lab_Coat;
            $b39 =$price->Lab_Coat;
            $dc39= $a39*$b39;
            @endphp

      @endif
      @if (is_null($carts->q_Sweatshirt))
          @php  $dc40=0; @endphp
      @else
      @php
            $a40= $carts->q_Sweatshirt;
            $b40 =$price->Sweatshirt;
            $dc40= $a40*$b40;
            @endphp

      @endif
      @if (is_null($carts->q_Overalls))
          @php  $dc41=0; @endphp
      @else
      @php
            $a41= $carts->q_Overalls;
            $b41 =$price->Overalls;
            $dc41= $a41*$b41;
            @endphp

      @endif
      @if (is_null($carts->q_Tuxedo))
          @php  $dc42=0; @endphp
      @else
      @php
            $a42= $carts->q_Tuxedo;
            $b42 =$price->Tuxedo;
            $dc42= $a42*$b42;
            @endphp

      @endif
      @if (is_null($carts->q_Jersey))
          @php  $dc43=0; @endphp
      @else
      @php
            $a43= $carts->q_Jersey;
            $b43 =$price->Jersey;
            $dc43= $a43*$b43;
            @endphp

      @endif
      @if (is_null($carts->q_Hoodie))
          @php  $dc44=0; @endphp
      @else
      @php
            $a44= $carts->q_Hoodie;
            $b44 =$price->Hoodie;
            $dc44= $a44*$b44;
            @endphp

      @endif
      @if (is_null($carts->q_Bra))
          @php  $dc45=0; @endphp
      @else
      @php
            $a45= $carts->q_Bra;
            $b45 =$price->Bra;
            $dc45= $a45*$b45;
            @endphp

      @endif
      @if (is_null($carts->q_Belt))
          @php  $dc46=0; @endphp
      @else
      @php
            $a46= $carts->q_Belt;
            $b46 =$price->Belt;
            $dc46= $a46*$b46;
            @endphp

      @endif
      @if (is_null($carts->q_Jacket))
          @php  $dc47=0; @endphp
      @else
      @php
            $a47= $carts->q_Jacket;
            $b47 =$price->Jacket;
            $dc47= $a47*$b47;
            @endphp

      @endif
      @if (is_null($carts->q_Coat))
          @php  $dc48=0; @endphp
      @else
      @php
            $a48= $carts->q_Coat;
            $b48 =$price->Coat;
            $dc48= $a48*$b48;
            @endphp

      @endif
      @if (is_null($carts->q_Coat_3_4_Coat))
          @php  $dc49=0; @endphp
      @else
      @php
            $a49= $carts->q_Coat_3_4_Coat;
            $b49 =$price->Coat_3_4_Coat;
            $dc49= $a49*$b49;
            @endphp

      @endif
      @if (is_null($carts->q_Coat_Down))
          @php  $dc50=0; @endphp
      @else
      @php
            $a50= $carts->q_Coat_Down;
            $b50 =$price->Coat_Down;
            $dc50= $a50*$b50;
            @endphp

      @endif
      @if (is_null($carts->q_two_Piece_Skirt_Suit))
          @php  $dc51=0; @endphp
      @else
      @php
            $a51= $carts->q_two_Piece_Skirt_Suit;
            $b51 =$price->two_Piece_Skirt_Suit;
            $dc51= $a51*$b51;
            @endphp

      @endif
      @if (is_null($carts->q_Bedding_Pillow_Case))
          @php  $dc52=0; @endphp
      @else
      @php
            $a52= $carts->q_Bedding_Pillow_Case;
            $b52 =$price->Bedding_Pillow_Case;
            $dc52= $a52*$b52;
            @endphp

      @endif
      @if (is_null($carts->q_Bedding_Blanket))
          @php  $dc53=0; @endphp
      @else
      @php
            $a53= $carts->q_Bedding_Blanket;
            $b53 =$price->Bedding_Blanket;
            $dc53= $a53*$b53;
            @endphp

      @endif
      @if (is_null($carts->q_Bedding_Bed_Sheet))
          @php  $dc54=0; @endphp
      @else
      @php
            $a54= $carts->q_Bedding_Bed_Sheet;
            $b54 =$price->Bedding_Bed_Sheet;
            $dc54= $a54*$b54;
            @endphp

      @endif
      @if (is_null($carts->q_Bedding_Pillow_dry_clean))
          @php  $dc55=0; @endphp
      @else
      @php
            $a55= $carts->q_Bedding_Pillow_dry_clean;
            $b55 =$price->Bedding_Pillow_dry_clean;
            $dc55= $a55*$b55;
            @endphp

      @endif
      @if (is_null($carts->q_Bathing_suit_Top))
            @php  $dc56=0; @endphp
      @else
      @php
            $a56= $carts->q_Bathing_suit_Top;
            $b56 =$price->Bathing_suit_Top;
            $dc56= $a56*$b56;
            @endphp

      @endif
      @if (is_null($carts->q_Bedding_Down_Comforter))
            @php  $dc57=0; @endphp
      @else
      @php
            $a57= $carts->q_Bedding_Down_Comforter;
            $b57 =$price->Bedding_Down_Comforter;
            $dc57= $a57*$b57;
            @endphp

      @endif
      @if (is_null($carts->q_Bedding_Comforter_dry_clean))
            @php  $dc58=0; @endphp
      @else
      @php
            $a58= $carts->q_Bedding_Comforter_dry_clean;
            $b58 =$price->Bedding_Comforter_dry_clean;
            $dc58= $a58*$b58;
            @endphp
      @endif

      <!-- {{$dc1 + $dc2 + $dc3 + $dc4 + $dc5 + $dc6 + $dc7 + $dc8 + $dc9 + $dc10 + $dc11 + $dc12 + $dc13 + $dc14 + $dc15 + $dc16 + $dc17 + $dc18 + $dc19 + $dc20 + $dc21 + $dc22 + $dc23 + $dc24 + $dc25 + $dc26 + $dc27 + $dc28 + $dc29 + $dc30 + $dc31 + $dc32 + $dc33 + $dc34 + $dc35 + $dc36 + $dc37 + $dc38 + $dc39 + $dc40 + $dc41 + $dc42 + $dc43 + $dc44 + $dc45 + $dc46 + $dc47 + $dc48 + $dc49 + $dc50 + $dc51 + $dc52 + $dc53 + $dc54 + $dc55 + $dc56 + $dc57 + $dc58}} -->

      <!-- {{ $waf1+$waf2+$waf3+$waf4+$waf5+$waf6+$waf7 + $dc1 + $dc2 + $dc3 + $dc4 + $dc5 + $dc6 + $dc7 + $dc8 + $dc9 + $dc10 + $dc11 + $dc12 + $dc13 + $dc14 + $dc15 + $dc16 + $dc17 + $dc18 + $dc19 + $dc20 + $dc21 + $dc22 + $dc23 + $dc24 + $dc25 + $dc26 + $dc27 + $dc28 + $dc29 + $dc30 + $dc31 + $dc32 + $dc33 + $dc34 + $dc35 + $dc36 + $dc37 + $dc38 + $dc39 + $dc40 + $dc41 + $dc42 + $dc43 + $dc44 + $dc45 + $dc46 + $dc47 + $dc48 + $dc49 + $dc50 + $dc51 + $dc52 + $dc53 + $dc54 + $dc55 + $dc56 + $dc57 + $dc58}} -->

@endif



@if ( $carts->tailoring == "none")
@php
$t1=0; $t2=0; $t3=0; $t4=0; $t5=0; $t6=0; $t7=0;
@endphp

@else

      @if (is_null($carts->q_Hemming))
          @php $t1=0; @endphp
      @else

            @php
            $a1= $carts->q_Hemming;
            $b1 =$price->Hemming;
            $t1= $a1*$b1;
            @endphp


      @endif
      @if (is_null($carts->q_Hemming_Pant))
          @php $t2=0; @endphp
      @else

            @php
            $a2= $carts->q_Hemming_Pant;
            $b2 =$price->Hemming_Pant;
            $t2= $a2*$b2;
            @endphp


      @endif
      @if (is_null($carts->q_Hemming_Sleeve))
          @php $t3=0; @endphp
      @else

            @php
            $a3= $carts->q_Hemming_Sleeve;
            $b3 =$price->Hemming_Sleeve;
            $t3= $a3*$b3;
            @endphp


      @endif
      @if (is_null($carts->q_Taper))
          @php $t4=0; @endphp
      @else

            @php
            $a4= $carts->q_Taper;
            $b4 =$price->Taper;
            $t4= $a4*$b4;
            @endphp


      @endif
      @if (is_null($carts->q_Button))
          @php $t5=0; @endphp
      @else

            @php
            $a5= $carts->q_Button;
            $b5 =$price->Button;
            $t5= $a5*$b5;
            @endphp


      @endif
      @if (is_null($carts->q_Patch))
          @php $t6=0; @endphp
      @else

            @php
            $a6= $carts->q_Patch;
            $b6 =$price->Patch;
            $t6= $a6*$b6;
            @endphp


      @endif
      @if (is_null($carts->q_Zipper))
          @php $t7=0; @endphp
      @else

            @php
            $a7= $carts->q_Zipper;
            $b7 =$price->Zipper;
            $t7= $a7*$b7;
            @endphp
      @endif

@endif
<!-- {{ $waf1+$waf2+$waf3+$waf4+$waf5+$waf6+$waf7 + $dc1 + $dc2 + $dc3 + $dc4 + $dc5 + $dc6 + $dc7 + $dc8 + $dc9 + $dc10 + $dc11 + $dc12 + $dc13 + $dc14 + $dc15 + $dc16 + $dc17 + $dc18 + $dc19 + $dc20 + $dc21 + $dc22 + $dc23 + $dc24 + $dc25 + $dc26 + $dc27 + $dc28 + $dc29 + $dc30 + $dc31 + $dc32 + $dc33 + $dc34 + $dc35 + $dc36 + $dc37 + $dc38 + $dc39 + $dc40 + $dc41 + $dc42 + $dc43 + $dc44 + $dc45 + $dc46 + $dc47 + $dc48 + $dc49 + $dc50 + $dc51 + $dc52 + $dc53 + $dc54 + $dc55 + $dc56 + $dc57 + $dc58 + $t1 + $t2 + $t3 + $t4 + $t5 + $t6 + $t7}} -->

<?php
$total = ($waf1+$waf2+$waf3+$waf4+$waf5+$waf6+$waf7 + $dc1 + $dc2 + $dc3 + $dc4 + $dc5 + $dc6 + $dc7 + $dc8 + $dc9 + $dc10 + $dc11 + $dc12 + $dc13 + $dc14 + $dc15 + $dc16 + $dc17 + $dc18 + $dc19 + $dc20 + $dc21 + $dc22 + $dc23 + $dc24 + $dc25 + $dc26 + $dc27 + $dc28 + $dc29 + $dc30 + $dc31 + $dc32 + $dc33 + $dc34 + $dc35 + $dc36 + $dc37 + $dc38 + $dc39 + $dc40 + $dc41 + $dc42 + $dc43 + $dc44 + $dc45 + $dc46 + $dc47 + $dc48 + $dc49 + $dc50 + $dc51 + $dc52 + $dc53 + $dc54 + $dc55 + $dc56 + $dc57 + $dc58 + $t1 + $t2 + $t3 + $t4 + $t5 + $t6 + $t7);

if ($total <= "30") {
$charge = 4.99;
echo $charge + $total;}
else {  echo "$total";}
?>
