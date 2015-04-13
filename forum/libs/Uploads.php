<?php
class Uploads {  
    /**
     *@var string contains the name of the file to be uploaded.
     */
    var $FileName;
    /**
     *@var string contains the temporary name of the file to be uploaded.
     */
    var $TempFileName;
    /**
     *@var string contains directory where the files should be uploaded.
     */
    var $UploadDirectory;
    /**
     *@var string contains an array of valid extensions which are allowed to be uploaded.
     */
    var $ValidExtensions;
    /**
     *@var string contains a message which can be used for debugging.
     */
    var $Message;
    /**
     *@var integer contains maximum size of fiels to be uploaded in bytes.
     */
    var $MaximumFileSize;
    /**
     *@var bool contains whether or not the files being uploaded are images.
     */
    var $IsImage;
    /**
     *@var string contains the email address of the recipient of upload logs.
     */
    var $Email;
    /**
     *@var integer contains maximum width of images to be uploaded.
     */
    var $MaximumWidth;
    /**
     *@var integer contains maximum height of images to be uploaded.
     */
    var $MaximumHeight;

    function Upload()
    {

    }

    /**
     *@method bool Vali date Extension() returns whether the extension of file to be uploaded
     *    is allowable or not.
     *@return true the extension is valid.
     *@return false the extension is invalid.
     */
    function ValidateExtension()
    {

        $FileName = trim($this->FileName);
        $FileParts = pathinfo($FileName);
        $Extension = strtolower($FileParts['extension']);
        $ValidExtensions = $this->ValidExtensions;
        // error list for ext and empty
        if (!$FileName) {
            $this->SetMessage("ERROR: File name is empty.");
            return false;
        }

        if (!$ValidExtensions) {
            $this->SetMessage("WARNING: All extensions are valid.");
            return true;
        }

        if (in_array($Extension, $ValidExtensions)) {
            $this->SetMessage("MESSAGE: The extension '$Extension' appears to be valid.");
            return true;
        } else {
            $this->SetMessage("Error: The extension '$Extension' is invalid.");
         //   return false;  
            header("location:".URL."photo?ext");
        }

    }

    /**
     *@method bool Va lidateSize returns whether the file size is acceptable.
     *@return true the size is smaller than the alloted value.
     *@return false the size is larger than the alloted value.
     */
    function ValidateSize()
    {
        $MaximumFileSize = $this->MaximumFileSize;
        $TempFileName = $this->GetTempName();
        $TempFileSize = filesize($TempFileName);
        // error for size
        if($MaximumFileSize == "") {
            $this->SetMessage("WARNING: There is no size restriction.");
            return true;
        }

        if ($MaximumFileSize <= $TempFileSize) {
            $this->SetMessage("ERROR: The file is too big. It must be less than $MaximumFileSize and it is $TempFileSize.");
            return false;
        }

        $this->SetMessage("Message: The file size is less than the MaximumFileSize.");
        return true;
    }

    /**
     *@method bool V alidateExistance() determins whether the file already exists. If so, rename $FileName.
     *@return true can never be returned as all file names must be unique.
     *@return false the file name does not exist.
     */
    function ValidateExistance()
    {
        $FileName = $this->FileName;
        $UploadDirectory = $this->UploadDirectory;
        $File = $UploadDirectory . $FileName;
        // file already exist
        if (file_exists($File)) {
            $this->SetMessage("Message: The file '$FileName' already exist.");
       //     echo $FileName.'<br/>';
            $var = explode(' ', $FileName);
            $imp = implode($var, '-');
          //  echo $imp.'<br/>';
         //   echo $this->GetValidExtensions().'<br/>';
            $UniqueName = rand() . $imp;
            $this->SetFileName($UniqueName);
          //  $this->GetValidExtensions();
            $this->ValidateExistance();
        } else {
            $this->SetMessage("Message: The file name '$FileName' does not exist.");
            return false;
        }
    }

    /**
     *@method bool Validat eDirectory()
     *@return true the UploadDirectory exists, writable, and has a traling slash.
     *@return false the directory was never set, does not exist, or is not writable.
     */
    function ValidateDirectory()
    {
        $UploadDirectory = $this->UploadDirectory;

        if (!$UploadDirectory) {
            $this->SetMessage("ERROR: The directory variable is empty.");
            return false;
        }

        if (!is_dir($UploadDirectory)) {
            $this->SetMessage("ERROR: The directory '$UploadDirectory' does not exist.");
            return false;
        }

        if (!is_writable($UploadDirectory)) {
            $this->SetMessage("ERROR: The directory '$UploadDirectory' does not writable.");
            return false;
        }

        if (substr($UploadDirectory, -1) != "/") {
            $this->SetMessage("ERROR: The traling slash does not exist.");
            $NewDirectory = $UploadDirectory . "/";
            $this->SetUploadDirectory($NewDirectory);
            $this->ValidateDirectory();
        } else {
            $this->SetMessage("MESSAGE: The traling slash exist.");
            return true;
        }
    }

