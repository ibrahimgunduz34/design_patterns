<?php
namespace Event;

use \Event\EventListenerInterface;

class EventMgrAbstract 
{
    /**
     * @var array
     */
    protected $_observers = array();
    
    /**
     * attach an event listener to collection.
     * @param string $eventName
     * @param \Event\EventListenerInterface $listener
     */
    public function attachEventListener($eventName, EventListenerInterface $listener)
    {
        if( ! isset($this->_observers[$eventName]) ) {
            $this->_observers[$eventName] = array();
        }
        $this->_observers[$eventName][] = $listener;
    }
    
    /**
     * fires the specified event.
     *
     * @param string $eventName
     */
    protected function _fireEvent($eventName)
    {
        if(isset($this->_observers[$eventName])) {
            foreach($this->_observers[$eventName] as $listener) {
                $listener->fireEvent($this);
            }
        }
    }
}
