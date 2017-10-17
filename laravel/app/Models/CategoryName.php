<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryName extends Model {

    // get children category
    public function children() {
        return $this->hasMany(self::class, 'parent_id');
    }

}
