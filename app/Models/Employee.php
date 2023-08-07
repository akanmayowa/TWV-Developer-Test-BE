<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
    ];

    public function profile()
    {
        return $this->hasOne(EmployeeProfile::class);
    }

    public function computer()
    {
        return $this->hasOne(Computer::class);
    }

    public function path()
    {
        return '/employees/'.$this->id;
    }

    /**
     * Get user's full name.
     *
     * @return string
     */
    public function fullName()
    {
        return $this->first_name.' '.$this->last_name;
    }

    /**
     * Get user's first name.
     *
     * @return string
     */
    public function firstName()
    {
        return $this->first_name;
    }

    /**
     * Get user's last name.
     *
     * @return string
     */
    public function lastName()
    {
        return $this->last_name;
    }
}
