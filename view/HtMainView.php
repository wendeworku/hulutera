<?php
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/classes/objectPool.class.php';
require_once $documnetRootPath . '/includes/pagination.php';


class HtMainView
{

    private $_runnerName; //track current running item name (car, ..., all, latest)
    private $_runnerId;   //track current running item id, optional for all, latest
    private $_pItem;      //track object to classes

    function __construct($newRunnerName, $newRunnerId = null)
    {
        $this->_runnerName = $newRunnerName;
        $this->_runnerId = $newRunnerId;
    }

    function __destruct()
    {
        // Exit
    }

    public function getItemObject()
    {
        return $this->_pItem;
    }
    /**
     * Main interface to display item
     * e.g.
     *  (new HtMainView("all",null))->show();    // select * from all  (car, computer, ...)
     *  (new HtMainView("car",null))->show();     // select * car
     *  (new HtMainView("car",13))->show();       // select * car where id=13
     *  (new HtMainView("latest",null))->show();  //select * latestupdate 
     *  
     * @param resolved by construtor
     */
    public function show($filter = null)
    {
        if ($this->_runnerName == 'search') {
            $this->displaySearch();
        } else {
            if ($filter != null) {
                $this->showItem($filter);
            } else {
                //$this->showItemWithId();
            }
        }
    }

    /**
     * Alternative interface to display item
     * e.g.
     *  (new HtMainView("latest",null))->showLatest();  //select * latestupdate 
     *  
     * @param resolved by construtor
     */
    public function showLatest()
    {
        $this->_pItem = ObjectPool::getInstance()->getObjectWithId("latest");
        $rows = $this->_pItem->runQuery();

        if ($rows > 0) {
            $calculatePageArray = calculatePage($rows);
            $globalVarObj = new HtGlobal();
            $start = ($calculatePageArray[0] - 1) * $globalVarObj::get('itemPerPage');
            $this->_pItem->runQuery($start, $globalVarObj::get('itemPerPage'));
            $result = $this->_pItem->getResultSet();
            echo '<div class="row items-board">';
            while ($row = $result->fetch_assoc()) {
                $this->_runnerName = $row['field_item_name'];
                $this->_pItem = ObjectPool::getInstance()->getObjectWithId($row['field_item_name'], $row['id_item']);
                $fetchItemRow = $this->_pItem->getResultSet();
                while ($itemRow = $fetchItemRow->fetch_assoc()) {
                    $this->showItemWithId($itemRow);
                }
            }
            echo '</div>';
            search_pagination($calculatePageArray[0], $calculatePageArray[1], "", "All", "All");
        } else {
            $this->itemNotFound();
        }
    }


    public function showRawData($filter)
    {
        $dataOnly = [];
        $this->_pItem = ObjectPool::getInstance()->getObjectWithId($this->_runnerName);
        $condition = "field_status = '$filter'";
        $this->_pItem->runQuery($condition);
        $result = $this->_pItem->getResultSet();
        while ($row = $result->fetch_assoc()) {
            array_push($dataOnly, $row);
        }
        return $dataOnly;
    }
    /**
     * Alternative interface to display item
     * e.g.
     *  (new HtMainView("car",null))->showItem();  //select * item 
     * @param resolved by construtor
     */
    public function showItem($filter, &$dataOnly = null, $isRawData = false)
    {
        $this->_pItem = ObjectPool::getInstance()->getObjectWithId($this->_runnerName);
        // Send query to the main item class
        $condition = "field_status = '$filter'";
        $rows = $this->_pItem->runQuery($condition);
        if ($rows > 0) {
            $calculatePageArray = calculatePage($rows);
            $globalVarObj = new HtGlobal();
            $start = ($calculatePageArray[0] - 1) * $globalVarObj::get('itemPerPage');
            $res = $this->_pItem->runQuery($condition, $start, $globalVarObj::get('itemPerPage'));
            $result = $this->_pItem->getResultSet();
            echo '<div class="row items-board">';
            while ($row = $result->fetch_assoc()) {
                if ($isRawData) {
                    array_push($dataOnly, $row);
                } else {
                    $this->showItemWithId($row);
                }
            }
            echo '</div>';
            if (empty($dataOnly) && empty($this->_runnerId)) {
                pagination($this->_runnerName, $calculatePageArray[1], $calculatePageArray[0], 0);
            }
        } else {
            $this->itemNotFound();
        }
    }

