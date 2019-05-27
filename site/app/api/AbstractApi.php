<?php


namespace app\api;

use app\libraries\Core;

abstract class AbstractApi {

    /** @var Core  */
    protected $core;

    public function __construct(Core $core) {
        $this->core = $core;
    }

}