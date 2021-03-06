<?php
require(DRAC_ROOT . '/calculator/validation_helpers.php');

function drac_input_columns_count() {
    return 53;
}

function drac_inputs() {
    // Common descriptions used across multiple items
    $external = 'Radionuclide concentrations in parts per million for Uranium, Thorium and Rubidium and % for Potassium. Inputs must be 0 or positive and should not be left blank.';
    $internal = 'Internal radionuclide concentrations in parts per million for Uranium, Thorium and Rubidium and % for Potassium. Inputs must be 0 or positive and should not be left blank.';
    $user_external = 'Users may input directly measured values for external alpha, beta and gamma dose rates (in Gy.ka-1). Any positive inputs in these fields will override dose rates calculated from radionuclide concentrations. Inputs should be 0 or positive and should not be left blank.';
    $user_internal = 'Users may input an internal dose rate (either alpha, beta or the sum of the two; in Gy.ka-1). DRAC will assume that this value has already been corrected for attenuation. Inputs in this field will override dose rates calculated from radionuclide concentrations. Inputs should be 0 or positive and not left blank.';

    return array(
        'TI:1' => array(
            'name' => 'Project ID',
            'name_ascii' => 'Project ID',
            'description' => 'Inputs can be alphabetic, numeric or selected symbols (/ - () [] _). Spaces are not permitted.',
            'validate' => function($val){ return !empty($val); },
            'required' => true,
            'type' => 'string',
        ),
        'TI:2' => array(
            'name' => 'Sample ID',
            'name_ascii' => 'Sample ID',
            'description' => 'Inputs can be alphabetic, numeric or selected symbols (/ - () [] _). Spaces are not permitted.',
            'validate' => function($val){ return !empty($val); },
            'required' => true,
            'type' => 'string',
        ),
        'TI:3' => array(
            'name' => 'Mineral',
            'name_ascii' => 'Mineral',
            'description' => 'The mineral used for dating: quartz, feldspar or polymineral. Input must be “Q”, “F” or “PM”.',
            'validate' => function($val){ return in_array(strtoupper($val), array("Q","F","PM")); },
            'required' => true,
            'type' => 'string',
        ),
        'TI:4' => array(
            'name' => 'Conversion factors',
            'name_ascii' => 'Conversion factors',
            'description' => 'The conversion factors required to calculate dose rates from radionuclide concentrations. Users have the option of datasets from Adamiec and Aitken (1998), Guerin et al. (2011) or Liritzis et al. (2013). Input must be “AdamiecAitken1998”, “Guerinetal2011”, “Liritzisetal2013” or “X” if conversion factors are not required.',
            'validate' => function($val){ return in_array(strtolower($val), array("guerinetal2011","adamiecaitken1998","liritzisetal2013")); },
            'required' => false,
            'type' => 'string',
        ),
        'TI:5' => array(
            'name' => 'External U (ppm)',
            'name_ascii' => 'ExternalU (ppm)',
            'description' => $external,
            'validate' => function($val){ return greater_or_equal_to(0, $val); },
            'required' => false,
            'type' => 'float',
        ),
        'TI:6' => array(
            'name' => 'External δU (ppm)',
            'name_ascii' => 'errExternal U (ppm)',
            'description' => $external,
            'validate' => function($val){ return greater_or_equal_to(0, $val); },
            'required' => false,
            'type' => 'float',
        ),
        'TI:7' => array(
            'name' => 'External Th (ppm)',
            'name_ascii' => 'External Th (ppm)',
            'description' => $external,
            'validate' => function($val){ return greater_or_equal_to(0, $val); },
            'required' => false,
            'type' => 'float',
        ),
        'TI:8' => array(
            'name' => 'External δTh (ppm)',
            'name_ascii' => 'errExternal Th (ppm)',
            'description' => $external,
            'validate' => function($val){ return greater_or_equal_to(0, $val); },
            'required' => false,
            'type' => 'float',
        ),
        'TI:9' => array(
            'name' => 'External K (%)',
            'name_ascii' => 'External K (%)',
            'description' => $external,
            'validate' => function($val){ return greater_or_equal_to(0, $val); },
            'required' => false,
            'type' => 'float',
        ),
        'TI:10' => array(
            'name' => 'External δK (%)',
            'name_ascii' => 'errExternal K (%)',
            'description' => $external,
            'validate' => function($val){ return greater_or_equal_to(0, $val); },
            'required' => false,
            'type' => 'float',
        ),
        'TI:11' => array(
            'name' => 'External Rb (ppm)',
            'name_ascii' => 'External Rb (ppm)',
            'description' => $external,
            'validate' => function($val){ return greater_or_equal_to(0, $val); },
            'required' => false,
            'type' => 'float',
        ),
        'TI:12' => array(
            'name' => 'External δRb (ppm)',
            'name_ascii' => 'errExternal Rb (ppm)',
            'description' => $external,
            'validate' => function($val){ return greater_or_equal_to(0, $val); },
            'required' => false,
            'type' => 'float',
        ),
        'TI:13' => array(
            'name' => 'Calculate external Rb from K conc?',
            'name_ascii' => 'Calculate external Rb from K conc?',
            'description' => 'Option to calculate a Rubidium concentration from Potassium, using the 270:1 ratio suggested by Mejdahl (1987). Input should be yes “Y” or no “N”.',
            'validate' => function($val){ return in_array(strtoupper($val), array("Y","N")); },
            'required' => false,
            'type' => 'string',
        ),
        'TI:14' => array(
            'name' => 'Internal U (ppm)',
            'name_ascii' => 'Internal U (ppm)',
            'description' => $internal,
            'validate' => function($val){ return greater_or_equal_to(0, $val); },
            'required' => false,
            'type' => 'float',
        ),
        'TI:15' => array(
            'name' => 'Internal δU (ppm)',
            'name_ascii' => 'errInternal U (ppm)',
            'description' => $internal,
            'validate' => function($val){ return greater_or_equal_to(0, $val); },
            'required' => false,
            'type' => 'float',
        ),
        'TI:16' => array(
            'name' => 'Internal Th (ppm)',
            'name_ascii' => 'Internal Th (ppm)',
            'description' => $internal,
            'validate' => function($val){ return greater_or_equal_to(0, $val); },
            'required' => false,
            'type' => 'float',
        ),
        'TI:17' => array(
            'name' => 'Internal δTh (ppm)',
            'name_ascii' => 'errInternal Th (ppm)',
            'description' => $internal,
            'validate' => function($val){ return greater_or_equal_to(0, $val); },
            'required' => false,
            'type' => 'float',
        ),
        'TI:18' => array(
            'name' => 'Internal K (%)',
            'name_ascii' => 'Internal K (%)',
            'description' => $internal,
            'validate' => function($val){ return greater_or_equal_to(0, $val); },
            'required' => false,
            'type' => 'float',
        ),
        'TI:19' => array(
            'name' => 'Internal δK (%)',
            'name_ascii' => 'errInternal K (%)',
            'description' => $internal,
            'validate' => function($val){ return greater_or_equal_to(0, $val); },
            'required' => false,
            'type' => 'float',
        ),
        'TI:20' => array(
            'name' => 'Internal Rb (ppm)',
            'name_ascii' => 'Rb (ppm)',
            'description' => $internal,
            'validate' => function($val){ return greater_or_equal_to(0, $val); },
            'required' => false,
            'type' => 'float',
        ),
        'TI:21' => array(
            'name' => 'Internal δRb (ppm)',
            'name_ascii' => 'errRb (ppm)',
            'description' => $internal,
            'validate' => function($val){ return greater_or_equal_to(0, $val); },
            'required' => false,
            'type' => 'float',
        ),
        'TI:22' => array(
            'name' => 'Calculate internal Rb from K conc?',
            'name_ascii' => 'Calculate internal Rb from K conc?',
            'description' => 'Option to calculate an internal Rubidium concentration from Potassium, using the 270:1 ratio suggested by Mejdahl (1987). Input should be yes “Y” or no “N”.',
            'validate' => function($val){ return in_array(strtoupper($val), array("Y","N")); },
            'required' => false,
            'type' => 'string',
        ),
        'TI:23' => array(
            'name' => 'User external Ḋα (Gy.ka-1)',
            'name_ascii' => 'User external alphadoserate (Gy.ka-1)',
            'description' => $user_external,
            'validate' => function($val){ return greater_or_equal_to(0, $val); },
            'required' => false,
            'type' => 'float',
        ),
        'TI:24' => array(
            'name' => 'User external δḊα (Gy.ka-1)',
            'name_ascii' => 'errUser external alphadoserate (Gy.ka-1)',
            'description' => $user_external,
            'validate' => function($val){ return greater_or_equal_to(0, $val); },
            'required' => false,
            'type' => 'float',
        ),
        'TI:25' => array(
            'name' => 'User external Ḋβ (Gy.ka-1)',
            'name_ascii' => 'User external betadoserate (Gy.ka-1)',
            'description' => $user_external,
            'validate' => function($val){ return greater_or_equal_to(0, $val); },
            'required' => false,
            'type' => 'float',
        ),
        'TI:26' => array(
            'name' => 'User external δḊβ (Gy.ka-1)',
            'name_ascii' => 'errUser external betadoserate (Gy.ka-1)',
            'description' => $user_external,
            'validate' => function($val){ return greater_or_equal_to(0, $val); },
            'required' => false,
            'type' => 'float',
        ),
        'TI:27' => array(
            'name' => 'User external Ḋγ (Gy.ka-1)',
            'name_ascii' => 'User external gamma doserate (Gy.ka-1)',
            'description' => $user_external,
            'validate' => function($val){ return greater_or_equal_to(0, $val); },
            'required' => false,
            'type' => 'float',
        ),
        'TI:28' => array(
            'name' => 'User external δḊγ (Gy.ka-1)',
            'name_ascii' => 'errUser external gammadoserate (Gy.ka-1)',
            'description' => $user_external,
            'validate' => function($val){ return greater_or_equal_to(0, $val); },
            'required' => false,
            'type' => 'float',
        ),
        'TI:29' => array(
            'name' => 'User internal Ḋr (Gy.ka-1)',
            'name_ascii' => 'User internal doserate (Gy.ka-1)',
            'description' => $user_internal,
            'validate' => function($val){ return greater_or_equal_to(0, $val); },
            'required' => false,
            'type' => 'float',
        ),
        'TI:30' => array(
            'name' => 'User internal δḊr (Gy.ka-1)',
            'name_ascii' => 'errUser internal doserate (Gy.ka-1)',
            'description' => $user_internal,
            'validate' => function($val){ return greater_or_equal_to(0, $val); },
            'required' => false,
            'type' => 'float',
        ),
        'TI:31' => array(
            'name' => 'Scale Ḋγ at shallow depths?',
            'name_ascii' => 'Scale gammadoserate at shallow depths?',
            'description' => 'Users may choose to scale gamma dose rates for samples taken within 0.3 m of the ground surface. The scaling factors of Aitken (1985) are used. Input should be yes “Y” or no “N”.',
            'validate' => function($val){ return in_array(strtoupper($val), array("Y","N")); },
            'required' => false,
            'type' => 'string',
        ),
        'TI:32' => array(
            'name' => 'Grain size min (µm)',
            'name_ascii' => 'Grain size min (microns)',
            'description' => 'The grain size range analysed. DRAC can be used for the grain size ranges between 1 and 1000 µm. Inputs should range between 1 and 1000 and not be left blank.',
            'validate' => function($val){ return within_range(1, 1000, $val); },
            'required' => true,
            'type' => 'float',
        ),
        'TI:33' => array(
            'name' => 'Grain size max (µm)',
            'name_ascii' => 'Grain size max (microns)',
            'description' => 'The grain size range analysed. DRAC can be used for the grain size ranges between 1 and 1000 µm. Inputs should range between 1 and 1000 and not be left blank.',
            'validate' => function($val){ return within_range(1, 1000, $val); },
            'required' => true,
            'type' => 'float',
        ),
        'TI:34' => array(
            'name' => 'α-Grain size attenuation factors',
            'name_ascii' => 'alpha-Grain size attenuation',
            'description' => 'The grain size attenuation factors for the alpha dose rate. Users have the option of datasets from Bell (1980) and Brennan et al. (1991). Input must be “Bell1980” or “Brennanetal1991”.',
            'validate' => function($val){ return in_array(strtolower($val), array("bell1980","brennanetal1991")); },
            'required' => true,
            'type' => 'string',
        ),
        'TI:35' => array(
            'name' => 'β-Grain size attenuation factors',
            'name_ascii' => 'beta-Grain size attenuation ',
            'description' => 'The grain size attenuation factors for the beta dose rate. Users have the option of datasets from Mejdahl (1979), Brennan (2003) and Guerin et al. (2012) for quartz or feldspar. Input must be “Mejdahl1979”, “Brennan2003”, “Guerinetal2012-Q” or “Guerinetal2012-F” .',
            'validate' => function($val){ return in_array(strtolower($val), array("mejdahl1979","brennan2003","guerinetal2012-q","guerinetal2012-f")); },
            'required' => true,
            'type' => 'string',
        ),
        'TI:36' => array(
            'name' => 'Etch depth min (µm)',
            'name_ascii' => 'Etch depth min (microns)',
            'description' => 'The user defined etch depth range (µm). Inputs should range between 0 and 30 and not be left blank. ',
            'validate' => function($val){ return within_range(0, 30, $val); },
            'required' => true,
            'type' => 'float',
        ),
        'TI:37' => array(
            'name' => 'Etch depth max (µm)',
            'name_ascii' => 'Etch depth max (microns)',
            'description' => 'The user defined etch depth range (µm). Inputs should range between 0 and 30 and not be left blank. ',
            'validate' => function($val){ return within_range(0, 30, $val); },
            'required' => true,
            'type' => 'float',
        ),
        'TI:38' => array(
            'name' => 'β-Etch attenuation factor',
            'name_ascii' => 'beta-Etch depth attenuation factor',
            'description' => 'The etch depth attenuation factors for the beta dose rate. Users have the option of datasets from Bell (1979) and Brennan (2003). Input must be “Bell1979” or “Brennan2003”. Note: only the dataset of Bell (1980) is provided for attenuation of the alpha dose rate by etching.',
            'validate' => function($val){ return in_array(strtolower($val), array("bell1979","brennan2003")); },
            'required' => false,
            'type' => 'string',
        ),
        'TI:39' => array(
            'name' => 'a-value',
            'name_ascii' => 'a-value',
            'description' => 'Alpha track efficiency value and uncertainty defined by the user. Inputs should be 0 or positive and not left blank.',
            'validate' => function($val){ return within_range(0, 1, $val); },
            'required' => false,
            'type' => 'float',
        ),
        'TI:40' => array(
            'name' => 'δa-value',
            'name_ascii' => 'erra-value',
            'description' => 'Alpha track efficiency value and uncertainty defined by the user. Inputs should be 0 or positive and not left blank.',
            'validate' => function($val){ return within_range(0, 1, $val); },
            'required' => false,
            'type' => 'float',
        ),
        'TI:41' => array(
            'name' => 'Water content (%)',
            'name_ascii' => 'Water content ((wet weight - dry weight)/dry weight) %',
            'description' => 'Sediment water content (%) over the burial period. Inputs should be 0 or positive and not be left blank.',
            'validate' => function($val){ return greater_or_equal_to(0, $val); },
            'required' => true,
            'type' => 'float',
        ),
        'TI:42' => array(
            'name' => 'δWater content (%)',
            'name_ascii' => 'errWater content %',
            'description' => 'Sediment water content (%) over the burial period. Inputs should be 0 or positive and not be left blank.',
            'validate' => function($val){ return within_range(0, 100, $val); },
            'required' => true,
            'type' => 'float',
        ),
        'TI:43' => array(
            'name' => 'Depth (m)',
            'name_ascii' => 'Depth (m)',
            'description' => 'Depth and uncertainty from which sample was extracted beneath the ground surface. Inputs should be 0 or positive and not left blank. If user defined Ḋc will be used then an "X" must be input.',
            'validate' => function($val, $inputs){
              if( greater_or_equal_to(0, $val) ) {
                  foreach([49,50] as $i) {
                      if( !valid_blank( $inputs[$i] ) ) {
                        return false;
                      }
                  }
                  return true;
              } else {
                  return false;
              }
            },
            'required' => false,
            'type' => 'float',
        ),
        'TI:44' => array(
            'name' => 'δDepth (m)',
            'name_ascii' => 'errDepth (m)',
            'description' => 'Depth and uncertainty from which sample was extracted beneath the ground surface. Inputs should be 0 or positive and not left blank. If user defined Ḋc will be used then an "X" must be input.',
            'validate' => function($val, $inputs){
              if( greater_or_equal_to(0, $val) ) {
                  foreach([49,50] as $i) {
                      if( !valid_blank( $inputs[$i] ) ) {
                        return false;
                      }
                  }
                  return true;
              } else {
                  return false;
              }
            },
            'required' => false,
            'type' => 'float',
        ),
        'TI:45' => array(
            'name' => 'Overburden density (g.cm-3)',
            'name_ascii' => 'Overburden density (g cm-3)',
            'description' => 'Density of the overlying sediment matrix from which the sample was taken. Inputs should be 0 or positive and not be left blank. If user defined Ḋc will be used then an "X" must be input.',
            'validate' => function($val, $inputs){
              if( greater_or_equal_to(0, $val) ) {
                  foreach([49,50] as $i) {
                      if( !valid_blank( $inputs[$i] ) ) {
                        return false;
                      }
                  }
                  return true;
              } else {
                  return false;
              }
            },
            'required' => false,
            'type' => 'float',
        ),
        'TI:46' => array(
            'name' => 'δOverburden density (g.cm-3)',
            'name_ascii' => 'errOverburden density (g cm-3)',
            'description' => 'Density of the overlying sediment matrix from which the sample was taken. Inputs should be 0 or positive and not be left blank. If user defined Ḋc will be used then an "X" must be input.',
            'validate' => function($val, $inputs){
              if( greater_or_equal_to(0, $val) ) {
                  foreach([49,50] as $i) {
                      if( !valid_blank( $inputs[$i] ) ) {
                        return false;
                      }
                  }
                  return true;
              } else {
                  return false;
              }
            },
            'required' => false,
            'type' => 'float',
        ),
        'TI:47' => array(
            'name' => 'Latitude (decimal degrees)',
            'name_ascii' => 'Latitude (decimal degrees)',
            'description' => 'Latitude and longitude of sample location (in degree decimals). Positive values should be used for northern latitudes and eastern longitudes and negative values for southern latitudes and western longitudes. Inputs should range from – 90 to 90° for latitudes and -180 to 180° for longitude. If user defined Ḋc will be used then an "X" must be input.',
            'validate' => function($val, $inputs){
              if( within_range(-90, 90, $val) ) {
                  foreach([49,50] as $i) {
                      if( !valid_blank( $inputs[$i] ) ) {
                        return false;
                      }
                  }
                  return true;
              } else {
                  return false;
              }
            },
            'required' => false,
            'type' => 'float',
        ),
        'TI:48' => array(
            'name' => 'Longitude (decimal degrees)',
            'name_ascii' => 'Longitude (decimal degrees)',
            'description' => 'Latitude and longitude of sample location (in degree decimals). Positive values should be used for northern latitudes and eastern longitudes and negative values for southern latitudes and western longitudes. Inputs should range from – 90 to 90° for latitudes and -180 to 180° for longitude. If user defined Ḋc will be used then an "X" must be input.',
            'validate' => function($val, $inputs){
              if( within_range(-180, 180, $val) ) {
                  foreach([49,50] as $i) {
                      if( !valid_blank( $inputs[$i] ) ) {
                        return false;
                      }
                  }
                  return true;
              } else {
                  return false;
              }
            },
            'required' => false,
            'type' => 'float',
        ),
        'TI:49' => array(
            'name' => 'Altitude (m asl)',
            'name_ascii' => 'Altitude (m)',
            'description' => 'Altitude of sample location in metres above sea level. Input should be less than 5000 and not left blank. If user defined Ḋc will be used then an "X" must be input.',
            'validate' => function($val, $inputs){
              if( less_than(5000, $val) ) {
                  foreach([49,50] as $i) {
                      if( !valid_blank( $inputs[$i] ) ) {
                        return false;
                      }
                  }
                  return true;
              } else {
                  return false;
              }
            },
            'required' => false,
            'type' => 'float',
        ),
        'TI:50' => array(
            'name' => 'User defined Ḋc (Gy.ka-1)',
            'name_ascii' => 'User cosmicdoserate (Gy.ka-1)',
            'description' => 'Users may input a cosmic dose rate (in Gy.ka-1). Inputs in these fields will override the DRAC calculated cosmic dose rate. Inputs should be positive or “X” if not required, and not left blank.',
            'validate' => function($val){ return greater_or_equal_to(0, $val); },
            'required' => false,
            'type' => 'float',
        ),
        'TI:51' => array(
            'name' => 'User defined δḊc (Gy.ka-1)',
            'name_ascii' => 'errUser cosmicdoserate (Gy.ka-1)',
            'description' => 'Users may input a cosmic dose rate (in Gy.ka-1). Inputs in these fields will override the DRAC calculated cosmic dose rate. Inputs should be positive or “X” if not required, and not left blank.',
            'validate' => function($val){ return greater_or_equal_to(0, $val); },
            'required' => false,
            'type' => 'float',
        ),
        'TI:52' => array(
            'name' => 'De (Gy)',
            'name_ascii' => 'De (Gy)',
            'description' => 'Sample De and uncertainty (in Gy). Inputs should be positive or “X” if not required, and not left blank.',
            'validate' => function($val){ return greater_than(0, $val); },
            'required' => false,
            'type' => 'float',
        ),
        'TI:53' => array(
            'name' => 'δDe (Gy)',
            'name_ascii' => 'errDe (Gy)',
            'description' => 'Sample De and uncertainty (in Gy). Inputs should be positive or “X” if not required, and not left blank.',
            'validate' => function($val){ return greater_than(0, $val); },
            'required' => false,
            'type' => 'float',
        ),
    );
}
