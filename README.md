RUN PROJECT


1.clone source code

2.mở cmd/terminal và cd vào thư mục public của source

3.run câu lệnh khởi tạo server
	php -S 127.0.0.1:8001 
4.Truy cập 
	http://127.0.0.1:8001/
	

IMPORT DATABASE

1. Truy cập thư mục database 
2. Tạo DB là to_do_list (khi tạo tên khác, bạn vui lòng sửa tên DB connect ở file app/core/db.php)
3. Import DB test


SET UP PROJECT PHP THEO MÔ HÌNH MVC 

1. Cấu trúc thư mục source (src)

    app
	
        --controller
        --core
        --model
        --view

    public

    index

2. Database

    DB test

3. Unit test matrix
    
    File unit test

