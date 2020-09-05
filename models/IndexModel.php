<?php

class IndexModel extends Model
{

    public function getTasks()
    {
        $sql = "SELECT *
                FROM tasks
                        ";

        $result = array();
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[$row['id']] = $row;
        }
        return $result;
    }

    public function getTaskOne($id)
    {
        $sql = "SELECT *
                FROM tasks where id=" . $id . "
                        ";
        $result = array();
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    public function updateTaskValue($post)
    {
        if ($post["status"]) {
            $post["status"] = 1;
        } else {
            $post["status"] = 0;
        }
        $sql = "UPDATE `tasks` SET `name` = 
'" . $post["name"] . "',`email` = '" . $post["email"] . "
',`text` = '" . $post["text"] . "' ,`status` = " . $post["status"] . "
 WHERE `tasks`.`id` = " . $_GET["id"];
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return true;
    }

    public function getLimitTasks($leftLimit, $rightLimit)
    {
        $result = array();
        $i = 0;
        $sql = "SELECT * FROM tasks";
        if ($_GET) {
            foreach ($_GET as $key => $value) {
                if ($i == 0) {
                    $operator = " WHERE ";
                } else {
                    $operator = " AND ";
                }
                if ($key != 'page' && $key != 'status' && $value != '') {
                    $sql .= $operator . $key . " like '%" . $value . "%'";
                    $i++;
                } elseif ($key == 'status' && $value != '') {
                    $sql .= $operator . $key . " = " . $value;
                    $i++;
                }
            }

        }
        $sql .= " LIMIT :leftLimit, :rightLimit";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":leftLimit", $leftLimit, PDO::PARAM_INT);
        $stmt->bindValue(":rightLimit", $rightLimit, PDO::PARAM_INT);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[$row['id']] = $row;
        }
        return $result;

    }

    public function setTaskValue($post)
    {
        $sql = "INSERT INTO `tasks` (`id`,`name`,`email`, `text`) VALUES 
(null ,'" . $post["name"] . "','" . $post["email"] . "', '" . $post["text"] . "')";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return true;
    }

}
