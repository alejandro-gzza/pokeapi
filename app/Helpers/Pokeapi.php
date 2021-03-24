<?php

namespace App\Helpers;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\ServerException;
use PhpParser\JsonDecoder;

class Pokeapi{

    private $client;
    private $base_uri = 'https://pokeapi.co/api/v2/';


    /**
     * Create a new helper instance
     *
     * @return void
     */
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' =>  $this->base_uri,
            'timeout' => 20
        ]);
    }

    /*-------------------------------------------------------------------------------------
    Public functions
    ------------------------------------------------------------------------------------- */

    /**
     * Get a pokemon using its name
     *
     * @param String $name
     * @return Array
     */
    public function get_pokemon_by_name($name){
        $response = $this->make_request('pokemon/'.$name, 'GET');
        return $this->get_response_contents($response);
    }

    /**
     * Get a pokemon using its id
     *
     * @param String $id
     * @return Array
     */
    public function get_pokemon_by_id($id){
        $response = $this->make_request('pokemon/'.$id, 'GET');
        return $this->get_response_contents($response);
    }



    /*-------------------------------------------------------------------------------------
    Private functions
    ------------------------------------------------------------------------------------- */

    /**
     * Make a http request
     *
     * @param String $url
     * @param String $method
     * @return GuzzleHttp\Prs7\Response
     */
    private function make_request($url, $method){
        try{
            $response = $this->client->request($method, $url);
        } catch(ClientException $e){
            $response = $e->getResponse();
        } catch(ServerException $e){
            $response = $e->getResponse();
        } catch(ConnectException $e){
            $response = $e->getRequest();
        }
        return $response;
    }

    /**
     * Get api response data
     *
     * @param \GuzzleHttp\Psr7\Response $response
     * @return Array
     */
    private function get_response_contents($response){
        $code = $response->getStatusCode();
        $content = $response->getBody()->getContents();
        $content = json_decode($content);
        return [
            'status_code' => $code,
            'body' => $content
        ];
    }
}
