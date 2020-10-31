<?php

namespace MichaelHabib\TestPlugin1;

use System\Classes\PluginBase;
use Cms\Classes\Page;
use Cms\Classes\Theme;
use System\Classes\PluginManager;
use System\Classes\SettingsManager;
use File;
use stdClass;

class Plugin extends PluginBase {

    use \System\Traits\ConfigMaker;

    public $require = [];

    /**
     *  returns information about the plugin.
     * https://octobercms.com/docs/plugin/registration#registration-methods
     * --------------------------------------------
     */
    public function pluginDetails() {
        return [
            'name' => 'TestPlugin1',
            'description' => '',
            'author' => 'Michael Habib',
            'icon' => 'icon-leaf',
            'iconSvg' => '',
            'homepage' => '',
        ];

    }

    /**
     * register method, called when the plugin is first registered.
     * https://octobercms.com/docs/plugin/registration#registration-methods
     *
     */
    public function register() {
//        parent::register();
        $this->addExtraFields();

    }

    public function addExtraFields() {
        \Event::listen('backend.form.extendFields', function($widget) {
            if (PluginManager::instance()->hasPlugin('RainLab.Pages') && $widget->model instanceof \RainLab\Pages\Classes\Page) {
                if (is_null($widget->arrayName)) {

                    $paths = [];
                    $paths['plugin'] = dirname($this->guessConfigPath());
                    $paths['config'] = $paths['plugin'] . '/config/';
                    $paths['sectionsrepeaterconfig'] = $paths['config'] . '/sectionsrepeater';
                    $paths['modulesFolder'] = $paths['sectionsrepeaterconfig'] . '/modules/';


                    $containerDefaultFields = $this->makeConfig($paths['sectionsrepeaterconfig'] . '/containerDefaultFields.yaml');
                    $containerDefaultFieldsArray = &$containerDefaultFields->{key($containerDefaultFields)};


                    $sectionsConfig = $this->makeConfig($paths['sectionsrepeaterconfig'] . '/sections.yaml');

                    $this->addRepeaterGroupsFields($sectionsConfig, $containerDefaultFieldsArray);
                    $this->sortRepeaterGroupsFields($sectionsConfig);

                    $rowsConfig = $this->makeConfig($paths['sectionsrepeaterconfig'] . '/rows.yaml');
                    $this->addRepeaterGroupsFields($rowsConfig, $containerDefaultFieldsArray);
                    $this->sortRepeaterGroupsFields($rowsConfig);


                    $modulesConfig = $this->getAllConfig($paths['modulesFolder']);
                    $this->addRepeaterGroupsFields($modulesConfig, $containerDefaultFieldsArray);
                    $this->sortRepeaterGroupsFields($modulesConfig);

                    foreach ($modulesConfig as $name => &$properties) {
                        array_set($properties, 'fields.backendHeader.label', $properties['name']);
                    }

                    foreach ($rowsConfig as $name => &$properties) {
                        array_set($properties, 'fields.backendHeader.label', $properties['name']);
                        array_set($properties, 'fields.modules.groups', $modulesConfig);
                    }

                    foreach ($sectionsConfig as $name => &$properties) {
                        array_set($properties, 'fields.backendHeader.label', $properties['name']);
                        array_set($properties, 'fields.rows.groups', $rowsConfig);
                    }



                    $widget->addFields([
                        'viewBag[contentsections]' => [
                            'label' => 'Content Sections ',
                            'type' => 'repeater',
                            'tab' => 'Content Sections',
//                            'groups' => $paths['sectionsrepeaterconfig'] . '/sections.yaml',
                            'groups' => $sectionsConfig,
                        ],
                            ], 'secondary');
                }


//                $reflector = new \ReflectionClass($modulesConfig);
//                echo $reflector->getFileName();
//                dd($reflector);
//                $var = $this->getAllConfig($paths['modulesFolder']);
//                $var2 = $this->makeConfig($paths['sectionsrepeaterconfig'] . '/OLD_modules.yaml');
            }
            // end If Plugin ...
        });
        

    }

    public function array_add_before() {
        
    }

    /**
     *
     * 
     *
     */
    public function addRepeaterGroupsFields($config, $fields) {
        $addTo = 'fields';
//        $config = $this->makeConfig($config);
        foreach ($config as $key => &$group) {
            $groupFields = &$group[$addTo];
            $groupFields = array_merge($groupFields, $fields);
        }
        return $config;

    }

    /**
     *
     * Sort repeater group fields based on the value of 'order' property per field.
     *
     */
    public function sortRepeaterGroupsFields($config) {
        $config = $this->makeConfig($config);
        foreach ($config as $key => &$group) {
            $lastOrderValue = 0;
            $orderBy = 'order';
            $groupFields = &$group['fields'];
            foreach ($groupFields as $fieldName => &$fieldProperties) {
                //Auto increment order value ...
                if (!array_key_exists($orderBy, $fieldProperties)) {
                    $fieldProperties[$orderBy] = null;
                }
                if ($fieldProperties[$orderBy]) {
                    $lastOrderValue = $fieldProperties[$orderBy];
                } else {
                    $lastOrderValue = ++$lastOrderValue;
                    $fieldProperties[$orderBy] = $lastOrderValue;
                }
            }
            //Sort fields based on order value ...
            $groupFields = array_sort($groupFields, function($value) {
                $key = 'order';
                if (!array_key_exists($key, $value)) {
                    $value[$key] = null;
                }
                return $value[$key];
            });
        }
        return $config;

    }

