<?php

namespace Tests\Functional;

class QuoteTest extends BaseTestCase
{
    public function testNumberOfCategories(){
        $quote = new \Quote();
        $categories = $quote->getCategories();
        $this->assertEquals(5, sizeof($categories));
    }

    public function testCategoryListContainsManagement(){
        $quote = new \Quote();
        $categories = $quote->getCategories();
        $this->assertTrue(in_array("management", $categories));
    }

    public function testQuoteClientFailsForInvalidCategory(){
        try{
            $quote = new \Quote("Invalid Category");
            $this->fail("Shouldn't have come here.");
        }catch(\Exception $e){
            // expected
        }
    }
}