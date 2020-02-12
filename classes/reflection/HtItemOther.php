<?php
global $documnetRootPath;

require_once $documnetRootPath . "/classes/reflection/class.config.php";


/**
 * Class HtItemOther
 * @extends MySqlRecord
 * @filesource HtItemOther.php
*/

// namespace hulutera;

class HtItemOther extends MySqlRecord
{
    /**
     * A control attribute for the update operation.
     * @note An instance fetched from db is allowed to run the update operation.
     *       A new instance (not fetched from db) is allowed only to run the insert operation but,
     *       after running insertion, the instance is automatically allowed to run update operation.
     * @var bool
     */
    private $allowUpdate = false;

    /**
     * Class attribute for mapping the primary key id of table item_other
     *
     * Comment for field id: Not specified<br>
     * @var int $id
     */
    private $id;

    /**
     * A class attribute for evaluating if the table has an autoincrement primary key
     * @var bool $isPkAutoIncrement
     */
    private $isPkAutoIncrement = true;

    /**
     * Class attribute for mapping table field id_temp
     *
     * Comment for field id_temp: Not specified.<br>
     * Field information:
     *  - Data type: int(20)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var int $idTemp
     */
    private $idTemp;

    /**
     * Class attribute for mapping table field id_user
     *
     * Comment for field id_user: Not specified.<br>
     * Field information:
     *  - Data type: int(40)
     *  - Null : NO
     *  - DB Index: MUL
     *  - Default: 
     *  - Extra:  
     * @var int $idUser
     */
    private $idUser;

    /**
     * Class attribute for mapping table field id_category
     *
     * Comment for field id_category: Not specified.<br>
     * Field information:
     *  - Data type: int(11)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var int $idCategory
     */
    private $idCategory;

    /**
     * Class attribute for mapping table field id_contact_category
     *
     * Comment for field id_contact_category: Not specified.<br>
     * Field information:
     *  - Data type: int(3)
     *  - Null : NO
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var int $idContactCategory
     */
    private $idContactCategory;

    /**
     * Class attribute for mapping table field field_price_sell
     *
     * Comment for field field_price_sell: Not specified.<br>
     * Field information:
     *  - Data type: varchar(40)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $fieldPriceSell
     */
    private $fieldPriceSell;

    /**
     * Class attribute for mapping table field field_price_nego
     *
     * Comment for field field_price_nego: Not specified.<br>
     * Field information:
     *  - Data type: varchar(40)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: Negotiable
     *  - Extra:  
     * @var string $fieldPriceNego
     */
    private $fieldPriceNego;

    /**
     * Class attribute for mapping table field field_price_currency
     *
     * Comment for field field_price_currency: Not specified.<br>
     * Field information:
     *  - Data type: varchar(40)
     *  - Null : NO
     *  - DB Index: 
     *  - Default: Birr
     *  - Extra:  
     * @var string $fieldPriceCurrency
     */
    private $fieldPriceCurrency;

    /**
     * Class attribute for mapping table field field_location
     *
     * Comment for field field_location: Not specified.<br>
     * Field information:
     *  - Data type: varchar(40)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $fieldLocation
     */
    private $fieldLocation;

    /**
     * Class attribute for mapping table field field_extra_info
     *
     * Comment for field field_extra_info: Not specified.<br>
     * Field information:
     *  - Data type: mediumtext
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $fieldExtraInfo
     */
    private $fieldExtraInfo;

    /**
     * Class attribute for mapping table field field_title
     *
     * Comment for field field_title: Not specified.<br>
     * Field information:
     *  - Data type: varchar(125)
     *  - Null : NO
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $fieldTitle
     */
    private $fieldTitle;

    /**
     * Class attribute for mapping table field field_upload_date
     *
     * Comment for field field_upload_date: Not specified.<br>
     * Field information:
     *  - Data type: timestamp
     *  - Null : NO
     *  - DB Index: 
     *  - Default: CURRENT_TIMESTAMP
     *  - Extra:  on update CURRENT_TIMESTAMP
     * @var string $fieldUploadDate
     */
    private $fieldUploadDate;

    /**
     * Class attribute for mapping table field field_total_view
     *
     * Comment for field field_total_view: Not specified.<br>
     * Field information:
     *  - Data type: int(10)
     *  - Null : YES
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var int $fieldTotalView
     */
    private $fieldTotalView;

