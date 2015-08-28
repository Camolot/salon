<?php
    /**
    * @backupGlobals disabled
    * @backup StaticAttributes disabled
    */

    require_once "src/Stylist.php";

    $server = 'mysql:host=localhost;dbname=stylist_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StylistTest extends PHPUnit_Framework_TestCase
    {

      protected function tearDown()
      {
        Stylist::deleteAll();
      }

      function test_save()
      {
        //array_change_key_case
        $name = "Michael";
        $id = null;
        $test_stylist = new Stylist($name, $id);

        //Act
        $test_stylist->save();

        //Assert
        $result = Stylist::getAll();
        $this->assertEquals($test_stylist, $result[0]);
      }

      function testGetAll()
      {
        //Arrange
        $name = "Michael";
        $id = null;
        $test_stylist = new Stylist($name, $id);
        $test_stylist->save();

        $name2 = "John";
        $id2 = null;
        $test_stylist2 = new Stylist($name2, $id2);
        $test_stylist2->save();

        //Act
        $result = Stylist::getAll();

        //Assert
        $this->assertEquals([$test_stylist, $test_stylist2]);
      }

      function testDeleteAll()
      {
        //Arrange
        $name = "Michael";
        $id = null;
        $test_stylist = new Stylist($name, $id);
        $test_stylist->save();

        $name2 = "John";
        $id2 = null;
        $test_stylist2 = new Stylist($name2, $id2);
        $test_stylist2->save();

        //Act
        Stylist::deleteAll();

        //Assert
        $result = Stylist::getAll();
        $this->assertEquals([], $result);
      }
    }


?>
