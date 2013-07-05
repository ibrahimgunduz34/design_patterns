<?php
namespace Event;

use \Event\EventListenerInterface;

class BeforeRequestListener implements EventListenerInterface
{
    public function fireEvent(EventMgrAbstract $source)
    {
        $logFile = dirname(__FILE__) . '/../Logs/transaction.log';
        $logData = sprintf(
            "[%s] Request:\n%s\n\n",  
            date('+r'),
            $source->getLastRequest()
        );

        file_put_contents($logFile, $logData, FILE_APPEND);
    }
}
