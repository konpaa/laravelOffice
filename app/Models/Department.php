<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Department
 * @package App\Models
 */
class Department extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['name', 'numberOfEmployees', 'maxWage'];

    /**
     * @return BelongsToMany
     */
    public function staff(): BelongsToMany
    {
        return $this->belongsToMany(Staff::class)->withTimestamps();
    }
}
