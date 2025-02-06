<?php

namespace App\Models;

use Illuminate\Support\Arr;

class _Employee
{
    public static function  all()
    {
        return [
            [
                'id' => 1,
                'name' => 'Bambang Yuwono',
                'email' => 'bambangyuwono@gmail.com',
                'whatsapp_number' => '089129521',
                'address' => 'Jl Pemuda no. 15',
                'pos_code' => '12341',
                'division' => 'Keuangan',
            ],
            [
                'id' => 2,
                'name' => 'Budi Santosa',
                'email' => 'budi.s@gmail.com',
                'whatsapp_number' => '083572112',
                'address' => 'Jl. Merdeka no. 901V',
                'pos_code' => '51231',
                'division' => 'SDM',
            ]

        ];
    }

    public static function find($id)  {
      
        return Arr::first(static::all(), function($employee) use ($id){
            return $employee['id'] == $id;
        });
    }
 
}