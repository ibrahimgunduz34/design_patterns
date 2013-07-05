<?php
namespace Payment\Adapter;

use \Payment\Request;

interface AdapterInterface
{
    /**
     * performs sale transaction.
     * 
     * @param \Payment\Request $request
     * @return \Payment\Response
     */
    public function makeSale(Request $request);
}
