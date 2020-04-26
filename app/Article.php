<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    
    public function rate($rating, $user = null)
    {
        if ($rating > 5 || $rating < 1) {
            $this->abortError();
        }
        $this->ratings()
             ->updateOrCreate(['user_id'  => $user ? $user->id : auth()->id(),] ,compact('rating'));
    }

    public function ratings()
    {
       return $this->hasMany(Rating::class);   
    }

    public function rating()
    {
        return $this->ratings->avg('rating');
    }

    public function ratingFor(User $user)
    {
       return $this->ratings()->where('user_id', $user->id)->value('rating');
    }

    public function path()
    {
        return '/articles/'.$this->id;
    }

    protected function abortError()
    {
        throw new \InvalidArgumentException("Sorry rating must be between 1 to 5");
    }
}
