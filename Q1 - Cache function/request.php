<?php

class SimpleJsonRequest
{

    private static function makeRequest(string $method, string $url, array $parameters = null, array $data = null)
    {
        $opts = [
            'http' => [
                'method'  => $method,
                'header'  => 'Content-type: application/json',
                'content' => $data ? json_encode($data) : null
            ]
        ];

        $url .= ($parameters ? '?' . http_build_query($parameters) : '');

        print_r($_SESSION['redis']->get('keyGet'));
        return file_get_contents($url, false, stream_context_create($opts));
    }

    public static function get(string $url, array $parameters = null)
    {
        $cache = $_SESSION['redis'];

         //Se existe chave em cache, retorna valor da chave, se não, atribui chave e faz normalmente a requisição
        if($cache->get('keyGet')){
            return $cache->get('keyGet');
        }else{
            $cache->set('keyGet', json_decode(self::makeRequest('GET', $url, $parameters)));
            return json_decode(self::makeRequest('GET', $url, $parameters));
        }
    }

    public static function post(string $url, array $parameters = null, array $data)
    {
        $cache = $_SESSION['redis'];

        //Se existe chave em cache, retorna valor da chave, se não, atribui chave e faz normalmente a requisição
        if($cache->get('keyPost')){
            return $cache->get('keyPost');
        }else{
            $cache->set('keyPost', json_decode(self::makeRequest('POST', $url, $parameters)));
            return json_decode(self::makeRequest('POST', $url, $parameters, $data));
        }
    }

    public static function put(string $url, array $parameters = null, array $data)
    {
        $cache = $_SESSION['redis'];

        //Se existe chave em cache, retorna valor da chave, se não, atribui chave e faz normalmente a requisição
        if($cache->get('keyPut')){
            return $cache->get('keyPut');
        }else{
            $cache->set('keyPut', json_decode(self::makeRequest('PUT', $url, $parameters)));
            return json_decode(self::makeRequest('PUT', $url, $parameters, $data));
        }
    }   

    public static function patch(string $url, array $parameters = null, array $data)
    {
        $cache = $_SESSION['redis'];

        //Se existe chave em cache, retorna valor da chave, se não, atribui chave e faz normalmente a requisição
        if($cache->get('keyPatch')){
            return $cache->get('keyPatch');
        }else{
            $cache->set('keyPatch', json_decode(self::makeRequest('PATCH', $url, $parameters)));
            return json_decode(self::makeRequest('PATCH', $url, $parameters, $data));
        }
    }

    public static function delete(string $url, array $parameters = null, array $data = null)
    {
        $cache = $_SESSION['redis'];

        //Se existe chave em cache, retorna valor da chave, se não, atribui chave e faz normalmente a requisição
        if($cache->get('keyDelete')){
            return $cache->get('keyDelete');
        }else{
            $cache->set('keyDelete', json_decode(self::makeRequest('DELETE', $url, $parameters)));
            return json_decode(self::makeRequest('DELETE', $url, $parameters, $data));
        }
    }
}