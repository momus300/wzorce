<?php
/**
 * Created by PhpStorm.
 * User: momus
 * Date: 10/19/16
 * Time: 5:40 AM
 */

namespace Proxy;

interface HighResolutionImage
{
    function display();
}

class Image implements HighResolutionImage
{
    private $options;

    public function __construct($options)
    {
        $this->options = $options;
        // generate image
    }

    public function display()
    {
        echo 'display image';
    }
}

class ProxyImage implements HighResolutionImage
{
    private $options;
    private $passwrd;
    private $image = null;

    public function __construct($options, $password)
    {
        $this->options = $options;
        $this->passwrd = $password;
    }

    public function display()
    {
        if ($this->passwrd == 'tajne') {
            if ($this->image == null) {
                $this->image = new Image($this->options);
            }
            $this->image->display();
        } else {
            echo 'Access denied';
        }
    }
}

$image = new ProxyImage(array('width' => 3800, 'height' => 2000), 'tajne');
$image2 = new ProxyImage(array('width' => 3800, 'height' => 2000), 'tajne2');
$image->display(); // wyswietli "display image"
$image2->display(); // wyswietli "Access denied"