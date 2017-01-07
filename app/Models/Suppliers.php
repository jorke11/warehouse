<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model {

    protected $table = "suppliers";
    protected $primaryKey = "id";
    protected $fillable = ["id", "name", "users_id"];
    public $timestamps = false;

    public function product() {
        return $this->belongTo(Products::class);
    }

}
