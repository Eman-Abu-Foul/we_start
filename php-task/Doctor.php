<?php
class Doctor{
    public $specialty;
    function set_specialty($specialty)
    {
        $this->specialty = $specialty;
    }
    function get_specialty()
    {
        return $this->specialty;
    }
}
$dr = new Doctor();
$dr->set_specialty("orthopedic");
echo $dr->get_specialty();
