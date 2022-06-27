<?php

namespace FluxIliasApi\Service\User;

use FluxIliasApi\Libs\FluxIliasBaseApi\Adapter\User\UserLanguage;

class UserLanguageMapping
{

    public static function mapExternalToInternal(UserLanguage $language) : InternalUserLanguage
    {
        return InternalUserLanguage::from(array_flip(static::INTERNAL_EXTERNAL())[$language->value] ?? substr($language->value, 1));
    }


    public static function mapInternalToExternal(InternalUserLanguage $language) : UserLanguage
    {
        return UserLanguage::from(static::INTERNAL_EXTERNAL()[$language->value] ?? "_" . $language->value);
    }


    private static function INTERNAL_EXTERNAL() : array
    {
        return [
            InternalUserLanguage::AA->value  => UserLanguage::AFAR->value,
            InternalUserLanguage::AB->value  => UserLanguage::ABKHAZIAN->value,
            InternalUserLanguage::AF->value  => UserLanguage::AFRIKAANS->value,
            InternalUserLanguage::AM->value  => UserLanguage::AMHARIC->value,
            InternalUserLanguage::AR->value  => UserLanguage::ARABIC->value,
            InternalUserLanguage::AS->value  => UserLanguage::ASSAMESE->value,
            InternalUserLanguage::AY->value  => UserLanguage::AYMARA->value,
            InternalUserLanguage::AZ->value  => UserLanguage::AZERBAIJANI->value,
            InternalUserLanguage::BA->value  => UserLanguage::BASHKIR->value,
            InternalUserLanguage::BE->value  => UserLanguage::BYELORUSSIAN->value,
            InternalUserLanguage::BG->value  => UserLanguage::BULGARIAN->value,
            InternalUserLanguage::BH->value  => UserLanguage::BIHARI->value,
            InternalUserLanguage::BI->value  => UserLanguage::BISLAMA->value,
            InternalUserLanguage::BN->value  => UserLanguage::BENGALI_BANGLA->value,
            InternalUserLanguage::BO->value  => UserLanguage::TIBETAN->value,
            InternalUserLanguage::BR->value  => UserLanguage::BRETON->value,
            InternalUserLanguage::CA->value  => UserLanguage::CATALAN->value,
            InternalUserLanguage::CO->value  => UserLanguage::CORSICAN->value,
            InternalUserLanguage::CS->value  => UserLanguage::CZECH->value,
            InternalUserLanguage::CY->value  => UserLanguage::WELSH->value,
            InternalUserLanguage::DA->value  => UserLanguage::DANISH->value,
            InternalUserLanguage::DE->value  => UserLanguage::GERMAN->value,
            InternalUserLanguage::DZ->value  => UserLanguage::BHUTANI->value,
            InternalUserLanguage::EL->value  => UserLanguage::GREEK->value,
            InternalUserLanguage::EN->value  => UserLanguage::ENGLISH->value,
            InternalUserLanguage::EO->value  => UserLanguage::ESPERANTO->value,
            InternalUserLanguage::ES->value  => UserLanguage::SPANISH->value,
            InternalUserLanguage::ET->value  => UserLanguage::ESTONIAN->value,
            InternalUserLanguage::EU->value  => UserLanguage::BASQUE->value,
            InternalUserLanguage::FA->value  => UserLanguage::PERSIAN->value,
            InternalUserLanguage::FI->value  => UserLanguage::FINNISH->value,
            InternalUserLanguage::FJ->value  => UserLanguage::FIJI->value,
            InternalUserLanguage::FO->value  => UserLanguage::FAROESE->value,
            InternalUserLanguage::FR->value  => UserLanguage::FRENCH->value,
            InternalUserLanguage::FY->value  => UserLanguage::FRISIAN->value,
            InternalUserLanguage::GA->value  => UserLanguage::IRISH->value,
            InternalUserLanguage::GD->value  => UserLanguage::SCOTS_GAELIC->value,
            InternalUserLanguage::GL->value  => UserLanguage::GALICIAN->value,
            InternalUserLanguage::GN->value  => UserLanguage::GUARANI->value,
            InternalUserLanguage::GU->value  => UserLanguage::GUJARATI->value,
            InternalUserLanguage::HA->value  => UserLanguage::HAUSA->value,
            InternalUserLanguage::HE->value  => UserLanguage::HEBREW->value,
            InternalUserLanguage::HI->value  => UserLanguage::HINDI->value,
            InternalUserLanguage::HR->value  => UserLanguage::CROATIAN->value,
            InternalUserLanguage::HU->value  => UserLanguage::HUNGARIAN->value,
            InternalUserLanguage::HY->value  => UserLanguage::ARMENIAN->value,
            InternalUserLanguage::IA->value  => UserLanguage::INTERLINGUA->value,
            InternalUserLanguage::ID->value  => UserLanguage::INDONESIAN->value,
            InternalUserLanguage::IE->value  => UserLanguage::INTERLINGUE->value,
            InternalUserLanguage::IK->value  => UserLanguage::INUPIAK->value,
            InternalUserLanguage::IS->value  => UserLanguage::ICELANDIC->value,
            InternalUserLanguage::IT->value  => UserLanguage::ITALIAN->value,
            InternalUserLanguage::IU->value  => UserLanguage::INUKTITUT->value,
            InternalUserLanguage::JA->value  => UserLanguage::JAPANESE->value,
            InternalUserLanguage::JV->value  => UserLanguage::JAVANESE->value,
            InternalUserLanguage::KA->value  => UserLanguage::GEORGIAN->value,
            InternalUserLanguage::KK->value  => UserLanguage::KAZAKH->value,
            InternalUserLanguage::KL->value  => UserLanguage::GREENLANDIC->value,
            InternalUserLanguage::KM->value  => UserLanguage::CAMBODIAN->value,
            InternalUserLanguage::KN->value  => UserLanguage::KANNADA->value,
            InternalUserLanguage::KO->value  => UserLanguage::KOREAN->value,
            InternalUserLanguage::KS->value  => UserLanguage::KASHMIRI->value,
            InternalUserLanguage::KU->value  => UserLanguage::KURDISH->value,
            InternalUserLanguage::KY->value  => UserLanguage::KIRGHIZ->value,
            InternalUserLanguage::LA->value  => UserLanguage::LATIN->value,
            InternalUserLanguage::LN->value  => UserLanguage::LINGALA->value,
            InternalUserLanguage::LO->value  => UserLanguage::LAOTHIAN->value,
            InternalUserLanguage::LT->value  => UserLanguage::LITHUANIAN->value,
            InternalUserLanguage::LV->value  => UserLanguage::LATVIAN_LETTISH->value,
            InternalUserLanguage::MG->value  => UserLanguage::MALAGASY->value,
            InternalUserLanguage::MI->value  => UserLanguage::MAORI->value,
            InternalUserLanguage::MK->value  => UserLanguage::MACEDONIAN->value,
            InternalUserLanguage::ML->value  => UserLanguage::MALAYALAM->value,
            InternalUserLanguage::MN->value  => UserLanguage::MONGOLIAN->value,
            InternalUserLanguage::MO->value  => UserLanguage::MOLDAVIAN->value,
            InternalUserLanguage::MR->value  => UserLanguage::MARATHI->value,
            InternalUserLanguage::MS->value  => UserLanguage::MALAY->value,
            InternalUserLanguage::MT->value  => UserLanguage::MALTESE->value,
            InternalUserLanguage::MY->value  => UserLanguage::BURMESE->value,
            InternalUserLanguage::NA->value  => UserLanguage::NAURU->value,
            InternalUserLanguage::NE->value  => UserLanguage::NEPALI->value,
            InternalUserLanguage::NL->value  => UserLanguage::DUTCH->value,
            InternalUserLanguage::NO->value  => UserLanguage::NORWEGIAN->value,
            InternalUserLanguage::OC->value  => UserLanguage::OCCITAN->value,
            InternalUserLanguage::OM->value  => UserLanguage::AFAN->value,
            InternalUserLanguage::OR_->value => UserLanguage::ORIYA->value,
            InternalUserLanguage::PA->value  => UserLanguage::PUNJABI->value,
            InternalUserLanguage::PL->value  => UserLanguage::POLISH->value,
            InternalUserLanguage::PS->value  => UserLanguage::PASHTO_PUSHTO->value,
            InternalUserLanguage::PT->value  => UserLanguage::PORTUGUESE->value,
            InternalUserLanguage::QU->value  => UserLanguage::QUECHUA->value,
            InternalUserLanguage::RM->value  => UserLanguage::RHAETO_ROMANCE->value,
            InternalUserLanguage::RN->value  => UserLanguage::KURUNDI->value,
            InternalUserLanguage::RO->value  => UserLanguage::ROMANIAN->value,
            InternalUserLanguage::RU->value  => UserLanguage::RUSSIAN->value,
            InternalUserLanguage::RW->value  => UserLanguage::KINYARWANDA->value,
            InternalUserLanguage::SA->value  => UserLanguage::SANSKRIT->value,
            InternalUserLanguage::SD->value  => UserLanguage::SINDHI->value,
            InternalUserLanguage::SG->value  => UserLanguage::SANGHO->value,
            InternalUserLanguage::SH->value  => UserLanguage::SERBO_CROATIAN->value,
            InternalUserLanguage::SI->value  => UserLanguage::SINGHALESE->value,
            InternalUserLanguage::SK->value  => UserLanguage::SLOVAK->value,
            InternalUserLanguage::SL->value  => UserLanguage::SLOVENIAN->value,
            InternalUserLanguage::SM->value  => UserLanguage::SAMOAN->value,
            InternalUserLanguage::SN->value  => UserLanguage::SHONA->value,
            InternalUserLanguage::SO->value  => UserLanguage::SOMALI->value,
            InternalUserLanguage::SQ->value  => UserLanguage::ALBANIAN->value,
            InternalUserLanguage::SR->value  => UserLanguage::SERBIAN->value,
            InternalUserLanguage::SS->value  => UserLanguage::SISWATI->value,
            InternalUserLanguage::ST->value  => UserLanguage::SESOTHO->value,
            InternalUserLanguage::SU->value  => UserLanguage::SUNDANESE->value,
            InternalUserLanguage::SV->value  => UserLanguage::SWEDISH->value,
            InternalUserLanguage::SW->value  => UserLanguage::SWAHILI->value,
            InternalUserLanguage::TA->value  => UserLanguage::TAMIL->value,
            InternalUserLanguage::TE->value  => UserLanguage::TELUGU->value,
            InternalUserLanguage::TG->value  => UserLanguage::TAJIK->value,
            InternalUserLanguage::TH->value  => UserLanguage::THAI->value,
            InternalUserLanguage::TI->value  => UserLanguage::TIGRINYA->value,
            InternalUserLanguage::TK->value  => UserLanguage::TURKMEN->value,
            InternalUserLanguage::TL->value  => UserLanguage::TAGALOG->value,
            InternalUserLanguage::TN->value  => UserLanguage::SETSWANA->value,
            InternalUserLanguage::TO->value  => UserLanguage::TONGA->value,
            InternalUserLanguage::TR->value  => UserLanguage::TURKISH->value,
            InternalUserLanguage::TS->value  => UserLanguage::TSONGA->value,
            InternalUserLanguage::TT->value  => UserLanguage::TATAR->value,
            InternalUserLanguage::TW->value  => UserLanguage::TWI->value,
            InternalUserLanguage::UG->value  => UserLanguage::UIGUR->value,
            InternalUserLanguage::UK->value  => UserLanguage::UKRAINIAN->value,
            InternalUserLanguage::UR->value  => UserLanguage::URDU->value,
            InternalUserLanguage::UZ->value  => UserLanguage::UZBEK->value,
            InternalUserLanguage::VI->value  => UserLanguage::VIETNAMESE->value,
            InternalUserLanguage::VO->value  => UserLanguage::VOLAPUK->value,
            InternalUserLanguage::WO->value  => UserLanguage::WOLOF->value,
            InternalUserLanguage::XH->value  => UserLanguage::XHOSA->value,
            InternalUserLanguage::YI->value  => UserLanguage::YIDDISH->value,
            InternalUserLanguage::YO->value  => UserLanguage::YORUBA->value,
            InternalUserLanguage::ZA->value  => UserLanguage::ZHUANG->value,
            InternalUserLanguage::ZH->value  => UserLanguage::CHINESE->value,
            InternalUserLanguage::ZU->value  => UserLanguage::ZULU->value
        ];
    }
}
