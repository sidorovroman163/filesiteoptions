<?php namespace sidorovroman\filesiteoptions;

class Facade extends \Illuminate\Support\Facades\Facade
{
    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return 'fsoptions';
    }
}
