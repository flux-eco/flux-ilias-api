<?php

namespace FluxIliasApi\Adapter\Course;

use FluxIliasApi\Adapter\CustomMetadata\CustomMetadataDto;
use JsonSerializable;

class CourseDto implements JsonSerializable
{

    private ?bool $add_to_favourites;
    private ?bool $availability_always_visible;
    private ?int $availability_end;
    private ?int $availability_start;
    private ?bool $badges;
    private ?bool $calendar;
    private ?bool $calendar_block;
    private ?string $contact_consultation;
    private ?string $contact_email;
    private ?string $contact_name;
    private ?string $contact_phone;
    private ?string $contact_responsibility;
    private ?int $created;
    /**
     * @var CustomMetadataDto[]|null
     */
    private ?array $custom_metadata;
    private ?bool $default_object_rating;
    private ?string $description;
    private ?int $didactic_template_id;
    private ?string $icon_url;
    private ?int $id;
    private ?string $import_id;
    private ?string $important_information;
    private ?bool $in_trash;
    private ?string $mail_subject_prefix;
    private ?LegacyCourseMailToMembersType $mail_to_members_type;
    private ?bool $manage_custom_metadata;
    private ?bool $news;
    private ?bool $online;
    private ?int $parent_id;
    private ?string $parent_import_id;
    private ?int $parent_ref_id;
    private ?int $period_end;
    private ?int $period_start;
    private ?bool $period_time_indication;
    private ?int $ref_id;
    private ?bool $resources;
    private ?bool $send_welcome_email;
    private ?bool $show_members;
    private ?bool $show_members_participants_list;
    private ?string $syllabus;
    private ?bool $tag_cloud;
    private ?string $target_group;
    private ?string $title;
    private ?int $updated;
    private ?string $url;


    /**
     * @param CustomMetadataDto[]|null $custom_metadata
     */
    private function __construct(
        /*public readonly*/ ?int $id,
        /*public readonly*/ ?string $import_id,
        /*public readonly*/ ?int $ref_id,
        /*public readonly*/ ?int $created,
        /*public readonly*/ ?int $updated,
        /*public readonly*/ ?int $parent_id,
        /*public readonly*/ ?string $parent_import_id,
        /*public readonly*/ ?int $parent_ref_id,
        /*public readonly*/ ?string $url,
        /*public readonly*/ ?string $icon_url,
        /*public readonly*/ ?string $title,
        /*public readonly*/ ?string $description,
        /*public readonly*/ ?int $period_start,
        /*public readonly*/ ?int $period_end,
        /*public readonly*/ ?bool $period_time_indication,
        /*public readonly*/ ?bool $online,
        /*public readonly*/ ?int $availability_start,
        /*public readonly*/ ?int $availability_end,
        /*public readonly*/ ?bool $availability_always_visible,
        /*public readonly*/ ?bool $calendar,
        /*public readonly*/ ?bool $calendar_block,
        /*public readonly*/ ?bool $news,
        /*public readonly*/ ?bool $manage_custom_metadata,
        /*public readonly*/ ?bool $tag_cloud,
        /*public readonly*/ ?bool $default_object_rating,
        /*public readonly*/ ?bool $badges,
        /*public readonly*/ ?bool $resources,
        /*public readonly*/ ?string $mail_subject_prefix,
        /*public readonly*/ ?bool $show_members,
        /*public readonly*/ ?bool $show_members_participants_list,
        /*public readonly*/ ?LegacyCourseMailToMembersType $mail_to_members_type,
        /*public readonly*/ ?bool $send_welcome_email,
        /*public readonly*/ ?bool $add_to_favourites,
        /*public readonly*/ ?string $important_information,
        /*public readonly*/ ?string $syllabus,
        /*public readonly*/ ?string $target_group,
        /*public readonly*/ ?string $contact_name,
        /*public readonly*/ ?string $contact_responsibility,
        /*public readonly*/ ?string $contact_phone,
        /*public readonly*/ ?string $contact_email,
        /*public readonly*/ ?string $contact_consultation,
        /*public readonly*/ ?int $didactic_template_id,
        /*public readonly*/ ?bool $in_trash,
        /*public readonly*/ ?array $custom_metadata
    ) {
        $this->id = $id;
        $this->import_id = $import_id;
        $this->ref_id = $ref_id;
        $this->created = $created;
        $this->updated = $updated;
        $this->parent_id = $parent_id;
        $this->parent_import_id = $parent_import_id;
        $this->parent_ref_id = $parent_ref_id;
        $this->url = $url;
        $this->icon_url = $icon_url;
        $this->title = $title;
        $this->description = $description;
        $this->period_start = $period_start;
        $this->period_end = $period_end;
        $this->period_time_indication = $period_time_indication;
        $this->online = $online;
        $this->availability_start = $availability_start;
        $this->availability_end = $availability_end;
        $this->availability_always_visible = $availability_always_visible;
        $this->calendar = $calendar;
        $this->calendar_block = $calendar_block;
        $this->news = $news;
        $this->manage_custom_metadata = $manage_custom_metadata;
        $this->tag_cloud = $tag_cloud;
        $this->default_object_rating = $default_object_rating;
        $this->badges = $badges;
        $this->resources = $resources;
        $this->mail_subject_prefix = $mail_subject_prefix;
        $this->show_members = $show_members;
        $this->show_members_participants_list = $show_members_participants_list;
        $this->mail_to_members_type = $mail_to_members_type;
        $this->send_welcome_email = $send_welcome_email;
        $this->add_to_favourites = $add_to_favourites;
        $this->important_information = $important_information;
        $this->syllabus = $syllabus;
        $this->target_group = $target_group;
        $this->contact_name = $contact_name;
        $this->contact_responsibility = $contact_responsibility;
        $this->contact_phone = $contact_phone;
        $this->contact_email = $contact_email;
        $this->contact_consultation = $contact_consultation;
        $this->didactic_template_id = $didactic_template_id;
        $this->in_trash = $in_trash;
        $this->custom_metadata = $custom_metadata;
    }


