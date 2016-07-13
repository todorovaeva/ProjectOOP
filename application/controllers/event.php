<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Event extends CI_Controller {
 
    // num of records per page
    private $limit = 10;
     
    public function __construct(){

        parent::__construct();


         
        // load library
        $this->load->library(array('table','validation'));

        $this->load->library('validation');
        $this->load->library('upload');
         
        // load helper
        $this->load->helper('url');
         
        // load model
        $this->load->model('eventModel','',TRUE);
    }
     
    function index($offset = 0){
        // offset
        $uri_segment = 3;
        $offset = $this->uri->segment($uri_segment);
         
        // load data
        $events = $this->eventModel->get_paged_list($this->limit, $offset)->result();
         
        // generate pagination
        $this->load->library('pagination');
        $config['base_url'] = site_url('event/index/');
        $config['total_rows'] = $this->eventModel->count_all();
        $config['per_page'] = $this->limit;
        $config['uri_segment'] = $uri_segment;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
         
        // generate table data
        $this->load->library('table');
        $this->table->set_empty("&nbsp;");
        $this->table->set_heading('No', 'Name', 'Price', 'Description', 'Start Date (dd-mm-yyyy)', 'End Date (dd-mm-yyyy)', 'image1', 'image2', 'image3', 'Actions');
        $i = 0 + $offset;
        foreach ($events as $event){
            $this->table->add_row(++$i, 
                $event->name, 
                $event->price,
                $event->descr,
                date('d-m-Y', strtotime($event->dob)),
                date('d-m-Y', strtotime($event->end)),
                $event->image1,
                $event->image2,
                $event->image3,

                anchor('event/view/'.$event->id,'view',array('class'=>'view')).' '.
                anchor('event/update/'.$event->id,'update',array('class'=>'update')).' '.
                anchor('event/delete/'.$event->id,'delete',array('class'=>'delete','onclick'=>"return confirm('Are you sure want to delete this event?')")));
        }
        $data['table'] = $this->table->generate();
         
        // load view
        $this->load->view('eventList', $data);
    }
     
    function add(){
        // set validation properties
        $this->_set_fields();
         
        // set common properties
        $data['title'] = 'Add new event';
        $data['message'] = '';
        $data['action'] = site_url('event/addEvent');
        $data['link_back'] = anchor('event/index/','Back to list of events',array('class'=>'back'));
     
        // load view
        $this->load->view('eventEdit', $data);
    }
     
    function addEvent(){
        // set common properties
        $data['title'] = 'Add new event';
        $data['action'] = site_url('event/addEvent');
        $data['link_back'] = anchor('event/index/','Back to list of events',array('class'=>'back'));
         
        // set validation properties
        $this->_set_fields();
        $this->_set_rules();
         
        // run validation
        if ($this->validation->run() == FALSE){
            $data['message'] = '';
        }else{
            // save data
            $event = array('name' => $this->input->post('name'),
                            'price' => $this->input->post('price'),
                            'descr' => $this->input->post('descr'),
                            'dob' => date('Y-m-d', strtotime($this->input->post('dob'))),
                            'end' => date('Y-m-d', strtotime($this->input->post('end'))),
                            'image1' => $this->upload->do_upload('image1'),
                            'image2' => $this->upload->do_upload('image2'),
                            'image3' => $this->upload->do_upload('image3'),
                            );
            $id = $this->eventModel->save($event);
             
            // set form input name="id"
            $this->validation->id = $id;
             
            // set user message
            $data['message'] = '<div class="success">add new event success</div>';
        }
         
        // load view
        $this->load->view('eventEdit', $data);
    }
     
    function view($id){
        // set common properties
        $data['title'] = 'event Details';
        $data['link_back'] = anchor('event/index/','Back to list of events',array('class'=>'back'));
         
        // get person details
        $data['event'] = $this->eventModel->get_by_id($id)->row();
         
        // load view
        $this->load->view('eventView', $data);
    }
     
    function update($id){
        // set validation properties
        $this->_set_fields();
         
        // prefill form values
        $event = $this->eventModel->get_by_id($id)->row();
        $this->validation->id = $id;
        $this->validation->name = $event->name;
        $this->validation->price = $event->price;
        $this->validation->descr = $event->descr;
        $this->validation->dob = date('d-m-Y',strtotime($event->dob));
        $this->validation->end = date('d-m-Y',strtotime($event->end));
        $this->validation->image1 = $event->image1;
        $this->validation->image2 = $event->image2;
        $this->validation->image3 = $event->image3;
        // set common properties
        $data['title'] = 'Update event';
        $data['message'] = '';
        $data['action'] = site_url('event/updateEvent');
        $data['link_back'] = anchor('event/index/','Back to list of events',array('class'=>'back'));
     
        // load view
        $this->load->view('eventEdit', $data);
    }
     
    function updateEvent(){
        // set common properties
        $data['title'] = 'Update event';
        $data['action'] = site_url('event/updateEvent');
        $data['link_back'] = anchor('event/index/','Back to list of events',array('class'=>'back'));
         
        // set validation properties
        $this->_set_fields();
        $this->_set_rules();
         
        // run validation
        if ($this->validation->run() == FALSE){
            $data['message'] = '';
        }else{
            // save data
            $id = $this->input->post('id');
            $event = array('name' => $this->input->post('name'),
                            'price' => $this->input->post('price'),
                            'descr' => $this->input->post('descr'),
                            'dob' => date('Y-m-d', strtotime($this->input->post('dob'))),
                            'end' => date('Y-m-d', strtotime($this->input->post('end'))),
                            'image1' => $this->input->post('image1'),
                            'image2' => $this->input->post('image2'),
                            'image3' => $this->input->post('image3'),

                            );
            $this->eventModel->update($id,$event);
             
            // set user message
            $data['message'] = '<div class="success">update event success</div>';
        }
         
        // load view
        $this->load->view('eventEdit', $data);
    }
     
    function delete($id){
        // delete person
        $this->eventModel->delete($id);
         
        // redirect to person list page
        redirect('event/index/','refresh');
    }
     
    // validation fields
    function _set_fields(){
        $fields['id'] = 'id';
        $fields['name'] = 'name';
        $fields['price'] = 'price';
        $fields['descr'] = 'descr';
        $fields['dob'] = 'dob';
        $fields['end'] = 'end';
        $fields['image1'] = 'image1';
        $fields['image2'] = 'image2';
        $fields['image3'] = 'image3';
         
        $this->validation->set_fields($fields);
    }
     
    // validation rules
    function _set_rules(){
        $rules['name'] = 'trim|required';
        $rules['price'] = 'trim|required';
        $rules['descr'] = 'trim|required';
        $rules['dob'] = 'trim|required|callback_valid_date';
        $rules['end'] = 'trim|required|callback_valid_date';
        $rules['image1'] = 'trim|required';
        $rules['image1'] = 'trim|required';
        $rules['image1'] = 'trim|required';
         
        $this->validation->set_rules($rules);
         
        $this->validation->set_message('required', '* required');
        $this->validation->set_message('isset', '* required');
        $this->validation->set_error_delimiters('<p class="error">', '</p>');
    }
     
    // date_validation callback
    // function valid_date($str)
    // {
    //     if(!ereg("^(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-([0-9]{4})$", $str))
    //     {
    //         $this->validation->set_message('valid_date', 'date format is not valid. dd-mm-yyyy');
    //         return false;
    //     }
    //     else
    //     {
    //         return true;
    //     }
    // }
}
