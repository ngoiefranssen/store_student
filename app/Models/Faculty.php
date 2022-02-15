<?php

namespace App\Models;

use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faculty extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function departments()
    {
        return $this->hasMany(Department::class);
    }
}
