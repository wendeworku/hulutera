<?php
class Cryptor
{
    // Non-NULL Initialization Vector for decryption 
    private  $iv = '1234567891011121';

    // Store the decryption key 
    private  $key = "hulutera";

    // Store the cipher method 
    private $ciphering = "AES-128-CTR";

    // Use OpenSSl Encryption method 
    //private $iv_length = openssl_cipher_iv_length($this->ciphering);
    private $options = 0;

    /**
     * __construct method
     *
     */
    public function __construct()
    {
    }

    public function encryptor($input)
    {
        // Use openssl_encrypt() function to encrypt the data 
        $in = openssl_encrypt(
            $input,
            $this->ciphering,
            $this->key,
            $this->options,
            $this->iv
        );
        return $in;
    }

    public function decryptor($input)
    {
        // Use openssl_decrypt() function to decrypt the data 
        $out =  openssl_decrypt(
            $input,
            $this->ciphering,
            $this->key,
            $this->options,
            $this->iv
        );
        return $out;
    }
}
class ValidateUpload
{
    private $default_options = [];

    /**
     * __construct method
     *
     * @public
     * @param $name {$_FILES key}
     * @param $options {null, Array}
     */
    public function __construct(&$err)
    {
        $item = $_GET['table'];
        $this->_runnerName = ObjectPool::getInstance()->getObjectWithId($item, null);
        $this->default_options = $this->_runnerName->getUploadOption();

        $price = ["fieldPriceSell", "fieldPriceRent", "fieldPriceRate"];
        var_dump($_POST);

        /**
         * Get all information for the IUT (Item Under Test) for validation
         */
        foreach ($this->default_options as $key => $value) {
            if (isset($_POST[$key])) {
                $postValue = $_POST[$key];
                if (in_array($key, $price)) {
                    continue;
                }
                if (strpos($postValue, $GLOBALS['lang']['Choose']) !== false) //Error if value start with Choose
                {
                    $input = array($key => $GLOBALS['validate_specific_array'][0]);
                } else if (
                    strpos($postValue, 'Write') !== false or  //Error if value start with Write
                    $postValue === '' //Error if field is empty or not provided
                ) {
                    $input = array($key => $GLOBALS['validate_specific_array'][1]);
                }
                array_push($err, $input);
            }
        }

        /**
         * check if rentOrSell radio is selected report if not 
         */
        if (isset($_POST["rentOrSell"]) && strpos($_POST['rentOrSell'], $GLOBALS['lang']['Choose']) !== false) {
            $input = array("rentOrSell" => $GLOBALS['validate_specific_array'][0]);
            array_push($err, $input);
        }

        if (isset($_POST["rentOrSell"])) {
            if ($_POST["rentOrSell"] == "fieldPriceRent") {
                $this->validatePrice($err, "fieldPriceRent");
            } else if ($_POST["rentOrSell"] == "fieldPriceSell") {
                $this->validatePrice($err, "fieldPriceSell");
                $_POST["fieldPriceRate"] = null;
            } else if ($_POST["rentOrSell"] == "both") {
                $this->validatePrice($err, "fieldPriceRent");
                $this->validatePrice($err, "fieldPriceSell");
            }
            if ($_POST["rentOrSell"] == "fieldPriceRent" || $_POST["rentOrSell"] == "both") {
                if (isset($_POST["fieldPriceRate"]) && strpos($_POST["fieldPriceRate"], $GLOBALS['lang']['Choose']) !== false) {
                    $input = array("fieldPriceRate" => $GLOBALS['validate_specific_array'][0]);
                    array_push($err, $input);
                }
            }
        } else if (isset($_POST["fieldPriceSell"])) {
            $this->validatePrice($err, "fieldPriceSell");
        }

        /**
         * Check if image have been provided report if not
         */
        if (isset($_POST["fileuploader-list-files"]) && $_POST["fileuploader-list-files"] === '[]') {
            $input = array("fileuploader-list-files" => $GLOBALS['validate_specific_array'][1]);
            array_push($err, $input);
        }


        //check if all fields are set
        foreach ($this->default_options as $key => $value) {
            if (isset($_POST[$key]) && $value == 'input') {
                $_POST[$key] = filter_var($_POST[$key], FILTER_SANITIZE_STRING);
                // echo $key . ' =  ' . $_POST[$key] . '<br>';
            }
        }

        //unset some errors
        if (isset($_POST["idCategory"]) && $_POST["idCategory"] === "Land") {
            $unsetables = ["fieldBuildYear", "fieldBathroom", "fieldToilet", "fieldNrBedroom"];

            foreach ($err as $k1 => $v1) {
                foreach ($v1 as $k2 => $v2) {
                    if (in_array($k2, $unsetables)) {
                        unset($err[$k1][$k2]);
                    }
                }
            }
            foreach ($unsetables as $key => $value) {
                $_POST[$value] = 0;
            }
        }
    }