    /**
     *
     * Return all config files from a folder as an array of file names or as a config array
     * if $returnFilenames is FALSE.
     *
     */
    public function getAllConfig($path, $requiredConfig = []) {
        $files = File::Files($path);
        $allConfig = [];
        foreach ($files as $file) {
            $filePath = $file->getRealPath();
            $config = $this->makeConfig($filePath, $requiredConfig);
//            $json = json_decode(json_encode($config));
//            array_combine($allConfig[key($config)], $config);
            $allConfig[key($config)] = get_object_vars($config)[key($config)];
        }
        return $this->makeConfig($allConfig);

    }

    /**
     * boot method, called right before the request route.
     * https://octobercms.com/docs/plugin/registration#registration-methods
     *
     */
    public function boot() {
        parent::boot();

    }

    /**
     * registers additional markup tags that can be used in the CMS.
     * https://octobercms.com/docs/plugin/registration#extending-twig
     *
     */
    public function registerMarkupTags() {
        return [
            'filters' => [
                // A global function, i.e str_plural()
                'strs' => 'str_plural',
            // A local method, i.e $this->makeTextAllCaps()
//                'stru' => [$this, 'makeTextAllCaps']
            ],
            'functions' => [
                // A static method call, i.e Form::open()
//                'hi1' => ['October\Rain\Html\Form', 'open'],
                // Using an inline closure
                'hi2' => function() {
                    return 'Hello World!';
                }
            ]
        ];

    }

    /**
     * registers any front-end components used by this plugin.
     * https://octobercms.com/docs/plugin/components#component-registration
     *
     */
    public function registerComponents() {
        return [
            '\MichaelHabib\TestPlugin1\Componenets\Componentp1c1' => 'Componentp1c1'
        ];

    }

    public function registerNavigation() {
        parent::registerNavigation();
//        return [
//            'testplugin1' => [
//                'label' => 'Test Plugin 1',
//                'url' => Backend::url('michaelhabib/testplugin1'),
//                'icon' => 'icon-pencil',
//                'permissions' => ['acme.blog.*'],
//                'order' => 500,
//                'sideMenu' => [
//                    'posts' => [
//                        'label' => 'Posts',
//                        'icon' => 'icon-copy',
//                        'url' => Backend::url('acme/blog/posts'),
//                        'permissions' => ['acme.blog.access_posts']
//                    ],
//                    'categories' => [
//                        'label' => 'Categories',
//                        'icon' => 'icon-copy',
//                        'url' => Backend::url('acme/blog/categories'),
//                        'permissions' => ['acme.blog.access_categories']
//                    ]
//                ]
//            ]
//        ];

    }

    /**
     * registers any back-end permissions used by this plugin.
     * https://octobercms.com/docs/backend/users#permission-registration
     *
     */
    public function registerPermissions() {
        parent::registerPermissions();
//        return [
//            'acme.blog.access_posts' => [
//                'label' => 'Manage the blog posts',
//                'tab' => 'Blog',
//                'order' => 200,
//                 'roles' => ['developer']
//            ],
//                // ...
//        ];

    }

    /**
     * registers any back-end configuration links used by this plugin.
     * https://octobercms.com/docs/plugin/settings#link-registration
     */
    public function registerSettings() {
        parent::registerSettings();
        return [
            'settings' => [
                'label' => 'BusinessDetails Settings',
                'description' => 'Manage Business Details.',
                'category' => 'CUSTOM',
                'icon' => 'icon-building',
                'class' => 'MichaelHabib\BusinessDetails\Models\Settings',
                'order' => 500,
                'keywords' => 'security location',
                'permissions' => ['acme.users.access_settings']
            ]
        ];

    }

    /**
     * registers any back-end form widgets supplied by this plugin.
     * https://octobercms.com/docs/backend/widgets#form-widget-registration
     *
     */
    public function registerFormWidgets() {
        parent::registerFormWidgets();
        return [
//            'Backend\FormWidgets\CodeEditor' => 'codeeditor',
//            'Backend\FormWidgets\RichEditor' => 'richeditor'
        ];

    }

    /**
     * https://octobercms.com/docs/backend/widgets#report-widget-registration
     * registers any back-end report widgets, including the dashboard widgets.
     *
     */
    public function registerReportWidgets() {
        parent::registerReportWidgets();

    }

    /**
     * registers any custom list column types supplied by this plugin.
     * https://octobercms.com/docs/backend/lists#custom-column-types
     *
     */
    public function registerListColumnTypes() {
        parent::registerListColumnTypes();
        return [
// A local method, i.e $this->evalUppercaseListColumn()
//            'uppercase' => [$this, 'evalUppercaseListColumn'],
//            
// Using an inline closure
            'loveit' => function($value) {
                return 'I love ' . $value;
            }
        ];

    }

    /**
     * registers any mail view layouts supplied by this plugin.
     * https://octobercms.com/docs/services/mail#mail-template-registration
     *
     */
    public function registerMailLayouts() {
        return [
//            'marketing' => 'acme.blog::layouts.marketing',
//            'notification' => 'acme.blog::layouts.notification',
        ];

    }

    /**
     * registers any mail view partials supplied by this plugin.
     * https://octobercms.com/docs/services/mail#mail-template-registration
     *
     */
    public function registerMailPartials() {
        return [
//            'tracking' => 'acme.blog::partials.tracking',
//            'promotion' => 'acme.blog::partials.promotion',
        ];

    }

    /**
     * registers scheduled tasks that are executed on a regular basis.
     * https://octobercms.com/docs/plugin/scheduling#defining-schedules
     *
     */
    public function registerSchedule($schedule) {
//        $schedule->call(function () {
//            \Db::table('recent_users')->delete();
//        })->daily();

    }

}

