<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plugins extends CI_Controller {

    private $_plugins;

    public function __construct()
    {
        parent::__construct();

        $this->_plugins = $this->Plugins_model->get_plugins();

        $this->plugins_lib->update_all_plugin_headers();
    }

    public function index()
    {

        $data = array();

        $data['plugins'] = $this->Plugins_model->get_plugins();

        $this->load->view('plugin_list', $data);
    }

    public function config()
    {
        $data = array();

        if( ! $plugin = $this->input->get('plugin'))
        {
            redirect('/');
        }
        elseif( ! isset($this->_plugins[$plugin]))
        {
            die("Unknown plugin {$plugin}");
        }
        elseif($this->_plugins[$plugin]->status != 1)
        {
            die("The plugin {$plugin} isn't enabled");
        }
        else
        {
            $data['plugin'] = $plugin;

            // Just some random stuff to send to the data, not needed unless the plugin
            // controller requires it
            $plugin_data = array('some' => 'data');

            if( ! $data['plugin_content'] = $this->plugins_lib->view_controller($plugin, $plugin_data))
            {
                die('No controller for this plugin');
            }
        }


        $this->load->view('plugin_settings', $data);
    }

}
