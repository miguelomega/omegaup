<?php

/** ******************************************************************************* *
  *                    !ATENCION!                                                   *
  *                                                                                 *
  * Este codigo es generado automaticamente. Si lo modificas tus cambios seran      *
  * reemplazados la proxima vez que se autogenere el codigo.                        *
  *                                                                                 *
  * ******************************************************************************* */

/**
 * Value Object file for table Users.
 *
 * VO does not have any behaviour.
 * @access public
 */
class Users extends VO {
    /**
     * Constructor de Users
     *
     * Para construir un objeto de tipo Users debera llamarse a el constructor
     * sin parametros. Es posible, construir un objeto pasando como parametro un arreglo asociativo
     * cuyos campos son iguales a las variables que constituyen a este objeto.
     */
    function __construct($data = null) {
        if (is_null($data)) {
            return;
        }
        if (isset($data['user_id'])) {
            $this->user_id = $data['user_id'];
        }
        if (isset($data['username'])) {
            $this->username = $data['username'];
        }
        if (isset($data['facebook_user_id'])) {
            $this->facebook_user_id = $data['facebook_user_id'];
        }
        if (isset($data['password'])) {
            $this->password = $data['password'];
        }
        if (isset($data['main_email_id'])) {
            $this->main_email_id = $data['main_email_id'];
        }
        if (isset($data['name'])) {
            $this->name = $data['name'];
        }
        if (isset($data['solved'])) {
            $this->solved = $data['solved'];
        }
        if (isset($data['submissions'])) {
            $this->submissions = $data['submissions'];
        }
        if (isset($data['country_id'])) {
            $this->country_id = $data['country_id'];
        }
        if (isset($data['state_id'])) {
            $this->state_id = $data['state_id'];
        }
        if (isset($data['school_id'])) {
            $this->school_id = $data['school_id'];
        }
        if (isset($data['scholar_degree'])) {
            $this->scholar_degree = $data['scholar_degree'];
        }
        if (isset($data['language_id'])) {
            $this->language_id = $data['language_id'];
        }
        if (isset($data['graduation_date'])) {
            $this->graduation_date = $data['graduation_date'];
        }
        if (isset($data['birth_date'])) {
            $this->birth_date = $data['birth_date'];
        }
        if (isset($data['gender'])) {
            $this->gender = $data['gender'];
        }
        if (isset($data['last_access'])) {
            $this->last_access = $data['last_access'];
        }
        if (isset($data['verified'])) {
            $this->verified = $data['verified'];
        }
        if (isset($data['verification_id'])) {
            $this->verification_id = $data['verification_id'];
        }
        if (isset($data['reset_digest'])) {
            $this->reset_digest = $data['reset_digest'];
        }
        if (isset($data['reset_sent_at'])) {
            $this->reset_sent_at = $data['reset_sent_at'];
        }
        if (isset($data['recruitment_optin'])) {
            $this->recruitment_optin = $data['recruitment_optin'];
        }
        if (isset($data['in_mailing_list'])) {
            $this->in_mailing_list = $data['in_mailing_list'];
        }
        if (isset($data['preferred_language'])) {
            $this->preferred_language = $data['preferred_language'];
        }
    }

    /**
     * Converts date fields to timestamps
     */
    public function toUnixTime(array $fields = []) {
        if (count($fields) > 0) {
            parent::toUnixTime($fields);
        } else {
            parent::toUnixTime(['last_access']);
        }
    }

    /**
      *  [Campo no documentado]
      * Llave Primaria
      * Auto Incremento
      * @access public
      * @var int(11)
      */
    public $user_id;

    /**
      *  [Campo no documentado]
      * @access public
      * @var varchar(50)
      */
    public $username;

    /**
      * Facebook ID for this user.
      * @access public
      * @var varchar(20)
      */
    public $facebook_user_id;

    /**
      *  [Campo no documentado]
      * @access public
      * @var varchar(100)
      */
    public $password;

    /**
      *  [Campo no documentado]
      * @access public
      * @var int(11)
      */
    public $main_email_id;

    /**
      *  [Campo no documentado]
      * @access public
      * @var varchar(256)
      */
    public $name;

    /**
      *  [Campo no documentado]
      * @access public
      * @var int(11)
      */
    public $solved;

    /**
      *  [Campo no documentado]
      * @access public
      * @var int(11)
      */
    public $submissions;

    /**
      *  [Campo no documentado]
      * @access public
      * @var char(3)
      */
    public $country_id;

    /**
      *  [Campo no documentado]
      * @access public
      * @var char(3)
      */
    public $state_id;

    /**
      *  [Campo no documentado]
      * @access public
      * @var int(11)
      */
    public $school_id;

    /**
      *  [Campo no documentado]
      * @access public
      * @var varchar(64)
      */
    public $scholar_degree;

    /**
      *  [Campo no documentado]
      * @access public
      * @var int(11)
      */
    public $language_id;

    /**
      *  [Campo no documentado]
      * @access public
      * @var date
      */
    public $graduation_date;

    /**
      *  [Campo no documentado]
      * @access public
      * @var date
      */
    public $birth_date;

    /**
      *  [Campo no documentado]
      * @access public
      * @var enum('female','male','other','decline')
      */
    public $gender;

    /**
      *  [Campo no documentado]
      * @access public
      * @var timestamp
      */
    public $last_access;

    /**
      *  [Campo no documentado]
      * @access public
      * @var tinyint(1)
      */
    public $verified;

    /**
      *  [Campo no documentado]
      * @access public
      * @var varchar(50)
      */
    public $verification_id;

    /**
      *  [Campo no documentado]
      * @access public
      * @var varchar(45)
      */
    public $reset_digest;

    /**
      *  [Campo no documentado]
      * @access public
      * @var datetime
      */
    public $reset_sent_at;

    /**
      * Determina si el usuario puede ser contactado con fines de reclutamiento.
      * @access public
      * @var tinyint(1)
      */
    public $recruitment_optin;

    /**
      *  [Campo no documentado]
      * @access public
      * @var tinyint(1)
      */
    public $in_mailing_list;

    /**
      * El lenguaje de programación de preferencia de este usuario
      * @access public
      * @var enum('c','cpp','java','py','rb','pl','cs','pas','kp','kj','cat','hs','cpp11','lua')
      */
    public $preferred_language;
}
