<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('cart_id');
            $table->integer('sp_id');
            $table->integer('service_id');
            $table->timestamps();

$table->integer('waf_1')->nullable();

$table->integer('dc_1')->nullable();
$table->integer('dc_2')->nullable();
$table->integer('dc_3')->nullable();
$table->integer('dc_4')->nullable();
$table->integer('dc_5')->nullable();
$table->integer('dc_6')->nullable();
$table->integer('dc_7')->nullable();
$table->integer('dc_8')->nullable();
$table->integer('dc_9')->nullable();
$table->integer('dc_10')->nullable();

$table->integer('dc_11')->nullable();
$table->integer('dc_12')->nullable();
$table->integer('dc_13')->nullable();
$table->integer('dc_14')->nullable();
$table->integer('dc_15')->nullable();
$table->integer('dc_16')->nullable();
$table->integer('dc_17')->nullable();
$table->integer('dc_18')->nullable();
$table->integer('dc_19')->nullable();
$table->integer('dc_20')->nullable();

$table->integer('dc_21')->nullable();
$table->integer('dc_22')->nullable();
$table->integer('dc_23')->nullable();
$table->integer('dc_24')->nullable();
$table->integer('dc_25')->nullable();
$table->integer('dc_26')->nullable();
$table->integer('dc_27')->nullable();
$table->integer('dc_28')->nullable();
$table->integer('dc_29')->nullable();
$table->integer('dc_30')->nullable();

$table->integer('dc_31')->nullable();
$table->integer('dc_32')->nullable();
$table->integer('dc_33')->nullable();
$table->integer('dc_34')->nullable();
$table->integer('dc_35')->nullable();
$table->integer('dc_36')->nullable();
$table->integer('dc_37')->nullable();
$table->integer('dc_38')->nullable();
$table->integer('dc_39')->nullable();
$table->integer('dc_40')->nullable();

$table->integer('dc_41')->nullable();
$table->integer('dc_42')->nullable();
$table->integer('dc_43')->nullable();
$table->integer('dc_44')->nullable();
$table->integer('dc_45')->nullable();
$table->integer('dc_46')->nullable();
$table->integer('dc_47')->nullable();
$table->integer('dc_48')->nullable();
$table->integer('dc_49')->nullable();
$table->integer('dc_50')->nullable();

$table->integer('dc_51')->nullable();
$table->integer('dc_52')->nullable();
$table->integer('dc_53')->nullable();
$table->integer('dc_54')->nullable();
$table->integer('dc_55')->nullable();
$table->integer('dc_56')->nullable();
$table->integer('dc_57')->nullable();
$table->integer('dc_58')->nullable();
$table->integer('dc_59')->nullable();
$table->integer('dc_60')->nullable();

$table->integer('dc_61')->nullable();
$table->integer('dc_62')->nullable();
$table->integer('dc_63')->nullable();
$table->integer('dc_64')->nullable();
$table->integer('dc_65')->nullable();
$table->integer('dc_66')->nullable();
$table->integer('dc_67')->nullable();
$table->integer('dc_68')->nullable();
$table->integer('dc_69')->nullable();
$table->integer('dc_70')->nullable();

$table->integer('t_1')->nullable();
$table->integer('t_2')->nullable();
$table->integer('t_3')->nullable();
$table->integer('t_4')->nullable();
$table->integer('t_5')->nullable();
$table->integer('t_6')->nullable();
$table->integer('t_7')->nullable();
$table->integer('t_8')->nullable();
// $prices
$table->integer('p_waf_1')->nullable();

$table->integer('p_dc_1')->nullable();
$table->integer('p_dc_2')->nullable();
$table->integer('p_dc_3')->nullable();
$table->integer('p_dc_4')->nullable();
$table->integer('p_dc_5')->nullable();
$table->integer('p_dc_6')->nullable();
$table->integer('p_dc_7')->nullable();
$table->integer('p_dc_8')->nullable();
$table->integer('p_dc_9')->nullable();
$table->integer('p_dc_10')->nullable();

$table->integer('p_dc_11')->nullable();
$table->integer('p_dc_12')->nullable();
$table->integer('p_dc_13')->nullable();
$table->integer('p_dc_14')->nullable();
$table->integer('p_dc_15')->nullable();
$table->integer('p_dc_16')->nullable();
$table->integer('p_dc_17')->nullable();
$table->integer('p_dc_18')->nullable();
$table->integer('p_dc_19')->nullable();
$table->integer('p_dc_20')->nullable();

$table->integer('p_dc_21')->nullable();
$table->integer('p_dc_22')->nullable();
$table->integer('p_dc_23')->nullable();
$table->integer('p_dc_24')->nullable();
$table->integer('p_dc_25')->nullable();
$table->integer('p_dc_26')->nullable();
$table->integer('p_dc_27')->nullable();
$table->integer('p_dc_28')->nullable();
$table->integer('p_dc_29')->nullable();
$table->integer('p_dc_30')->nullable();

$table->integer('p_dc_31')->nullable();
$table->integer('p_dc_32')->nullable();
$table->integer('p_dc_33')->nullable();
$table->integer('p_dc_34')->nullable();
$table->integer('p_dc_35')->nullable();
$table->integer('p_dc_36')->nullable();
$table->integer('p_dc_37')->nullable();
$table->integer('p_dc_38')->nullable();
$table->integer('p_dc_39')->nullable();
$table->integer('p_dc_40')->nullable();

