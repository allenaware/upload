<?php
namespace backend\models;
// require_once 'apicore.php';
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
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
/*         print('----------service url-----------');  */
        // print_r($this->getUrl());
        // print('----------service request json-----------');
        // print_r($request); 

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
class CreativeAddService extends Baidu_Api_Client_Core {
    public function __construct() {
        parent::__construct('/creative/add');
    }
}
/**
 * Login form
 */
class BesUploadForm extends Model
{
    public $creativeType;
    public $landingPage; 
    public $width;
    public $height;
    public $creativeId;
    public $creativeTradeId;
    public $advertiserId;
    public $adviewType;
    public $file;
    public $creativeUrl; 
    public $targetUrl;
    public $monitorUrls;
    // public $targetUrl = 'http://clksvr.bayescom.com:8080/click?auction=%%ID%%&ext=%%EXT_DATA%%&exchange=bes';
    /// public $monitorUrls =array(' http://winsvr.bayescom.com:8081/win?auction=%%ID%%&price=%%PRICE%%&ext=%%EXT_DATA%%&exchange=bes');
    public $result;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['creativeType','landingPage','width','height','creativeId','creativeTradeId','advertiserId','adviewType','file'],'required'],
            // username and password are both required
            /*          [['creativeType', 'landingPage','width','height','creativeId','creativeTradeId','advertiserId','adviewType','fileName'], 'required'], */
            // [['creativeType', 'width','height','creativeId','creativeTradeId','advertiserId','adviewType'], 'integer'],
            /* [['landingPage', '','creativeUrl'], 'string'], */
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    // public function validatePassword($attribute, $params)
    // {
    // if (!$this->hasErrors()) {
    // $user = $this->getUser();
    // if (!$user || !$user->validatePassword($this->password)) {
    // $this->addError($attribute, 'Incorrect username or password.');
    // }
    // }
    // }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    // public function login()
    // {
    // if ($this->validate()) {
    // return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
    // } else {
    // return false;
    // }
    // }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    // public function getUser()
    // {
    // if ($this->_user === false) {
    // $this->_user = User::findByUsername($this->username);
    // }

    // return $this->_user;
    /* } */
    // add labe attributes
    public function attributeLabels()
    {
        return [
            'creativeType' => "Creative Type",
            'landingPage'  => 'Landing Page',

        ];
    }
    public function upload()
    {
        $service = new CreativeAddService();
        // New request
        $request = new APICreativeAddRequest();
        $creativeList = array();
        $creative = new APICreative();
        $creative->type = $this->creativeType;
        $creative->targetUrl = 'http://clksvr.bayescom.com:8080/click?auction=%%ID%%&ext=%%EXT_DATA%%&exchange=bes';
        $creative->landingPage = $this->landingPage;
        $creative->monitorUrls = array('http://winsvr.bayescom.com:8081/win?auction=%%ID%%&price=%%PRICE%%&ext=%%EXT_DATA%%&exchange=bes');
        $creative->width = $this->width;
        $creative->height = $this->height;
        $creative->creativeId = $this->creativeId;
        $creative->creativeTradeId = $this->creativeTradeId;
        $creative->advertiserId = $this->advertiserId;
        $creative->adviewType = $this->adviewType;
        $file= UploadedFile::getInstance($this, 'file');

        $image = file_get_contents($file->tempName);
        $creative->binaryData = base64_encode($image);
        //$creative->binaryData = base64_encode('123');
        $creative->creativeUrl =$this->creativeUrl; 
        $creativeList[] = $creative;
        $request->request = $creativeList;

        // Call service
        $output_response = $service->post(stripslashes(json_encode($request)));
        $this->result = $output_response; 

    }

}
