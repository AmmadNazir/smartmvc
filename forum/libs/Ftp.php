<?php
/**
* This Class handles FTP Transfer
* 
* @author David D'hont <blaxus@gmail.com>
*/
class Ftp
{
    private $server;
    private $username;
    private $password;
    
    private $conn_id;
    private $login_result;
    
    private $localPath = '';
    private $remotePath = '';
    
    # Constructor of Ftp Class, you assing the Server Variables here
    public function __construct($server,$username,$password)
    {
        # Information
        $this->server   = $server;
        $this->username = $username;
        $this->password = $password;
        
        # Setup Connection
        $this->connect();
    }
    
    # This method connects to the server using the set Variables
    public function connect()
    {
        # set up basic connection
        $this->conn_id = ftp_connect($this->server);
        
        # login with username and password
        $this->login_result = ftp_login($this->conn_id, $this->username, $this->password);
    }
    
    # This method sets the local path of the transfer / upload function
    public function localPath($path)
    {
        $this->localPath = $path;
    }
    
    # This method sets the remote path of the transfer / upload function
    public function remotePath($path)
    {
        $this->remotePath = $path;
    }
    
    # This method allows you to transfer a local file to any remote server with a custom name if you like.
    public function Transfer($local_file,$remote_file,$transer_type=FTP_ASCII)
    {
        # transfer a file
        if(ftp_put($this->conn_id, $this->remotePath.$remote_file, $this->localPath.$local_file, $transer_type))
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    
    # This method allows you to upload a file using the exact same name as the source file.
    public function Upload($file,$transer_type=FTP_ASCII)
    {
        # upload a file
        if($this->Transfer($file,$file,$transer_type))
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
}
/**
 * usage<?php
function GetFiles($dir)
{
    $dirs = scandir($dir);
    $array = array();
    
    if($handle = opendir($dir))
    {
        while($file = readdir($handle))
        {
            clearstatcache();
            if(is_file($dir.'/'.$file))
            {
                $array[] = $file;
            }
        }
        closedir($handle);
        return $array;
    }
}

include('ftp.class.php');
$ftp = new Ftp('ftp.server.com','username','password');

$ftp->localPath('public_html/project/');
$ftp->remotePath('public_html/sub_folder/');

# This loops over all files in your folder
foreach(GetFiles('public_html/project/') as $file)
{
    if($ftp->Upload($file))
    {
        echo 'successfully uploaded '.$file.'<br />';
    }
    else
    {
        echo 'There was a problem while uploading '.$file.'<br />';
    }
}

 */