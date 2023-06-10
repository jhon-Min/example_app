<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;

    protected $fillable = ['amount', 'due_date', 'client_id', 'description'];

    public function clientName()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
}
