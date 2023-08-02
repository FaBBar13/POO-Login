<?php
class User
{
    private $id_email;
    private $id_password;

    public function __construct($id_email, $id_password)
    {
        $this->id_email = $id_email;
        $this->id_password = $id_password;

    }

    public function getEmail()
    {
        return $this->id_email;
    }


}
?>