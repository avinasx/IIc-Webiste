<?php
/* 
   FormBuilder. Copyright (c) 2005-2006 Samuel Goldstein <sjg@cmsmodules.com>
   More info at http://dev.cmsmadesimple.org/projects/formbuilder
   
   A Module for CMS Made Simple, Copyright (c) 2006 by Ted Kulp (wishy@cmsmadesimple.org)
  This project's homepage is: http://www.cmsmadesimple.org
*/
class fbCountryPickerField extends fbFieldBase
{

	var $Countries;
	
	function __construct($form_ptr, &$params)
	{
        parent::__construct($form_ptr, $params);
        $mod = formbuilder_utils::GetFB();
		$this->Type = 'CountryPickerField';
		$this->DisplayInForm = true;
		$this->ValidationTypes = array();

    $this->Countries = array(
                              $mod->Lang('no_default') => '',
				                      $mod->Lang('AD') => 'AD',
				                      $mod->Lang('AE') => 'AE',
				                      $mod->Lang('AF') => 'AF',
				                      $mod->Lang('AG') => 'AG',
				                      $mod->Lang('AI') => 'AI',
				                      $mod->Lang('AL') => 'AL',
				                      $mod->Lang('AM') => 'AM',
				                      $mod->Lang('AN') => 'AN',
				                      $mod->Lang('AO') => 'AO',
				                      $mod->Lang('AQ') => 'AQ',
				                      $mod->Lang('AR') => 'AR',
				                      $mod->Lang('AS') => 'AS',
				                      $mod->Lang('AT') => 'AT',
				                      $mod->Lang('AU') => 'AU',
				                      $mod->Lang('AW') => 'AW',
				                      $mod->Lang('AX') => 'AX',
				                      $mod->Lang('AZ') => 'AZ',
				                      $mod->Lang('BA') => 'BA',
				                      $mod->Lang('BB') => 'BB',
				                      $mod->Lang('BD') => 'BD',
				                      $mod->Lang('BE') => 'BE',
				                      $mod->Lang('BF') => 'BF',
				                      $mod->Lang('BG') => 'BG',
				                      $mod->Lang('BH') => 'BH',
				                      $mod->Lang('BI') => 'BI',
				                      $mod->Lang('BJ') => 'BJ',
				                      $mod->Lang('BM') => 'BM',
				                      $mod->Lang('BN') => 'BN',
				                      $mod->Lang('BO') => 'BO',
				                      $mod->Lang('BR') => 'BR',
				                      $mod->Lang('BS') => 'BS',
				                      $mod->Lang('BT') => 'BT',
				                      $mod->Lang('BV') => 'BV',
				                      $mod->Lang('BW') => 'BW',
				                      $mod->Lang('BY') => 'BY',
				                      $mod->Lang('BZ') => 'BZ',
				                      $mod->Lang('CA') => 'CA',
				                      $mod->Lang('CC') => 'CC',
				                      $mod->Lang('CD') => 'CD',
				                      $mod->Lang('CF') => 'CF',
				                      $mod->Lang('CG') => 'CG',
				                      $mod->Lang('CH') => 'CH',
				                      $mod->Lang('CI') => 'CI',
				                      $mod->Lang('CK') => 'CK',
				                      $mod->Lang('CL') => 'CL',
				                      $mod->Lang('CM') => 'CM',
				                      $mod->Lang('CN') => 'CN',
				                      $mod->Lang('CO') => 'CO',
				                      $mod->Lang('CR') => 'CR',
				                      $mod->Lang('CU') => 'CU',
				                      $mod->Lang('CV') => 'CV',
				                      $mod->Lang('CX') => 'CX',
				                      $mod->Lang('CY') => 'CY',
				                      $mod->Lang('CZ') => 'CZ',
				                      $mod->Lang('DE') => 'DE',
				                      $mod->Lang('DJ') => 'DJ',
				                      $mod->Lang('DK') => 'DK',
				                      $mod->Lang('DM') => 'DM',
				                      $mod->Lang('DO') => 'DO',
				                      $mod->Lang('DZ') => 'DZ',
				                      $mod->Lang('EC') => 'EC',
				                      $mod->Lang('EE') => 'EE',
				                      $mod->Lang('EG') => 'EG',
				                      $mod->Lang('EH') => 'EH',
				                      $mod->Lang('ER') => 'ER',
				                      $mod->Lang('ES') => 'ES',
				                      $mod->Lang('ET') => 'ET',
				                      $mod->Lang('FI') => 'FI',
				                      $mod->Lang('FJ') => 'FJ',
				                      $mod->Lang('FK') => 'FK',
				                      $mod->Lang('FM') => 'FM',
				                      $mod->Lang('FO') => 'FO',
				                      $mod->Lang('FR') => 'FR',
				                      $mod->Lang('FX') => 'FX',
				                      $mod->Lang('GA') => 'GA',
				                      $mod->Lang('GB') => 'GB',
				                      $mod->Lang('GD') => 'GD',
				                      $mod->Lang('GE') => 'GE',
				                      $mod->Lang('GF') => 'GF',
				                      $mod->Lang('GF') => 'GF',
				                      $mod->Lang('GH') => 'GH',
				                      $mod->Lang('GI') => 'GI',
				                      $mod->Lang('GL') => 'GL',
				                      $mod->Lang('GM') => 'GM',
				                      $mod->Lang('GN') => 'GN',
				                      $mod->Lang('GP') => 'GP',
				                      $mod->Lang('GQ') => 'GQ',
				                      $mod->Lang('GR') => 'GR',
				                      $mod->Lang('GS') => 'GS',
				                      $mod->Lang('GT') => 'GT',
				                      $mod->Lang('GU') => 'GU',
				                      $mod->Lang('GW') => 'GW',
				                      $mod->Lang('GY') => 'GY',
				                      $mod->Lang('HK') => 'HK',
				                      $mod->Lang('HM') => 'HM',
				                      $mod->Lang('HN') => 'HN',
				                      $mod->Lang('HR') => 'HR',
				                      $mod->Lang('HT') => 'HT',
				                      $mod->Lang('HU') => 'HU',
				                      $mod->Lang('ID') => 'ID',
				                      $mod->Lang('IE') => 'IE',
				                      $mod->Lang('IL') => 'IL',
				                      $mod->Lang('IM') => 'IM',
				                      $mod->Lang('IN') => 'IN',
				                      $mod->Lang('IO') => 'IO',
				                      $mod->Lang('IQ') => 'IQ',
				                      $mod->Lang('IR') => 'IR',
				                      $mod->Lang('IS') => 'IS',
				                      $mod->Lang('IT') => 'IT',
				                      $mod->Lang('JE') => 'JE',
				                      $mod->Lang('JM') => 'JM',
				                      $mod->Lang('JO') => 'JO',
				                      $mod->Lang('JP') => 'JP',
				                      $mod->Lang('KE') => 'KE',
				                      $mod->Lang('KG') => 'KG',
				                      $mod->Lang('KH') => 'KH',
				                      $mod->Lang('KI') => 'KI',
				                      $mod->Lang('KM') => 'KM',
				                      $mod->Lang('KN') => 'KN',
				                      $mod->Lang('KP') => 'KP',
				                      $mod->Lang('KR') => 'KR',
				                      $mod->Lang('KW') => 'KW',
				                      $mod->Lang('KY') => 'KY',
				                      $mod->Lang('KZ') => 'KZ',
				                      $mod->Lang('LA') => 'LA',
				                      $mod->Lang('LB') => 'LB',
				                      $mod->Lang('LC') => 'LC',
				                      $mod->Lang('LI') => 'LI',
				                      $mod->Lang('LK') => 'LK',
				                      $mod->Lang('LR') => 'LR',
				                      $mod->Lang('LS') => 'LS',
				                      $mod->Lang('LT') => 'LT',
				                      $mod->Lang('LU') => 'LU',
				                      $mod->Lang('LV') => 'LV',
				                      $mod->Lang('LY') => 'LY',
				                      $mod->Lang('MA') => 'MA',
				                      $mod->Lang('MC') => 'MC',
				                      $mod->Lang('MD') => 'MD',
				                      $mod->Lang('MG') => 'MG',
				                      $mod->Lang('MH') => 'MH',
				                      $mod->Lang('MK') => 'MK',
				                      $mod->Lang('ML') => 'ML',
				                      $mod->Lang('MM') => 'MM',
				                      $mod->Lang('MN') => 'MN',
				                      $mod->Lang('MO') => 'MO',
				                      $mod->Lang('MP') => 'MP',
				                      $mod->Lang('MQ') => 'MQ',
				                      $mod->Lang('MR') => 'MR',
				                      $mod->Lang('MS') => 'MS',
				                      $mod->Lang('MT') => 'MT',
				                      $mod->Lang('MU') => 'MU',
				                      $mod->Lang('MV') => 'MV',
				                      $mod->Lang('MW') => 'MW',
				                      $mod->Lang('MX') => 'MX',
				                      $mod->Lang('MY') => 'MY',
				                      $mod->Lang('MZ') => 'MZ',
				                      $mod->Lang('NA') => 'NA',
				                      $mod->Lang('NC') => 'NC',
				                      $mod->Lang('NE') => 'NE',
				                      $mod->Lang('NF') => 'NF',
				                      $mod->Lang('NG') => 'NG',
				                      $mod->Lang('NI') => 'NI',
				                      $mod->Lang('NL') => 'NL',
				                      $mod->Lang('NO') => 'NO',
				                      $mod->Lang('NP') => 'NP',
				                      $mod->Lang('NR') => 'NR',
				                      $mod->Lang('NT') => 'NT',
				                      $mod->Lang('NU') => 'NU',
				                      $mod->Lang('NZ') => 'NZ',
				                      $mod->Lang('OM') => 'OM',
				                      $mod->Lang('PA') => 'PA',
				                      $mod->Lang('PE') => 'PE',
				                      $mod->Lang('PF') => 'PF',
				                      $mod->Lang('PG') => 'PG',
				                      $mod->Lang('PH') => 'PH',
				                      $mod->Lang('PK') => 'PK',
				                      $mod->Lang('PL') => 'PL',
				                      $mod->Lang('PM') => 'PM',
				                      $mod->Lang('PN') => 'PN',
				                      $mod->Lang('PR') => 'PR',
				                      $mod->Lang('PS') => 'PS',
				                      $mod->Lang('PT') => 'PT',
				                      $mod->Lang('PW') => 'PW',
				                      $mod->Lang('PY') => 'PY',
				                      $mod->Lang('QA') => 'QA',
				                      $mod->Lang('RE') => 'RE',
				                      $mod->Lang('RO') => 'RO',
				                      $mod->Lang('RS') => 'RS',
				                      $mod->Lang('RU') => 'RU',
				                      $mod->Lang('RW') => 'RW',
				                      $mod->Lang('SA') => 'SA',
				                      $mod->Lang('SB') => 'SB',
				                      $mod->Lang('SC') => 'SC',
				                      $mod->Lang('SD') => 'SD',
				                      $mod->Lang('SE') => 'SE',
				                      $mod->Lang('SG') => 'SG',
				                      $mod->Lang('SH') => 'SH',
				                      $mod->Lang('SI') => 'SI',
				                      $mod->Lang('SJ') => 'SJ',
				                      $mod->Lang('SK') => 'SK',
				                      $mod->Lang('SL') => 'SL',
				                      $mod->Lang('SM') => 'SM',
				                      $mod->Lang('SN') => 'SN',
				                      $mod->Lang('SO') => 'SO',
				                      $mod->Lang('SR') => 'SR',
				                      $mod->Lang('ST') => 'ST',
				                      $mod->Lang('SV') => 'SV',
				                      $mod->Lang('SY') => 'SY',
				                      $mod->Lang('SZ') => 'SZ',
				                      $mod->Lang('TC') => 'TC',
				                      $mod->Lang('TD') => 'TD',
				                      $mod->Lang('TF') => 'TF',
				                      $mod->Lang('TG') => 'TG',
				                      $mod->Lang('TH') => 'TH',
				                      $mod->Lang('TJ') => 'TJ',
				                      $mod->Lang('TK') => 'TK',
				                      $mod->Lang('TM') => 'TM',
				                      $mod->Lang('TN') => 'TN',
				                      $mod->Lang('TO') => 'TO',
				                      $mod->Lang('TP') => 'TP',
				                      $mod->Lang('TR') => 'TR',
				                      $mod->Lang('TT') => 'TT',
				                      $mod->Lang('TV') => 'TV',
				                      $mod->Lang('TW') => 'TW',
				                      $mod->Lang('TZ') => 'TZ',
				                      $mod->Lang('UA') => 'UA',
				                      $mod->Lang('UG') => 'UG',
				                      $mod->Lang('UK') => 'UK',
				                      $mod->Lang('UM') => 'UM',
				                      $mod->Lang('US') => 'US',
				                      $mod->Lang('UY') => 'UY',
				                      $mod->Lang('UZ') => 'UZ',
				                      $mod->Lang('VA') => 'VA',
				                      $mod->Lang('VC') => 'VC',
				                      $mod->Lang('VE') => 'VE',
				                      $mod->Lang('VG') => 'VG',
				                      $mod->Lang('VI') => 'VI',
				                      $mod->Lang('VN') => 'VN',
				                      $mod->Lang('VU') => 'VU',
				                      $mod->Lang('WF') => 'WF',
				                      $mod->Lang('WS') => 'WS',
				                      $mod->Lang('YE') => 'YE',
				                      $mod->Lang('YT') => 'YT',
				                      $mod->Lang('YU') => 'YU',
				                      $mod->Lang('ZA') => 'ZA',
				                      $mod->Lang('ZM') => 'ZM',
				                      $mod->Lang('ZW') => 'ZW'
				                    );
		}

