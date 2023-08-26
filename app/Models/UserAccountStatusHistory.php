<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAccountStatusHistory extends Model
{
    protected $fillable = [
        'user_id',
        'status',
        'reason',
        'changed_by'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function changedBy()
    {
        return $this->belongsTo(User::class, 'changed_by');
    }

}