    /**
     * Class attribute for mapping table field field_status
     *
     * Comment for field field_status: Not specified.<br>
     * Field information:
     *  - Data type: varchar(10)
     *  - Null : NO
     *  - DB Index: 
     *  - Default: pending
     *  - Extra:  
     * @var string $fieldStatus
     */
    private $fieldStatus;

    /**
     * Class attribute for mapping table field field_market_category
     *
     * Comment for field field_market_category: Not specified.<br>
     * Field information:
     *  - Data type: varchar(10)
     *  - Null : NO
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $fieldMarketCategory
     */
    private $fieldMarketCategory;

    /**
     * Class attribute for mapping table field field_table_type
     *
     * Comment for field field_table_type: Not specified.<br>
     * Field information:
     *  - Data type: int(10)
     *  - Null : NO
     *  - DB Index: 
     *  - Default: 7
     *  - Extra:  
     * @var int $fieldTableType
     */
    private $fieldTableType;

    /**
     * Class attribute for storing the SQL DDL of table item_other
     * @var string base64 encoded string for DDL
     */
    private $ddl = "Q1JFQVRFIFRBQkxFIGBpdGVtX290aGVyYCAoCiAgYGlkYCBpbnQoNDApIE5PVCBOVUxMIEFVVE9fSU5DUkVNRU5ULAogIGBpZF90ZW1wYCBpbnQoMjApIERFRkFVTFQgTlVMTCwKICBgaWRfdXNlcmAgaW50KDQwKSBOT1QgTlVMTCwKICBgaWRfY2F0ZWdvcnlgIGludCgxMSkgREVGQVVMVCBOVUxMLAogIGBpZF9jb250YWN0X2NhdGVnb3J5YCBpbnQoMykgTk9UIE5VTEwsCiAgYGZpZWxkX3ByaWNlX3NlbGxgIHZhcmNoYXIoNDApIERFRkFVTFQgTlVMTCwKICBgZmllbGRfcHJpY2VfbmVnb2AgdmFyY2hhcig0MCkgREVGQVVMVCAnTmVnb3RpYWJsZScsCiAgYGZpZWxkX3ByaWNlX2N1cnJlbmN5YCB2YXJjaGFyKDQwKSBOT1QgTlVMTCBERUZBVUxUICdCaXJyJywKICBgZmllbGRfbG9jYXRpb25gIHZhcmNoYXIoNDApIERFRkFVTFQgTlVMTCwKICBgZmllbGRfZXh0cmFfaW5mb2AgbWVkaXVtdGV4dCwKICBgZmllbGRfdGl0bGVgIHZhcmNoYXIoMTI1KSBOT1QgTlVMTCwKICBgZmllbGRfdXBsb2FkX2RhdGVgIHRpbWVzdGFtcCBOT1QgTlVMTCBERUZBVUxUIENVUlJFTlRfVElNRVNUQU1QIE9OIFVQREFURSBDVVJSRU5UX1RJTUVTVEFNUCwKICBgZmllbGRfdG90YWxfdmlld2AgaW50KDEwKSBERUZBVUxUIE5VTEwsCiAgYGZpZWxkX3N0YXR1c2AgdmFyY2hhcigxMCkgTk9UIE5VTEwgREVGQVVMVCAncGVuZGluZycsCiAgYGZpZWxkX21hcmtldF9jYXRlZ29yeWAgdmFyY2hhcigxMCkgTk9UIE5VTEwsCiAgYGZpZWxkX3RhYmxlX3R5cGVgIGludCgxMCkgTk9UIE5VTEwgREVGQVVMVCAnNycsCiAgUFJJTUFSWSBLRVkgKGBpZGApLAogIEtFWSBgdUlEX0ZLMWAgKGBpZF91c2VyYCksCiAgQ09OU1RSQUlOVCBgaXRlbV9vdGhlcl9pYmZrXzFgIEZPUkVJR04gS0VZIChgaWRfdXNlcmApIFJFRkVSRU5DRVMgYHVzZXJfYWxsYCAoYGlkYCkgT04gREVMRVRFIENBU0NBREUgT04gVVBEQVRFIENBU0NBREUKKSBFTkdJTkU9SW5ub0RCIEFVVE9fSU5DUkVNRU5UPTQzIERFRkFVTFQgQ0hBUlNFVD1sYXRpbjE=";

