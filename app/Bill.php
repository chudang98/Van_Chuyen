<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';

    protected $fillable = [
        'address_client',    
        'address_reciever',     
        'phone_client',        
        'phone_reciever',      
        'payment',             
        'speed',               
        'communes_id_sender',  
        'communes_id_reciever',
        'users_id_kh'         
    ];
     
    public $timestamps = false;

    //ORM
    public function item(){
        $this->hasMany('App\Item');
    }
    public function communes_id_sender(){
        $this->hasOne('App\Communes');
    }
    public function communes_id_reciever(){
        $this->hasOne('App\Communes');
    }
    public function user_id_kh(){
        $this->belongsTo('App\Customer');
    }
    public function user_id_nvvc(){
        $this->belongsTo('App\Shipper');
    }

    public static function makeOrderBill($arr){
        $bill = new Bill;
        $bill->address_client           = $arr['sender-detail-addr'];
        $bill->address_reciever         = $arr['receive-detail-addr'];
        $bill->phone_client             = $arr['sender-phone'];
        $bill->phone_reciever           = $arr['reciever-phone'];
        $bill->name_reciever            = $arr['reciever-name'];
        $bill->payment                  = $arr['payment'];
        $bill->speed                    = $arr['speech'];
        $bill->communes_id_sender       = $arr['commune_sender'];
        $bill->communes_id_reciever     = $arr['commune_receiver'];
        $bill->users_id_kh              = auth()->user()->id;
        $bill->total_price              = $arr['price'];
        $bill->save();
        
        $count = count($arr['item-width']);
        for($i = 0; $i < $count; $i++){
            $item = new Item;
            $item->name      = $arr['item-name'][$i] ;	
            $item->weight    = $arr['item-weight'][$i] ;	
            $item->height    = $arr['item-height'][$i] ;	
            $item->width     = $arr['item-width'][$i] ;	
            $item->depth     = $arr['item-depth'][$i] ;	
            $item->bills_id  = $bill->id;
            $item->save();
        }
    } 

    public function calcBill(){
        
    }
}
