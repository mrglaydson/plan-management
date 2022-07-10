<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'url', 'description', 'price'];
    
    public function search($filter = null)
    {
        $results = $this
                    ->where('name', 'like', "%{$filter}%")
                    ->orWhere('description', 'like', "%{$filter}%")
                    ->paginate();

        return $results;
    
    }
}


