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

    public function created($InsertCreated)
    {
        try{
            $stmt = $this->db->prepare("INSERT INTO tb_data_check(
                                        CLIENT_TYPE,
                                        POLICY_HOLDER_NAME,
                                        LIFE_ASSURED,
                                        POLICY_HOLDER_DATE_OF_BIRTH,
                                        POLICY_HOLDER_DATE_OF_BIRTH_LIFE_ASSURED,
                                        POLICY_NUMBER,
                                        CURRENCY_1,
                                        SUM_ASSURED,
                                        CURRENCY_2,
                                        PREMIUM_AMOUNT,
                                        PAYMENT_FREQUENCY,
                                        CODE_PAYMENT_METHOD,
                                        AGENT_NAME,
                                        POLICY_HOLDER_PHONE_NUMBER,
                                        EMAIL_POLICY_HOLDER_NAME,
                                        COMPONENT_DESCRIPTION,
                                        CYCLE_DATE,
                                        ISSUED_DATE,
                                        CREATED_DATE,
                                        STATUS_FLAG) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute($InsertCreated);
            return $stmt;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function data_project($Project)
    {
        $stmt = $this->db->prepare("SELECT hostname,username,password,port FROM tb_sftp WHERE id=:Project");
        $stmt->execute(array(":Project"=>$Project));
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function data_check()
    {
        $stmt = $this->db->prepare("SELECT CLIENT_TYPE,POLICY_HOLDER_NAME,LIFE_ASSURED,POLICY_HOLDER_DATE_OF_BIRTH,POLICY_HOLDER_DATE_OF_BIRTH_LIFE_ASSURED,POLICY_NUMBER,CURRENCY_1,SUM_ASSURED,CURRENCY_2,PREMIUM_AMOUNT,PAYMENT_FREQUENCY,CODE_PAYMENT_METHOD,AGENT_NAME,POLICY_HOLDER_PHONE_NUMBER,EMAIL_POLICY_HOLDER_NAME,COMPONENT_DESCRIPTION,CYCLE_DATE,ISSUED_DATE,CREATED_DATE,STATUS_FLAG FROM tb_data_check");
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    public function data_check_status($STATUS_FLAG)
    {
        $stmt = $this->db->prepare("SELECT CLIENT_TYPE,POLICY_HOLDER_NAME,LIFE_ASSURED,POLICY_HOLDER_DATE_OF_BIRTH,POLICY_HOLDER_DATE_OF_BIRTH_LIFE_ASSURED,POLICY_NUMBER,CURRENCY_1,SUM_ASSURED,CURRENCY_2,PREMIUM_AMOUNT,PAYMENT_FREQUENCY,CODE_PAYMENT_METHOD,AGENT_NAME,POLICY_HOLDER_PHONE_NUMBER,EMAIL_POLICY_HOLDER_NAME,COMPONENT_DESCRIPTION,ISSUED_DATE,CYCLE_DATE,CREATED_DATE,STATUS_FLAG FROM tb_data_check WHERE STATUS_FLAG =:STATUS_FLAG");
        $stmt->execute(array(":STATUS_FLAG"=>$STATUS_FLAG));
        $data = $stmt->fetchAll();
        return $data;
    }

    public function update_check($dataUpdateCheck)
    {
        $stmt = $this->db->prepare("UPDATE tb_data_check SET CHECKED_DATE=?, POLICY_HOLDER_NAME=?, LIFE_ASSURED=?, AGENT_NAME=?, EMAIL_POLICY_HOLDER_NAME=?, STATUS_FLAG='CHECKED' WHERE POLICY_NUMBER=?");
        $stmt->execute($dataUpdateCheck);

        return true;
    }

    public function parsed($InputParsed)
    {
        try{
            $stmt = $this->db->prepare("INSERT INTO tb_data_zurich(
                                        UID,
                                        CLIENT_TYPE,
                                        POLICY_HOLDER_NAME,
                                        POLICY_HOLDER_NAME_ROW_2,
                                        LIFE_ASSURED,
                                        LIFE_ASSURED_ROW_2,
                                        POLICY_HOLDER_DATE_OF_BIRTH,
                                        POLICY_HOLDER_DATE_OF_BIRTH_LIFE_ASSURED,
                                        POLICY_NUMBER,
                                        CURRENCY_1,
                                        SUM_ASSURED,
                                        CURRENCY_2,
                                        PREMIUM_AMOUNT,
                                        CODE_FREQUENCY,
                                        PAYMENT_FREQUENCY,
                                        CODE_PAYMENT_METHOD,
                                        PAYMENT_METHOD,
                                        AGENT_NAME,
                                        POLICY_HOLDER_PHONE_NUMBER,
                                        EMAIL_POLICY_HOLDER_NAME,
                                        COMPONENT_DESCRIPTION,
                                        CODE_COMPONENT_DESCRIPTION,
                                        ISSUED_DATE,
                                        CYCLE_DATE,
                                        PARSED_AT,
                                        CREATED_AT,
                                        EXPIRED_DATE,
                                        EXPIRED_STATUS,
                                        STATUS_FLAG
                                        ) 
                                        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->execute($InputParsed);
            return $stmt;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function data_parsed()
    {
        $stmt = $this->db->prepare("SELECT UID,CLIENT_TYPE,POLICY_HOLDER_NAME,POLICY_HOLDER_NAME_ROW_2,LIFE_ASSURED,LIFE_ASSURED_ROW_2,POLICY_HOLDER_DATE_OF_BIRTH,POLICY_HOLDER_DATE_OF_BIRTH_LIFE_ASSURED,POLICY_NUMBER,CURRENCY_1,SUM_ASSURED,CURRENCY_2,PREMIUM_AMOUNT,CODE_FREQUENCY,PAYMENT_FREQUENCY,CODE_PAYMENT_METHOD,PAYMENT_METHOD,AGENT_NAME,POLICY_HOLDER_PHONE_NUMBER,EMAIL_POLICY_HOLDER_NAME,COMPONENT_DESCRIPTION,CODE_COMPONENT_DESCRIPTION,LANDING_PAGE,ISSUED_DATE,CYCLE_DATE,PARSED_AT,GENERATED_AT,STATUS_FLAG,CREATED_AT FROM tb_data_zurich");
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    public function data_parsed_status($STATUS_FLAG)
    {
        $stmt = $this->db->prepare("SELECT UID,CLIENT_TYPE,POLICY_HOLDER_NAME,POLICY_HOLDER_NAME_ROW_2,LIFE_ASSURED,LIFE_ASSURED_ROW_2,POLICY_HOLDER_DATE_OF_BIRTH,POLICY_HOLDER_DATE_OF_BIRTH_LIFE_ASSURED,POLICY_NUMBER,CURRENCY_1,SUM_ASSURED,CURRENCY_2,PREMIUM_AMOUNT,CODE_FREQUENCY,PAYMENT_FREQUENCY,CODE_PAYMENT_METHOD,PAYMENT_METHOD,AGENT_NAME,POLICY_HOLDER_PHONE_NUMBER,EMAIL_POLICY_HOLDER_NAME,COMPONENT_DESCRIPTION,CODE_COMPONENT_DESCRIPTION,LANDING_PAGE,ISSUED_DATE,CYCLE_DATE,PARSED_AT,GENERATED_AT,STATUS_FLAG,CREATED_AT FROM tb_data_zurich WHERE STATUS_FLAG =:STATUS_FLAG");
        $stmt->execute(array(":STATUS_FLAG"=>$STATUS_FLAG));
        $data = $stmt->fetchAll();
        return $data;
    }

    public function update_parsed($LANDING_PAGE,$GENERATED_AT,$POLICY_NUMBER)
    {
        $stmt = $this->db->prepare("UPDATE tb_data_zurich SET LANDING_PAGE=:LANDING_PAGE, GENERATED_AT=:GENERATED_AT, STATUS_FLAG='CONVERTED' WHERE POLICY_NUMBER=:POLICY_NUMBER");
        $stmt->execute(array(":LANDING_PAGE"=>$LANDING_PAGE,":GENERATED_AT"=>$GENERATED_AT,":POLICY_NUMBER"=>$POLICY_NUMBER));

        return true;
    }

    public function update_export($POLICY_NUMBER)
    {
        $stmt = $this->db->prepare("UPDATE tb_data_zurich SET STATUS_FLAG='EXPORT' WHERE POLICY_NUMBER=:POLICY_NUMBER");
        $stmt->execute(array(":POLICY_NUMBER"=>$POLICY_NUMBER));

        return true;
    }

    public function purl_status($POLICY_NUMBER)
    {
        $stmt = $this->db->prepare("UPDATE tb_data_purl SET STATUS_FLAG='EXPORT' WHERE POLICY_NUMBER=:POLICY_NUMBER");
        $stmt->execute(array(":POLICY_NUMBER"=>$POLICY_NUMBER));

        return true;
    }

    public function update_purl($LANDING_PAGE,$GENERATED_AT,$POLICY_NUMBER)
    {
        $stmt = $this->db->prepare("UPDATE tb_data_purl SET LANDING_PAGE=:LANDING_PAGE, GENERATED_AT=:GENERATED_AT, STATUS_FLAG='CONVERTED' WHERE POLICY_NUMBER=:POLICY_NUMBER");
        $stmt->execute(array(":LANDING_PAGE"=>$LANDING_PAGE,":GENERATED_AT"=>$GENERATED_AT,":POLICY_NUMBER"=>$POLICY_NUMBER));

        return true;
    }

    public function select_purl()
    {
        $stmt = $this->db->prepare("SELECT UID,CLIENT_TYPE,POLICY_HOLDER_NAME,POLICY_HOLDER_NAME_ROW_2,LIFE_ASSURED,LIFE_ASSURED_ROW_2,POLICY_HOLDER_DATE_OF_BIRTH,POLICY_HOLDER_DATE_OF_BIRTH_LIFE_ASSURED,POLICY_NUMBER,POLICY_HOLDER_PHONE_NUMBER,EMAIL_POLICY_HOLDER_NAME,LANDING_PAGE,CYCLE_DATE,EXPIRED_DATE FROM tb_data_purl");
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    public function data_purl($InputParsed)
    {
        try{
            $stmt = $this->db->prepare("INSERT INTO tb_data_purl(
                                        UID,
                                        CLIENT_TYPE,
                                        POLICY_HOLDER_NAME,
                                        POLICY_HOLDER_NAME_ROW_2,
                                        LIFE_ASSURED,
                                        LIFE_ASSURED_ROW_2,
                                        POLICY_HOLDER_DATE_OF_BIRTH,
                                        POLICY_HOLDER_DATE_OF_BIRTH_LIFE_ASSURED,
                                        POLICY_NUMBER,
                                        CURRENCY_1,
                                        SUM_ASSURED,
                                        CURRENCY_2,
                                        PREMIUM_AMOUNT,
                                        CODE_FREQUENCY,
                                        PAYMENT_FREQUENCY,
                                        CODE_PAYMENT_METHOD,
                                        PAYMENT_METHOD,
                                        AGENT_NAME,
                                        POLICY_HOLDER_PHONE_NUMBER,
                                        EMAIL_POLICY_HOLDER_NAME,
                                        COMPONENT_DESCRIPTION,
                                        CODE_COMPONENT_DESCRIPTION,
                                        ISSUED_DATE,
                                        CYCLE_DATE,
                                        PARSED_AT,
                                        CREATED_AT,
                                        EXPIRED_DATE,
                                        EXPIRED_STATUS,
                                        STATUS_FLAG
                                        ) 
                                        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->execute($InputParsed);
            return $stmt;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

}
?>