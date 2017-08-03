<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
	use CreatesApplication;
	
	protected function setUp()
    {
		parent::setUp();
		$this->withoutExceptionHandling();
	}

    /**
     * Get the data (data paseed to the view) from Response.
     * Eg.  $data = $this->getResponseData($response, 'products');
     */
    protected function getResponseData($response, $key){
        $content = $response->getOriginalContent();
        $content = $content->getData();

        return $content[$key]->all();
    }
}
