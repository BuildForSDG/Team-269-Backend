<?php

namespace App;

class ResponseOption extends BaseModel
{
    /**
     * Get the question to which the response option belongs
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
