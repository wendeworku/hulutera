<?php
global $documnetRootPath;

require_once $documnetRootPath . "/classes/reflection/class.config.php";


/**
 * Class HtCategoryContact
 * @extends MySqlRecord
 * @filesource HtCategoryContact.php
*/

// namespace hulutera;

class HtCategoryContact extends MySqlRecord
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
     * Class attribute for mapping the primary key id of table category_contact
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
     * Class attribute for mapping table field field_method
     *
     * Comment for field field_method: Not specified.<br>
     * Field information:
     *  - Data type: varchar(40)
     *  - Null : NO
     *  - DB Index: 
     *  - Default: 
     *  - Extra:  
     * @var string $fieldMethod
     */
    private $fieldMethod;

    /**
     * Class attribute for storing the SQL DDL of table category_contact
     * @var string base64 encoded string for DDL
     */
    private $ddl = "Q1JFQVRFIFRBQkxFIGBjYXRlZ29yeV9jb250YWN0YCAoCiAgYGlkYCBpbnQoMykgTk9UIE5VTEwgQVVUT19JTkNSRU1FTlQsCiAgYGZpZWxkX21ldGhvZGAgdmFyY2hhcig0MCkgQ09MTEFURSB1dGY4X3VuaWNvZGVfY2kgTk9UIE5VTEwsCiAgUFJJTUFSWSBLRVkgKGBpZGApCikgRU5HSU5FPU15SVNBTSBBVVRPX0lOQ1JFTUVOVD00IERFRkFVTFQgQ0hBUlNFVD11dGY4IENPTExBVEU9dXRmOF91bmljb2RlX2Np";

    /**
     * setId Sets the class attribute id with a given value
     *
     * The attribute id maps the field id defined as int(3).<br>
     * Comment for field id: Not specified.<br>
     * @param int $id
     * @category Modifier
     */
    public function setId($id)
    {
        $this->id = (int)$id;
    }

    /**
     * setFieldMethod Sets the class attribute fieldMethod with a given value
     *
     * The attribute fieldMethod maps the field field_method defined as varchar(40).<br>
     * Comment for field field_method: Not specified.<br>
     * @param string $fieldMethod
     * @category Modifier
     */
    public function setFieldMethod($fieldMethod)
    {
        $this->fieldMethod = (string)$fieldMethod;
    }

    /**
     * getId gets the class attribute id value
     *
     * The attribute id maps the field id defined as int(3).<br>
     * Comment for field id: Not specified.
     * @return int $id
     * @category Accessor of $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * getFieldMethod gets the class attribute fieldMethod value
     *
     * The attribute fieldMethod maps the field field_method defined as varchar(40).<br>
     * Comment for field field_method: Not specified.
     * @return string $fieldMethod
     * @category Accessor of $fieldMethod
     */
    public function getFieldMethod()
    {
        return $this->fieldMethod;
    }

    /**
     * Gets DDL SQL code of the table category_contact
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
        return "category_contact";
    }

    /**
     * The HtCategoryContact constructor
     *
     * It creates and initializes an object in two way:
     *  - with null (not fetched) data if none $id is given.
     *  - with a fetched data row from the table category_contact having id=$id
     * @param int $id. If omitted an empty (not fetched) instance is created.
     * @return HtCategoryContact Object
     */
    public function __construct($id = null)
    {
        parent::__construct();
        if (!empty($id)) {
            $this->select($id);
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
     * Fetchs a table row of category_contact into the object.
     *
     * Fetched table fields values are assigned to class attributes and they can be managed by using
     * the accessors/modifiers methods of the class.
     * @param int $id the primary key id value of table category_contact which identifies the row to select.
     * @return int affected selected row
     * @category DML
     */
    public function select($id)
    {
        $sql =  "SELECT * FROM category_contact WHERE id={$this->parseValue($id,'int')}";
        $this->resetLastSqlError();
        $result =  $this->query($sql);
        $this->resultSet=$result;
        $this->lastSql = $sql;
        if ($result){
            $rowObject = $result->fetch_object();
            @$this->id = (integer)$rowObject->id;
            @$this->fieldMethod = $this->replaceAposBackSlash($rowObject->field_method);
            $this->allowUpdate = true;
        } else {
            $this->lastSqlError = $this->sqlstate . " - ". $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Deletes a specific row from the table category_contact
     * @param int $id the primary key id value of table category_contact which identifies the row to delete.
     * @return int affected deleted row
     * @category DML
     */
    public function delete($id)
    {
        $sql = "DELETE FROM category_contact WHERE id={$this->parseValue($id,'int')}";
        $this->resetLastSqlError();
        $result = $this->query($sql);
        $this->lastSql = $sql;
        if (!$result) {
            $this->lastSqlError = $this->sqlstate . " - ". $this->error;
        }
        return $this->affected_rows;
    }

    /**
     * Insert the current object into a new table row of category_contact
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
            INSERT INTO category_contact
            (field_method)
            VALUES(
			{$this->parseValue($this->fieldMethod,'notNumber')})
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
     * Updates a specific row from the table category_contact with the values of the current object.
     *
     * All class attribute values defined for mapping all table fields are automatically used during updating of selected row.<br>
     * Null values are used for all attributes not previously setted.
     * @param int $id the primary key id value of table category_contact which identifies the row to update.
     * @return mixed MySQL update result
     * @category DML
     */
    public function update($id)
    {
        // $constants = get_defined_constants();
        if ($this->allowUpdate) {
            $sql = <<< SQL
            UPDATE
                category_contact
            SET 
				field_method={$this->parseValue($this->fieldMethod,'notNumber')}
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
     * Facility for updating a row of category_contact previously loaded.
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

}
?>
