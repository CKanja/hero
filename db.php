<?php

namespace Data;

class Database
{

    private $connection;

    public function connect_db()
    {
        $this->connection = mysqli_connect("localhost", 'root', "", 'hero');
        if (mysqli_connect_error()) {
            die("Database Connection Failed" . mysqli_connect_error() . mysqli_connect_errno());
        }
    }

    /**
     * @param $name
     * @param $real_name
     * @param $short_bio
     * @param $long_bio
     * @param $images
     * @return bool
     */
    public function create($name, $real_name, $short_bio, $long_bio, $images)
    {
        $sql = "INSERT INTO `hero`(`name`, `real_name`, `short_bio`, `long_bio`,`images`) VALUES ('$name','$real_name','$short_bio','$long_bio','$images')";
        $res = mysqli_query($this->connection, $sql);
        return (bool)$res;
    }

    /**
     * @param $id
     * @param $name
     * @param $real_name
     * @param $short_bio
     * @param $long_bio
     * @param $images
     
     * @return bool
     */
    public function update($id, $name, $real_name, $short_bio, $long_bio, $images)
    {
        $sql = "UPDATE `hero` SET `name`='$name',`real_name`='$real_name',`short_bio`='$short_bio',`long_bio`='$long_bio',`images`='$images' WHERE `id` = '$id'";
        $res = mysqli_query($this->connection, $sql);
        return (bool)$res;
    }

    public function updateNoImage($id, $name, $real_name, $short_bio, $long_bio)
    {
        $sql = "UPDATE `hero` SET `name`='$name',`real_name`='$real_name',`short_bio`='$short_bio',`long_bio`='$long_bio' WHERE `id` = '$id'";
        $res = mysqli_query($this->connection, $sql);
        return (bool)$res;
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $sql = "DELETE FROM `hero` WHERE id=$id";
        $res = mysqli_query($this->connection, $sql);
        return (bool)$res;
    }

    /**
     * @param $id
     * @return bool|\mysqli_result
     */
    public function read($id = null)
    {
        $sql = "SELECT * FROM `hero`";
        if ($id) {
            $sql .= " WHERE `id` = '$id'";
        }
        return mysqli_query($this->connection, $sql);
    }

    /**
     * @param $value
     * @return string
     */
    public function sanitize($value)
    {
        return mysqli_real_escape_string($this->connection, $value);
    }
}

$database = new Database();
$database->connect_db();
