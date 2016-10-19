<?php
/**
 * Created by PhpStorm.
 * User: momus
 * Date: 10/19/16
 * Time: 5:13 AM
 */

namespace Observer;

use SplSubject;

class CacheObserver implements \SplObserver
{

    public function update(SplSubject $subject)
    {
        echo "Odswieza cache";
    }

}

class RSSObserver implements \SplObserver
{
    public function update(SplSubject $subject)
    {
        echo "Odswieza RSS";
    }

}

class NewsletterObserver implements \SplObserver
{

    public function update(SplSubject $subject)
    {
        echo "Wysylam maile z nowym newsem";
    }

}

class News implements SplSubject
{
    private $observers = array();

    public function attach(\SplObserver $observer)
    {
        $this->observers[spl_object_hash($observer)] = $observer;
    }

    public function detach(\SplObserver $observer)
    {
        unset($this->observers[spl_object_hash($observer)]);
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function add($data)
    {
        echo 'Dodaje news do bazy';
        $this->notify();
    }

}

$news = new News();

$news->attach(new RSSObserver());
$news->attach(new CacheObserver());
$news->attach(new NewsletterObserver());

$news->add(array(
    'title' => 'Tytuł',
    'content' => 'blablabla'
));