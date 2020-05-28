<?php
/**
 * @property CI_DB $db              This is the platform-independent base Active Record implementation class.
 *
 */

class Hw_Model extends \CI_Model
{
    protected $debug = true;
    protected $tableName;
    protected $tableNameNoprefix;
    protected $fieldsInformations = null;
    protected $currentId = null;
    protected $current_record;

    public function __construct()
    {
        $this->load->database();
//        echo get_class($this->db);die;
        $this->tableName = $this->db->dbprefix($this->tableNameNoprefix);
    }
    
    public function getAll()
    {
        $query = $this->db->get($this->tableName);
        return $query->result();
    }
    
    public function find($id)
    {
        $query = $this->db->get_where($this->tableName, array('id' => $id), 1);
        $result = $query->result_array();
        if(isset($result[0])) {
			return $result[0];
		}else{
        	return false;
		}
    }
    
    public function fieldsInformations()
    {
        if(null == $this->fieldsInformations)
        {
             $temp = $this->db->field_data($this->tableName);
             foreach ($temp as $field)
             {
                $this->fieldsInformations[$field->name] = $field;
             }
        }
        return $this->fieldsInformations;
    }
    
    public function formFromRecord($record)
    {
        $form = Array();
        $fieldsInformations = $this->fieldsInformations();

        foreach ($fieldsInformations as $fieldInformation)
        {
			$fieldName = $fieldInformation->name;
        	if($fieldName != 'id') {
				$form[$fieldName . "_label"] = form_label($fieldName, $fieldName);
				$form[$fieldName] =
					form_input(
						array(
							"name" => "{$this->tableNameNoprefix}[$fieldName]",
							"id" => "{$this->tableNameNoprefix}_{$fieldName}",
							"value" => isset($record[$fieldName]) ? $record[$fieldName] : '',
							"maxlength" => $fieldInformation->max_length,
							"class" => "form-control",
						));

			}else {
				$form[$fieldName] = form_hidden("{$this->tableNameNoprefix}[{$fieldName}]", isset($record[$fieldName]) ? $record[$fieldName] : '');
			}
        }
        return $form;
    }

    public function insert($data)
    {
        $result = $this->db->insert($this->tableName, $data);
        $this->currentId = $this->db->insert_id();
        /** @var CI_DB_mysqli_result $current_record */
        $current_record = $this->db->get_where($this->tableName, 'id='.$this->currentId);
        $row = $current_record->first_row();
        $this->current_record = $row;
        return $row;
    }

	public function update($data)
	{
		$result = $this->db->update($this->tableName, $data, "id={$data["id"]}");
		$this->currentId = $data["id"];
		/** @var CI_DB_mysqli_result $current_record */
		$current_record = $this->db->get_where($this->tableName, 'id='.$this->currentId);
		$row = $current_record->first_row();
		$this->current_record = $row;
		return $row;
	}
	/**
	 * @return null
	 */
	public function getCurrentId()
	{
		return $this->currentId;
	}

	/**
	 * @param null $currentId
	 */
	public function setCurrentId($currentId)
	{
		$this->currentId = $currentId;
	}

	/**
	 * @return mixed
	 */
	public function getCurrentRecord()
	{
		return $this->current_record;
	}

	/**
	 * @param mixed $current_record
	 */
	public function setCurrentRecord($current_record)
	{
		$this->current_record = $current_record;
	}


}
