<?php
/**
 * A webapp that gathers a user's email address
 * @author Usaama Alnaji <ualnaji@cnm.edu>
 */

class Email
    /**
     * id for this email. this is the primary key
     */
    private $userId;
    /**
     * user's email address. this is a unique index
     */
    private $userEmail;