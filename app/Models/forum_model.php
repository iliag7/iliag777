<?php

namespace App\Models;


class forum_model  extends Eloquent  {


		protected $table = 'topic';
		
        public function __construct()
        {
                parent::__construct();
			    $this->load->database();

        }

        public function get_topic()
        {
                $query = $this->db->get('topic');
                return $query->result();
        }
		
		public function get_comment($id)
        {
				$query = $this->db->get_where('comments', array('topicId' => $id));
                return $query->result();
        }
		
		public function get_topic_content($id)
        {
				$query = $this->db->get_where('topic', array('id' => $id));
                return $query->result();
        }
		
		public function add_new_topic($data_topic)
        {
				$result = $this->db->insert('topic',$data_topic);
				return $result;
        }
        public function remove_topic($id){ 
			$result = DB::table('topic')->where('id', $id)->delete();
            return $result;
        }

}