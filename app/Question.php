<?php

namespace App;

class Question extends BaseModel
{
    /**
     * A question has many responses
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function responses()
    {
        return $this->hasMany(ResponseOption::class);
    }
}
