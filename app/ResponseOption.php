<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResponseOption extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     * Get the question to which the response option belongs
     *
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

}
