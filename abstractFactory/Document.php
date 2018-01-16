<?php
/**
 * Created by PhpStorm.
 * User: momus
 * Date: 10/19/16
 * Time: 5:36 AM
 */

namespace AbstractFactory;

// Produkty
interface Document
{
    function generate();
}

class PDF implements Document
{
    public function generate()
    {
        return 'Dokument PDF';
    }

    public function setColor($color)
    {
        echo "// Ustawiam kolor: " . $color;
    }

}

class HTML implements Document
{
    public function generate()
    {
        return 'Dokument HTML';
    }

    public function set_color($color)
    {
        echo "// Ustawiam kolor: " . $color;
    }

}

// Fabryki
interface DocumentFactory
{
    function create();

    function setColor($color);
}

class PDFFactory implements DocumentFactory
{
    private $color;

    public function create()
    {
        $doc = new PDF();
        $doc->setColor($this->color);
        return $doc;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

}

class HTMLFactory implements DocumentFactory
{
    private $color;

    public function create()
    {
        $doc = new HTML();
        $doc->set_color($this->color);
        return $doc;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }
}

class Page
{
    private $documentFactory;

    public function __construct(DocumentFactory $factory)
    {
        $this->documentFactory = $factory;
    }

    public function render()
    {
        $document = $this->documentFactory->create();
        echo $document->generate();
    }

}

// testy
$pdf = new PDFFactory();
$pdf->setColor("#000000");
$html = new HTMLFactory();
$html->setColor("#ffffff");
$page1 = new Page($pdf);
$page1->render(); // wyswietli "Dokument PDF"
$page2 = new Page($html);
$page2->render(); // wyswietli "Dokument HTML"