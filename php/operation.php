<?php
require_once("db.php");
require_once("components.php");

$con = Createdb();

//Create button

if (isset($_POST['create'])) {
    createData();
}

if (isset($_POST['update'])) {
    updateData();
}
if (isset($_POST['delete'])) {
    deleteRecord();
}
if (isset($_POST['deleteall'])) {
    deleteAll();
}
function createData()
{
    $bookName = textboxValue(value: "book_name");
    $bookPublisher = textboxValue(value: "book_publisher");
    $bookPrice = textboxValue(value: "book_price");

    if ($bookName && $bookPublisher && $bookPrice) {
        $sql = "INSERT INTO books(book_name, book_publisher, book_price)
        VALUES('$bookName','$bookPublisher','$bookPrice')";

        if (mysqli_query($GLOBALS['con'], $sql)) {
            TextNode(classname: "success", msg: "Record Successfully Inserted!");
            echo "";
        } else {
            echo "Error";
        }
    } else {
        TextNode(classname: "error", msg: "Provide Data in Textbox");
    }
}

function textboxValue($value)
{
    $textbox = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
    if (empty($textbox)) {
        return false;
    } else {
        return $textbox;
    }
}


//message
function TextNode($classname, $msg)
{
    $element = "<h6 class='$classname'>$msg</h6>";
    echo $element;
}


function getData()
{
    $sql = "SELECT*FROM books";
    $result = mysqli_query($GLOBALS['con'], $sql);

    if (mysqli_num_rows($result) > 0) {
        return $result;
    }
}

function updateData()
{
    $bookId = textboxValue(value: "book_id");
    $bookName = textboxValue(value: "book_name");
    $bookPublisher = textboxValue(value: "book_publisher");
    $bookPrice = textboxValue(value: "book_price");

    if ($bookName && $bookPublisher && $bookPrice) {
        $sql = "
        UPDATE books SET book_name= '$bookName', book_publisher = '$bookPublisher', book_price='$bookPrice' WHERE id='$bookId';
        ";

        if (mysqli_query($GLOBALS['con'], $sql)) {
            TextNode(classname: "success", msg: "Data successfully updated!");
        } else {
            TextNode(classname: "error", msg: "Enable to update data!");
        }
    } else {
        TextNode(classname: "error", msg: "Select data from edit icon!");
    }
}

function deleteRecord()
{
    $bookId = (int)textboxValue(value: "book_id");

    $sql = "DELETE FROM books WHERE id=$bookId";

    if (mysqli_query($GLOBALS['con'], $sql)) {
        TextNode(classname: "success", msg: "Record Deleted successfully!");
    } else {
        TextNode(classname: "error", msg: "Enable to delete record!");
    }
}

function deleteBtn()
{
    $result = getData();
    $i = 0;
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $i++;
            if ($i > 3) {
                buttonElement(btnId: "btn-deleteall", styleClass: "btn btn-danger", text: "<i class='fas fa-trash'></i> Delete All", name: "deleteall", attr: "");
                return;
            }
        }
    }
}
function deleteAll()
{
    $sql = "DROP TABLE books";

    if (mysqli_query($GLOBALS['con'], $sql)) {
        TextNode(classname: "success", msg: "All record Deleted successfully!");
        Createdb();
    } else {
        TextNode(classname: "error", msg: "Record cannot deleted");
    }
}

function setID()
{
    $getid = getData();
    $id = 0;
    if ($getid) {
        while ($row = mysqli_fetch_assoc($getid)) {
            $id = $row['id'];
        }
    }
    return ($id +1);
}
