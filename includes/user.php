<?php
include_once 'db.php';

class User extends DB{
    private $nombre;
    private $username;
    private $tipo_usuario;
    private $RFC;

 
    public function userExists($user, $pass){
        $md5pass = md5($pass);
        $query = $this->connect()->prepare('SELECT * FROM usuario WHERE UserName = :user AND password = :pass');
        $query->execute(['user' => $user, 'pass' => $md5pass]);

        if($query->rowCount()){
            $row = $query->fetch();
            $this->nombre = $row['Nombre'];
            $this->username = $row['UserName'];
            $this->tipo_usuario = $row['tipo_usuario'];
            $this->RFC = $row['rfcu'];
            return true;
        }else{
            return false;
        }
    }

    public function setUser($user){
        $query = $this->connect()->prepare('SELECT * FROM usuario WHERE UserName = :user');
        $query->execute(['user' => $user]);        
        foreach ($query as $currentUser) {
            $this->nombre = $currentUser['Nombre'];
            $this->usename = $currentUser['UserName'];
            $this->tipo_usuario = $currentUser['tipo_usuario'];
            $this->RFC = $currentUser['rfcu'];
        }
    }
    public function compUser($tipoUser) {
        $query = $this->connect()->prepare('SELECT * FROM profesor WHERE RFC = :RFC');
        $query->bindParam(':RFC', $tipoUser, PDO::PARAM_STR);
        $query->execute();
    
        if ($query->rowCount() > 0) {
            // El profesor con el RFC proporcionado existe en la base de datos
            // Puedes acceder a los datos del profesor aquí si es necesario
            $profesor = $query->fetch(PDO::FETCH_ASSOC);
            return true;
        } else {
            // El profesor no se encontró en la base de datos
            return false;
        }
    }
    
    public function getTipoUsuario(){
        $userSetU = array('tipo_usuario' => $this->tipo_usuario, 'RFC' => $this->RFC, 'nombre' => $this->nombre);
        return $userSetU;
    }
    
}

?>