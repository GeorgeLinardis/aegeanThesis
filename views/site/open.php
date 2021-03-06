<?php
    $message = "s";
    $ldap_servers = ["ldap.aegean.gr","ldap://zeus.aegean.gr","ldap://ds.aegean.gr:389","ldap://ds.aegean.gr:390"];
    $ldap_dn = "dc=aegean,dc=gr"; // dn for your organization
    $ldap_domain = "aegean";
    $ldap_username = 'icsd15109';
    $ldap_pwd = 'D&7fdrmk';
    $user_to_get = 'icsd15109';
    function LDAP_is_open($ldapconn,$ldap_dn,$user_to_get){
        // Search LDAP for personal details
        $filter = "(cn=*maragk*)"; // this command requires some filter
        $justthese = ["sn"];

        $sr = ldap_search($ldapconn, $ldap_dn, $filter); // for all attributes
        $entry = ldap_get_entries($ldapconn, $sr);
        //$full_name = $entry[0]["cn"][0];
        $ldap_firstName = $entry[0]["givenname"][0];
        $ldap_lastName = $entry[0]["sn"][0];

        echo "<pre>";
        var_dump($entry);
        $searching_for = "mail";
        foreach ($entry as $one_entry){
            echo "Full name: ".$one_entry["cn"][0]."<br>";
            echo $searching_for.":";
            echo  (isset($one_entry['mail'][0]) && $one_entry!=null)?($one_entry[$searching_for][0]):"no description"."<br>";
            //echo "gustudentdepartment: ".$one_entry["gustudentdepartment"][0]."<br>";
            //echo "department: ".$one_entry["department"][0]."<br>";
            echo "<br>";
            //echo "email : ".$one_entry[$ldap_email];
        }
        echo "</pre>";
        exit();
    }

        foreach ($ldap_servers as $ldap_server) {
            $ldapconn = ldap_connect($ldap_server);
            ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
            ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0);
            echo "ldap conn ok<br>";
            $ldap_bind = @ldap_bind($ldapconn);
            if ($ldap_bind) {
                echo "Connected to ldap server ".$ldap_server."<br>";
                $ldapbind = @ldap_bind($ldapconn, "$ldap_domain\\$ldap_username", "$ldap_pwd");
                if ($ldap_bind){
                    echo "Connection to ldap server still open ".$ldap_server."<br><br>";
                    LDAP_is_open($ldapconn,$ldap_dn,$user_to_get);
                }
                else{
                    echo "Connection to ldap server terminated ".$ldap_server."<br>";
                }
            }
            else {
                echo "Can't create ldapbind  ".$ldap_server."<br>";
            }
        }
        ?>

