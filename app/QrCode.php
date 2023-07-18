<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class QrCode extends Model
{
    protected $fillable = ['user_id', 'name', 'description', 'dynamic_link', 'static_link','scanned' ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
