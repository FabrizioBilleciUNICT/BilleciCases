<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

/**
 * @property mixed type
 * @property mixed color
 * @property mixed measures
 * @property  mixed name
 * @property  mixed email
 * @property mixed status
 * @property mixed shaped
 * @property mixed handles
 * @property mixed price
 */
class Order extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'preventives';

    protected $fillable = [
        'email',
        'name',
        'type',
        'measures',
        'color',
        'shaped',
        'handles',
        'price',
        'status'
    ];

    public function get(string $string)
    {
        global $fillable;
        return $fillable[$string];
    }

    public function __get($key)
    {
        return parent::__get($key); // TODO: Change the autogenerated stub
    }
}
