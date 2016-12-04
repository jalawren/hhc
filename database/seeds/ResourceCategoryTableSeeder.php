<?php

use App\ResourceCategory;
use Illuminate\Database\Seeder;

class ResourceCategoryTableSeeder extends Seeder
{
    protected $category;

    /**
     * Construct the class with the ResourceCategory model
     *
     * @param ResourceCategory $category
     */
    public function __construct(ResourceCategory $category)
    {
        $this->category = $category;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->category->truncate();

        $records = [

            0 => ['name' => 'General Wellness', 'description' => 'Tips for overall healthy living'],
            1 => ['name' => 'Nutrition', 'description' => 'Healthy choices for meals, snacks and drinks'],
            2 => ['name' => 'Exercise', 'description' => 'Tips for managing an active lifestyle'],
            3 => ['name' => 'Mental Health', 'description' => 'Tips for a healthy mind']
        ];

        /**
         * Create the DB entries for the array of categories
         *
         */
        foreach($records as $record)
        {
            $this->category->create($record);
        }
    }
}
