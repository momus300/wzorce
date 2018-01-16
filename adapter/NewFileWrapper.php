<?php
/**
 * Created by PhpStorm.
 * User: momus
 * Date: 10/19/16
 * Time: 5:37 AM
 */

namespace Adapter;

interface OldXML
{
    public function writeXml();
}

class NewXML
{
    public function xml()
    {
        echo "Kod XML";
    }
}

class XML implements OldXML
{
    public function writeXml()
    {
        $adaptee = new NewXML();
        $adaptee->xml();
    }
}

//test
$client = new XML();
$client->writeXml(); // wyswietli "Kod XML"