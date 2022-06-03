<?php

namespace FluxIliasApi\Adapter\User;

class UserDiffDto
{

    private ?int $access_limited_from;
    private ?bool $access_limited_message;
    private ?int $access_limited_object_id;
    private ?string $access_limited_object_import_id;
    private ?int $access_limited_object_ref_id;
    private ?int $access_limited_until;
    private ?bool $access_unlimited;
    private ?bool $active;
    private ?LegacyUserAuthenticationMode $authentication_mode;
    private ?string $birthday;
    private ?string $city;
    private ?string $client_ip;
    private ?string $country;
    private ?string $department;
    private ?string $email;
    private ?string $external_account;
    private ?string $fax;
    private ?string $first_name;
    private ?LegacyUserGender $gender;
    /**
     * @var string[]|null
     */
    private ?array $general_interests;
    private ?string $heard_about_ilias;
    private ?string $hobbies;
    private ?string $import_id;
    private ?string $institution;
    private ?LegacyUserLanguage $language;
    private ?string $last_name;
    private ?string $location_latitude;
    private ?string $location_longitude;
    private ?int $location_zoom;
    private ?string $login;
    /**
     * @var string[]|null
     */
    private ?array $looking_for_helps;
    private ?string $matriculation_number;
    /**
     * @var string[]|null
     */
    private ?array $offering_helps;
    private ?string $password;
    private ?string $phone_home;
    private ?string $phone_mobile;
    private ?string $phone_office;
    private ?string $second_email;
    private ?LegacyUserSelectedCountry $selected_country;
    private ?string $street;
    private ?string $title;
    /**
     * @var UserDefinedFieldDto[]|null
     */
    private ?array $user_defined_fields;
    private ?string $zip_code;


    /**
     * @param string[]|null              $general_interests
     * @param string[]|null              $offering_helps
     * @param string[]|null              $looking_for_helps
     * @param UserDefinedFieldDto[]|null $user_defined_fields
     */
    private function __construct(
        /*public readonly*/ ?string $import_id,
        /*public readonly*/ ?string $external_account,
        /*public readonly*/ ?LegacyUserAuthenticationMode $authentication_mode,
        /*public readonly*/ ?string $login,
        /*public readonly*/ ?string $password,
        /*public readonly*/ ?bool $active,
        /*public readonly*/ ?bool $access_unlimited,
        /*public readonly*/ ?int $access_limited_from,
        /*public readonly*/ ?int $access_limited_until,
        /*public readonly*/ ?int $access_limited_object_id,
        /*public readonly*/ ?string $access_limited_object_import_id,
        /*public readonly*/ ?int $access_limited_object_ref_id,
        /*public readonly*/ ?bool $access_limited_message,
        /*public readonly*/ ?LegacyUserGender $gender,
        /*public readonly*/ ?string $first_name,
        /*public readonly*/ ?string $last_name,
        /*public readonly*/ ?string $title,
        /*public readonly*/ ?string $birthday,
        /*public readonly*/ ?string $institution,
        /*public readonly*/ ?string $department,
        /*public readonly*/ ?string $street,
        /*public readonly*/ ?string $city,
        /*public readonly*/ ?string $zip_code,
        /*public readonly*/ ?string $country,
        /*public readonly*/ ?LegacyUserSelectedCountry $selected_country,
        /*public readonly*/ ?string $phone_office,
        /*public readonly*/ ?string $phone_home,
        /*public readonly*/ ?string $phone_mobile,
        /*public readonly*/ ?string $fax,
        /*public readonly*/ ?string $email,
        /*public readonly*/ ?string $second_email,
        /*public readonly*/ ?string $hobbies,
        /*public readonly*/ ?string $heard_about_ilias,
        /*public readonly*/ ?array $general_interests,
        /*public readonly*/ ?array $offering_helps,
        /*public readonly*/ ?array $looking_for_helps,
        /*public readonly*/ ?string $matriculation_number,
        /*public readonly*/ ?string $client_ip,
        /*public readonly*/ ?string $location_latitude,
        /*public readonly*/ ?string $location_longitude,
        /*public readonly*/ ?int $location_zoom,
        /*public readonly*/ ?array $user_defined_fields,
        /*public readonly*/ ?LegacyUserLanguage $language
    ) {
        $this->import_id = $import_id;
        $this->external_account = $external_account;
        $this->authentication_mode = $authentication_mode;
        $this->login = $login;
        $this->password = $password;
        $this->active = $active;
        $this->access_unlimited = $access_unlimited;
        $this->access_limited_from = $access_limited_from;
        $this->access_limited_until = $access_limited_until;
        $this->access_limited_object_id = $access_limited_object_id;
        $this->access_limited_object_import_id = $access_limited_object_import_id;
        $this->access_limited_object_ref_id = $access_limited_object_ref_id;
        $this->access_limited_message = $access_limited_message;
        $this->gender = $gender;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->title = $title;
        $this->birthday = $birthday;
        $this->institution = $institution;
        $this->department = $department;
        $this->street = $street;
        $this->city = $city;
        $this->zip_code = $zip_code;
        $this->country = $country;
        $this->selected_country = $selected_country;
        $this->phone_office = $phone_office;
        $this->phone_home = $phone_home;
        $this->phone_mobile = $phone_mobile;
        $this->fax = $fax;
        $this->email = $email;
        $this->second_email = $second_email;
        $this->hobbies = $hobbies;
        $this->heard_about_ilias = $heard_about_ilias;
        $this->general_interests = $general_interests;
        $this->offering_helps = $offering_helps;
        $this->looking_for_helps = $looking_for_helps;
        $this->matriculation_number = $matriculation_number;
        $this->client_ip = $client_ip;
        $this->location_latitude = $location_latitude;
        $this->location_longitude = $location_longitude;
        $this->location_zoom = $location_zoom;
        $this->user_defined_fields = $user_defined_fields;
        $this->language = $language;
    }


