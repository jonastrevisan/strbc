<?php
final class conecta {

    private $link;

    public function __construct()
    {
        if (! $this->link = new mysqli("localhost", "root", "", "strbc_sindicato")) {
            trigger_error('Error: Could not make a database link using ' . $username . '@' . $hostname);
        }
        
        mysqli_query($this->link, "SET NAMES 'utf8'");
        mysqli_query($this->link, "SET CHARACTER SET utf8");
        mysqli_query($this->link, "SET CHARACTER_SET_CONNECTION=utf8");
        mysqli_query($this->link, "SET SQL_MODE = ''");
      /*  mysqli_query("SET NAMES 'utf8'");
        mysqli_query('SET character_set_connection=utf8');
        mysqli_query('SET character_set_client=utf8');
        mysqli_query('SET character_set_results=utf8');*/
    }

    public function query($sql)
    {
        if ($this->link) {
            
            $result = $this->link->query($sql);
            
            if ($result) {
                return $result;
                
                $contatos = array();
                $i = 0;
                while ($item = $result->fetch_assoc()) {
                    $contatos[$i] = $item;
                    $i ++;
                }
                // $result->free();
                return $contatos;
            } else {
                trigger_error('Error: ' . mysqli_error($this->link) . '<br />Error No: ' . mysqli_error($this->link) . '<br />' . $sql);
                exit();
            }
        }
    }

    public function query_num_rows($sql)
    {
        return mysql_num_rows($query);
    }

    public function escape($value)
    {
        if ($this->link) {
            return mysqli_real_escape_string($this->link, $value);
        }
    }

    public function countAffected()
    {
        if ($this->link) {
            return mysqli_affected_rows($this->link);
        }
    }

    public function getLastId()
    {
        if ($this->link) {
            return mysqli_insert_id($this->link);
        }
    }
    
    public function getError()
    {
        if ($this->link) {
            mysqli_error($this->link);
        }
    }

    public function __destruct()
    {
        if ($this->link) {
            mysqli_close($this->link);
        }
    }
}
?>