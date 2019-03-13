<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_links extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(array(
            'short_link' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'unique' => TRUE,
            ),
            'url' => array(
                'type' => 'TEXT',
            ),
        ));
        $this->dbforge->create_table('links');
    }

    public function down()
    {
        $this->dbforge->drop_table('links');
    }
}