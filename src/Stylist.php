<?php
    class Stylist
    {
      private $name;
      private $id;

      function __construct($name, $id = null)
      {
        $this->name = $name;
        $this->id = $id;
      }

      function save()
      {
        $GLOBALS['DB']->exec("INSERT INTO stylist (name, date) VALUES ('{$this->getName()}');");
        $this->id = $GLOBALS['DB']->lastInsertId();
      }

      function setName($new_name)
      {
        $this->name = (string) $new_name;
      }

      function getName()
      {
        return $this->name;
      }

      function getId()
      {
        return $this->id;
      }

      static function getAll()
      {
        $returned_stylists = $GLOBALS['DB']->query("SELECT * FROM stylists;");
        $stylists = array();
        foreach($returned_stylists as $stylist) {
          $name = $stylist['name'];
          $id = $stylist['id'];
          $new_stylist = new Stylist($name, $id);
          array_push($stylists, $new_stylist);
        }
        return $stylists;
      }

      static function deleteAll()
      {
        $GLOBALS['DB']->exec("DELETE FROM stylists;");
      }
    }
?>
