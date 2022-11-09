<?php

namespace Z7\Varnish\Utility;

class HttpUtility
{
    /**
     * Make a BAN request…
     */
    public static function ban(string $url, array $headers = []) : string
    {
        return self::sendRequest($url, 'BAN', $headers);
    }

    /**
     * Raw magic…
     *
     * @param string $url
     * @param string $verb
     * @param array $headers
     * @return array
     */
    private static function sendRequest($url, $verb, $headers): string
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $verb);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        if ($response === false) {
            $error = curl_error($ch);
            curl_close($ch);
            return $error;
        } else {
            curl_close($ch);
            return $response;
        }
    }
}
