<?php
class Session{
    public function sessionStart($role)
    {
        session_start();
        setcookie('ID', session_id(), time()+3600, '/');
        setcookie('Role', $role, time()+3600, '/');
    }

    public function sessionCheck($uri)
    {
        session_start();
        if ($uri=="login") {
            if (isset($_COOKIE['ID']) && $_COOKIE['ID'] == session_id()) {
                if ($_COOKIE['Role'] == "authenticated") {
                    header("location: home");
                } else {
                    header("location: adminpanel");
                }
            }
        }  elseif ($uri=="adminpanel"){
                if (isset($_COOKIE['ID']) && $_COOKIE['ID'] == session_id()) {
                    if ($_COOKIE['Role'] != "administrator" && $_COOKIE['Role'] != "manager") {
                        header("location: home");
                    }
                } else {
                    session_destroy();
                    header("location: login");
                }
        }  else {
                if ( isset($_COOKIE['ID']) ) {
                    if ($_COOKIE['ID'] != session_id()) {
                        header("location: login");
                    }
                } else {
                    header("location: login");
                }
        }
    }

    public function sessionClose()
    {
        setcookie('ID', NULL, time()-100, '/');
        setcookie('Role', NULL, time()-100, '/');
        session_destroy();
    }
}