    /**
     * validate price
     */
    private function validatePrice(&$err, $key)
    {
        if (isset($_POST[$key]) && (!is_numeric($_POST[$key]) or !filter_var($_POST[$key], FILTER_VALIDATE_INT))) {
            $input = array($key => $GLOBALS['validate_specific_array'][1]);
            array_push($err, $input);
        }
    }
    /**
     * get default_options
     */
    public function getDefaultOptions()
    {
        return $this->default_options;
    }
}
/**
 * Class for validating function for user related forms
 *  include/register.php
 *  include/login.php
 *  include/pass-recovery.php
 *  include/edit-profile.php
 *  include/contact-us.php 
 */
class ValidateUser
{
    public function __construct(&$err)
    {
        /**
         * Get all information for the IUT (Item Under Test) for validation
         */
        $input = [];

        if (isset($_POST['submit'])) {
            foreach ($_POST as $key => $value) {
                if (isset($_POST[$key])) {
                    if (strpos($key, 'field') === false) {
                        continue;
                    }
                    if (strpos($value, $GLOBALS['lang']['Write']) !== false or $value === '')  //Error if value start with Write                    
                    {
                        $input = array($key => $GLOBALS['validate_specific_array'][1]);
                    } else {
                        switch ($key) {
                            case 'fieldUserName':
                                if (in_array($_GET['lan'], $GLOBALS['GEEZ'])) {
                                    validateUtf8($key, $value, $err);
                                } else {
                                    if (!ctype_alnum($value)) {
                                        $input = array($key => $GLOBALS['validate_specific_array'][2]['isalphanumeric']);
                                    } else if (strlen($value) < 5) {
                                        $input = array($key => $GLOBALS['validate_specific_array'][2]['length'][5]);
                                    }
                                }
                                break;
                            case 'fieldFirstName':
                            case 'fieldLastName':
                                if (in_array($_GET['lan'], $GLOBALS['GEEZ'])) {
                                    validateUtf8($key, $value, $err);
                                } else {
                                    if (!ctype_alnum($value)) {
                                        $input = array($key => $GLOBALS['validate_specific_array'][2]['isalphanumeric']);
                                    }
                                }
                                break;
                            case 'fieldEmail':
                                if (strpos($value, $GLOBALS['lang']['Write']) !== false or $value === '') {
                                    $input = array($key => $GLOBALS['validate_specific_array'][1]);
                                } else if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                                    $input = array($key => $GLOBALS['validate_specific_array'][2]['email']);
                                }
                                break;
                            case 'fieldPassword':
                                if (strlen($value) < 5) {
                                    $input = array($key => $GLOBALS['validate_specific_array'][2]['length'][5]);
                                } else if (isset($_GET['function']) && $_GET['function'] == 'register') {
                                    if ($_POST['fieldPassword'] !== $_POST['fieldPasswordRepeat']) {
                                        $input = array('fieldPassword' => $GLOBALS['validate_specific_array'][2]['passwordRepeat']);
                                    }
                                } else {
                                    if (isset($_SESSION['uID'])) {
                                        $userAll = new HtUserAll($_SESSION['uID']);
                                        if ($userAll->getFieldPassword() !== $value) {
                                            $input = array($key => $GLOBALS['validate_specific_array'][2]['passwordNotCurrent']);
                                        }
                                    }
                                }
                                break;
                            case 'fieldPasswordRepeat':
                                if (strlen($value) < 5) {
                                    $input = array($key => $GLOBALS['validate_specific_array'][2]['length'][5]);
                                } else {
                                    if (isset($_GET['function']) && $_GET['function'] == 'register') {
                                        if ($_POST['fieldPassword'] !== $_POST['fieldPasswordRepeat']) {
                                            $input = array('fieldPasswordRepeat' => $GLOBALS['validate_specific_array'][2]['passwordRepeat']);
                                        }
                                    } else {
                                        if ($_POST['fieldPasswordRepeat'] !== $_POST['fieldPasswordRepeat2']) {
                                            $input = array('fieldPasswordRepeat' => $GLOBALS['validate_specific_array'][2]['passwordRepeat']);
                                        }
                                    }
                                }
                                break;
                            case 'fieldPasswordRepeat2':
                                if (strlen($value) < 5) {
                                    $input = array($key => $GLOBALS['validate_specific_array'][2]['length'][5]);
                                } else if ($_POST['fieldPasswordRepeat'] !== $_POST['fieldPasswordRepeat2']) {
                                    $input = array('fieldPasswordRepeat2' => $GLOBALS['validate_specific_array'][2]['passwordRepeat']);
                                }
                                break;
                            case 'fieldContactMethod':
                            case 'fieldPurpose':
                                if (strpos($value, $GLOBALS['lang']['Choose']) !== false) {
                                    $input = array($key => $GLOBALS['validate_specific_array'][0]);
                                }
                                break;
                            case 'fieldPhoneNr':
                                if (!ctype_digit($value)) {
                                    $input = array($key => $GLOBALS['validate_specific_array'][2]['isdigit']);
                                } else if (strlen($value) < 10) {
                                    $input = array($key => $GLOBALS['validate_specific_array'][1]);
                                }
                                break;
                            case 'fieldName':
                            case 'fieldCompany':
                            case 'fieldSubject':
                            case 'fieldMessage':
                                if (in_array($_GET['lan'], $GLOBALS['GEEZ'])) {
                                    validateUtf8($key, $value, $err);
                                } else {
                                    if (!filter_var($value, FILTER_SANITIZE_STRING)) {
                                        $input = array($key => $GLOBALS['validate_specific_array'][1]);
                                    }
                                }
                                break;
                            case 'fieldTermAndCondition':
                                if (strpos($value, $GLOBALS['lang']['Choose']) !== false) {
                                    $input = array($key => $GLOBALS['validate_specific_array'][0]);
                                }
                                break;
                            default:
                                break;
                        }
                    }

                    if (!empty($input)) {
                        array_push($err, $input);
                    }
                    var_dump($err);
                }
            }
        }
    }

    public function postValidation(&$err, $function)
    {
        $langURL = isset($_GET['lan']) ? "?&lan=" . $_GET['lan'] : "?&lan=en";
        if ($function == 'login') {
            $email = $_POST['fieldEmail'];
            $password = $_POST['fieldPassword'];
            $crypto = new Cryptor();
            $cryptoPassword = base64_encode($crypto->encryptor($password));
            $sql =  array('sql' => "SELECT * FROM user_all WHERE field_email = \"$email\" AND field_password = \"$cryptoPassword\"");

            $userAll = new HtUserAll($sql);
            $result = $userAll->getResultSet();
            if ($result->num_rows !== 0) {
                if (session_status() !== PHP_SESSION_ACTIVE) {                    
                    session_start();                    
                }else{
                    $_SESSION['uID'] = $userAll->getId();
                    $_SESSION['time'] = time();
                }

                if($userAll->canUpdate())
                    header("Location: ../../index.php" . $langURL);
                else
                header("Location: ../../includes/mypage.php" . $langURL);
            } else {
                $input = ['fieldEmail' => $GLOBALS['validate_specific_array'][2]['invalidEmailOrPassword']];
                array_push($err, $input);
                $input = ['fieldPassword' => $GLOBALS['validate_specific_array'][2]['invalidEmailOrPassword']];
                array_push($err, $input);
                header("Location: ../../includes/form_user.php?function=login" . $langURL);
            }
        } elseif ($function == 'password-recovery') {
            $email = $_POST['fieldEmail'];
            $userName = $_POST['fieldUserName'];
            $sql =  array('sql' => "SELECT * FROM user_all WHERE field_email = \"$email\" AND field_user_name = \"$userName\"");

            $userAll = new HtUserAll($sql);
            $result = $userAll->getResultSet();
            if ($result->num_rows === 0) {
                $input = ['fieldEmail' => $GLOBALS['validate_specific_array'][2]['invalidEmailOrUserName']];
                array_push($err, $input);
                $input = ['fieldUserName' => $GLOBALS['validate_specific_array'][2]['invalidEmailOrUserName']];
                array_push($err, $input);
                header("Location: ../../includes/form_user.php?function=password-recovery" . $langURL);
            } else {
                $userAll->recoverPassword();
            }
        } elseif ($function == 'edit-profile') {
            $userAll = new HtUserAll($_SESSION['uID']);
            $userAll->finalizeEditProfile();
        } elseif ($function == 'contact-us') {
            $object = new HtUtilContactUs();
            $object->finalizeContactUs();
        }
    }
}

