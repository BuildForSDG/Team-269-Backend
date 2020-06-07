<?php

namespace App;

class SurveyLocation extends BaseModel
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
