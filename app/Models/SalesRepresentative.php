<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesRepresentative extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'telephone',
        'joined_date',
        'route_id',
        'manager_id',
        'comments',
    ];

    public function route() {
        return $this->belongsTo(Route::class);
    }

    public function manager() {
        return $this->belongsTo(User::class, 'manager_id');
    }
}