    /**
     *@method bool Validate Image()
     *@return true the image is smaller than the alloted dimensions.
     *@return false the width and/or height is larger then the alloted dimensions.
     */
    function ValidateImage() {
        $MaximumWidth = $this->MaximumWidth;
        $MaximumHeight = $this->MaximumHeight;
        $TempFileName = $this->TempFileName;

	if($Size = getimagesize($TempFileName)) {
		$Width = $Size[0];   //$Width is the width in pixels of the image uploaded to the server.
		$Height = $Size[1];  //$Height is the height in pixels of the image uploaded to the server.
	}

        if ($Width > $MaximumWidth) {
            $this->SetMessage("The width of the image [$Width] exceeds the maximum amount [$MaximumWidth].");
            return false;
        }

        if ($Height > $MaximumHeight) {
            $this->SetMessage("The height of the image [$Height] exceeds the maximum amount [$MaximumHeight].");
            return false;
        }

        $this->SetMessage("The image height [$Height] and width [$Width] are within their limitations.");     
        return true;
    }

    /**
     *@method bool Send Mail() sends an email log to the administrator
     *@return true the email was sent.
     *@return false never.
     *@todo create a more information-friendly log.
     */
    function SendMail() {
        $To = $this->Email;
        $Subject = "File Uploaded";
        $From = "From: Uploader";
        $Message = "A file has been uploaded.";
        mail($To, $Subject, $Message, $From);
        return true;
    }


    /**
     *@method bool U pload File() uploads the file to the server after passing all the validations.
     *@return true the file was uploaded.
     *@return false the upload failed.
     */
    function UploadFile()
    {
        if (!$this->ValidateExtension()) {
            die($this->GetMessage());
        } 

        else if (!$this->ValidateSize()) {
            die($this->GetMessage());
        }

        else if ($this->ValidateExistance()) {
            die($this->GetMessage());
        }

        else if (!$this->ValidateDirectory()) {
            die($this->GetMessage());
        }

        else if ($this->IsImage && !$this->ValidateImage()) {
            die($this->GetMessage());
        }

        else {

            $FileName = $this->FileName;
            $TempFileName = $this->TempFileName;
            $UploadDirectory = $this->UploadDirectory;

            if (is_uploaded_file($TempFileName)) { 
                move_uploaded_file($TempFileName, $UploadDirectory . $FileName);
               // header('location:'.URL.'?uploaded');
            } else {
                header('location:'.URL.'?uploadfailed');
            }

        }

    }

    #Accessors and Mutators beyond this point.
    #Siginificant documentation is not needed.
    function SetFileName($argv)
    {
        $this->FileName = $argv;
    }

    function SetUploadDirectory($argv)
    {
        $this->UploadDirectory = $argv;
    }

    function SetTempName($argv)
    {
        $this->TempFileName = $argv;
    }

    function SetValidExtensions($argv)
    {
        $this->ValidExtensions = $argv;
    }

    function SetMessage($argv)
    {
        $this->Message = $argv;
    }

    function SetMaximumFileSize($argv)
    {
        $this->MaximumFileSize = $argv;
    }

    function SetEmail($argv)
    {
        $this->Email = $argv;
    }
   
    function SetIsImage($argv)
    {
        $this->IsImage = $argv;
    }

    function SetMaximumWidth($argv)
    {
        $this->MaximumWidth = $argv;
    }

    function SetMaximumHeight($argv)
    {
        $this->MaximumHeight = $argv;
    }   
    function GetFileName()
    {
        return $this->FileName;
    }

    function GetUploadDirectory()
    {
        return $this->UploadDirectory;
    }

    function GetTempName()
    {
        return $this->TempFileName;
    }

    function GetValidExtensions()
    {
        return $this->ValidExtensions;
    }

    function GetMessage()
    {
        if (!isset($this->Message)) {
            $this->SetMessage("No Message");
        }

        return $this->Message;
    }

    function GetMaximumFileSize()
    {
        return $this->MaximumFileSize;
    }

    function GetEmail()
    {
        return $this->Email;
    }

    function GetIsImage()
    {
        return $this->IsImage;
    }

    function GetMaximumWidth()
    {
        return $this->MaximumWidth;
    }

    function GetMaximumHeight()
    {
        return $this->MaximumHeight;
    }
}
/*lern
 * if($_FILES['file']['tmp_name']) {
    $upload = new Uploads();
    $upload->SetFileName($_FILES['file']['name']);
    $upload->SetTempName($_FILES['file']['tmp_name']);
    $upload->SetUploadDirectory("upload/"); //Upload directory, this should be writable
    $upload->SetValidExtensions(array('gif', 'jpg', 'jpeg', 'png')); //Extensions that are allowed if none are set all extensions will be allowed.
    //$upload->SetEmail("Sidewinder@codecall.net"); //If this is set, an email will be sent each time a file is uploaded.
    //$upload->SetIsImage(true); //If this is set to be true, you can make use of the MaximumWidth and MaximumHeight functions.
    //$upload->SetMaximumWidth(60); // Maximum width of images
    //$upload->SetMaximumHeight(400); //Maximum height of images
    $upload->SetMaximumFileSize(300000); //Maximum file size in bytes, if this is not set, the value in your php.ini file will be the maximum value
    echo $upload->UploadFile();
 * just test name 
 * //  $UniqueName = rand() . $FileName;
            $expload = explode(' ', $FileName);
         //   $uniq = uniqid($expload);
            $UniqueName = rand() . $expload . $this->ValidateExtension();
            $this->SetFileName($UniqueName);
            $this->ValidateExistance();
 */