<?php

namespace Tests\Feature;

use App\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;
   
    /** 
     * @test
     *  @group add
     */
    public function category_can_create()
    {
        $this->withExceptionHandling();

        $response = $this->post('/categories' , [
            'name' => 'MM'
        ]);

        $response->assertOk();

        // $response->assertCount(1 , Category::all());


    }

    public function data()
    {
        return [
            'name' => 'Bnana'
        ];
    }
}