    /**
     * setId Sets the class attribute id with a given value
     *
     * The attribute id maps the field id defined as int(40).<br>
     * Comment for field id: Not specified.<br>
     * @param int $id
     * @category Modifier
     */
    public function setId($id)
    {
        $this->id = (int)$id;
    }

    /**
     * setIdTemp Sets the class attribute idTemp with a given value
     *
     * The attribute idTemp maps the field id_temp defined as int(20).<br>
     * Comment for field id_temp: Not specified.<br>
     * @param int $idTemp
     * @category Modifier
     */
    public function setIdTemp($idTemp)
    {
        $this->idTemp = (int)$idTemp;
    }

    /**
     * setIdUser Sets the class attribute idUser with a given value
     *
     * The attribute idUser maps the field id_user defined as int(40).<br>
     * Comment for field id_user: Not specified.<br>
     * @param int $idUser
     * @category Modifier
     */
    public function setIdUser($idUser)
    {
        $this->idUser = (int)$idUser;
    }

    /**
     * setIdCategory Sets the class attribute idCategory with a given value
     *
     * The attribute idCategory maps the field id_category defined as int(11).<br>
     * Comment for field id_category: Not specified.<br>
     * @param int $idCategory
     * @category Modifier
     */
    public function setIdCategory($idCategory)
    {
        $this->idCategory = (int)$idCategory;
    }

    /**
     * setIdContactCategory Sets the class attribute idContactCategory with a given value
     *
     * The attribute idContactCategory maps the field id_contact_category defined as int(3).<br>
     * Comment for field id_contact_category: Not specified.<br>
     * @param int $idContactCategory
     * @category Modifier
     */
    public function setIdContactCategory($idContactCategory)
    {
        $this->idContactCategory = (int)$idContactCategory;
    }

    /**
     * setFieldPriceSell Sets the class attribute fieldPriceSell with a given value
     *
     * The attribute fieldPriceSell maps the field field_price_sell defined as varchar(40).<br>
     * Comment for field field_price_sell: Not specified.<br>
     * @param string $fieldPriceSell
     * @category Modifier
     */
    public function setFieldPriceSell($fieldPriceSell)
    {
        $this->fieldPriceSell = (string)$fieldPriceSell;
    }

    /**
     * setFieldPriceNego Sets the class attribute fieldPriceNego with a given value
     *
     * The attribute fieldPriceNego maps the field field_price_nego defined as varchar(40).<br>
     * Comment for field field_price_nego: Not specified.<br>
     * @param string $fieldPriceNego
     * @category Modifier
     */
    public function setFieldPriceNego($fieldPriceNego)
    {
        $this->fieldPriceNego = (string)$fieldPriceNego;
    }

    /**
     * setFieldPriceCurrency Sets the class attribute fieldPriceCurrency with a given value
     *
     * The attribute fieldPriceCurrency maps the field field_price_currency defined as varchar(40).<br>
     * Comment for field field_price_currency: Not specified.<br>
     * @param string $fieldPriceCurrency
     * @category Modifier
     */
    public function setFieldPriceCurrency($fieldPriceCurrency)
    {
        $this->fieldPriceCurrency = (string)$fieldPriceCurrency;
    }

    /**
     * setFieldLocation Sets the class attribute fieldLocation with a given value
     *
     * The attribute fieldLocation maps the field field_location defined as varchar(40).<br>
     * Comment for field field_location: Not specified.<br>
     * @param string $fieldLocation
     * @category Modifier
     */
    public function setFieldLocation($fieldLocation)
    {
        $this->fieldLocation = (string)$fieldLocation;
    }

    /**
     * setFieldExtraInfo Sets the class attribute fieldExtraInfo with a given value
     *
     * The attribute fieldExtraInfo maps the field field_extra_info defined as mediumtext.<br>
     * Comment for field field_extra_info: Not specified.<br>
     * @param string $fieldExtraInfo
     * @category Modifier
     */
    public function setFieldExtraInfo($fieldExtraInfo)
    {
        $this->fieldExtraInfo = (string)$fieldExtraInfo;
    }

