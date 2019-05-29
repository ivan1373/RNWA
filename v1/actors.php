<?php



$request_method=$_SERVER["REQUEST_METHOD"];

switch($request_method)
{
    case 'GET':
        // Retrieve Actors
        if(!empty($_GET["id"]))
        {
            $id=intval($_GET["id"]);
            get($id);
        }
        else
        {
            get();
        }
        break;
    case 'POST':
    // Insert Actor
        insert();
        break;
    case 'PUT':
    // Update Actor
        $id=intval($_GET["id"]);
        update($id);
        break;
    case 'DELETE':
    // Delete Actor
        $id=intval($_GET["id"]);
        delete($id);
        break;
    default:
        // Invalid Request Method
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}

function get($id=0)
{
    include ('../db.php');

    $query="SELECT * FROM sakila.actor";
    if($id != 0)
    {
        $query.=" WHERE actor_id=".$id." LIMIT 1";
    }
    $response=array();
    $result=mysqli_query($conn, $query);
    while($row=mysqli_fetch_assoc($result))
    {
        $response[]=$row;
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

function insert()
{
    include ('../db.php');

    $data = json_decode(file_get_contents('php://input'), true);
    $first_name=$data["first_name"];
    $last_name=$data["last_name"];
    $query="INSERT INTO sakila.actor(first_name,last_name) VALUES('".$first_name."','".$last_name."')";
    if(mysqli_query($conn, $query))
    {
        $response=array(
            'status' => 1,
            'status_message' =>'Actor '.$first_name.' '.$last_name.' Added Successfully.'
        );
    }
    else
    {
        $response=array(
            'status' => 0,
            'status_message' =>'Actor Addition Failed.'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

function update($id)
{
    include ('../db.php');

    $data = json_decode(file_get_contents("php://input"),true);
    //$id = $data["id"];
    $actor_name=$data["first_name"];
    $actor_lname=$data["last_name"];
    $last_update=$data["last_update"];

    $query="UPDATE sakila.actor SET first_name='".$actor_name."', last_name='".$actor_lname."', last_update=".$last_update." WHERE actor_id=".$id;
    if(mysqli_query($conn, $query))
    {
        $response=array(
            'status' => 1,
            'status_message' =>'Actor '.$actor_name.' '.$actor_lname.' with id of '.$id.' updated Successfully.'
        );
    }
    else
    {
        $response=array(
            'status' => 0,
            'status_message' =>'Actor Updation Failed.'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

function delete($id)
{
    include ('../db.php');

    $query="DELETE FROM sakila.actor WHERE actor_id=".$id;
    if(mysqli_query($conn, $query))
    {
        $response=array(
            'status' => 1,
            'status_message' =>'Actor deleted successfully'
        );
    }
    else
    {
        $response=array(
            'status' => 0,
            'status_message' =>'Actor Deletion Failed.'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>