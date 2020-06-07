<?php

namespace App;

class SurveyResponse extends BaseModel
{
    /**
     * A survey response belongs to a question
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
