<?php

namespace App;

class District extends BaseModel
{
    /**
     * A district has many divisions
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function divisions()
    {
        return $this->hasMany(DistrictDivision::class);
    }
}
