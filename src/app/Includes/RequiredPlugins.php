<?php

namespace App\Includes;

use Noodlehaus\Config;
use App\Includes\RequiredPlugins\ConfigNoFile;
use App\Includes\RequiredPlugins\Core;
use App\Includes\RequiredPlugins\Bundle;

/**
 * Required Plugins
 */
class RequiredPlugins
{

    protected $file;
    protected $defaultFile;
    protected $config;

    public function setup()
    {
        $this->lib = new Core();
        $this->getFile();
        $this->load();
    }

    /**
     * Get file
     */
    protected function getFile()
    {
        $this->file = (has_filter('ssm/required_plugins/config_path') ? apply_filters('ssm/required_plugins/config_path', $this->file) : $this->getDefaultFile());
    }

    /**
     * Get default file format
     */
    protected function getDefaultFile()
    {
        $result = glob(get_stylesheet_directory() . '/bundle.*');
        $result = empty($result) ? : $result[0];
        
        return $result;
    }

    /**
     * Load
     */
    protected function load()
    {
        if (!file_exists($this->file)) return;
        if (!$this->isFileSupported()) return;
        $this->config = new Config($this->file);
        ($this->isMultiple() ? $this->loadEach() : $this->run($this->config));
    }

    /**
     * Is file supported
     *
     * @return boolean
     */
    protected function isFileSupported()
    {
        return in_array(pathinfo($this->file, PATHINFO_EXTENSION), ['json', 'yaml', 'yml', 'php']);
    }

    /**
     * Is multidimensional config
     *
     * @return boolean
     */
    protected function isMultiple()
    {
        return (is_array(current($this->config->all())));
    }

    /**
     * Load each from multidimensional config
     */
    protected function loadEach()
    {   
        foreach ($this->config as $config) {
            $this->run(new ConfigNoFile($config));
        }
    }

    /**
     * Run
     */
    protected function run($config)
    {
        (new Bundle($config));
    }
    
}