    /**
     * setFieldTitle Sets the class attribute fieldTitle with a given value
     *
     * The attribute fieldTitle maps the field field_title defined as varchar(125).<br>
     * Comment for field field_title: Not specified.<br>
     * @param string $fieldTitle
     * @category Modifier
     */
    public function setFieldTitle($fieldTitle)
    {
        $this->fieldTitle = (string)$fieldTitle;
    }

    /**
     * setFieldUploadDate Sets the class attribute fieldUploadDate with a given value
     *
     * The attribute fieldUploadDate maps the field field_upload_date defined as timestamp.<br>
     * Comment for field field_upload_date: Not specified.<br>
     * @param string $fieldUploadDate
     * @category Modifier
     */
    public function setFieldUploadDate($fieldUploadDate)
    {
        $this->fieldUploadDate = (string)$fieldUploadDate;
    }

    /**
     * setFieldTotalView Sets the class attribute fieldTotalView with a given value
     *
     * The attribute fieldTotalView maps the field field_total_view defined as int(10).<br>
     * Comment for field field_total_view: Not specified.<br>
     * @param int $fieldTotalView
     * @category Modifier
     */
    public function setFieldTotalView($fieldTotalView)
    {
        $this->fieldTotalView = (int)$fieldTotalView;
    }

    /**
     * setFieldStatus Sets the class attribute fieldStatus with a given value
     *
     * The attribute fieldStatus maps the field field_status defined as varchar(10).<br>
     * Comment for field field_status: Not specified.<br>
     * @param string $fieldStatus
     * @category Modifier
     */
    public function setFieldStatus($fieldStatus)
    {
        $this->fieldStatus = (string)$fieldStatus;
    }

    /**
     * setFieldMarketCategory Sets the class attribute fieldMarketCategory with a given value
     *
     * The attribute fieldMarketCategory maps the field field_market_category defined as varchar(10).<br>
     * Comment for field field_market_category: Not specified.<br>
     * @param string $fieldMarketCategory
     * @category Modifier
     */
    public function setFieldMarketCategory($fieldMarketCategory)
    {
        $this->fieldMarketCategory = (string)$fieldMarketCategory;
    }

    /**
     * setFieldTableType Sets the class attribute fieldTableType with a given value
     *
     * The attribute fieldTableType maps the field field_table_type defined as int(10).<br>
     * Comment for field field_table_type: Not specified.<br>
     * @param int $fieldTableType
     * @category Modifier
     */
    public function setFieldTableType($fieldTableType)
    {
        $this->fieldTableType = (int)$fieldTableType;
    }

    /**
     * getId gets the class attribute id value
     *
     * The attribute id maps the field id defined as int(40).<br>
     * Comment for field id: Not specified.
     * @return int $id
     * @category Accessor of $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * getIdTemp gets the class attribute idTemp value
     *
     * The attribute idTemp maps the field id_temp defined as int(20).<br>
     * Comment for field id_temp: Not specified.
     * @return int $idTemp
     * @category Accessor of $idTemp
     */
    public function getIdTemp()
    {
        return $this->idTemp;
    }

    /**
     * getIdUser gets the class attribute idUser value
     *
     * The attribute idUser maps the field id_user defined as int(40).<br>
     * Comment for field id_user: Not specified.
     * @return int $idUser
     * @category Accessor of $idUser
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * getIdCategory gets the class attribute idCategory value
     *
     * The attribute idCategory maps the field id_category defined as int(11).<br>
     * Comment for field id_category: Not specified.
     * @return int $idCategory
     * @category Accessor of $idCategory
     */
    public function getIdCategory()
    {
        return $this->idCategory;
    }

    /**
     * getIdContactCategory gets the class attribute idContactCategory value
     *
     * The attribute idContactCategory maps the field id_contact_category defined as int(3).<br>
     * Comment for field id_contact_category: Not specified.
     * @return int $idContactCategory
     * @category Accessor of $idContactCategory
     */
    public function getIdContactCategory()
    {
        return $this->idContactCategory;
    }

    /**
     * getFieldPriceSell gets the class attribute fieldPriceSell value
     *
     * The attribute fieldPriceSell maps the field field_price_sell defined as varchar(40).<br>
     * Comment for field field_price_sell: Not specified.
     * @return string $fieldPriceSell
     * @category Accessor of $fieldPriceSell
     */
    public function getFieldPriceSell()
    {
        return $this->fieldPriceSell;
    }