    /**
     * Alternative interface to display item with id
     * e.g.
     *  (new HtMainView("car",12))->showItemWithId();  //select * item where id=12
     * @param resolved by construtor
     */
    public function showItemWithId($row)
    {
        global $documnetRootPath;
        $this->_pItem->setFieldValues($row);
        $id =  $this->_pItem->getId();
        $itemName = $this->_runnerName;
        $uniqueId = $itemName . $id;
        $commonViewObj = new HtCommonView($itemName);

        //image handler
        $imageDir = $commonViewObj->getImageDir($this->_pItem);
        $image = $this->_pItem->getFieldImage();
        if ($image != null) {
            $imageArr = explode(',', $image);
            $numimage = sizeof($imageArr);
        } else {
            $language = isset($_GET['lan']) ? $_GET['lan'] : "en";
            $imageDir = "../images/" . $language . "/";
            $numimage = 0;
            $imageArr = ["itemnotfound.png"];
        }

        $jsImg = implode(',', $imageArr);
        $strReplArr = array('[', ']', '"');
        $imgString = str_replace($strReplArr, "", $jsImg);
        $thmbnlImg  = $imageDir  . str_replace($strReplArr, "", $imageArr[0]);
        //---------------------------------------------------------

        echo "<div id =\"divCommon\" class=\"thumblist_$uniqueId col-xs-12 col-md-4\" >";    // #divCommon start
        echo "<div class=\"thumbnail tn_$uniqueId\">";  // .thumbnail starts
        if ($numimage == 0) {
            echo "<a href=\"javascript:void(0)\" onclick=\"swap($id,'$itemName')\" >";
            echo "<div><img class=\"img-thumbnail thumb-image\" src=\"$thmbnlImg\"></div></a>";
        } else {
            echo "<a href=\"javascript:void(0)\"
			onclick=\"swap($id,'$itemName')\">";
            echo "<div >	<img class=\"img-thumbnail thumb-image\" src=\"$thmbnlImg\"></div></a>";
        }
        //-------------------------------------------------------------------
        echo "<div class=\"caption\">";  // .caption start
        echo "<a href=\"javascript:void(0)\"
        onclick=\"swap($id,'$itemName')\">";
        $commonViewObj->displayTitle($this->_pItem);
        echo "</a>";
        $commonViewObj->displayLocation($this->_pItem);
        $commonViewObj->displayUpldTime($this->_pItem);
        $commonViewObj->displayPrice($this->_pItem);
        $commonViewObj->displayMarketType($this->_pItem);
        //---------------------------------------------------------
        echo "</div>"; // .caption end
        echo "</div>"; // .thumbnail end
        echo "</div>"; // #divCommon end
        //---------------------------------------------------------
        echo "<div style =\"display:none;\" class=\"featured_detailed2 col-xs-12 col-md-12\" id=\"divDetail_$uniqueId\">"; // .featured_detailed2 start
        echo "<div id=\"featured_right_sideRemove\" class=\"col-xs-12 col-md-4 align-center\">";    // start div for the left side of the item detailed section 
        echo "<div class=\"showbutton_hideRemove  col-xs-12 col-md-12\" style=\"margin-bottom:5px\" >
		<input class=\"hide-detailRemove btn btn-primary btn-xs\" style=\"width:100%\" type=\"button\"  onclick=\"swapback($id,'$itemName')\"
		value=\"" . $GLOBALS['lang']['Hide Detail'] . "\"/></div>";
        $commonViewObj->displayTitle($this->_pItem);
        $this->_pItem->display();
        $commonViewObj->displayPrice($this->_pItem);
        $commonViewObj->displayContactMethod($uniqueId,  $this->_pItem, $itemName);
        $commonViewObj->displayMailCfrm($uniqueId, $id, $itemName);
        $commonViewObj->displayReportReq($uniqueId, $id, $itemName);
        $commonViewObj->displayMailForm($uniqueId, $id, $itemName,  $this->_pItem->getIdUser());
        $commonViewObj->displayReportCfrm($uniqueId, $id, $itemName);
        echo "</div>"; // left side div end
        $commonViewObj->displayGallery($imageDir, $imageArr, $numimage, $id, $itemName);
        echo "</div>"; // .featured_detailed2 end


    }

