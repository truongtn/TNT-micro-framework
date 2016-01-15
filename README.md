# TNT-micro-framework<br />
Thời gian có hạn hướng dẫn nhanh <3 mà cái này là micro framework nên code rất nhanh, bảo mật mà không cồng kềnh, sau có thời gian sẽ làm cẩn thận hơn
Cookbook tạo web hello world<br />
<br />
1. Tạo mới một controller<br />
Tạo một controller mới, vào view thêm<br />
function helloController(){<br />
    return render('hello.html');<br />
}<br />
Tạo một file là hello.html trong thư mục templates<br />
Thử kiểm tra truy cập vào ?page=hello <br />
<br />
2. Tạo model<br />
Các ORM nằm trong file models.php, bản 1.1 sẽ có code gerenator giờ bận quá chưa làm được<br />
Kết nối<br />
$db = new db("mysql:host=127.0.0.1;port=8889;dbname=mydb", "dbuser", "dbpasswd");<br />
Xóa<br />
$db->delete("mytable", "Age < 30");<br />
Insert<br />
$insert = array(<br />
    "FName" => "John",<br />
    "LName" => "Doe",<br />
    "Age" => 26,<br />
    "Gender" => "male"<br />
);<br />
$db->insert("mytable", $insert);<br />
Select<br />
$results = $db->select("mytable", "Gender = 'male'");<br />
Update<br />
$update = array(<br />
    "Age" => 24<br />
);<br />
$fname = "Jane";<br />
$lname = "Doe";<br />
$bind = array(<br />
    ":fname" => $fname,<br />
    ":lname" => $lname<br />
);<br />
$db->update("mytable", $update, "FName = :fname AND LName = :lname", $bind);<br />
<br />
SQL tự bảo vệ lấy<br />
<br />
3. Code template và chèn biến từ controller<br />
trong file hello.html thêm <?php echo $arg[1]; ?><br />
trong controller thêm như sau<br />
function helloController(){<br />
    $var = 'Hello world';<br />
    return render('hello.html',$var);<br />
}<br />
thử kiểm tra http://localhost/?page=hello<br />
tương tự muốn chèn thêm biến thứ 2,n..<br />
function helloController(){<br />
    $var = 'Hello world';<br />
    $var2 = 'Hello world2';<br />
    $var3 = 'Hello world3';<br />
    return render('hello.html',$var,$var2,$var3);<br />
}<br />
thì trong template sẽ là <?php echo $arg[1].$arg[2].$arg[3]; ?><br />
<br />
4.Quyền hạn<br />
Trước mỗi controller cần độ quyền hạn cao hơn ta chèn vào đầu controller<br />
function helloController(){<br />
    require_access(1)<br />
    $var = 'Hello world';<br />
    return render('hello.html',$var);<br />
}<br />
quyền hạn của người dùng sẽ được lưu trong biến $\_SESSION['role'], nếu $_SESSION['role'] >= require_access<br /> 
thì người đó được quyền truy cập chức năng đó<br />
<br />
5. Captcha <br />
 Gọi hàm captcha rồi gán vào $_SESSION['captcha'] <br />
function helloController(){<br />
    $_SESSION['captcha'] = captcha();<br />
    $var = 'Hello world';<br />
    $var2 = 'Hello world2';<br />
    $var3 = 'Hello world3';<br />
    return render('hello.html',$var,$var2,$var3,$_SESSION['captcha']);<br />
Trong template gọi arg <br />
<br />
6. Chống CSRF<br />
Thêm vào trước controller include_once '/lib/csrf-magic/csrf-magic.php';<br />
function helloController(){<br />
    include_once '/lib/csrf-magic/csrf-magic.php';<br />
    $_SESSION['captcha'] = captcha();<br />
    $var = 'Hello world';<br />
    $var2 = 'Hello world2';<br />
    $var3 = 'Hello world3';<br />
    return render('hello.html',$var,$var2,$var3,$_SESSION['captcha']);<br />
<br />
7. Mail<br />




