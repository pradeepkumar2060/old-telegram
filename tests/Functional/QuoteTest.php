<?php

namespace Tests\Functional;

class QuoteTest extends BaseTestCase
{
    public function testNumberOfCategories(){
        $quote = new \Quote();
        $categories = $quote->getCategories();
        $this->assertEquals(8, sizeof($categories));
    }

    public function testCategoryListContainsManagement(){
        $quote = new \Quote();
        $categories = $quote->getCategories();
        $this->assertTrue(in_array("management", $categories));
    }

    public function testQuoteClientFailsForInvalidCategory(){
        $quote = new \Quote();
        try{
            $quote->fetchQuote("Invalid Category");
            $this->fail("Shouldn't have come here.");
        }catch(\Exception $e){
            // expected
        }
    }
}