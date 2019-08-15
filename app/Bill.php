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
    public function item()
    {
        return $this->hasMany('App\Item', 'bills_id');
    }
    public function communes_id_sender()
    {
        return $this->hasOne('App\Commune', 'communes_id_sender');
    }
    public function communes_id_reciever()
    {
        return $this->hasOne('App\Commune', 'communes_id_reciever');
    }
    public function user_id_kh()
    {
        return $this->belongsTo('App\User', 'users_id_kh');
    }
    public function user_id_nvvc()
    {
        return $this->belongsTo('App\User', 'users_id_nvvc');
    }

    public static function makeOrderBill($arr)
    {
        $bill = new Bill;
        $bill->address_client           = $arr['sender-detail-addr'];
        $bill->address_reciever         = $arr['receive-detail-addr'];
        $bill->phone_client             = $arr['sender-phone'];
        $bill->phone_reciever           = $arr['reciever-phone'];
        $bill->name_reciever            = $arr['reciever-name'];
        $bill->payment                  = $arr['payment'];
        $bill->speed                    = $arr['speech'];
        // $bill->communes_id_sender       = $arr['commune_sender'];
        // $bill->communes_id_reciever     = $arr['commune_receiver'];
        $bill->users_id_kh              = auth()->user()->id;
        $bill->total_price              = $arr['price'];
        $bill->save();
        
        $count = count($arr['item-width']);
        for($i = 0; $i < $count; $i++){
            $item = new Item;
            $item->weight    = $arr['item-weight'][$i] ;	
            $item->height    = $arr['item-height'][$i] ;	
            $item->width     = $arr['item-width'][$i] ;	
            $item->depth     = $arr['item-depth'][$i] ;	
            $item->bills_id  = $bill->id;
            $item->save();
        }
    }

    public static function adminConfirm($data, $id)
    {
        Bill::where('id', $id)->update(
            [
                'address_client'       => $data['sender-detail-addr'],
                'communes_id_sender'   => $data['commune_sender'],
                'phone_client'         => $data['sender_telephone'],
                'name_reciever'        => $data['reciever_name'],
                'communes_id_reciever' => $data['commune_reciever'],
                'address_reciever'     => $data['reciever-detail-addr'],
                'phone_reciever'       => $data['reciever_telephone'],
                'state'                => 'Chờ giao hàng',
                'start_date'           => \Carbon::now(),
            ]);
        
    }

    public static function adminCancel($id, $reason)
    {
        Bill::where('id', $id)->update(
        [
            'state' => 'Đã hủy',
            'reason' => $reason,
        ]);

    }

}
