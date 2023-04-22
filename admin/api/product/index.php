<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: *');

    include '../connect.php';
    $db = new DBconnect;
    $con = $db->connect();
    //print_r($con);
    //print_r(file_get_contents('php://input'));
    $method = $_SERVER['REQUEST_METHOD'];
    switch($method){
        case 'GET':
            $sql = "SELECT * FROM PRODUCT";
            $path = explode('/', $_SERVER['REQUEST_URI']);
            if( isset($path[5])){
                $sql = "SELECT * FROM PRODUCT WHERE id = $path[5]";
            }
            $stmt = $con->prepare($sql);
            // $stmt->execute();
            // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // echo json_encode($result);
            if( $stmt->execute()){
                $res = ['status'=> 200, 'message'=>
                'Product created successfully'];
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($result);
                return;
            } else{
                $res = ['status'=> 400, 'message'=>
                'Product created failed'];
            }
            $error_info = $stmt->errorInfo();
            if ($error_info[0] != '00000') {
                echo 'PDO Error: ' . $error_info[2];
            }
            echo json_encode($res);
            break;
        case 'POST':
            if(isset($_POST['id'])){
                if(isset($_FILES['image']) ){
                    $id = $_POST['id'];
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $description = $_POST['description'];
                    $amount = $_POST['amount'];
                    $file_name = $_FILES['image']['name'];
                    $tmp = $_FILES['image']['tmp_name'];
                    $file_path = $_SERVER['DOCUMENT_ROOT'].'./admin/img'.'/'.$file_name;
                   
    
                    $sql="UPDATE PRODUCT SET Name = ?, price = ?, description = ?, amount = ?, image = ? WHERE id = ?";
                    $stmt = $con->prepare($sql);
                    $DateCreate = date('Y-m-d');
                    $type = "no";
                    
        
                    if( $stmt->execute([$name, $price, $description,$amount,$file_name, $id])){
                        move_uploaded_file($tmp, $file_path);
                        $res = ['status'=> 200, 'message'=>
                        'Product edited successfully'];
                    } else{
                        $res = ['status'=> 400, 'message'=>
                        'Product edited failed'];
                    }
                    $error_info = $stmt->errorInfo();
                    if ($error_info[0] != '00000') {
                        echo 'PDO Error: ' . $error_info[2];
                    }
                    echo json_encode($res);
                } else{
                    die( "PUT_ERROR: file not read");
                }
               
            }
            else if(isset($_FILES['image']) ){

                $name = $_POST['name'];
                $price = $_POST['price'];
                $description = $_POST['description'];
                $amount = $_POST['amount'];
                $file_name = $_FILES['image']['name'];
                $tmp = $_FILES['image']['tmp_name'];
                $file_path = $_SERVER['DOCUMENT_ROOT'].'./admin/img'.'/'.$file_name;
               

                $sql="INSERT INTO PRODUCT(Name, price, description, amount, image) VALUES (?,?,?,?,?)";
                $stmt = $con->prepare($sql);
                $DateCreate = date('Y-m-d');
                $type = "no";
                
    
                if( $stmt->execute([$name, $price, $description,$amount,$file_name])){
                    move_uploaded_file($tmp, $file_path);
                    $res = ['status'=> 200, 'message'=>
                    'Product created successfully'];
                } else{
                    $res = ['status'=> 400, 'message'=>
                    'Product created failed'];
                }
                $error_info = $stmt->errorInfo();
                if ($error_info[0] != '00000') {
                    echo 'PDO Error: ' . $error_info[2];
                }
                echo json_encode($res);
            } else{
                die( "POST_ERROR: file not read");
            }
            break;
        
        case "DELETE":
            $path = explode('/', $_SERVER['REQUEST_URI']);
            $product = $path[5];
            $sql="DELETE FROM PRODUCT WHERE id IN ($product)";
            $stmt = $con->prepare($sql);
            if( $stmt->execute()){
                $res = ['status'=> 200, 'message'=>
                'Product deleted successfully'];
            } else{
                $res = ['status'=> 400, 'message'=>
                'Product deleted failed'];
            }
            $error_info = $stmt->errorInfo();
            if ($error_info[0] != '00000') {
                echo 'PDO Error: ' . $error_info[2];
            }
            echo json_encode($res);
            break;
        default:
            echo "Method not allowed";
            break;
    }
?>