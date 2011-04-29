<?php

/*!
* OpenTok PHP Library v0.90.0
* http://www.tokbox.com/
*
* Copyright 2010, TokBox, Inc.
*
* Date: November 05 14:50:00 2010
*/


class OpenTokSession {

    private $sessionId;

    private $sessionProperties;

    function __construct($sessionId, $properties) {
        $this->sessionId = $sessionId;
        $this->sessionProperties = $properties;
    }

    public function getSessionId() {
        return $this->sessionId;
    }
}
