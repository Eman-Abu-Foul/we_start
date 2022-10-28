<?php
class Teacher{
    public $university;
    function set_university($university)
    {
        $this->university = $university;
    }
    function get_university()
    {
        return $this->university;
    }
}
$dr = new Teacher();
$dr->set_university("AL-AQSA");
echo $dr->get_university();