    /**
     * Main interface to display item
     * e.g.
     *  (new HtMainView("all",null))->show();    // select * from all  (car, computer, ...)
     *  (new HtMainView("car",null))->show();     // select * car
     *  (new HtMainView("car",13))->show();       // select * car where id=13
     *  (new HtMainView("latest",null))->show();  //select * latestupdate 
     *  
     * @param resolved by construtor
     */
    public function upload()
    {
        $this->_pItem = ObjectPool::getInstance()->getObjectWithId($this->_runnerName, $this->_runnerId, null);
        $this->_pItem->upload();
    }

    /**
     *  This function shows a search result
     * 
     */
    public function displaySearch()
    {
        global $locationPerTable, $lang, $str_url, $lang_url;

        $searchWordSanitized = $_GET['search_text'];
        $city = $_GET['cities'];
        $item = $_GET['item'];
        $globalVarObj = new HtGlobal();
        $page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
        $itemstart = ($page - 1) * $globalVarObj::get('itemPerPage');

        if ($searchWordSanitized == "" and $city == "000" and $item == "000") {
            $this->itemNotFound($searchWordSanitized, $city, $item);
        } else if ($searchWordSanitized == "" and ($city == "All" or $city == "000") and ($item == "All" or $item == "000")) {
            $this->showLatest();
        } else {

            // To avoid a wildcard value for search word 
            if ($searchWordSanitized == "") {
                $keyWord = "%";
            } else {
                $keyWord = $searchWordSanitized;
            }

            // To set value for city
            if ($city == "All" or $city == "000") {
                $location = "%";
            } else {
                $location = $city;
            }

            // To set value for item
            if ($item == "All" or $item == "000") {
                $queryItem = ObjectPool::getInstance()->getObjectSpecial("all");
            } else {
                $queryItem = ObjectPool::getInstance()->getObjectSpecial($item);
            }

            $rows = 0;
            foreach ($queryItem as $key => $value) {
                $row =  $value->searchQuery($keyWord, $location);
                $rows += $row;
            }

            if ($rows > 0) {
                foreach ($queryItem as $key => $value) {
                    $this->_pItem = $value;
                    $calculatePageArray = calculatePage($rows);
                    $globalVarObj = new HtGlobal();
                    $start = ($calculatePageArray[0] - 1) * $globalVarObj::get('itemPerPage');
                    $res = $value->searchQuery($keyWord, $location, $start, $globalVarObj::get('itemPerPage'));
                    $result = $value->getResultSet();
                    echo '<div class="row items-board">';
                    while ($row = $result->fetch_assoc()) {
                        $this->showItemWithId($row);
                    }
                    echo '</div>';
                }
                $get_array = $_GET;
                search_item_pagination($calculatePageArray[0], $calculatePageArray[1], $get_array);
            } else {
                $this->itemNotFound();
            }
        }
    }

    /**
     * Shall be used when there is no item to show
     * This function shall expect to take more args for search
     */
    public function itemNotFound($searchWordSanitized = null, $city = null, $item = null)
    {
        echo '<div id="spanMainColumnXRemove" class="jumbotron divItemNotFind">';
        echo '<p class="col-xs-12 col-md-12 bg-primary">' . $GLOBALS["lang"]["search res"] . '</p>';
        echo '<div id="spanMainColumnXRemove" style="color: red">';
        echo $GLOBALS['lang']['full no match msg'];
        echo '</div></div>';
    }
}
