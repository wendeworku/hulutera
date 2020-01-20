<?php
class CarClass
{
	private $_tableName = "car";
	private $id, $rent, $sell, $nego, $curr, $rate, $make, $model, $title, $mfg, $fule, $seat, $color, $gear, $info, $time, $mktTyp, $cat, $loc, $cntTyp;
	public function setElements($row)
	{
		$this->id   = $row['cID'];
		$this->rent = $row['cPriceRent'];
		$this->sell = $row['cPricesell'];
		$this->nego = $row['cPriceNego'];
		$this->curr = $row['currency'];
		$this->rate = $row['cPriceRate'];
		$this->make = $row['cMake'];
		$this->model = $row['cModel'];
		$this->title = $row['cTitle'];
		$this->mfg   = $row['cYearOfMfg'];
		$this->fuel  = $row['cFuelType'];
		$this->seat  = $row['cNrOfSeats'];
		$this->color = $row['cColor'];
		$this->gear  = $row['cGear'];
		$this->loc   = $row['cLocation'];
		$this->info  = $row['cExtraInfo'];

		// common
		$this->time   = $row['UploadedDate'];
		$this->mktTyp = $row['marketCategory'];
		$this->cat    = $row['categoryName'];
		$this->cntTyp = $row['contactMethod'];
	}

	public function getId()
	{
		return $this->id;
	}
	public function getRent()
	{
		return $this->rent;
	}
	public function getSell()
	{
		return $this->sell;
	}
	public function getNego()
	{
		return $this->nego;
	}
	public function getCurr()
	{
		return $this->curr;
	}
	public function getRate()
	{
		return $this->rate;
	}
	public function getMake()
	{
		return $this->make;
	}
	public function getModel()
	{
		return $this->model;
	}
	public function getTitle()
	{
		return $this->title;
	}
	public function getMfg()
	{
		return $this->mfg;
	}
	public function getFuel()
	{
		return $this->fuel;
	}
	public function getSeat()
	{
		return $this->seat;
	}
	public function getColor()
	{
		return $this->color;
	}
	public function getGear()
	{
		return $this->gear;
	}
	public function getLoc()
	{
		return $this->loc;
	}
	public function getInfo()
	{
		return $this->info;
	}
	//common
	public function getMktType()
	{
		return $this->mktTyp;
	}
	public function getCategory()
	{
		return $this->cat;
	}
	public function getContactMethod()
	{
		return $this->cntTyp;
	}

	public function getUpldTime()
	{
		return $this->time;
	}
	/*@ function to display make and model of item
	 * input: make and model
	* */
	public function printModel()
	{
		echo "<div class=\"MakeandModel\">";
		if ($this->make != "" and $this->make != "000") {
			echo $this->make;
		}
		if ($this->model != "" and $this->model != "000") {
			echo "&nbsp;" . $this->model;
		}
		echo '</div>';
	}

	public function getIdFieldName()
	{
		return DatabaseClass::getInstance()->getFieldName($this->_tableName, 0);
	}
	public function getUserIdFieldName()
	{
		return DatabaseClass::getInstance()->getFieldName($this->_tableName, 1);
	}
	public function getCategoryIdFieldName()
	{
		return DatabaseClass::getInstance()->getFieldName($this->_tableName, 2);
	}
	public function getContactMethodCategoryIdFieldName()
	{
		return DatabaseClass::getInstance()->getFieldName($this->_tableName, 3);
	}
	public function getRentFieldName()
	{
		return DatabaseClass::getInstance()->getFieldName($this->_tableName, 4);
	}
	public function getSellFieldName()
	{
		return DatabaseClass::getInstance()->getFieldName($this->_tableName, 5);
	}
	public function getNegoFieldName()
	{
		return DatabaseClass::getInstance()->getFieldName($this->_tableName, 6);
	}
	public function getRateFieldName()
	{
		return DatabaseClass::getInstance()->getFieldName($this->_tableName, 7);
	}
	public function getCurrenyFieldName()
	{
		return DatabaseClass::getInstance()->getFieldName($this->_tableName, 8);
	}
	public function getMakeFieldName()
	{
		return DatabaseClass::getInstance()->getFieldName($this->_tableName, 9);
	}
	public function getModelFieldName()
	{
		return DatabaseClass::getInstance()->getFieldName($this->_tableName, 10);
	}
	public function getYearOfMfgFieldName()
	{
		return DatabaseClass::getInstance()->getFieldName($this->_tableName, 11);
	}
	public function getNrOfSeatsFieldName()
	{
		return DatabaseClass::getInstance()->getFieldName($this->_tableName, 12);
	}
	public function getFuelTypeFieldName()
	{
		return DatabaseClass::getInstance()->getFieldName($this->_tableName, 13);
	}
	public function getColorFieldName()
	{
		return DatabaseClass::getInstance()->getFieldName($this->_tableName, 14);
	}
	public function getGearFieldName()
	{
		return DatabaseClass::getInstance()->getFieldName($this->_tableName, 15);
	}
	public function getMilageFieldName()
	{
		return DatabaseClass::getInstance()->getFieldName($this->_tableName, 16);
	}
	public function getLocationFieldName()
	{
		return DatabaseClass::getInstance()->getFieldName($this->_tableName, 17);
	}
	public function getExtraInfoFieldName()
	{
		return DatabaseClass::getInstance()->getFieldName($this->_tableName, 18);
	}
	public function getTitleFieldName()
	{
		return DatabaseClass::getInstance()->getFieldName($this->_tableName, 19);
	}
	public function getUploadedDateFieldName()
	{
		return DatabaseClass::getInstance()->getFieldName($this->_tableName, 20);
	}
	public function getTotalViewFieldName()
	{
		return DatabaseClass::getInstance()->getFieldName($this->_tableName, 21);
	}
	public function getStatusFieldName()
	{
		return DatabaseClass::getInstance()->getFieldName($this->_tableName, 22);
	}
	public function getMarketCategoryFieldName()
	{
		return DatabaseClass::getInstance()->getFieldName($this->_tableName, 23);
	}
	public function getTempIdFieldName()
	{
		return DatabaseClass::getInstance()->getFieldName($this->_tableName, 24);
	}
	public function getTableTypeFieldName()
	{
		return DatabaseClass::getInstance()->getFieldName($this->_tableName, 25);
	}
	public function getItemName()
	{
		return ucwords($this->_tableName);
	}	
}