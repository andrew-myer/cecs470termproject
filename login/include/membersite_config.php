<?PHP
require_once("./include/fg_membersite.php");

$fgmembersite = new FGMembersite();

//Provide your site name here
$fgmembersite->SetWebsiteName('Levi Thompson Media');

//Provide the email address where you want to get notifications
$fgmembersite->SetAdminEmail('mariolopez027@gmail.com');

//Provide your database login details here:
//hostname, user name, password, database name and table name
//note that the script will create the table (for example, fgusers in this case)
//by itself on submitting register.php for the first time
$fgmembersite->InitDB(/*hostname*/'cecsdb01.coe.csulb.edu',
                      /*username*/'cecs470o27',
                      /*password*/'aix4ie',
                      /*database name*/'cecs470sec01og06',
                      /*table name*/'users');

//For better security. Get a random string from this link: http://tinyurl.com/randstr
// and put it here
$fgmembersite->SetRandomKey('RUJcsIjUA7ZYk0X');

?>