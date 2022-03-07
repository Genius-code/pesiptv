<?php 

//Function Create Variables as name of input 
function create_vars(array $data)
{
    foreach($data as $key => $value){
        
        $GLOBALS[$key] = htmlspecialchars(strip_tags(trim($value)));
    }
}
//Function to get Title
function get_title()
{
    global $title;
    if (isset($title)) {
        echo $title;
    }
}
/*
 * Function check pending items
 */
function checkItem($select,$table,$value)
{
    global $pdo;
    $stmt = $pdo->prepare("SELECT $select FROM $table WHERE $select = ?");
    $stmt->execute(array($value));
    $count = $stmt->rowCount();
    return $count;
}

/*
 * Function Get Count Number of items From Database
 * $item = name of column we need form database
 * $table = name of table we want.
 */
function countItems($item, $table)
{
    global $pdo;
    $stmt = $pdo->prepare("SELECT COUNT($item) FROM $table");
    $stmt->execute();
    return $stmt->fetchColumn();

}
//Function To Show data 
function show_data($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}
