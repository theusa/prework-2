<?php
namespace Ualnaji\DataDesign;
require_once(dirname(__DIR__). "/vendor/autoload.php");
require_once("autoload.php");
use Ramsey\Uuid\Uuid;


/**
 * Object Oriented Phase I
 *
 * @author Usaama Alnaji <ualnaji@cnm.edu> with help from Dylan McDonald's code
 */

//( ! ) Fatal error: Trait 'ualnaji\DataDesign\ValidateUuid' not found in /home/ualnaji/public_html/Object-Oriented-Deepdive/php/classes/Author.php on line 14

class Author {
    use ValidateUuid;
    /**
     * author id for this profile. this is the primary key
     * @var Uuid $authorId
     */

    private $authorId;
    /**
     * token handed out to verify that the profile is valid and not malicious
     * @var string $authorActivationToken
     */
    private $authorActivationToken;
    /**
     * URL for avatar for this author
     * @var $authorAvatarUrl
     */
    private $authorAvatarUrl;
     /**
      * author Email; this is a unique index
      * @var string $authorEmail
      */
    private $authorEmail;
     /**
      * hash for author password
      * @var $authorHash
      */
    private $authorHash;
     /**
      * author username; this is a unique index
      * @var $authorUsername
      */
    private $authorUsername;

    /**
     * Constructor for this author
     *
     * @param string | Uuid $newAuthorId id of this profile
     * @param string $newAuthorActivationToken activation token to safe guard against malicious accounts
     * @param string $newAuthorAvatarUrl Url for author's avatar
     * @param string $newAuthorEmail string containing author email
     * @param string $newAuthorHash string containing author password hash
     * @param string $newAuthorUsername string containing author's username
     * @throws \InvalidArgumentException if data types are not valid
     * @throws \RangeException if data values are out of bound (strings too long, negative integer)
     * @throws \TypeError if data type violates data hint
     * @throws \Exception if some other exception occurs
     */

    public function __construct(string $newAuthorId, string $newAuthorActivationToken, string $newAuthorAvatarUrl, $newAuthorEmail, string $newAuthorHash, string $newAuthorUsername)
    {
        try {
            $this->setAuthorId($newAuthorId);
            $this->setAuthorActivationToken($newAuthorActivationToken);
            $this->setAuthorAvatarUrl($newAuthorAvatarUrl);
            $this->setAuthorEmail($newAuthorEmail);
            $this->setAuthorHash($newAuthorHash);
            $this->setAuthorUsername($newAuthorUsername);
        } catch(\InvalidArgumentException | \RangeException | \Exception | \TypeEror $exception ) {
            //determine what exception type was thrown
            $exceptionType = get_class($exception);
            throw(new $exceptionType($exception->getMessage(), 0, $exception));
        }
    }
    /**
     * accessor method for profile id
     *
     * @return Uuid value of author id (or null if new Author)
     */

    public function getAuthorId(): Uuid {
        return ($this->authorId);
    }

    /** mutator method for author id
     * @param Uuid | string $newAuthorId value of new author id
     * @throws \RangeException if $newAuthorId is not positive
     * @throws \TypeError if the author Id is not a Uuid
     */
    public function setAuthorId ($newAuthorId): void {
        try{
            $uuid = self::ValidateUuid($newAuthorId);
        } catch (\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
            $exceptionType = get_class($exception);
            throw(new $exceptionType($exception->getMessage(), 0, $exception));
        }
        //convert and store the author id
        $this->authorId = $uuid;
    }

    /**
 * accessor method for author activation token
 * @return string value of the author activation token
 */

    public function getAuthorActivationToken(): string {
        return ($this->authorActivationToken);
    }

/**
 * mutator method for author activation token
 * @param string $newAuthorActivationToken
 * @throws \InvalidArgumentException if the token is not a string or insecure
 * @throws \RangeException if the token is not exactly 32 characters
 * @throws \TypeError if the activation token is not a string
 */

    public function setAuthorActivationToken(string $newAuthorActivationToken): void {
        if($newAuthorActivationToken === null) {
            $this->authorActivationToken = null;
            return;
        }
        $newAuthorActivationToken = strtolower(trim($newAuthorActivationToken));
        if(ctype_xdigit($newAuthorActivationToken)===false){
            throw(new\RangeException("user activation is not valid"));
        }
        //make sure author activation token is exactly 32 characters
        if(strlen($newAuthorActivationToken) !==32) {
            throw(new\RangeException("user activation token has to be 32 characters"));
        }
        $this->authorActivationToken = $newAuthorActivationToken;
    }
    /**
     * accessor method for author avatar url
     * @return string value of the author avatar url
     */

    public function getAuthorAvatarUrl(): string {
        return ($this->authorAvatarUrl);
    }
    /**
     * mutator method for author avatar url
     * @param string $newAuthorAvatarUrl new value of author avatar url
     * @throws \InvalidArgumentException if $newAuthorUrl is not a string or insecure
     * @throws \RangeException if $newAuthorAvatarUrl is > 255 characters
     * @throws \TypeError if $newAuthorAvatarUrl is not a string
     */

