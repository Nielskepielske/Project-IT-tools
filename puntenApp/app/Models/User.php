<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * ophalen van de resultaten van de gebruiker
     */
    public function resultaten(){
        return $this->hasMany(Resultaat::class);
    }
    /**
     * ophalen van de testen van de gebruiker
     */
    public function testen(){
        return $this->hasManyThrough(Test::class, Resultaat::class, 'user_id', 'id', 'id', 'test_id'); //hasManyThrough : (model, tussenmodel, foreign key van huidig model, foreign key van tussenmodel, primary key van huidig model, primary key van model)
    }
}
