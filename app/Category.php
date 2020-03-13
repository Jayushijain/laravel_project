<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    //
    protected $fillable = [
        'parent_id',
        'icon_class',
        'name',
        'slug',
        'thumbnail',
    ];
    

    // function get_sub_categories() {
    //     if ($this->id > 0) {
    //       $this->db->where('parent_id', 1);
    //     }
    //     $this->db->where('parent_id >', '0');
    //     return $this->db->get('categories');
    //   }

      public function get_sub_categories()
      {
          return $this->hasMany(SELF::class, 'parent_id');
      }  

      public function parentCategory()
      {
         return $this->hasMany(SELF::class, 'id', 'parent_id');
      }
}
