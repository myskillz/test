<?php
namespace App\Managers;

use GuzzleHttp\Client;

/** 
 * API manager class
 */
class ApiManager
{
    public function getUsersCount()
    {
        // Your logic to get the total number of users
        return 100;
    }

    /**
     * Return API URL
     * @return string
     */
    private function getUrl($urlName) : String
    {
        return env($urlName, '');
    }

    /**
     * Return API Token
     * @return string
     */
    private function getToken($tokenName) : String
    {
        return env($tokenName, '');
    }


    /**
     * get API content by link
     * @param  Int
     * @return Array
     */
    public function getContent(int $loadtimes) : Array
    {
        $returnArr = [];

        for($i=0; $i<$loadtimes; $i++)
        {
            $response = $this->getApiResponse();
            if($response && $response['status'] === 'OK')
            {
                if(isset($response['data']['quote'])) 
                    $returnArr[] = $response['data']['quote'];
            }
                
        };
        return $returnArr;
    }

    /**
     * get API content by link
     * @param  Int
     * @return Array
     */
    private function getApiResponse() : Array
    {
        $client = new Client();
        $apiUrl = $this->getUrl('KANYE_API_URL');
        $apiToken = $this->getToken('KANYE_API_TOKEN');

        if(($apiUrl === '') || ($apiToken === ''))
            return  ['status' => 'ERROR'];

        try 
        {
            $response = $client->get($apiUrl, [
                                                'headers' => [
                                                    'Authorization' => 'Bearer ' . $apiToken,
                                                    'Accept' => 'application/json', // Adjust based on the expected content type
                                                ],
                                            ]); 
            if($response && ($response->getStatusCode() === 200))
            {
                $apiResponse = $response->getBody()->getContents();
                return ['status' => 'OK', 'data' => json_decode($apiResponse, true)];
            }
            return false;
        }catch(\Exception $e) 
        {
            return ['status' => 'ERROR', 'data' => json_encode($e)];
        }
    }
}
?>