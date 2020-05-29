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


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * Get the user who submitted the survey response
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
