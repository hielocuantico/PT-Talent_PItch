<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int    $id
 * @property string $name
 * @property string $email
 * @property string $image_path 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property \Carbon\Carbon $deleted_at 
 */

class Users extends Model
{
    use HasFactory, SoftDeletes;

    public $fillable = ['name', 'email', 'image_patch'];

    public const VALIDATIONS = 
    [
        'name'          =>  'max:255', 
        'email'         =>  'required|max:255', 
        'image_patch'   =>  'nullable|max:255', 
    ];
};