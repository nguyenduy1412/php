<script>
    $('#input').change(function() {
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imgCate').attr('src', e.target.result);
                $('#imgCate').show();
            };
            reader.readAsDataURL(file);
        }
        var fileName = $(this).val().split('\\').pop(); // Lấy tên tệp sau khi người dùng đã chọn nó
        $(this).next('.custom-file-label').text(fileName); // Hiển thị tên tệp trong label của input
        console.log($('.custom-file-label').text())
        if($('.custom-file-label').text() !== "Chọn ảnh"){
        $("#imgCate").removeClass("d-none")
        }
        else{
            $("#imgCate").addClass("d-none")
        }
    });
    // if($('.custom-file-label').text() === "Chọn ảnh"){
    //     $(this).addClass("d-none")
    // }
    // else{
    //     $(this).removeClass("d-none")
    // }
</script>