<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model {

    protected $table = "products";
    protected $primaryKey = "id";
    protected $fillable = ["id", "name", "price", "suppliers_id", "users_id"];
    public $timestamps = false;

    public function supplier() {
        return $this->hasMany(Supplier::class);
    }

}
