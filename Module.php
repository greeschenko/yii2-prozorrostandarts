<?php

namespace greeschenko\prozorrostandarts;

class Module extends \yii\base\Module
{
    const VER = '0.1-dev';

    public $types = [
        'UNIT' => 'https://raw.githubusercontent.com/openprocurement/standards/master/unit_codes/recommended/uk.json',
        'CVA' => 'http://standards.openprocurement.org/classifiers/cav/uk.json',
        'CAV-PS' => 'http://standards.openprocurement.org/classifiers/cav_v2/uk.json',
        'CPV' => 'http://standards.openprocurement.org/classifiers/cpv/uk.json',
        'DK021' => 'https://raw.githubusercontent.com/openprocurement/standards/master/classifiers/dk021/uk.json',
        'DKPP' => 'https://raw.githubusercontent.com/openprocurement/standards/master/classifiers/dkpp/uk.json',
        'INN' => 'https://raw.githubusercontent.com/openprocurement/standards/master/classifiers/inn/en_pretty.json',
        'ATC' => 'https://raw.githubusercontent.com/openprocurement/standards/master/classifiers/atc/en_pretty.json',
        'KVTSPZ' => 'https://raw.githubusercontent.com/openprocurement/standards/master/classifiers/kvtspz/uk_pretty.json',
    ];

    public function init()
    {
        parent::init();

        $this->components = [
        ];
    }
}
