<?php

namespace MichaelHabib\testplugin1\Componenets;

use \CMS\Classes\ComponentBase;
use RainLab\Pages\Classes\Page;
use RainLab\Pages\Classes\PageList;
use Cms\Classes\Theme;
use Illuminate\Support\Debug\Dumper;

class Componentp1c1 extends ComponentBase {

    use \System\Traits\ConfigMaker;

    public function componentDetails() {
        return [
            'name' => 'Componentp1c1',
            'description' => 'Componentp1c1 description ....'
        ];

    }

    public function defineProperties() {
        return [
//            'allOptions' => [
//                'title' => 'Max items',
//                'description' => 'The most amount of todo items allowed',
//                'default' => 10,
//                'type' => 'string',
//                'validationPattern' => '^[0-9]+$',
//                'validationMessage' => 'The Max Items property can contain only numeric symbols',
//                'required' => false,
//                'placeholder' => 'placeholder',
//                'options' => ['option1' => 'option1value'],
//                'depends' => [],
//                'group' => [],
//                'showExternalParam' => []
//            ],
            'maxItems' => [
                'title' => 'Max items',
                'description' => 'The most amount of todo items allowed',
                'default' => 10,
                'type' => 'string',
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => 'The Max Items property can contain only numeric symbols',
                'required' => false,
            ],
            'dropdownName' => [
                'title' => 'Dropdown',
                'description' => 'The most amount of todo items allowed',
                'default' => 1,
                'type' => 'dropdown',
                'required' => false,
                'placeholder' => 'Select ...',
            ],
        ];

    }

    public function getDropdownNameOptions() {
        // return Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');
        return [
            "opt1" => 'opt1 value',
            "opt2" => 'opt2 value',
            "opt3" => 'opt3 value',
        ];

    }

    public function init() {
//        $this->setExtraFields();

    }

    public function onStart() {
        
    }

    public function onRun() {
        
    }

    public function onRender() {
        $this->page['var'] = 'Maximum items allowed: ' . $this->property('maxItems');

    }

    public function myfunc() {
        
    }

    public function ddd(...$args) {
        foreach ($args as $x) {
            (new Dumper)->dump($x);
        }

    }

    public function d() {
//        $this->ddd($this->controller);
//        $this->ddd($this->guessConfigPath());

        $theme = Theme::getActiveTheme();


        $pageListInstance = new PageList($theme);
        $pages = $pageListInstance->listPages();
        $pagesViewBag = [];
        foreach ($pages as $page) {
            $pagesViewBag[] = $page->getViewBag();
        }


        return [
            '$this' => $this,
            'getpath' => $this->getPath(),
            'guessConfigPath' => $this->guessConfigPath(),
//            'controller' => $this->ddd($this->controller),
//            
//             --- Dumping variables assigned above
//            'pages' => $this->ddd($pages),
//            'pagesViewBag' => $this->ddd($pagesViewBag),
//            
//             --- Using Page:: class
//            'Page::all()' => dd(Page::all()),
//            'demos-demo-layout-test1.htm properties' => dd(Page::loadCached($theme, 'demos-demo-layout-test1.htm')->getViewBag()->getProperties()),
//            'homePageByFileName' => dd(Page::loadCached($theme, 'home.htm')->getViewBag()->getProperties()),
//            
//            --- Dealing with components 
//                        'findComponentByName'=>dd($this->controller->findComponentByName('staticMenu')),
//                        
//            --- EXPEREMENTAL 
//            'homePageByURL' => Page::url('/'),
//            'get1stPageViewBag' => dd(Page::all()->first()->getViewBag()),
//            'homePageByURL2' => dd(Page::all()->where('items.*.viewBag.url','=','/')), //Not Working 
//            'x'=> \Cms\Classes\Controller::instance(),
        ];

    }

}

