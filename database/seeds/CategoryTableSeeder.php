<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $category = [
      ['name' => 'Level Gauge', 'label' => 'سطح سنج'],
      ['name' => 'Level Switch', 'label' => 'لول سوییچ'],

    ];

    $subCategory = [
      ['name' => 'capacitive', 'label' => 'خازنی'],
      ['name' => 'capacitive', 'label' => 'خازنی'],
      ['name' => 'motorized', 'label' => 'موتوری'],

    ];

    $subCat = [
      ['cat_id' => '1', 'subcat_id' => '1'],
      ['cat_id' => '2', 'subcat_id' => '2'],
      ['cat_id' => '2', 'subcat_id' => '3'],
    ];

    DB::table('categories')->insert($category);
    DB::table('subcategorys')->insert($subCategory);
    DB::table('cat_subcat')->insert($subCat);
  }
}