/**
 * unicodeStrToArray
 *
 * @param  mixed $str
 * @param  mixed $l
 * @return void
 */
function unicodeStrToArray($str, $l = 0)
{
    if ($l > 0) {
        $ret = array();
        $len = mb_strlen($str, "UTF-8");
        for ($i = 0; $i < $len; $i += $l) {
            $ret[] = mb_substr($str, $i, $l, "UTF-8");
        }
        return $ret;
    }
    return preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
}

/**
 * validateUtf8
 * 
 * @param  mixed $key
 * @param  mixed $input
 * @param  mixed $err
 * @return void
 */
function validateUtf8($keyIn, $valueIn, &$err)
{
    $utf8ToArray = unicodeStrToArray($valueIn);
    $count = 0;
    $input = [];
    $errMsg1 = '';
    $errMsg = '';
    foreach ($utf8ToArray as $key => $value) {
        if ((preg_match('/[\W]+$/ui', $value) && ($value != ' ')) || preg_match('/^[0-9]+$/', $value)) {
            $errMsg1 = $GLOBALS['validate_specific_array'][2]['isalpha'] . '<br>';
        }
        if (preg_match('/^[a-zA-Z]+$/', $value)) {
            $count++;
        }
    }
    if ($count > 0) {
        $errMsg = $GLOBALS['validate_specific_array'][2]['mixedLanguage'] . '<br>' . $errMsg1;
    } else {
        $errMsg = $errMsg1;
    }

    if (!empty($errMsg)) {
        $input = [$keyIn => $errMsg];
        array_push($err, $input);
    }
}
