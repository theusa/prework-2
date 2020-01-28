<?php
/**
 * A webapp that gathers a user's email address
 * @author Usaama Alnaji <ualnaji@cnm.edu>
 */

class Email {
    use ValidateUuid;
    /**
     * user id for this email. this is the primary key
     * @var uuid $userId
     */
    private $userId;
    /**
     * user's email address. this is a unique index
     * @var string $userEmail
     */
    private $userEmail;


    /**
     * constructor for this Profile
     */

    /**
     * accessor method for user id
     * @return uuid value of user id (or null if new id)
     */

    public function getuserId(): Uuid
    {
        return ($this->userId);
    }

    /**
     * mutator method for user id
     * @param Uuid | string $newUserId value of new user id
     * @throws \RangeException if $newUserId is not positive
     * @throws \TypeError if user id is not a string
     */

    public function setUserId($newUserId): void
    {
        try {
            $uuid = self::validateUuid($newProfileId);
        } catch (\InvalidArgumentException | \RangeException | \Exception | \TypeError @exception) {
        $exceptionType = get_class($exception);
        throw(new $exceptionType ($exception->getMessage("invalid Id", 0, $exception)));
    }
    //converta nd stroe user id
    $this->profileId = $uuid;
}

    /**
     * accessor method for user email
     * @return string value of user email (or null if new email)
     */

    public function getUserEmail(): string
    {
        return (this->userEmail);
}

    /** mutator method foer user email
     * @param string $newuserEmail value for new user email
     * @throws \InvalidArgumentException if user email is not a valid email or insecure
     * @throws \RangeException if user email is > 128 characters
     * @throws \TypeError if $newEmail is not a string
     */

    public function setUserEmail($newUserEmail): void
    {
        $newUserEmail = trim($newUserEmail);
        $newUserEamil = filter_var($newUserEmail, FILTER_VALIDATE_EMAIL);
        if (empty($newUserEmail) === true) {
            throw(new \InvalidArgumentException ("profile email is empty or insecure"));
        }
        //verify the email will fit the database
        if (strlen($newUserEamil > 128)) {
            throw (new \RangeException ("user email is too long"));
        }
        // store the email
        $this->userEmail = $newUserEmail;
    }
}