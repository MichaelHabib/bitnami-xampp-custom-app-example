<?php

namespace Backend\Widgets;

use Backend\Classes\WidgetBase;

class widgetp1w1 extends WidgetBase {

    /**
     * @var string A unique alias to identify this widget.
     */
    protected $defaultAlias = 'widgetp1w1';

    // ...
//    public function __construct() {
//        parent::__construct();
//
////    $myWidget = new Lists($this);
////    $myWidget->alias = 'myWidget';
////    $myWidget->bindToController();
//
//    }
    public function init() {
        
    }

    public function render() {
        return $this->makePartial('default');

    }
 protected function loadAssets()
    {
    }
}

