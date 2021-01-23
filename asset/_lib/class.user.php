<?php
class USER 
{
	private $db;

	function __construct($db_con)
    {
      $this->db = $db_con;
    }

    public function register($fFristname, $fLastname, $fpassword, $fconfirmpassword, $femail, $fimage, $fdateCreated, $fmanager, $fadmin, $fdeveloper, $fdataAdmin, $freport, $fread, $fproject, $fstatus)
    {
    	try{
    		$newPassword = password_hash($fpassword, PASSWORD_DEFAULT);
    		$stmt = $this->db->prepare("INSERT INTO tb_user (
    			FRISTNAME, 
    			LASTNAME, 
    			PASSWORD, 
    			CONFIRM_PASSWORD,
    			EMAIL,
                IMAGE,
    			USERMANAGER,
    			ADMINISTRATOR,
    			DEVELOPER,
    			DATA_ADMINISTRATOR,
    			REPORTING,
    			READONLY,
    			PROJECTCREATOR,
    			DATE_CREATED,
                STATUS) VALUES (
    			:FRISTNAME, 
    			:LASTNAME, 
    			:PASSWORD, 
    			:CONFIRM_PASSWORD, 
    			:EMAIL,
                :IMAGE,
    			:USERMANAGER,
    			:ADMINISTRATOR,
    			:DEVELOPER,
    			:DATA_ADMINISTRATOR,
    			:REPORTING,
    			:READONLY,
    			:PROJECTCREATOR,
    			:DATE_CREATED,
                :STATUS)"
    		);

    		$stmt->bindparam(":FRISTNAME", $fFristname);
    		$stmt->bindparam(":LASTNAME", $fLastname);
    		$stmt->bindparam(":PASSWORD", $newPassword);
    		$stmt->bindparam(":CONFIRM_PASSWORD", $newPassword);
    		$stmt->bindparam(":EMAIL", $femail);
            $stmt->bindparam(":IMAGE", $fimage);
    		$stmt->bindparam(":USERMANAGER", $fmanager);
    		$stmt->bindparam(":ADMINISTRATOR", $fadmin);
    		$stmt->bindparam(":DEVELOPER", $fdeveloper);
    		$stmt->bindparam(":DATA_ADMINISTRATOR", $fdataAdmin);
    		$stmt->bindparam(":REPORTING", $freport);
    		$stmt->bindparam(":READONLY", $fread);
    		$stmt->bindparam(":PROJECTCREATOR", $fproject);
    		$stmt->bindparam(":DATE_CREATED", $fdateCreated);
            $stmt->bindparam(":STATUS", $fstatus);

    		$stmt->execute();
    		return $stmt;
    	}
    	catch(PDOException $e)
    	{
    		echo $e->getMessage();
    	}
    }

    public function show_regist()
    {

    	$stmt = $this->db->prepare("SELECT * FROM tb_user");
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    public function show_regist_by_id($fid)
    {
        $stmt = $this->db->prepare("SELECT * FROM tb_user WHERE id=:ID");
        $stmt->bindParam(":ID", $fid);
        $stmt->execute();
        $data = $stmt->fetch();
        return $data;
    }

    public function show_regist_status($fstatus)
    {

        $stmt = $this->db->prepare("SELECT * FROM tb_user WHERE STATUS=:STATUS");
        $stmt->bindParam(":STATUS", $fstatus);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    public function edit_regist($fid, $fmanager, $fadmin, $fdeveloper, $fdataAdmin, $freport, $fread, $fproject)
    {
        $stmt = $this->db->prepare("UPDATE tb_user SET 
                USERMANAGER=:USERMANAGER,
                ADMINISTRATOR=:ADMINISTRATOR,
                DEVELOPER=:DEVELOPER,
                DATA_ADMINISTRATOR=:DATA_ADMINISTRATOR,
                REPORTING=:REPORTING,
                READONLY=:READONLY,
                PROJECTCREATOR=:PROJECTCREATOR WHERE ID=:ID");

       $stmt->bindparam(":USERMANAGER", $fmanager);
       $stmt->bindparam(":ADMINISTRATOR", $fadmin);
       $stmt->bindparam(":DEVELOPER", $fdeveloper);
       $stmt->bindparam(":DATA_ADMINISTRATOR", $fdataAdmin);
       $stmt->bindparam(":REPORTING", $freport);
       $stmt->bindparam(":READONLY", $fread);
       $stmt->bindparam(":PROJECTCREATOR", $fproject);
       $stmt->bindparam(":ID", $fid);

       $stmt->execute();
       $edit = $stmt->rowCount();
       return $edit;
    }

    public function status_regist($fid)
    {  
       $status = 1;
       $stmt = $this->db->prepare("UPDATE tb_user SET STATUS=:STATUS WHERE ID=:ID");

       $stmt->bindparam(":STATUS", $status);
       $stmt->bindparam(":ID", $fid);

       $stmt->execute();
       $update = $stmt->rowCount();
       return $update;
    }

    public function delete_regits($fid)
    {
        $status = 2;
        $stmt = $this->db->prepare("UPDATE tb_user SET STATUS=:STATUS WHERE ID=:ID");

        $stmt->bindparam(":STATUS", $status);
        $stmt->bindParam(":ID", $fid);

        $stmt->execute();
        $delete = $stmt->rowCount();
        return $delete;
    }

    public function cek_login(){
        if(isset($_COOKIE['adv_token'])){
            $token = $_COOKIE['adv_token'];
            $now = date("Y-m-d H:i:s");
            $cek = $this->db->query("SELECT * FROM tb_user_log WHERE token = ".$this->db->quote($token)." AND expired > ".$this->db->quote($now));
            if($cek){
                $row = $cek->fetch();
                if($row['ip'] == $_SERVER['REMOTE_ADDR'] || $row['useragent'] == $_SERVER['HTTP_USER_AGENT']){
                    $username = $row['username'];
                    $get_admin = $this->db->query("SELECT * FROM tb_user WHERE EMAIL = ".$this->db->quote($username));
                    $rget = $get_admin->fetch();

                    return array(
                        "FRISTNAME" => $rget['FRISTNAME'],
                        "LASTNAME" => $rget['LASTNAME'],
                        "EMAIL" => $rget['EMAIL']
                    );

                }

            }
        }
        return false;
    }

    public function login($femail, $fpassword)
    {
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM tb_user WHERE EMAIL=:EMAIL LIMIT 1");
          $stmt->execute(array(':EMAIL'=>$femail));
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
          {
             if ($userRow['STATUS'] != 2) {
                 if(password_verify($fpassword, $userRow['PASSWORD']))
                 {
                    $_SESSION['user_session'] = $userRow['ID'];
                    $_SESSION['last_login_time'] = time();
                    return true;
                 }
                 else
                 {
                    return false;
                 }
             }
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }

   public function true_login($femail, $expired){
        $tgl = date("Y-m-d H:i:s");
        if($expired <> 0){
            $expireddb = date("Y-m-d H:i:s",strtotime($expired));
        }
        else{
            $expireddb = date("Y-m-d H:i:s",strtotime("+6 hours"));
        }

        $ip = $_SERVER['REMOTE_ADDR'];
        $useragent = $_SERVER['HTTP_USER_AGENT'];

        $token = sha1($ip.$expireddb."string_random_apasaja".microtime());
        $upd = $this->db->query("UPDATE tb_user_log SET status = 9 WHERE token = '' AND ip = ".$this->db->quote($ip)." AND useragent = ".$this->db->quote($useragent));

        $save = $this->db->prepare("INSERT INTO tb_user_log VALUES (NULL, ?, ?, ?, ?, ?, ?, 1)");
        $save->execute(array(
            $tgl, $expireddb, $token, $femail, $ip, $useragent
        ));

        $expr = 0;
        if($expired <> 0){
            $expr = intval(strtotime($expired));
        }
        setcookie("adv_token", $token, $expr, "/");

        return true;
    }

    public function salah_login_action($femail){
        $tgl = date("Y-m-d H:i:s");
        $expired = date("Y-m-d H:i:s");
        $ip = $_SERVER['REMOTE_ADDR'];
        $useragent = $_SERVER['HTTP_USER_AGENT'];
        $save = $this->db->prepare("INSERT INTO tb_user_log VALUES (NULL, ?,  ?, '', ?, ?, ?, 0)");
        $save->execute(array(
            $tgl, $expired, $femail, $ip, $useragent
        ));
        return true;
    }

    public function is_loggedin()
    {
      if(isset($_SESSION['user_session']))
      {
         return true;
      }
    }

    public function redirect($url)
   	{
       header("Location: $url");
   	}

    public function logout()
    {
        if(isset($_COOKIE['adv_token'])){
            $token = $_COOKIE['adv_token'];

            //cara menghapus cookie adalah dengan mengubah tanggal expirednya menjadi sekarang
            $now = date("Y-m-d H:i:s");
            unset($_COOKIE['adv_token']);
            setcookie("adv_token",null,$now,"/");
            
            #jangan lupa tanggal expired di database diupdate juga, supaya session token yang sudah logout tidak dihijack
            $this->db->query("UPDATE tb_user_log SET expired = ".$this->db->quote($now)." WHERE token = ".$this->db->quote($token));
        }

        return true;
    }

    public function cek_salah_login($limit=5){
        $ip = $_SERVER['REMOTE_ADDR'];
        $cek = $this->db->prepare("SELECT * FROM tb_user_log WHERE status = 0 AND ip = ?");

        $cek->execute(array($ip));
        if($cek->rowCount() >= $limit)
            return false;
        return true;
    }

    public function get_session($user_id)
    {
        $stmt = $this->db->prepare("SELECT * FROM tb_user WHERE ID=:user_id");
        $stmt->execute(array(":user_id"=>$user_id));
        $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function show_activity($femail)
    {

        $stmt = $this->db->prepare("SELECT * FROM tb_user_log WHERE username=:femail");
        $stmt->execute(array(":femail"=>$femail));
        $data = $stmt->fetchAll();
        return $data;
    }

    public function created_devisi($fdevisi,$fkode)
    {

        try{
            $status = 2;
            $stmt = $this->db->prepare("INSERT INTO tb_devisi (DEVISI,KODE,STATUS) VALUES (:fdevisi, :fkode,:fstatus)");
            $stmt->bindparam(":fdevisi", $fdevisi);
            $stmt->bindparam(":fkode", $fkode);
            $stmt->bindparam(":fstatus", $status);
            $stmt->execute();
            return $stmt;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function devisi()
    {

        $stmt = $this->db->prepare("SELECT * FROM tb_devisi");
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    public function show_devisi($fdevisi)
    {
        try{
            $stmt = $this->db->prepare("SELECT DEVISI, max(KODE) as KODEBESAR FROM tb_devisi WHERE DEVISI=:DEVISI");
            $stmt->execute(array(':DEVISI'=>$fdevisi));
            $data = $stmt->fetchAll();
            return $data;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function select_devisi() {
        $qsi = "QSI-";
        $stmt = $this->db->prepare("SELECT max(KODE) AS KODETERAKHIR FROM tb_devisi WHERE KODE LIKE '$qsi%'");
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $dlast = $data['KODETERAKHIR'];
        $lastNoUrut = substr($dlast, 4, 4);
        $nextNoUrut = $lastNoUrut+1;
        $last = $qsi.sprintf('%04s',$nextNoUrut);
        return $last;
    }

    public function insert_register_employee($fnik,$fFristname,$fLastname,$ftmpLahir,$ftgllahir,$fjeniskelamin,$fagama,$falamat,$fnoHp,$femail,$fdevisi,$fjabatan,$ftgljoin,$ftglCrated) {
        
        try{
            $fstatus = 2;
            $stmt = $this->db->prepare("INSERT INTO tb_karyawan (
            NIK,
            FRISTNAME,
            LASTNAME,
            TEMPAT_LAHIR,
            TANGGAL_LAHIR,
            JENIS_KELAMIN,
            AGAMA,
            ALAMAT,
            NOMOR_HANDPHONE,
            EMAIL,
            DEVISI,
            JABATAN,
            TANGGAL_BAERGABUNG,
            STATUS,
            TANGGAL_CRATED) VALUES (
            :fnik,
            :fFristname,
            :fLastname,
            :ftmpLahir,
            :ftgllahir,
            :fjeniskelamin,
            :fagama,
            :falamat,
            :fnoHp,
            :femail,
            :fdevisi,
            :fjabatan,
            :ftgljoin,
            :fstatus,
            :ftglCrated)"
        );

            $stmt->bindparam(":fnik", $fnik);
            $stmt->bindparam(":fFristname", $fFristname);
            $stmt->bindparam(":fLastname", $fLastname);
            $stmt->bindparam(":ftmpLahir", $ftmpLahir);
            $stmt->bindparam(":ftgllahir", $ftgllahir);
            $stmt->bindparam(":fjeniskelamin", $fjeniskelamin);
            $stmt->bindparam(":fagama", $fagama);
            $stmt->bindparam(":falamat", $falamat);
            $stmt->bindparam(":fnoHp", $fnoHp);
            $stmt->bindparam(":femail", $femail);
            $stmt->bindparam(":fdevisi", $fdevisi);
            $stmt->bindparam(":fjabatan", $fjabatan);
            $stmt->bindparam(":ftgljoin", $ftgljoin);
            $stmt->bindparam(":fstatus", $fstatus);
            $stmt->bindparam(":ftglCrated", $ftglCrated);

            $stmt->execute();
            return $stmt;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function show_karyawan(){
        $stmt = $this->db->prepare("SELECT * FROM tb_karyawan");
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;   
    }

    public function show_karyawan_nik($fid){
        $stmt = $this->db->prepare("SELECT * FROM tb_karyawan WHERE NIK=:NIK");
        $stmt->execute(array(":NIK"=>$fid));
        $data = $stmt->fetch();
        return $data;   
    }

    public function show_karyawan_status($fstatus){
        $stmt = $this->db->prepare("SELECT * FROM tb_karyawan WHERE STATUS=:STATUS");
        $stmt->execute(array(":STATUS"=>$fstatus));
        $data = $stmt->fetchAll();
        return $data;   
    }

    public function update_status_karyawan($fid){
       $fstatus = 1;
       $stmt = $this->db->prepare("UPDATE tb_karyawan SET STATUS=:STATUS WHERE ID=:ID");

       $stmt->bindparam(":STATUS", $fstatus);
       $stmt->bindparam(":ID", $fid);

       $stmt->execute();
       $update = $stmt->rowCount();
       return $update;

    }

    public function delete_status_karyawan($fid){
       $fstatus = 2;
       $stmt = $this->db->prepare("UPDATE tb_karyawan SET STATUS=:STATUS WHERE ID=:ID");

       $stmt->bindparam(":STATUS", $fstatus);
       $stmt->bindparam(":ID", $fid);

       $stmt->execute();
       $update = $stmt->rowCount();
       return $update;

    }

    public function upload_register_employee($fKid,$userRgb,$localFile,$fimage_size){

        try{
            $CREATED_DATE = date('Y-m-d H:i:s');
            $stmt = $this->db->prepare("INSERT INTO tb_image (
            ID_KARYAWAN,
            NAME_IMAGE,
            RGB_IMAGE,
            SIZE_IMAGE,
            CREATED_DATE) VALUES (
            :fKid,
            :fimage_name,
            :fpath_rgb,
            :fimage_size,
            :fcreated)"
        );
            $stmt->bindparam(":fKid", $fKid);
            $stmt->bindparam(":fimage_name", $userRgb);
            $stmt->bindparam(":fpath_rgb", $localFile);
            $stmt->bindparam(":fimage_size", $fimage_size);
            $stmt->bindparam(":fcreated", $CREATED_DATE);

            $stmt->execute();
            return $stmt;
        }catch(PDOException $e){
            echo $e->getMessage();
        }

    }
}
?>