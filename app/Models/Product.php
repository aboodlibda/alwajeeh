<?php

namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Product extends Model
    {
        protected $guarded = [];

        public function category()
        {
            return $this->belongsTo(Category::class);
        }

        public function orders()
        {
            return $this->belongsToMany(Order::class)
                ->withPivot('count') // Include the 'count' field from the pivot table
                ;
        }

    }
