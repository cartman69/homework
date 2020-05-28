<?php
include_once("Hw_Model.php");
include_once("Content_model.php");


class Entry_model extends Hw_Model {
    public $id;
    public $text;
    public $dueDate;
    public $content;

    public function __construct()
    {
        $this->tableNameNoprefix = 'entries';

        parent::__construct();
    }

    public function insert_entry()
    {

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