<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    use HasFactory;
    protected $table = "roles";

    protected $primarykey = "id";

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
