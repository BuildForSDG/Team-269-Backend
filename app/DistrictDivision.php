<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DistrictDivision extends Model
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
