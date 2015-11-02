<?php
/**
 * Baidu Api PHP client core service. Please change the define of DSPID, TOKEN before usage.
 *
 * @author Baidu Api Team
 *
 */

// Sandbox URL
// define('URL', 'https://apitest.es.baidu.com');
// Online URL
define('URL', 'https://api.es.baidu.com');

//DSPID
define('DSPID', 11234671);

//TOKEN
define('TOKEN', '3aa87e5b5b51be720f7f58aa6d591de7');

class Baidu_Api_Client_Core {

	private $url;

	private $ch;

	public function __construct($serviceName) {
		$this->url = URL . '/v1' . $serviceName;
		$this->ch = curl_init($this->url);
		curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, 'POST');
		curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($this->ch, CURLOPT_HTTPHEADER, array('content-type: application/json;charset=UTF-8'));
	}

	public function post($request) {
		// Show service definition
		print('----------service url-----------');
		print_r($this->getUrl());
		print('----------service request json-----------');
		print_r($request);

		curl_setopt($this->ch, CURLOPT_POSTFIELDS, $request);

		$result = curl_exec($this->ch);

		return $result;
	}

	public function getUrl() {
		return $this->url;
	}

}


class AuthHeader
{
    public $dspId = DSPID;
    public $token = TOKEN;
}

class APIAdvertiserGetAllRequest
{
    public $authHeader;
    public function __construct()
    {
        $this->authHeader = new AuthHeader();
    }
}

class APIAdvertiserGetRequest
{
    public $authHeader;
    public $advertiserIds;
    public function __construct()
    {
        $this->authHeader = new AuthHeader();
    }
}

class APIAdvertiserAddRequest
{
    public $authHeader;
    public $request;
    public function __construct()
    {
        $this->authHeader = new AuthHeader();
    }
}

class APICreativeGetAllRequest
{
    public $authHeader;
    public $startDate = '2013-05-01';
    public $endDate = '2013-05-13';
    public function __construct()
    {
        $this->authHeader = new AuthHeader();
    }
}

class APICreativeGetRequest
{
    public $authHeader;
    public $creativeIds;
    public function __construct()
    {
        $this->authHeader = new AuthHeader();
    }
}

class APICreativeAddRequest
{
    public $authHeader;
    public $request;
    public function __construct()
    {
        $this->authHeader = new AuthHeader();
    }
}

class APIAdvertiser
{
   	public $advertiserId;

	public $advertiserName;

}

class APICreative
{
   	public $type = -1;

	public $creativeUrl;

	public $targetUrl;

	public $landingPage;

	public $monitorUrls;

	public $height;

	public $width;

	public $creativeId;

	public $creativeTradeId;

	public $state;

	public $advertiserId;

	public $binaryData;

}


class APIReportRtbRequest
{
    public $authHeader;
    public $startDate = '2013-05-01';
    public $endDate = '2013-05-13';
    public function __construct()
    {
        $this->authHeader = new AuthHeader();
    }
}

class APIReportConsumeRequest
{
    public $authHeader;
    public $startDate = '2013-05-01';
    public $endDate = '2013-05-13';
    public function __construct()
    {
        $this->authHeader = new AuthHeader();
    }
}