    /**
     * @param string[]|null              $general_interests
     * @param string[]|null              $offering_helps
     * @param string[]|null              $looking_for_helps
     * @param UserDefinedFieldDto[]|null $user_defined_fields
     */
    public static function new(
        ?string $import_id = null,
        ?string $external_account = null,
        ?LegacyUserAuthenticationMode $authentication_mode = null,
        ?string $login = null,
        ?string $password = null,
        ?bool $active = null,
        ?bool $access_unlimited = null,
        ?int $access_limited_from = null,
        ?int $access_limited_until = null,
        ?int $access_limited_object_id = null,
        ?string $access_limited_object_import_id = null,
        ?int $access_limited_object_ref_id = null,
        ?bool $access_limited_message = null,
        ?LegacyUserGender $gender = null,
        ?string $first_name = null,
        ?string $last_name = null,
        ?string $title = null,
        ?string $birthday = null,
        ?string $institution = null,
        ?string $department = null,
        ?string $street = null,
        ?string $city = null,
        ?string $zip_code = null,
        ?string $country = null,
        ?LegacyUserSelectedCountry $selected_country = null,
        ?string $phone_office = null,
        ?string $phone_home = null,
        ?string $phone_mobile = null,
        ?string $fax = null,
        ?string $email = null,
        ?string $second_email = null,
        ?string $hobbies = null,
        ?string $heard_about_ilias = null,
        ?array $general_interests = null,
        ?array $offering_helps = null,
        ?array $looking_for_helps = null,
        ?string $matriculation_number = null,
        ?string $client_ip = null,
        ?string $location_latitude = null,
        ?string $location_longitude = null,
        ?int $location_zoom = null,
        ?array $user_defined_fields = null,
        ?LegacyUserLanguage $language = null
    ) : /*static*/ self
    {
        return new static(
            $import_id,
            $external_account,
            $authentication_mode,
            $login,
            $password,
            $active,
            $access_unlimited,
            $access_limited_from,
            $access_limited_until,
            $access_limited_object_id,
            $access_limited_object_import_id,
            $access_limited_object_ref_id,
            $access_limited_message,
            $gender,
            $first_name,
            $last_name,
            $title,
            $birthday,
            $institution,
            $department,
            $street,
            $city,
            $zip_code,
            $country,
            $selected_country,
            $phone_office,
            $phone_home,
            $phone_mobile,
            $fax,
            $email,
            $second_email,
            $hobbies,
            $heard_about_ilias,
            $general_interests,
            $offering_helps,
            $looking_for_helps,
            $matriculation_number,
            $client_ip,
            $location_latitude,
            $location_longitude,
            $location_zoom,
            $user_defined_fields,
            $language
        );
    }


    public static function newFromData(
        object $data
    ) : /*static*/ self
    {
        return static::new(
            $data->import_id ?? null,
            $data->external_account ?? null,
            ($authentication_mode = $data->authentication_mode ?? null) !== null ? LegacyUserAuthenticationMode::from($authentication_mode) : null,
            $data->login ?? null,
            $data->password ?? null,
            $data->active ?? null,
            $data->access_unlimited ?? null,
            $data->access_limited_from ?? null,
            $data->access_limited_until ?? null,
            $data->access_limited_object_id ?? null,
            $data->access_limited_object_import_id ?? null,
            $data->access_limited_object_ref_id ?? null,
            $data->access_limited_message ?? null,
            ($gender = $data->gender ?? null) !== null ? LegacyUserGender::from($gender) : null,
            $data->first_name ?? null,
            $data->last_name ?? null,
            $data->title ?? null,
            $data->birthday ?? null,
            $data->institution ?? null,
            $data->department ?? null,
            $data->street ?? null,
            $data->city ?? null,
            $data->zip_code ?? null,
            $data->country ?? null,
            ($selected_country = $data->selected_country ?? null) !== null ? LegacyUserSelectedCountry::from($selected_country) : null,
            $data->phone_office ?? null,
            $data->phone_home ?? null,
            $data->phone_mobile ?? null,
            $data->fax ?? null,
            $data->email ?? null,
            $data->second_email ?? null,
            $data->hobbies ?? null,
            $data->heard_about_ilias ?? null,
            $data->general_interests ?? null,
            $data->offering_helps ?? null,
            $data->looking_for_helps ?? null,
            $data->matriculation_number ?? null,
            $data->client_ip ?? null,
            $data->location_latitude ?? null,
            $data->location_longitude ?? null,
            $data->location_zoom ?? null,
            ($user_defined_fields = $data->user_defined_fields ?? null) !== null ? array_map([UserDefinedFieldDto::class, "newFromData"], $user_defined_fields) : null,
            ($language = $data->language ?? null) !== null ? LegacyUserLanguage::from($language) : null
        );
    }


