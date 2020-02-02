<?php

class User{
	
	public static function Create($data){
        global $db;
        $full_name = $data['surName'].' '.$data['name'];
        $password = password_hash($data['password'],PASSWORD_DEFAULT) ;
        try {
            $sql = "INSERT INTO users (name,email,avatar,password,created_at,updated_at) VALUES (?,?,?,?,?,?)";
            $db->prepare($sql)->execute([$full_name, $data['email'], $data['avatar'],$password,time(),time()]);
        }catch (Exception $e){
            $db->rollback();
            throw $e;
        }
	}

    public static function CheckUser($email){
        global $db;
        try {
            $stmt = $db->prepare("SELECT `id` FROM users WHERE email=:email");
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch();

            if(!empty($user)) return true;
            return false;
        }catch (Exception $e){
            $db->rollback();
            throw $e;
        }
    }

    public static function CheckUserPassword($email){//Можно обьеденить с CheckUser, но тогда будут магические методы)
        global $db;
        try {
            $stmt = $db->prepare("SELECT `password` FROM users WHERE email=:email");
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch();

            if(!empty($user)) return $user['password'];
            return false;
        }catch (Exception $e){
            $db->rollback();
            throw $e;
        }
    }

    public static function UserData($email){
        global $db;
        try {
            $stmt = $db->prepare("SELECT `name`,`email`,`avatar` FROM users WHERE email=:email");
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch();

            if(!empty($user)) return $user;
            return false;
        }catch (Exception $e){
            $db->rollback();
            throw $e;
        }
    }
}
