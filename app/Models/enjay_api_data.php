<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class enjay_api_data extends Model
{
    use HasFactory;

    protected $fillable = [

        'asteriskhost',
            'event',
            'direction',
            'number',
            'extension',
            'start_time',
            'answer_time',
            'end_time',
            'duration',
            'billablesecond',
            'disposition',
            'unique_id',
            'record_link',
            'hangupchannel',
            'redirectchannel'
    ];
}
