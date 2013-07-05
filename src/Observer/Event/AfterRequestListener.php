<?php
namespace Event;

use \Event\EventListenerInterface;

class AfterRequestListener implements EventListenerInterface
{
    public function fireEvent(EventMgrAbstract $source)
    {
        $logFile = dirname(__FILE__) . '/../Logs/transaction.log';
        $logData = sprintf(
            "[%s] Response:\n%s\n\n", 
            date('+r'),
            $source->getLastResponse()
        );

        file_put_contents($logFile, $logData, FILE_APPEND);
    }
}
