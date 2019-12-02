<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

require 'vendor/autoload.php';

class DigitalOcean{

    private $do_token;
    private $client=null;

    /**
     * DigitalOcean constructor.
     * initialize the digital ocean API client to guzzle http
     */
    public function __construct()
    {
        $this->client = new Client(['base_uri'=>'https://api.digitalocean.com/v2/']);
        $this->do_token=getenv('DO_TOKEN');
    }


    /**
     * Delete a domain from the digital ocean environment
     * @param $domain -the domain to add to the digital ocean spaces
     * @param $ip -the designated ip address the domain will be pointed to
     * @return array =['success'=>Boolean,
     *                  'message'=>String
     * ]
     */

    public function createDomain($domain,$ip){

        try{

            /**
             * $domain_info = [
             *      'name'     => (string) The FQDn. Required.
             *      'ip_address' => (string) Ip address to be pointed to. Required.
             *    ]
             */
            $domain_info=['name'=>$domain,'ip_address'=>$ip];

            $response=$this->client->request('POST','domains',[
                'headers'=>['Authorization'=>'Bearer ' . $this->do_token],
                'json'=>$domain_info
            ]);

            return ['success'=>true,'message'=>(string) $response->getBody()];


        }catch (GuzzleException $e){

            return ['error'=>true,'message'=>$e->getMessage()];
        }

    }



    public function deleteDomain($domain){

    }

}

?>