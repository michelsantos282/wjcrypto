<?php

use App\Api\DI\Builder;
use Pecee\SimpleRouter\SimpleRouter as Router;
use Pecee\Http\Url;
use Pecee\Http\Response;
use Pecee\Http\Request;

/**
 * Get url for a route by using either name/alias, class or method name.
 *
 * The name parameter supports the following values:
 * - Route name
 * - Controller/resource name (with or without method)
 * - Controller class name
 *
 * When searching for controller/resource by name, you can use this syntax "route.name@method".
 * You can also use the same syntax when searching for a specific controller-class "MyController@home".
 * If no arguments is specified, it will return the url for the current loaded route.
 *
 * @param string|null $name
 * @param string|array|null $parameters
 * @param array|null $getParams
 * @return \Pecee\Http\Url
 * @throws \InvalidArgumentException
 */

 class Helper {
    public static function url(?string $name = null, $parameters = null, ?array $getParams = null): Url
    {
        return Router::getUrl($name, $parameters, $getParams);
    }

    /**
     * @return \Pecee\Http\Response
     */
    public static function response(): Response
    {
        return Router::response();
    }

    /**
     * @return \Pecee\Http\Request
     */
    public static function request(): Request
    {
        return Router::request();
    }

    /**
     * Get input class
     * @param string|null $index Parameter index name
     * @param string|mixed|null $defaultValue Default return value
     * @param array ...$methods Default methods
     * @return \Pecee\Http\Input\InputHandler|array|string|null
     */
    public static function input($index = null, $defaultValue = null, ...$methods)
    {
        if ($index !== null) {
            return request()->getInputHandler()->value($index, $defaultValue, ...$methods);
        }

        return request()->getInputHandler();
    }

    /**
     * @param string $url
     * @param int|null $code
     */
    public static function redirect(string $url, ?int $code = null): void
    {
        if ($code !== null) {
            response()->httpCode($code);
        }

        response()->redirect($url);
    }

    /**
     * Get current csrf-token
     * @return string|null
     */
    public static function csrf_token(): ?string
    {
        $baseVerifier = Router::router()->getCsrfVerifier();
        if ($baseVerifier !== null) {
            return $baseVerifier->getTokenProvider()->getToken();
        }

        return null;
    }

    /**
	 * getContainer
	 *
	 * Returns a new container with the given dependency
	 * 
	 * @param  mixed $dependency
	 * @return mixed
	 */
	public static function getContainer($dependency) 
	{
		return Builder::buildContainer()->get($dependency);
	}

    /**
	 * Encrypts the given string so that it can be saved in the database
	 *
	 * @param  string $data
	 * @return string|false
	 */
	public static function encrypt_data(string $data) 
	{
		$cipher = "AES-256-CBC";
		$key = "02f286562d24ed2e1f3d2cceddbd40edf799679b9e4355ed3bd07ac33fbf2a454c34f44deb5e6d081f14a44c0664961d1ee5b0b511ef2a4862beacb62f54252b";

		$ivLength = openssl_cipher_iv_length($cipher);
		$iv = substr("randomwordsarebeingwrittenhere", 0, $ivLength);

		$cipheredText = openssl_encrypt($data, $cipher, $key, 0, $iv);
		$cipheredText = base64_encode($cipheredText);

		return $cipheredText;
	}

    public static function decrypt_data(string $data) 
	{
		$cipher = "AES-256-CBC";
		$key = "02f286562d24ed2e1f3d2cceddbd40edf799679b9e4355ed3bd07ac33fbf2a454c34f44deb5e6d081f14a44c0664961d1ee5b0b511ef2a4862beacb62f54252b";

		$ivLength = openssl_cipher_iv_length($cipher);
		$iv = substr("randomwordsarebeingwrittenhere", 0, $ivLength);

		$cipheredText = openssl_decrypt(base64_decode($data), $cipher, $key, 0, $iv);
	
		return $cipheredText;
	}

     /**
      * apiResponse
      *
      * Returns the base response array. Can also receive 2 optional parameters to set additional data
      *
      * @param  string $message
      * @param  string|null $optParam
      * @param  mixed $optValue
      * @return array
      */
     public static function apiResponse(string $message, string $optParam = null, $optValue = null)
     {
         if(isset($optParam) && isset($optValue)) {
             $data = [
                 'statusCode' => http_response_code(),
                 'message' => $message,
                 $optParam => $optValue
             ];
         } else {
             $data = [
                 'statusCode' => http_response_code(),
                 'message' => $message
             ];
         }

         self::response()->json($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
     }
     /**
      * hasSession
      *
      * Checks if the user is authenticated
      *
      * @return bool
      */
     public static function hasSession()
     {

         if(isset($_SESSION['acc_number']) && isset($_SESSION['authentication_token'])) {
             return true;
         } else {
             return false;
         }
     }

 }
    

    