    /**
     * getFieldPriceNego gets the class attribute fieldPriceNego value
     *
     * The attribute fieldPriceNego maps the field field_price_nego defined as varchar(40).<br>
     * Comment for field field_price_nego: Not specified.
     * @return string $fieldPriceNego
     * @category Accessor of $fieldPriceNego
     */
    public function getFieldPriceNego()
    {
        return $this->fieldPriceNego;
    }

    /**
     * getFieldPriceCurrency gets the class attribute fieldPriceCurrency value
     *
     * The attribute fieldPriceCurrency maps the field field_price_currency defined as varchar(40).<br>
     * Comment for field field_price_currency: Not specified.
     * @return string $fieldPriceCurrency
     * @category Accessor of $fieldPriceCurrency
     */
    public function getFieldPriceCurrency()
    {
        return $this->fieldPriceCurrency;
    }

    /**
     * getFieldLocation gets the class attribute fieldLocation value
     *
     * The attribute fieldLocation maps the field field_location defined as varchar(40).<br>
     * Comment for field field_location: Not specified.
     * @return string $fieldLocation
     * @category Accessor of $fieldLocation
     */
    public function getFieldLocation()
    {
        return $this->fieldLocation;
    }

    /**
     * getFieldExtraInfo gets the class attribute fieldExtraInfo value
     *
     * The attribute fieldExtraInfo maps the field field_extra_info defined as mediumtext.<br>
     * Comment for field field_extra_info: Not specified.
     * @return string $fieldExtraInfo
     * @category Accessor of $fieldExtraInfo
     */
    public function getFieldExtraInfo()
    {
        return $this->fieldExtraInfo;
    }

    /**
     * getFieldTitle gets the class attribute fieldTitle value
     *
     * The attribute fieldTitle maps the field field_title defined as varchar(125).<br>
     * Comment for field field_title: Not specified.
     * @return string $fieldTitle
     * @category Accessor of $fieldTitle
     */
    public function getFieldTitle()
    {
        return $this->fieldTitle;
    }

    /**
     * getFieldUploadDate gets the class attribute fieldUploadDate value
     *
     * The attribute fieldUploadDate maps the field field_upload_date defined as timestamp.<br>
     * Comment for field field_upload_date: Not specified.
     * @return string $fieldUploadDate
     * @category Accessor of $fieldUploadDate
     */
    public function getFieldUploadDate()
    {
        return $this->fieldUploadDate;
    }

    /**
     * getFieldTotalView gets the class attribute fieldTotalView value
     *
     * The attribute fieldTotalView maps the field field_total_view defined as int(10).<br>
     * Comment for field field_total_view: Not specified.
     * @return int $fieldTotalView
     * @category Accessor of $fieldTotalView
     */
    public function getFieldTotalView()
    {
        return $this->fieldTotalView;
    }

    /**
     * getFieldStatus gets the class attribute fieldStatus value
     *
     * The attribute fieldStatus maps the field field_status defined as varchar(10).<br>
     * Comment for field field_status: Not specified.
     * @return string $fieldStatus
     * @category Accessor of $fieldStatus
     */
    public function getFieldStatus()
    {
        return $this->fieldStatus;
    }

    /**
     * getFieldMarketCategory gets the class attribute fieldMarketCategory value
     *
     * The attribute fieldMarketCategory maps the field field_market_category defined as varchar(10).<br>
     * Comment for field field_market_category: Not specified.
     * @return string $fieldMarketCategory
     * @category Accessor of $fieldMarketCategory
     */
    public function getFieldMarketCategory()
    {
        return $this->fieldMarketCategory;
    }

    /**
     * getFieldTableType gets the class attribute fieldTableType value
     *
     * The attribute fieldTableType maps the field field_table_type defined as int(10).<br>
     * Comment for field field_table_type: Not specified.
     * @return int $fieldTableType
     * @category Accessor of $fieldTableType
     */
    public function getFieldTableType()
    {
        return $this->fieldTableType;
    }

    /**
     * Gets DDL SQL code of the table item_other
     * @return string
     * @category Accessor
     */
    public function getDdl()
    {
        return base64_decode($this->ddl);
    }

