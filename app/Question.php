<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * Get responses defined in ResponseOption model
     */
    public function responses()
    {
        return $this->hasMany(ResponseOption::class);
    }
}
