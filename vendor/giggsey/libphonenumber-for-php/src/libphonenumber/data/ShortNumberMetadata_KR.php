<?php
/**
 * This file is automatically @generated by {@link BuildMetadataPHPFromXml}.
 * Please don't modify it directly.
 */


return array (
  'generalDesc' => 
  array (
    'NationalNumberPattern' => '1\\d{2,3}',
    'PossibleNumberPattern' => '\\d{3,4}',
  ),
  'fixedLine' => 
  array (
    'NationalNumberPattern' => '1\\d{2,3}',
    'PossibleNumberPattern' => '\\d{3,4}',
  ),
  'mobile' => 
  array (
    'NationalNumberPattern' => '1\\d{2,3}',
    'PossibleNumberPattern' => '\\d{3,4}',
  ),
  'tollFree' => 
  array (
    'NationalNumberPattern' => '
          1(?:
            1[78]|
            28|
            330|
            82
          )
        ',
    'PossibleNumberPattern' => '\\d{3,4}',
    'ExampleNumber' => '118',
  ),
  'premiumRate' => 
  array (
    'NationalNumberPattern' => 'NA',
    'PossibleNumberPattern' => 'NA',
  ),
  'sharedCost' => 
  array (
    'NationalNumberPattern' => 'NA',
    'PossibleNumberPattern' => 'NA',
  ),
  'personalNumber' => 
  array (
    'NationalNumberPattern' => 'NA',
    'PossibleNumberPattern' => 'NA',
  ),
  'voip' => 
  array (
    'NationalNumberPattern' => 'NA',
    'PossibleNumberPattern' => 'NA',
  ),
  'pager' => 
  array (
    'NationalNumberPattern' => 'NA',
    'PossibleNumberPattern' => 'NA',
  ),
  'uan' => 
  array (
    'NationalNumberPattern' => 'NA',
    'PossibleNumberPattern' => 'NA',
  ),
  'emergency' => 
  array (
    'NationalNumberPattern' => '11[29]',
    'PossibleNumberPattern' => '\\d{3,4}',
    'ExampleNumber' => '112',
  ),
  'voicemail' => 
  array (
    'NationalNumberPattern' => 'NA',
    'PossibleNumberPattern' => 'NA',
  ),
  'shortCode' => 
  array (
    'NationalNumberPattern' => '
         1(?:
           0[01]|
           1[027-9]|
           2[01389]|
           3(?:
             2|
             3[039]|
             45|
             66|
             88|
             9[18]
           )|
           82
          )
        ',
    'PossibleNumberPattern' => '\\d{3,4}',
    'ExampleNumber' => '112',
  ),
  'standardRate' => 
  array (
    'NationalNumberPattern' => 'NA',
    'PossibleNumberPattern' => 'NA',
  ),
  'carrierSpecific' => 
  array (
    'NationalNumberPattern' => '10[01]',
    'PossibleNumberPattern' => '\\d{3}',
    'ExampleNumber' => '100',
  ),
  'noInternationalDialling' => 
  array (
    'NationalNumberPattern' => 'NA',
    'PossibleNumberPattern' => 'NA',
  ),
  'id' => 'KR',
  'countryCode' => 0,
  'internationalPrefix' => '',
  'sameMobileAndFixedLinePattern' => true,
  'numberFormat' => 
  array (
  ),
  'intlNumberFormat' => 
  array (
  ),
  'mainCountryForCode' => false,
  'leadingZeroPossible' => false,
  'mobileNumberPortableRegion' => false,
);
