<?php

namespace App;

class DistrictDivision extends BaseModel
{
    /**
     * A district division belongs to a district.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
