<?php 
/**
* @author saurabh
*/
class Admin_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_data($tbl_name,$limit=null,$offset=null)                         /* Get all data */
    {
      if ($limit!=null) {
        $query = $this->db->get($tbl_name,$limit, $offset)->result();
      } else {
        $query = $this->db->get($tbl_name)->result();
      }
      
      return (empty($query))?'':$query;
    }

    public function insert_data($tbl_name,$data)                                         /* Data insert */
    {
      $this->db->insert($tbl_name, $data);
    
	      $insert_id = $this->db->insert_id();
	      return $insert_id;  
      
    }

 
    public function select_data($selection,$tbl_name,$where=null,$order=null)                   /* Select data with condition*/
    {
    	if (empty($where)&&empty($order)) {
			$data_response = $this->db->select($selection)
		       ->from($tbl_name)
		       ->get()->result();
		}
		elseif(empty($order)){
		$data_response = 
		$this->db->select($selection)
		       ->from($tbl_name)
		       ->where($where)
		       ->get()->result();

		}else{
		$data_response = 
		$this->db->select($selection)
		       ->from($tbl_name)
		       ->where($where)
		       ->order_by($order)
		       ->get()->result();
		}
		return $data_response;  

    }

    public function update_data($tbl_name,$data,$where)                                    /* Update data */
    {
    	
      $this->db->where($where);
      $this->db->update($tbl_name,$data);
      return($this->db->affected_rows())?1:0;
    }

    function row_delete($tbl_name,$where)
	{
	   $this->db->where($where);
	   $this->db->delete($tbl_name); 
	   return($this->db->affected_rows())?1:0;
	}




    public function admin_login($data)
    {

    	   $res = $this->db->select('*')
					       ->from('tbl_users')
					       ->where('email',$data['email'])
					       ->where('password',md5($data['password']))
					       ->where('user_type',1)
					       ->get()->row();
		      
		    return $res;
    }

    function updateReviewStatus($revid,$val)
	{
	

		$this->db->where('id', $revid); 
		$this->db->update('tbl_users',array('providersStatus'=> $val));
		return $val;

	}

	    function updateUserStatus($myid,$nwStatus)
	{
	

		$this->db->where('id', $myid); 
		$this->db->update('tbl_users',array('UserCurrStatus'=> $nwStatus));
		
		return $nwStatus;

	}

	public function freeServiceProviders($minTime,$maxTime)
	{
		$list = $this->db->query("SELECT * FROM `tbl_users`
where (user_type=2 or user_type=3) and (id not in (SELECT accepted_by FROM `tbl_bookingRequests`
where accepted_by!=0 and (TIMESTAMP(booking_date,booking_time)<= '$minTime' and DATE_ADD(TIMESTAMP(booking_date,booking_time), INTERVAL `hours` HOUR)>= '$maxTime' )) or id not in (SELECT accepted_by FROM `tbl_bookingRequests`) )")->result();
		// print_r($this->db->last_query());
		return $list;
	}
	function getpusha(){
		$this->db->select('*')
			->from('tbl_users')
			->join('tbl_login', 'tbl_users.id = tbl_login.user_id')
			->where('user_type',0)
			->where('tbl_login.status',1);
		$data = $this->db->get()->result();
		return $data;
	}
	function getpushb(){
		$this->db->select('*')
			->from('tbl_users')
			->join('tbl_login', 'tbl_users.id = tbl_login.user_id')
			->where('user_type',2)
			->where('tbl_login.status',1);
		$data = $this->db->get()->result();
		return $data;
	}
	function getpushall(){
		$this->db->select('*')
			->from('tbl_users')
			->join('tbl_login', 'tbl_users.id = tbl_login.user_id')
			->where('((user_type=0 or user_type=2) and tbl_login.status=1 )');
		$data = $this->db->get()->result();
		return $data;
	}

	function selPrData(){
		$this->db->select('tbl_users.*,tbl_wallet.balance as myAmount')
			->from('tbl_users')
			->join('tbl_wallet','tbl_users.id = tbl_wallet.user_id',left)
			->where('(tbl_users.user_type=3 or tbl_users.user_type=2)');
		$data = $this->db->get()->result();
		return $data;
	}
}

?>