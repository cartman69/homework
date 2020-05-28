<?php
include_once("Hw_Model.php");

class Content_model extends Hw_Model
{

    public function __construct()
    {
        $this->tableNameNoprefix = 'content';

        parent::__construct();
    }

    public function formFromRecord($record)
    {
        $form = parent::formFromRecord($record);
        unset ($form['id_label']);
        $form['id'] = form_hidden(
            "id",
            isset($record["id"])?$record["id"]:''
        );
        $form['submit'] = form_submit(array('value' => 'Submit'));

        return $form;
    }
}