    /**
    * Gets the name of the managed table
    * @return string
    * @category Accessor
    */
    public function getTableName()
    {
        return "item_other";
    }

    /**
     * The HtItemOther constructor
     *
     * It creates and initializes an object in two way:
     *  - with null (not fetched) data if none $id is given.
     *  - with a fetched data row from the table item_other having id=$id
     * @param int $id. If omitted an empty (not fetched) instance is created.
     * @return HtItemOther Object
     */
    public function __construct($id = null)
    {
        parent::__construct();
        if (!empty($id)) {
            $this->select($id);
        }else {
            $this->selectAll();
        }
    }

    /**
     * The implicit destructor
     */
    public function __destruct()
    {
        $this->close();
    }

    /**
     * Explicit destructor. It calls the implicit destructor automatically.
     */
    public function close()
    {
        
    }

    /**
     * Fetchs a table row of item_other into the object.
     *
     * Fetched table fields values are assigned to class attributes and they can be managed by using
     * the accessors/modifiers methods of the class.
     * @param int $id the primary key id value of table item_other which identifies the row to select.
     * @return int affected selected row
     * @category DML
     */
    public function select($id)
    {
        $sql =  "SELECT * FROM item_other WHERE id={$this->parseValue($id,'int')}";
        $this->resetLastSqlError();
        $result =  $this->query($sql);
        $this->resultSet=$result;
        $this->lastSql = $sql;
        if ($result){
            $rowObject = $result->fetch_object();
            @$this->id = (integer)$rowObject->id;
            @$this->idTemp = (integer)$rowObject->id_temp;
            @$this->idUser = (integer)$rowObject->id_user;
            @$this->idCategory = (integer)$rowObject->id_category;
            @$this->idContactCategory = (integer)$rowObject->id_contact_category;
            @$this->fieldPriceSell = $this->replaceAposBackSlash($rowObject->field_price_sell);
            @$this->fieldPriceNego = $this->replaceAposBackSlash($rowObject->field_price_nego);
            @$this->fieldPriceCurrency = $this->replaceAposBackSlash($rowObject->field_price_currency);
            @$this->fieldLocation = $this->replaceAposBackSlash($rowObject->field_location);
            @$this->fieldExtraInfo = $this->replaceAposBackSlash($rowObject->field_extra_info);
            @$this->fieldTitle = $this->replaceAposBackSlash($rowObject->field_title);
            @$this->fieldUploadDate = $rowObject->field_upload_date;
            @$this->fieldTotalView = (integer)$rowObject->field_total_view;
            @$this->fieldStatus = $this->replaceAposBackSlash($rowObject->field_status);
            @$this->fieldMarketCategory = $this->replaceAposBackSlash($rowObject->field_market_category);
            @$this->fieldTableType = (integer)$rowObject->field_table_type;
            $this->allowUpdate = true;
        } else {
            $this->lastSqlError = $this->sqlstate . " - ". $this->error;
        }
        return $this->affected_rows;
    }

   /**
     * Fetchs all table row of item_other into the object.
     *
     * Fetched all table fields values are assigned to class attributes and they can be managed by using
     * the accessors/modifiers methods of the class.
     * @return int affected selected row
     * @category DML
     */
    public function selectAll()
    {
        $sql = <<< SQL
            SELECT * FROM {$this->getTableName()}
SQL;
        $this->resetLastSqlError();
        $result =  $this->query($sql);
        $this->resultSet = $result;
        $this->lastSql = $sql;
    }


