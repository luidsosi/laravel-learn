<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'client';
    protected $fillable = ['name'];
    public $timestamps = false;

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
