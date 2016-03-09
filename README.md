## TNT-micro-framework-1.0  
[![Join the chat at https://gitter.im/truongtn/TNT-micro-framework](https://badges.gitter.im/truongtn/TNT-micro-framework.svg)](https://gitter.im/truongtn/TNT-micro-framework?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)  
 
Cookbook make hello world app  
  
1. Create new a controller  
In **view.php**:  
function helloController(){  
return render('hello.html');  
}  
Create file **hello.htm**l in folder templates
Check: go to /?page=hello  
  
2. Model
All the ORMs must be in file **models.php**  
Connection  
$db = new db("mysql:host=127.0.0.1;port=8889;dbname=mydb", "dbuser", "dbpasswd");  
Use DBNAME,DBHOST,DBUSER,DBPASS, they definded in config.php  
Delete  
$db-&gt;delete("mytable", "Age &lt; 30");  
Insert  
$insert = array(  
"FName" =&gt; "John",  
"LName" =&gt; "Doe",  
"Age" =&gt; 26,  
"Gender" =&gt; "male"  
);  
$db-&gt;insert("mytable", $insert);  
Select  
$results = $db-&gt;select("mytable", "Gender = 'male'");  
Update  
$update = array(  
"Age" =&gt; 24  
);  
$fname = "Jane";  
$lname = "Doe";  
$bind = array(  
":fname" =&gt; $fname,  
":lname" =&gt; $lname  
);  
$db-&gt;update("mytable", $update, "FName = :fname AND LName = :lname", $bind);  

3. CSRF protection  
Use function csrf() before controller  
function helloController(){  
csrf();  


4. Template handle  
In **hello.html**, add a line &lt;?php echo $arg[1]; ?&gt;  
In hello controller:  
function helloController(){  
$var = 'Hello world';  
return render('hello.html',$var);  
}  
Check /?page=hello  
Same way with 2,n.. variables  
function helloController(){  
$var = 'Hello world';  
$var2 = 'Hello world2';  
$var3 = 'Hello world3';  
return render('hello.html',$var,$var2,$var3);  
}  
in template &lt;?php echo $arg[1].$arg[2].$arg[3]; ?&gt;  
  
5. Privilege  
In the front of each controller, we add a function called require_access():  
function helloController(){  
require_access(1)  
$var = 'Hello world';  
return render('hello.html',$var);  
}  
The user privilege in $_SESSION['role'] variable, if $_SESSION['role'] &gt;= require_access  
user have right to access this controller, use set_role($level_number) for set the new role value  
  
6. Captcha  
function helloController(){  
$_SESSION['captcha'] = captcha();  
$var = 'Hello world';  
$var2 = 'Hello world2';  
$var3 = 'Hello world3';  
return render('hello.html',$var,$var2,$var3,$_SESSION['captcha']);  
In template: &lt;img src="' . $arg[4]['image_src'] . '" alt="CAPTCHA" /&gt;

7. Mail  
$mail = new Mail;  
$result =$mail-&gt;simple_send($FromEmail,$FromName,$ToAdress,$Subject,$Body,$Attachment='',$wordwrap=5
