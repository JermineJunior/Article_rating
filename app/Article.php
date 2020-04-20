<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    
    public function rate($rating, $user = null)
    {
        if ($rating > 5 || $rating < 1) {
            throw new \InvalidArgumentException("Sorry rating must be between 1 to 5");
        }
        $this->ratings()
             ->updateOrCreate([
                'user_id'  => $user ? $user->id : auth()->id(),
            ] ,compact('rating'));
    }

    public function ratings()
    {
       return $this->hasMany(Rating::class);   
    }

    public function rating()
    {
        return $this->ratings->avg('rating');
    }
}
