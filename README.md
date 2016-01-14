# TNT-micro-framework
Thời gian có hạn chỉ nhanh <3 mà cái này là micro framework nên code rất nhanh mà không cồng kềnh, hướng dẫn cũng nhanh thôi
Cookbook tạo web hello world
1. Tạo mới một controller
Tạo một controller mới, vào view thêm
function helloController(){
    return render('hello.html');
}
Tạo một file là hello.html trong thư mục templates

2. Tạo model
Các ORM nằm trong file models.php, bản 1.1 sẽ có code gerenator giờ bận quá chưa làm được
SQL tự bảo vệ

3. Code template
trong file hello.html thêm <?php echo $arg[1]; ?>
trong controller thêm như sau
function helloController(){
    $var = 'Hello world';
    return render('hello.html',$var);
}
thử kiểm tra http://localhost/?page=hello
tương tự muốn chèn thêm biến thứ 2,n..
function helloController(){
    $var = 'Hello world';
    $var2 = 'Hello world2';
    $var3 = 'Hello world3';
    return render('hello.html',$var,$var2,$var3);
}
thì trong template sẽ là <?php echo $arg[1].$arg[2].$arg[3]; ?>

4.Quyền hạn
Trước mỗi controller cần độ quyền hạn cao hơn ta chèn vào đầu controller
function helloController(){
    require_access(1)
    $var = 'Hello world';
    return render('hello.html',$var);
}
quyền hạn của người dùng sẽ được lưu trong biến $_SESSION['role'], nếu $_SESSION['role'] >= require_access 
thì người đó được quyền truy cập chức năng đó

