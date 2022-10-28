<?php
class Person{
    public $name;
     function set_name($name)
     {
         $this->name = $name;
     }
    function get_name()
    {
        return $this->name;
    }
}
$per = new Person();
$per->set_name("Eman");
echo $per->get_name();

