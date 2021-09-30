<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table = 'categorie';

    protected $primaryKey = 'idcategorie';

    public $timestamps = false;

    protected $fillable = ['parent_id', 'name'];



    public function children()
  {
    return $this->hasMany(Categories::class, 'parent_id');
  }


}