    /**
     * @param CustomMetadataDto[]|null $custom_metadata
     */
    public static function new(
        ?int $id = null,
        ?string $import_id = null,
        ?int $ref_id = null,
        ?int $created = null,
        ?int $updated = null,
        ?int $parent_id = null,
        ?string $parent_import_id = null,
        ?int $parent_ref_id = null,
        ?string $url = null,
        ?string $icon_url = null,
        ?string $title = null,
        ?string $description = null,
        ?int $period_start = null,
        ?int $period_end = null,
        ?bool $period_time_indication = null,
        ?bool $online = null,
        ?int $availability_start = null,
        ?int $availability_end = null,
        ?bool $availability_always_visible = null,
        ?bool $calendar = null,
        ?bool $calendar_block = null,
        ?bool $news = null,
        ?bool $manage_custom_metadata = null,
        ?bool $tag_cloud = null,
        ?bool $default_object_rating = null,
        ?bool $badges = null,
        ?bool $resources = null,
        ?string $mail_subject_prefix = null,
        ?bool $show_members = null,
        ?bool $show_members_participants_list = null,
        ?LegacyCourseMailToMembersType $mail_to_members_type = null,
        ?bool $send_welcome_email = null,
        ?bool $add_to_favourites = null,
        ?string $important_information = null,
        ?string $syllabus = null,
        ?string $target_group = null,
        ?string $contact_name = null,
        ?string $contact_responsibility = null,
        ?string $contact_phone = null,
        ?string $contact_email = null,
        ?string $contact_consultation = null,
        ?int $didactic_template_id = null,
        ?bool $in_trash = null,
        ?array $custom_metadata = null
    ) : /*static*/ self
    {
        return new static(
            $id,
            $import_id,
            $ref_id,
            $created,
            $updated,
            $parent_id,
            $parent_import_id,
            $parent_ref_id,
            $url,
            $icon_url,
            $title,
            $description,
            $period_start,
            $period_end,
            $period_time_indication,
            $online,
            $availability_start,
            $availability_end,
            $availability_always_visible,
            $calendar,
            $calendar_block,
            $news,
            $manage_custom_metadata,
            $tag_cloud,
            $default_object_rating,
            $badges,
            $resources,
            $mail_subject_prefix,
            $show_members,
            $show_members_participants_list,
            $mail_to_members_type,
            $send_welcome_email,
            $add_to_favourites,
            $important_information,
            $syllabus,
            $target_group,
            $contact_name,
            $contact_responsibility,
            $contact_phone,
            $contact_email,
            $contact_consultation,
            $didactic_template_id,
            $in_trash,
            $custom_metadata
        );
    }