    public function getAccessLimitedFrom() : ?int
    {
        return $this->access_limited_from;
    }


    public function getAccessLimitedObjectId() : ?int
    {
        return $this->access_limited_object_id;
    }


    public function getAccessLimitedObjectImportId() : ?string
    {
        return $this->access_limited_object_import_id;
    }


    public function getAccessLimitedObjectRefId() : ?int
    {
        return $this->access_limited_object_ref_id;
    }


    public function getAccessLimitedUntil() : ?int
    {
        return $this->access_limited_until;
    }


    public function getAuthenticationMode() : ?LegacyUserAuthenticationMode
    {
        return $this->authentication_mode;
    }


    public function getBirthday() : ?string
    {
        return $this->birthday;
    }


    public function getCity() : ?string
    {
        return $this->city;
    }


    public function getClientIp() : ?string
    {
        return $this->client_ip;
    }


    public function getCountry() : ?string
    {
        return $this->country;
    }


    public function getDepartment() : ?string
    {
        return $this->department;
    }


    public function getEmail() : ?string
    {
        return $this->email;
    }


    public function getExternalAccount() : ?string
    {
        return $this->external_account;
    }


    public function getFax() : ?string
    {
        return $this->fax;
    }


    public function getFirstName() : ?string
    {
        return $this->first_name;
    }


    public function getGender() : ?LegacyUserGender
    {
        return $this->gender;
    }


    /**
     * @return string[]|null
     */
    public function getGeneralInterests() : ?array
    {
        return $this->general_interests;
    }


    public function getHeardAboutIlias() : ?string
    {
        return $this->heard_about_ilias;
    }


    public function getHobbies() : ?string
    {
        return $this->hobbies;
    }


    public function getImportId() : ?string
    {
        return $this->import_id;
    }


    public function getInstitution() : ?string
    {
        return $this->institution;
    }


    public function getLanguage() : ?LegacyUserLanguage
    {
        return $this->language;
    }


    public function getLastName() : ?string
    {
        return $this->last_name;
    }


    public function getLocationLatitude() : ?string
    {
        return $this->location_latitude;
    }


    public function getLocationLongitude() : ?string
    {
        return $this->location_longitude;
    }


    public function getLocationZoom() : ?int
    {
        return $this->location_zoom;
    }


    public function getLogin() : ?string
    {
        return $this->login;
    }


    /**
     * @return string[]|null
     */
    public function getLookingForHelps() : ?array
    {
        return $this->looking_for_helps;
    }


    public function getMatriculationNumber() : ?string
    {
        return $this->matriculation_number;
    }


    /**
     * @return string[]|null
     */
    public function getOfferingHelps() : ?array
    {
        return $this->offering_helps;
    }


    public function getPassword() : ?string
    {
        return $this->password;
    }


    public function getPhoneHome() : ?string
    {
        return $this->phone_home;
    }


    public function getPhoneMobile() : ?string
    {
        return $this->phone_mobile;
    }


    public function getPhoneOffice() : ?string
    {
        return $this->phone_office;
    }


    public function getSecondEmail() : ?string
    {
        return $this->second_email;
    }


    public function getSelectedCountry() : ?LegacyUserSelectedCountry
    {
        return $this->selected_country;
    }


    public function getStreet() : ?string
    {
        return $this->street;
    }


    public function getTitle() : ?string
    {
        return $this->title;
    }


    /**
     * @return UserDefinedFieldDto[]|null
     */
    public function getUserDefinedFields() : ?array
    {
        return $this->user_defined_fields;
    }


    public function getZipCode() : ?string
    {
        return $this->zip_code;
    }


    public function isAccessLimitedMessage() : ?bool
    {
        return $this->access_limited_message;
    }


    public function isAccessUnlimited() : ?bool
    {
        return $this->access_unlimited;
    }


    public function isActive() : ?bool
    {
        return $this->active;
    }
}
