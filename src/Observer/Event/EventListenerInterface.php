<?php
namespace Event;

interface EventListenerInterface
{
    /**
     * calls by the subject when event is fired.
     *
     * @param EventMgrAbstract $source
     */
    public function fireEvent(EventMgrAbstract $source);
}
