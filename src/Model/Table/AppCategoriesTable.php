<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class AppCategoriesTable extends Table
{
    public function initialize(array $config)
    {
        $this->hasMany('AppPrankScripts');
    }
}