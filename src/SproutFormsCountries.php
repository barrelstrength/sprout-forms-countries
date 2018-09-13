<?php
/**
 * Sprout Forms Countries plugin for Craft CMS 3.x
 *
 * Country fields for Sprout Forms
 *
 * @link      https://www.barrelstrengthdesign.com/
 * @copyright Copyright (c) 2018 Barrel Strength
 */

namespace barrelstrength\sproutformscountries;

use barrelstrength\sproutforms\services\Fields;
use barrelstrength\sproutforms\events\RegisterFieldsEvent;
use barrelstrength\sproutformscountries\integrations\sproutforms\fields\Countries;
use Craft;
use craft\base\Plugin;
use yii\base\Event;

class SproutFormsCountries extends Plugin
{
    /**
     * @var bool
     */
    public $hasCpSettings = false;

    /**
     * @var bool
     */
    public $hasCpSection = false;

    /**
     * @var string
     */
    public $schemaVersion = '1.0.0';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        Craft::setAlias('@sproutformscountriesicons', $this->getBasePath().'/web/icons');

        Event::on(Fields::class, Fields::EVENT_REGISTER_FIELDS, function(RegisterFieldsEvent $event) {
            $event->fields[] = new Countries();
        });
    }
}
