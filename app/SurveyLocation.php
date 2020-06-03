<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyLocation extends Model
{
    /**
     * A location belongs to a district.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
