<?php 

namespace MichaelHabib\BusinessDetails\Models;

use Model;

class Settings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    // A unique code
    public $settingsCode = 'michaelhabib_businessdetails_settings';

    // Reference to field configuration
    public $settingsFields = 'fields.yaml';
    
    
}