  function StatusInfo()
	{
		return '';
	}

	function GetHumanReadableValue($as_string=true)
	{
		$ret = array_search($this->Value,$this->Countries);
		if ($as_string)
		{
		  return $ret;
		}
		else
		{
		  return array($ret);
		}
	}

	function GetFieldInput($id, &$params, $returnid)
	{
		$mod = formbuilder_utils::GetFB();
    $html5 = '';

    if ($this->GetOption('html5','0') == '1'&& $this->IsRequired()) 
		{
			$html5 = ' required';
    }
		unset($this->Countries[$mod->Lang('no_default')]);
		$js = $this->GetOption('javascript','');
		if ($this->GetOption('select_one','') != '')
			{
			$this->Countries = array_merge(array($this->GetOption('select_one','') => ''),$this->Countries);
			}
		else
			{
			$this->Countries = array_merge(array($mod->Lang('select_one') => ''),$this->Countries);
			}

		if (! $this->HasValue() && $this->GetOption('default_country','') != '')
		  {
		  $this->SetValue($this->GetOption('default_country',''));
		  }

		return $mod->CreateInputDropdown($id, 'fbrp__'.$this->Id, $this->Countries, -1,
         $this->Value, $html5.$js.$this->GetCSSIdTag());
	}

	function PrePopulateAdminForm($formDescriptor)
	{
		$mod = formbuilder_utils::GetFB();
		ksort($this->Countries);

		$main = array(
			array($mod->Lang('title_select_default_country'),
            		$mod->CreateInputDropdown($formDescriptor, 'fbrp_opt_default_country',
            		$this->Countries, -1, $this->GetOption('default_country',''))),
			array($mod->Lang('title_select_one_message'),
            		$mod->CreateInputText($formDescriptor, 'fbrp_opt_select_one',
            		$this->GetOption('select_one',$mod->Lang('select_one'))))
		);
		return array('main'=>$main,array());
	}
}

#
# EOF
#
?>
