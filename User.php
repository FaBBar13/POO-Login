<?php

require_once __DIR__ . '/ConnectBdd.php';

class User extends ConnectBdd
{

    protected $id_user = '';
    protected $id_email = '';
    protected $id_pwd = '';
    protected $id_nom = '';
    protected $id_prenom = '';


    public function __construct(
        $id_user = '',
        $id_email = '',
        $id_pwd = '',
        $id_nom = '',
        $id_prenom = ''
    ) {
        $this->id_user = $id_user;
        $this->id_email = $id_email;
        $this->id_pwd = $id_pwd;
        $this->id_nom = $id_nom;
        $this->id_prenom = $id_prenom;

    }

    public function insertUser($email, $pwd, $nom, $prenom)
    {
        $req = $this->connexion()->prepare(
            'INSERT INTO users (id_email,id_pwd,id_nom,id_prenom) VALUES (:email,:pwd,:nom,:prenom)'
        );

        return $req->execute([
            ':email' => $email,
            ':pwd' => password_hash($pwd, PASSWORD_DEFAULT),
            ':nom' => $nom,
            ':prenom' => $prenom
        ]);

    }

    public function connectUser($email, $pwd)
    {
        $req = $this->connexion()->prepare(
            'SELECT id_user, id_email,id_pwd,id_nom,id_prenom FROM users WHERE id_email=? '
        );

        if ($req->execute([$email]) && $item = $req->fetch()) {
            if (password_verify($pwd, $item['id_pwd'])) {

                return new User(
                    $item['id_user'],
                    $item['id_email'],
                    $item['id_pwd'],
                    $item['id_nom'],
                    $item['id_prenom']
                );
            }

        }
        return null;
    }





}