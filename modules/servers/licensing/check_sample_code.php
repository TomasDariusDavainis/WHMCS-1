<?php
/*
 *************************************************************************
 *                                                                       *
 * WHMCompleteSolution - Client Management, Billing & Support System     *
 * Copyright (c) 2005-2013 WHMCS. All Rights Reserved,                   *
 * Licensing Addon Integration Sample Code                               *
 *                                                                       *
 *************************************************************************
 */

// Do not allow any direct access
exit;

// Begin Check Function

function check_license($licensekey,$localkey="") {
    $whmcsurl = "http://www.yourdomain.com/whmcs/";
    $licensing_secret_key = "abc123"; # Unique value, should match what is set in the product configuration for MD5 Hash Verification
    $check_token = time().md5(mt_rand(1000000000,9999999999).$licensekey);
    $checkdate = date("Ymd"); # Current date
    $usersip = isset($_SERVER['SERVER_ADDR']) ? $_SERVER['SERVER_ADDR'] : $_SERVER['LOCAL_ADDR'];
    $localkeydays = 15; # How long the local key is valid for in between remote checks
    $allowcheckfaildays = 5; # How many days to allow after local key expiry before blocking access if connection cannot be made
    $localkeyvalid = false;
    if ($localkey) {
        $localkey = str_replace("\n",'',$localkey); # Remove the line breaks
		$localdata = substr($localkey,0,strlen($localkey)-32); # Extract License Data
		$md5hash = substr($localkey,strlen($localkey)-32); # Extract MD5 Hash
        if ($md5hash==md5($localdata.$licensing_secret_key)) {
            $localdata = strrev($localdata); # Reverse the string
    		$md5hash = substr($localdata,0,32); # Extract MD5 Hash
    		$localdata = substr($localdata,32); # Extract License Data
    		$localdata = base64_decode($localdata);
    		$localkeyresults = unserialize($localdata);
            $originalcheckdate = $localkeyresults["checkdate"];
            if ($md5hash==md5($originalcheckdate.$licensing_secret_key)) {
                $localexpiry = date("Ymd",mktime(0,0,0,date("m"),date("d")-$localkeydays,date("Y")));
                if ($originalcheckdate>$localexpiry) {
                    $localkeyvalid = true;
                    $results = $localkeyresults;
                    $validdomains = explode(",",$results["validdomain"]);
                    if (!in_array($_SERVER['SERVER_NAME'], $validdomains)) {
                        $localkeyvalid = false;
                        $localkeyresults["status"] = "Invalid";
                        $results = array();
                    }
                    $validips = explode(",",$results["validip"]);
                    if (!in_array($usersip, $validips)) {
                        $localkeyvalid = false;
                        $localkeyresults["status"] = "Invalid";
                        $results = array();
                    }
                    if ($results["validdirectory"]!=dirname(__FILE__)) {
                        $localkeyvalid = false;
                        $localkeyresults["status"] = "Invalid";
                        $results = array();
                    }
                }
            }
        }
    }
    if (!$localkeyvalid) {
        $postfields["licensekey"] = $licensekey;
        $postfields["domain"] = $_SERVER['SERVER_NAME'];
        $postfields["ip"] = $usersip;
        $postfields["dir"] = dirname(__FILE__);
        if ($check_token) $postfields["check_token"] = $check_token;
        if (function_exists("curl_exec")) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $whmcsurl."modules/servers/licensing/verify.php");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $data = curl_exec($ch);
            curl_close($ch);
        } else {
            $fp = fsockopen($whmcsurl, 80, $errno, $errstr, 5);
	        if ($fp) {
        		$querystring = "";
                foreach ($postfields AS $k=>$v) {
                    $querystring .= "$k=".urlencode($v)."&";
                }
                $header="POST ".$whmcsurl."modules/servers/licensing/verify.php HTTP/1.0\r\n";
        		$header.="Host: ".$whmcsurl."\r\n";
        		$header.="Content-type: application/x-www-form-urlencoded\r\n";
        		$header.="Content-length: ".@strlen($querystring)."\r\n";
        		$header.="Connection: close\r\n\r\n";
        		$header.=$querystring;
        		$data="";
        		@stream_set_timeout($fp, 20);
        		@fputs($fp, $header);
        		$status = @socket_get_status($fp);
        		while (!@feof($fp)&&$status) {
        		    $data .= @fgets($fp, 1024);
        			$status = @socket_get_status($fp);
        		}
        		@fclose ($fp);
            }
        }
        if (!$data) {
            $localexpiry = date("Ymd",mktime(0,0,0,date("m"),date("d")-($localkeydays+$allowcheckfaildays),date("Y")));
            if ($originalcheckdate>$localexpiry) {
                $results = $localkeyresults;
            } else {
                $results["status"] = "Invalid";
                $results["description"] = "Remote Check Failed";
                return $results;
            }
        } else {
            preg_match_all('/<(.*?)>([^<]+)<\/\\1>/i', $data, $matches);
            $results = array();
            foreach ($matches[1] AS $k=>$v) {
                $results[$v] = $matches[2][$k];
            }
        }
        if ($results["md5hash"]) {
            if ($results["md5hash"]!=md5($licensing_secret_key.$check_token)) {
                $results["status"] = "Invalid";
                $results["description"] = "MD5 Checksum Verification Failed";
                return $results;
            }
        }
        if ($results["status"]=="Active") {
            $results["checkdate"] = $checkdate;
            $data_encoded = serialize($results);
            $data_encoded = base64_encode($data_encoded);
            $data_encoded = md5($checkdate.$licensing_secret_key).$data_encoded;
            $data_encoded = strrev($data_encoded);
            $data_encoded = $data_encoded.md5($data_encoded.$licensing_secret_key);
            $data_encoded = wordwrap($data_encoded,80,"\n",true);
            $results["localkey"] = $data_encoded;
        }
        $results["remotecheck"] = true;
    }
    unset($postfields,$data,$matches,$whmcsurl,$licensing_secret_key,$checkdate,$usersip,$localkeydays,$allowcheckfaildays,$md5hash);
    return $results;
}

