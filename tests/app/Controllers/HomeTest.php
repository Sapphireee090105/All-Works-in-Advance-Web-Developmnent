<?php

namespace Tests\App\Controllers;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

class HomeTest extends CIUnitTestCase
{
    use FeatureTestTrait;

    // Ito yung Step 2 sa slide mo (Create the test method)
    public function testHomePage()
    {
        // Ito yung Step 3 sa slide mo (Add assertion)
        $result = $this->get('/');
        $result->assertStatus(200);
    }
}