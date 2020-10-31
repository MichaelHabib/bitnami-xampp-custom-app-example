<?php namespace MichaelHabib\BusinessInformation;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name'=> 'Business Information',
            'description' => 'attemping to create my 1st plugin in OctoberCMS',
            'author' => 'Michael Habib',
            'icon' => 'icon-leaf'
        ];
    }

    public function registerComponents()
    {
        return [
//            '\MichaelHabib\BusinessInformation\Componenets\BusinessInformation' => 'BusinessDetails'
        ];
    }
    
public function registerSettings()
{
    return [
        'settings' => [
            'label'       => 'Business InformationSettings',
            'description' => 'Manage Business InformationSettings.',
            'category'    => 'CUSTOM',
            'icon'        => 'icon-building',
            'class'       => 'MichaelHabib\BusinessInformationSettings\Models\Settings',
            'order'       => 500,
            'keywords'    => 'security location',
//            'permissions' => ['acme.users.access_settings']
        ]
    ];
}

}
