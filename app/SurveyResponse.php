<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyResponse extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     *
     * Uses questions created in Question Model
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
