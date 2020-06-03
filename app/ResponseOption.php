<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResponseOption extends Model
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