// End Check Function

# Get Variables from storage (retrieve from wherever it's stored - DB, file, etc...)
$licensekey = "WHMCS-c5adf50c9a";
$localkey = '9tjIxIzNwgDMwIjI6gjOztjIlRXYkt2Ylh2YioTO6M3OicmbpNnblNWasx1cyVmdyV2ccNXZsVHZv1GX
zNWbodHXlNmc192czNWbodHXzN2bkRHacBFUNFEWcNHduVWb1N2bExFd0FWTcNnclNXVcpzQioDM4ozc
7ISey9GdjVmcpRGZpxWY2JiO0EjOztjIx4CMuAjL3ITMioTO6M3OiAXaklGbhZnI6cjOztjI0N3boxWY
j9Gbuc3d3xCdz9GasF2YvxmI6MjM6M3Oi4Wah12bkRWasFmdioTMxozc7ISeshGdu9WTiozN6M3OiUGb
jl3Yn5WasxWaiJiOyEjOztjI3ATL4ATL4ADMyIiOwEjOztjIlRXYkVWdkRHel5mI6ETM6M3OicDMtcDM
tgDMwIjI6ATM6M3OiUGdhR2ZlJnI6cjOztjIlNXYlxEI5xGa052bNByUD1ESXJiO5EjOztjIl1WYuR3Y
1R2byBnI6ETM6M3OicjI6EjOztjIklGdjVHZvJHcioTO6M3Oi02bj5ycj1Ga3BEd0FWbioDNxozc7ICb
pFWblJiO1ozc7IyUD1ESXBCd0FWTioDMxozc7ISZtFmbkVmclR3cpdWZyJiO0EjOztjIlZXa0NWQiojN
6M3OiMXd0FGdzJiO2ozc7pjMxoTY8baca0885830a33725148e94e693f3f073294c0558d38e31f844
c5e399e3c16a';

# The call below actually performs the license check. You need to pass in the license key and the local key data
$results = check_license($licensekey,$localkey);

# For Debugging, Echo Results
echo "<textarea cols=100 rows=20>"; print_r($results); echo "</textarea>";

if ($results["status"]=="Active") {
    # Allow Script to Run
    if ($results["localkey"]) {
        # Save Updated Local Key to DB or File
        $localkeydata = $results["localkey"];
    }
} elseif ($results["status"]=="Invalid") {
    # Show Invalid Message
} elseif ($results["status"]=="Expired") {
    # Show Expired Message
} elseif ($results["status"]=="Suspended") {
    # Show Suspended Message
}