  public function setAuthorAvatarUrl(string $newAuthorAvatarUrl): void {
        if($newAuthorAvatarUrl === null) {
            $this->authorAvatarUrl = null;
            return;
        }
        if(strlen($newAuthorAvatarUrl) > 255) {
            throw (new \RangeException("author avatar URL is too large"));
        }
        $this->authorAvatarUrl = $newAuthorAvatarUrl;
    }

/*    public function setAuthorAvatarUrl(string $newAuthorAvatarUrl): void {
    //verify the author url is secure
    $newAuthorAvatarUrl = trim($newAuthorAvatarUrl);
    $newAuthorAvatarUrl = filter_var($newAuthorAvatarUrl, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    if (empty($newAuthorAvatarUrl) === true) {
        throw(new\InvalidArgumentException("author handle URL is empty or insecure"));
    }

        $newAuthorEmail = trim($newAuthorEmail);
        $newAuthorEmail = filter_var($newAuthorEmail, FILTER_VALIDATE_EMAIL);
        if(empty($newAuthorEmail) === true) {
            throw(new \InvalidArgumentException("author email is empty or insecure"));


    //verify the author avatar url will fit in the database
    if (strlen($newAuthorAvatarUrl) > 255) {
        throw(new \RangeException("author avatar URL is too large"));

        //store the author avatar url
        $this->authorAvatarUrl = $newAuthorAvatarUrl;
    }
}*/

    /**
     * accessor method for author email
     * @return string value of the author email
     */

    public function getAuthorEmail(): string {
        return ($this->authorEmail);
    }
    /**
     * mutator method for author email
     * @param string $newAuthorEmail new value for author email
     * @throws \InvalidArgumentException if $newAuthorEmail is not a valid email or insecure
     * @throws \RangeException if $newAuthorEmail is > 128 characters
     * @throws \TypeError if $newAuthorEmail is not a string
     */

    public function setAuthorEmail (string $newAuthorEmail): void {
    //verify the author email is secure
    $newAuthorEmail = trim($newAuthorEmail);
    $newAuthorEmail = filter_var($newAuthorEmail, FILTER_VALIDATE_EMAIL);
    if(empty($newAuthorEmail) === true) {
        throw(new \InvalidArgumentException("author email is empty or insecure"));
    }
    //verify the email will fit in the database
        if(strlen($newAuthorEmail) >128) {
            throw(new\RangeException("author email is too long"));
        }
    //store the email
    $this->authorEmail = $newAuthorEmail;
    }

    /**
     * accessor method for author hash
     * @return string value of the author hash
     */

    public function getAuthorHash(): string {
        return ($this->authorHash);
    }
    /**
     * mutator method for author hash
     * @param string $newAuthorHash new author hash
     * @throws \InvalidArgumentException if author hash is not secure
     * @throws \RnageException if author hash is not exactly 96 characters long
     * @throws \TypeError if profile hash is not a string
     */

    public function setAuthorHash (string $newAuthorHash): void
    {
        //enforce that the author hash is properly formatted
        $newAuthorHash = trim($newAuthorHash);
        if (empty($newAuthorHash) === true) {
            throw (new \InvalidArgumentException ("author hash is empty or insecure"));
        }
        //enforce the hash is really an argon hash
        $authorHashInfo = password_get_info($newAuthorHash);
        if ($authorHashInfo["algoName"] !== "argon2i") {
            throw(new \InvalidArgumentException ("author hash is not a valid hash"));
        }
        //enforce that the author hash is exactly 96 characters
        if (strlen($newAuthorHash) !== 96) {
            throw (new\RangeException ("author hash must be exactly 96 characters long"));
        }
        //store hash
        $this->authorHash = $newAuthorHash;
    }
    /**
     * accessor method for  author username
     * @return string value of the author username
     */

    public function getAuthorUsername(): string {
        return ($this->authorUsername);
    }


    /**
     * mutator method for author username
     *@param $newAuthorUsername new author username
     *@throws \InvalidArgument Exception if $newAuthorUsername is not a string or insecure
     * @throws \RangeException if $newAuthorUsername is longer than 32 characters
     * @throws \TypeException if $newAuthorUsername is not a string
     */
    public function setAuthorUsername ($newAuthorUsername): void {
        // verify the author username is secure
    $newAuthorUsername = trim($newAuthorUsername);
    $newAuthorUsername = filter_var($newAuthorUsername, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES );
    if(empty($newAuthorUsername)===true){
        throw(new \InvalidArgumentException ("author username is empty or insecure"));
    }
    // verify the new username will fit in the database
    if(strlen($newAuthorUsername)>32){
        throw(new\RangeException ("author username is too long"));
    }
    //store the username
    $this->authorUsername = $newAuthorUsername;
    }


}