    public function getAvailabilityEnd() : ?int
    {
        return $this->availability_end;
    }


    public function getAvailabilityStart() : ?int
    {
        return $this->availability_start;
    }


    public function getContactConsultation() : ?string
    {
        return $this->contact_consultation;
    }


    public function getContactEmail() : ?string
    {
        return $this->contact_email;
    }


    public function getContactName() : ?string
    {
        return $this->contact_name;
    }


    public function getContactPhone() : ?string
    {
        return $this->contact_phone;
    }


    public function getContactResponsibility() : ?string
    {
        return $this->contact_responsibility;
    }


    public function getCreated() : ?int
    {
        return $this->created;
    }


    /**
     * @return CustomMetadataDto[]|null
     */
    public function getCustomMetadata() : ?array
    {
        return $this->custom_metadata;
    }


    public function getDescription() : ?string
    {
        return $this->description;
    }


    public function getDidacticTemplateId() : ?int
    {
        return $this->didactic_template_id;
    }


    public function getIconUrl() : ?string
    {
        return $this->icon_url;
    }


    public function getId() : ?int
    {
        return $this->id;
    }


    public function getImportId() : ?string
    {
        return $this->import_id;
    }


    public function getImportantInformation() : ?string
    {
        return $this->important_information;
    }


    public function getMailSubjectPrefix() : ?string
    {
        return $this->mail_subject_prefix;
    }


    public function getMailToMembersType() : ?LegacyCourseMailToMembersType
    {
        return $this->mail_to_members_type;
    }


    public function getParentId() : ?int
    {
        return $this->parent_id;
    }


    public function getParentImportId() : ?string
    {
        return $this->parent_import_id;
    }


    public function getParentRefId() : ?int
    {
        return $this->parent_ref_id;
    }


    public function getPeriodEnd() : ?int
    {
        return $this->period_end;
    }


    public function getPeriodStart() : ?int
    {
        return $this->period_start;
    }


    public function getRefId() : ?int
    {
        return $this->ref_id;
    }


    public function getSyllabus() : ?string
    {
        return $this->syllabus;
    }


    public function getTargetGroup() : ?string
    {
        return $this->target_group;
    }


    public function getTitle() : ?string
    {
        return $this->title;
    }


    public function getUpdated() : ?int
    {
        return $this->updated;
    }


    public function getUrl() : ?string
    {
        return $this->url;
    }


    public function isAddToFavourites() : ?bool
    {
        return $this->add_to_favourites;
    }


    public function isAvailabilityAlwaysVisible() : ?bool
    {
        return $this->availability_always_visible;
    }


    public function isBadges() : ?bool
    {
        return $this->badges;
    }


    public function isCalendar() : ?bool
    {
        return $this->calendar;
    }


    public function isCalendarBlock() : ?bool
    {
        return $this->calendar_block;
    }


    public function isDefaultObjectRating() : ?bool
    {
        return $this->default_object_rating;
    }


    public function isInTrash() : ?bool
    {
        return $this->in_trash;
    }


    public function isManageCustomMetadata() : ?bool
    {
        return $this->manage_custom_metadata;
    }


    public function isNews() : ?bool
    {
        return $this->news;
    }


    public function isOnline() : ?bool
    {
        return $this->online;
    }


    public function isPeriodTimeIndication() : ?bool
    {
        return $this->period_time_indication;
    }


    public function isResources() : ?bool
    {
        return $this->resources;
    }


    public function isSendWelcomeEmail() : ?bool
    {
        return $this->send_welcome_email;
    }


    public function isShowMembers() : ?bool
    {
        return $this->show_members;
    }


    public function isShowMembersParticipantsList() : ?bool
    {
        return $this->show_members_participants_list;
    }


    public function isTagCloud() : ?bool
    {
        return $this->tag_cloud;
    }


    public function jsonSerialize() : array
    {
        $data = get_object_vars($this);

        unset($data["in_trash"]);

        return $data;
    }
}
