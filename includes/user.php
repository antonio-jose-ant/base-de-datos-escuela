<?php
include_once 'db.php';

class User extends DB{
    private $nombre;
    private $username;
    private $tipo_usuario;

 
    public function userExists($user, $pass){
        $md5pass = md5($pass);
        $query = $this->connect()->prepare('SELECT * FROM usuario WHERE UserName = :user AND password = :pass');
        $query->execute(['user' => $user, 'pass' => $md5pass]);

        if($query->rowCount()){
            $row = $query->fetch();
            $this->nombre = $row['nombre'];
            $this->username = $row['username'];
            $this->tipo_usuario = $row['tipo_usuario'];
            return true;
        }else{
            return false;
        }
    }

    public function setUser($user){
        $query = $this->connect()->prepare('SELECT * FROM usuario WHERE UserName = :user');
        $query->execute(['user' => $user]);        
        foreach ($query as $currentUser) {
            $this->nombre = $currentUser['nombre'];
            $this->usename = $currentUser['username'];
            $this->tipo_usuario = $currentUser['tipo_usuario'];
        }
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getTipoUsuario(){
        return $this->tipo_usuario;
    }
}

?>