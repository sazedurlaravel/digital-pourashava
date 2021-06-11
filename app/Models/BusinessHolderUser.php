<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessHolderUser extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function capitalRange()
    {
        return $this->belongsTo(CapitalRange::class,'capital_range_id');
    }

    // public function capitalRanges()
    // {
    //     return $this->belongsToMany(CapitalRange::class,'business_holder_capital_ranges')->withPivot('vat');
    // }

}
