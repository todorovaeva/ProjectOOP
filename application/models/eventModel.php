
<?php
class EventModel extends CI_Model {
    // table name
    private $tbl_person= 'tbl_person';
 
    function Event(){
        parent::Model();
    }
    // get number of event in database
    function count_all(){
        return $this->db->count_all($this->tbl_person);
    }
    // get event with paging
    function get_paged_list($limit = 10, $offset = 0){
        $this->db->order_by('id','desc');
        return $this->db->get($this->tbl_person, $limit, $offset);
    }
    // get event by id
    function get_by_id($id){
        $this->db->where('id', $id);
        return $this->db->get($this->tbl_person);
    }
    // add new event
    function save($event){
        $this->db->insert($this->tbl_person, $event);
        return $this->db->insert_id();
    }
    // update event by id
    function update($id, $event){
        $this->db->where('id', $id);
        $this->db->update($this->tbl_person, $event);
    }
    // delete event by id
    function delete($id){
        $this->db->where('id', $id);
        $this->db->delete($this->tbl_person);|
    }
}