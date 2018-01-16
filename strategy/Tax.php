<?php
/**
 * Created by PhpStorm.
 * User: momus
 * Date: 10/19/16
 * Time: 5:41 AM
 */

namespace Strategy;

interface Tax
{
    public function count($net);
}

class TaxPL implements Tax
{
    public function count($net)
    {
        return 0.23 * $net;
    }
}

class TaxEN implements Tax
{
    public function count($net)
    {
        return 0.15 * $net;
    }
}

class TaxDE implements Tax
{
    public function count($net)
    {
        return 0.3 * $net;
    }
}

class Context
{
    private $tax;

    /**
     * @return mixed
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * @param mixed $tax
     */
    public function setTax(Tax $tax)
    {
        $this->tax = $tax;
    }

}

$cow = 'cycki';
//phpinfo();
//die();
// testy
$tax = new Context();
$tax->setTax(new TaxPL());
echo $tax->getTax()->count(100); // wyswietla "23"
$tax->setTax(new TAXEN());
echo $tax->getTax()->count(100); // wyswietla "15"
$tax->setTax(new TAXDE());
echo $tax->getTax()->count(100); // wyswietla "30"