<?php
namespace Z7\Varnish\Utility;

class HttpUtility {

	/**
	 * Make a BAN request…
	 *
	 * @param string $url
	 * @param array $headers
	 */
	public static function ban($url, $headers = array()) {
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
	private function sendRequest($url, $verb, $headers) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $verb);
		if ($payload !== NULL) {
			curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		}
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$response = curl_exec($ch);
		if ($response === FALSE) {
			return curl_error($ch);
		}
		curl_close($ch);

		return $response;
	}
}