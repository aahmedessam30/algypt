<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'path', 'model_type', 'model_id', 'created_at', 'updated_at'];

    public function getFullUrl()
    {
        return url($this->path);
    }
}
