<?php

class AjaxRegisterController{

	public function handleRequest(){
        header('Content-type: application/json');
        if(!empty($_POST)){
            $data = $_POST;

            $err=[];

            if(!empty($data['surName'])){
                if(validatorStr($data['surName'])) $err['surName']='Check box';
            }else{
                $err['surName']='Not surName Data';
            }
            if(!empty($data['name'])){
                if(validatorStr($data['name'])) $err['name']='Check box';
            }else{
                $err['name']='Not name Data';
            }
            if(!empty($data['email'])){
                if(validatorEmail($data['email'])) $err['email']='Check box';
                if(User::CheckUser($data['email'])) $err['email']='Email register';
            }else{
                $err['email']='Not email Data';
            }
            if(!empty($data['password'])){
                if(validatorPass($data['password'])) $err['password']='Check box';
            }else{
                $err['password']='Not Data';
            }
            if(!empty($data['password']) && !empty($data['repeatPassword']) && $data['repeatPassword'] !== $data['password']){
                $err['repeatPassword']='Passwords do not match';
                $err['password']='Passwords do not match';
            }

            if(empty($err)){
                if(!empty($_FILES['userAvatar'])){
                    $fileTmpPath = $_FILES['userAvatar']['tmp_name'];
                    $fileName = $_FILES['userAvatar']['name'];
//                    $fileSize = $_FILES['userAvatar']['size'];
                    $fileType = $_FILES['userAvatar']['type'];
                    $fileSize = filesize($_FILES['userAvatar']['tmp_name']);
                    if ($fileSize > 1024 * 1024){
                        $err['userAvatar']='Big file';
                        $response = ['error'=>'Big file','result'=>104,'data'=>$err];
                        echo json_encode($response);
                        exit;
                    }else{
                        $fileNameCmps = explode(".", $fileName);
                        $fileExtension = strtolower(end($fileNameCmps));
                        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                        $allowedfileExtensions = array('jpg', 'gif', 'png');
                        $valid_types = array('image/jpg','image/jpeg','image/gif','image/png');
                        if(in_array($fileExtension, $allowedfileExtensions) && in_array($fileType, $valid_types)) {
                            $uploadFileDir = $_SERVER['DOCUMENT_ROOT'].'/upload/user/';//Можно сделать по году и месяцу
                            $dest_path = $uploadFileDir . $newFileName;
                        if(move_uploaded_file($fileTmpPath, $dest_path))
                        {
                            $data['avatar'] = $newFileName;
                            User::create($data);
                            $response = ['success'=>'Ok data','result'=>100, 'status'=>'register', 'redirect'=>$GLOBALS['APP_URL']];
                            echo json_encode($response);
                            exit;
                        }
                        else
                        {
                            http_response_code(422);
                            $err['userAvatar']='Error file';
                            $response = ['error'=>'Error file','result'=>104,'data'=>$err];
                            echo json_encode($response);
                            exit;
                        }
                        }
                    }
                }
            }else{
                http_response_code(422);
                $response = ['error'=>'Not data','result'=>104,'data'=>$err];
                echo json_encode($response);
                exit;
            }
        }else{
            http_response_code(422);
            $response = ['error'=>'Not data','result'=>104,'data'=>'sorry'];
            echo json_encode($response);
            exit;
        }

	}
}
