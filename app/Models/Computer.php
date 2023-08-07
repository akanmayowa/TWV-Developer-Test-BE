<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    use HasFactory;

    Const Windows = 'Windows';
    Const MacOS = 'MacOS';

    protected $fillable = [
        'user_id',
        'make',
        'model',
        'serial_number',
        'condition',
        'purchased',
        'cost_at_purchase',
        'os',
        'asset_id'
    ];

    protected $dates = [
        'purchased',
    ];

    /**
     * Returns the computer's path.
     *
     * @return string
     */
    public function path()
    {
        return '/computers/'.$this->id;
    }

    /**
     * Returns the computer's make and model as a name.
     *
     * @return string
     */
    public function name()
    {
        return $this->make.' '.$this->model;
    }

    /**
     * Returns the data of the person the computer is assigned to.
     *
     * @return object
     */
    public function assignedTo()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }


     /**
     * Returns the data of the asset the computer is assigned to.
     *
     * @return object
     */
    public function asset()
    {
        return $this->belongsTo(Asset::class, 'asset_id', 'id');
    }


    public static function getLatestComputer()
    {
        return self::orderBy('id', 'DESC')->first();
    }
}
