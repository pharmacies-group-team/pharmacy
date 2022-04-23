<?php
namespace App\Filters;

class TypeFilter
{
    public function filter($builder, $value)
    {
      return $builder->where('neighborhood.directror', $value);
    }

}
