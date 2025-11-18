<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id';
    public $timestamps = true;   // Karena tabel roles PUNYA created_at & updated_at

    protected $fillable = [
        'name',
        'description'
    ];

    // RELASI ROLE → USERS
    public function users()
    {
        return $this->hasMany(User::class, 'role_id');
    }
}
