<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Managers\ApiManager;

class ApiTest extends TestCase
{

    public function test_get_content()
    {
        $no = rand(1,100); echo $no;
        $apiManager = new ApiManager();
        $result = $apiManager->getContent($no);
        
        $this->assertCount($no, $result);
    }
}
