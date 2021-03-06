<?php

namespace App\Models\EVE;

use Illuminate\Database\Eloquent\Model;

class SolarSystem extends Model
{
    public $timestamps = false;

    public function region() {
        return $this->belongsTo('App\Models\EVE\Region', 'region_id', 'region_id');
    }

    public function secStatus($colored = true) {
        $secStatus = round($this->security, 2);
        if ($colored) {
            $color = "text-danger";
            if ($secStatus > 0 && $secStatus < 0.5) {
                $color = "text-warning";
            } else if ($secStatus >= 0.5) {
                $color = "text-success";
            }
            $secStatus = sprintf("<span class='{$color}'>%01.2f</span>", $secStatus);
        } else {
            $secStatus = sprintf("%01.2f", $secStatus);
        }
        echo $secStatus;
    }
}