    /**
     * Deletes a specific row from the table item_other
     * @param int $id the primary key id value of table item_other which identifies the row to delete.
     * @return int affected deleted row
     * @category DML
     */
    public function delete($id)
    {
        $sql = "DELETE FROM item_other WHERE id={$this->parseValue($id,'int')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - ". $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Insert the current object into a new table row of item_other
     *
     * All class attributes values defined for mapping all table fields are automatically used during inserting
     * @return mixed MySQL insert result
     * @category DML
     */
    public function insert()
    {
        if ($this->isPkAutoIncrement) {
            $this->id = "";
        }
        // $constants = get_defined_constants();
        $sql = <<< SQL
            INSERT INTO item_other
            (id_temp,id_user,id_category,id_contact_category,field_price_sell,field_price_nego,field_price_currency,field_location,field_extra_info,field_title,field_upload_date,field_total_view,field_status,field_market_category,field_table_type)
            VALUES(
			{$this->parseValue($this->idTemp)},
			{$this->parseValue($this->idUser)},
			{$this->parseValue($this->idCategory)},
			{$this->parseValue($this->idContactCategory)},
			{$this->parseValue($this->fieldPriceSell,'notNumber')},
			{$this->parseValue($this->fieldPriceNego,'notNumber')},
			{$this->parseValue($this->fieldPriceCurrency,'notNumber')},
			{$this->parseValue($this->fieldLocation,'notNumber')},
			{$this->parseValue($this->fieldExtraInfo,'notNumber')},
			{$this->parseValue($this->fieldTitle,'notNumber')},
			{$this->parseValue($this->fieldUploadDate,'notNumber')},
			{$this->parseValue($this->fieldTotalView)},
			{$this->parseValue($this->fieldStatus,'notNumber')},
			{$this->parseValue($this->fieldMarketCategory,'notNumber')},
			{$this->parseValue($this->fieldTableType)})
SQL;
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - ". $this->error;
        } else {
            $this->allowUpdate = true;
            if ($this->isPkAutoIncrement) {
                $this->id = $this->insert_id;
            }
        }
        return $result;
    }

    /**
     * Updates a specific row from the table item_other with the values of the current object.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating of selected row.<br>
     * Null values are used for all attributes not previously setted.
     * @param int $id the primary key id value of table item_other which identifies the row to update.
     * @return mixed MySQL update result
     * @category DML
     */
    public function update($id)
    {
        // $constants = get_defined_constants();
        if ($this->allowUpdate) {
            $sql = <<< SQL
            UPDATE
                item_other
            SET 
				id_temp={$this->parseValue($this->idTemp)},
				id_user={$this->parseValue($this->idUser)},
				id_category={$this->parseValue($this->idCategory)},
				id_contact_category={$this->parseValue($this->idContactCategory)},
				field_price_sell={$this->parseValue($this->fieldPriceSell,'notNumber')},
				field_price_nego={$this->parseValue($this->fieldPriceNego,'notNumber')},
				field_price_currency={$this->parseValue($this->fieldPriceCurrency,'notNumber')},
				field_location={$this->parseValue($this->fieldLocation,'notNumber')},
				field_extra_info={$this->parseValue($this->fieldExtraInfo,'notNumber')},
				field_title={$this->parseValue($this->fieldTitle,'notNumber')},
				field_upload_date={$this->parseValue($this->fieldUploadDate,'notNumber')},
				field_total_view={$this->parseValue($this->fieldTotalView)},
				field_status={$this->parseValue($this->fieldStatus,'notNumber')},
				field_market_category={$this->parseValue($this->fieldMarketCategory,'notNumber')},
				field_table_type={$this->parseValue($this->fieldTableType)}
            WHERE
                id={$this->parseValue($id,'int')}
SQL;
            $this->resetLastSqlError();
            $result = $this->query($sql);
            if (!$result) {
                $this->lastSqlError = $this->sqlstate . " - ". $this->error;
            } else {
                $this->select($id);
                $this->lastSql = $sql;
                return $result;
            }
        } else {
            return false;
        }
    }

    /**
     * Facility for updating a row of item_other previously loaded.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating.
     * @category DML Helper
     * @return mixed MySQLi update result
     */
    public function updateCurrent()
    {
        if ($this->id != "") {
            return $this->update($this->id);
        } else {
            return false;
        }
    }

    /**
     * Facility for getting relational row of item_other
     *
     * @category DML Helper
     * @return mixed MySQLi join result
     */
    public function leftJoin()
    {
        $sql = <<< SQL
            SELECT * FROM item_other
            LEFT JOIN image_other    ON  item_other.id = image_other.id
            LEFT JOIN user_all     ON  item_other.id_user = user_all.id
            LEFT JOIN category_other ON  item_other.id_category = category_other.id
            LEFT JOIN category_contact ON item_other.id_contact_category = category_contact.id
            WHERE
            item_other.id={$this->parseValue($this->id, 'int')}
SQL;

        $this->resetLastSqlError();
        $result =  $this->query($sql);
        $this->resultSet = $result;
        $this->lastSql = $sql;
        return $this->resultSet;
    }
}
?>
