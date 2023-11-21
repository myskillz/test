<?php
namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Managers\ApiManager;

class DashboardController extends Controller
{
    protected $apiManager;

    public function __construct(ApiManager $apiManager)
    {
        $this->apiManager = $apiManager;
    }

    public function index()
    {
        $apiResponseArr = [];
        
        $apiResponseArr = $this->apiManager->getContent(5);
        //dd($apiResponseArr);
        return Inertia::render('Index', [
            'results' => $apiResponseArr
        ]);
    }

    public function refresh(Request $request)
    {
        $loadlimit = (int)$request->input('loadlimit') > 0?$request->input('loadlimit'):5;
        $apiResponseArr = $this->apiManager->getContent($loadlimit);
        return json_encode(['status' => 'OK', 'data' => $apiResponseArr]);
    }
}
