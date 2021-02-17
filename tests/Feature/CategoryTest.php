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
        $this->loginAdmin();
        $this->post('/admins/categories' , [
            'name' => 'MM'
        ]);

        // $response->assertOk();

        // $this->assertCount(1 , Category::all());


    }

//    public function data()
//    {
//        return [
//            'name' => 'Bnana'
//        ];
//    }
}
