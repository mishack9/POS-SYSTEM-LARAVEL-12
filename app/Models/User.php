<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Request;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    static public function user_data()
    {
        $return = self::select('users.*')->orderBy('id', 'asc');

        //searh user filter
         if(!empty(Request::get('id')))
        {
            $return = $return->where('users.id', '=', Request::get('id'));
        }
        if(!empty(Request::get('name')))
        {
            $return = $return->where('users.name', 'like', '%'.Request::get('name').'%');
        }
         if(!empty(Request::get('email')))
        {
            $return = $return->where('users.email', 'like', '%'.Request::get('email').'%');
        }
         if(!empty(Request::get('created_at')))
        {
            $return = $return->where('users.created_at', 'like', '%'.Request::get('created_at').'%');
        }
         if(!empty(Request::get('updated_at')))
        {
            $return = $return->where('users.updated_at', 'like', '%'.Request::get('updated_at').'%');
        }
        
        $return = $return->where('role', '=', 0)->where('is_delete', '=', 0)->paginate(10);

        return $return;
    }

    //image 
  /*   public function getImageUrlAttribute()
    {
        if($this->image && Storage::disk('public')->exists($this->image))
        {
            return Storage::url($this->image);
        }

        return asset('upload/5601.jpg');
    } */

}
