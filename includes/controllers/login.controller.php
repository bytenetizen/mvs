<?php

class LoginController{

	public function handleRequest(){
        if(!empty($_POST)){
            header('Content-type: application/json');
            $data = $_POST;
            $err=[];

            if(!empty($data['email'])){
                if(validatorEmail($data['email'])) $err['email']='Check box';
                if(!User::CheckUser($data['email'])) $err['email']='login or password does not match';
            }else{
                $err['email']='Not email Data';
            }
            if(!empty($data['password'])){
                if(validatorPass($data['password'])) $err['password']='Check box';
            }else{
                $err['password']='Not Data';
            }

            if(empty($err)){
                if(password_verify($data['password'],User::CheckUserPassword($data['email']))){
                    $_SESSION['user_login'] = User::UserData($data['email']);
                    $response = ['success'=>'Ok login','result'=>100,'redirect'=>$GLOBALS['APP_URL']];
                    echo json_encode($response);
                }else{
                    $err['password']='login or password does not match';
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