$table->integer('p_dc_41')->nullable();
$table->integer('p_dc_42')->nullable();
$table->integer('p_dc_43')->nullable();
$table->integer('p_dc_44')->nullable();
$table->integer('p_dc_45')->nullable();
$table->integer('p_dc_46')->nullable();
$table->integer('p_dc_47')->nullable();
$table->integer('p_dc_48')->nullable();
$table->integer('p_dc_49')->nullable();
$table->integer('p_dc_50')->nullable();

$table->integer('p_dc_51')->nullable();
$table->integer('p_dc_52')->nullable();
$table->integer('p_dc_53')->nullable();
$table->integer('p_dc_54')->nullable();
$table->integer('p_dc_55')->nullable();
$table->integer('p_dc_56')->nullable();
$table->integer('p_dc_57')->nullable();
$table->integer('p_dc_58')->nullable();
$table->integer('p_dc_59')->nullable();
$table->integer('p_dc_60')->nullable();

$table->integer('p_dc_61')->nullable();
$table->integer('p_dc_62')->nullable();
$table->integer('p_dc_63')->nullable();
$table->integer('p_dc_64')->nullable();
$table->integer('p_dc_65')->nullable();
$table->integer('p_dc_66')->nullable();
$table->integer('p_dc_67')->nullable();
$table->integer('p_dc_68')->nullable();
$table->integer('p_dc_69')->nullable();
$table->integer('p_dc_70')->nullable();

$table->integer('p_t_1')->nullable();
$table->integer('p_t_2')->nullable();
$table->integer('p_t_3')->nullable();
$table->integer('p_t_4')->nullable();
$table->integer('p_t_5')->nullable();
$table->integer('p_t_6')->nullable();
$table->integer('p_t_7')->nullable();
$table->integer('p_t_8')->nullable();

$table->integer('f_waf_1')->nullable();

$table->integer('f_dc_1')->nullable();
$table->integer('f_dc_2')->nullable();
$table->integer('f_dc_3')->nullable();
$table->integer('f_dc_4')->nullable();
$table->integer('f_dc_5')->nullable();
$table->integer('f_dc_6')->nullable();
$table->integer('f_dc_7')->nullable();
$table->integer('f_dc_8')->nullable();
$table->integer('f_dc_9')->nullable();
$table->integer('f_dc_10')->nullable();

$table->integer('f_dc_11')->nullable();
$table->integer('f_dc_12')->nullable();
$table->integer('f_dc_13')->nullable();
$table->integer('f_dc_14')->nullable();
$table->integer('f_dc_15')->nullable();
$table->integer('f_dc_16')->nullable();
$table->integer('f_dc_17')->nullable();
$table->integer('f_dc_18')->nullable();
$table->integer('f_dc_19')->nullable();
$table->integer('f_dc_20')->nullable();

$table->integer('f_dc_21')->nullable();
$table->integer('f_dc_22')->nullable();
$table->integer('f_dc_23')->nullable();
$table->integer('f_dc_24')->nullable();
$table->integer('f_dc_25')->nullable();
$table->integer('f_dc_26')->nullable();
$table->integer('f_dc_27')->nullable();
$table->integer('f_dc_28')->nullable();
$table->integer('f_dc_29')->nullable();
$table->integer('f_dc_30')->nullable();

$table->integer('f_dc_31')->nullable();
$table->integer('f_dc_32')->nullable();
$table->integer('f_dc_33')->nullable();
$table->integer('f_dc_34')->nullable();
$table->integer('f_dc_35')->nullable();
$table->integer('f_dc_36')->nullable();
$table->integer('f_dc_37')->nullable();
$table->integer('f_dc_38')->nullable();
$table->integer('f_dc_39')->nullable();
$table->integer('f_dc_40')->nullable();

$table->integer('f_dc_41')->nullable();
$table->integer('f_dc_42')->nullable();
$table->integer('f_dc_43')->nullable();
$table->integer('f_dc_44')->nullable();
$table->integer('f_dc_45')->nullable();
$table->integer('f_dc_46')->nullable();
$table->integer('f_dc_47')->nullable();
$table->integer('f_dc_48')->nullable();
$table->integer('f_dc_49')->nullable();
$table->integer('f_dc_50')->nullable();

$table->integer('f_dc_51')->nullable();
$table->integer('f_dc_52')->nullable();
$table->integer('f_dc_53')->nullable();
$table->integer('f_dc_54')->nullable();
$table->integer('f_dc_55')->nullable();
$table->integer('f_dc_56')->nullable();
$table->integer('f_dc_57')->nullable();
$table->integer('f_dc_58')->nullable();
$table->integer('f_dc_59')->nullable();

$table->integer('f_t_1')->nullable();
$table->integer('f_t_2')->nullable();
$table->integer('f_t_3')->nullable();
$table->integer('f_t_4')->nullable();
$table->integer('f_t_5')->nullable();
$table->integer('f_t_6')->nullable();
$table->integer('f_t_7')->nullable();
$table->integer('f_t_8')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bills');
    }
}
