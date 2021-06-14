setTimeout(function() {
	$('#hidden').fadeOut('fast');
}, 2500); // <-- time in milliseconds

// upload images
function readURL(input) {
    if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('.image-upload-wrap').hide();
      $('.file-upload-image').attr('src', e.target.result);
      $('.file-upload-content').show();
      $('.image-title').html(input.files[0].name);
    };
    reader.readAsDataURL(input.files[0]);
        } else {
    removeUpload();
    }
}
// upload images

$(document).ready(function(){
    $("#sort_by").change(function(){
        var sort_by = $(this).val();
        $.get("admin/ajax/sort_by/"+sort_by,function(data){
            $("#parent").html(data);
        });
    });
});

function toggle(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}
$(document).ready(function(){
  $("#checkbox").click(function(){
    $(".delall").toggleClass("block");
  });
});

$(document).ready(function(){
    $("input#view").blur(function(){
        var view = $(this).val();
        var cid = $(this).parents('.editview').find('input[name="cid"]').val();
        $.ajax({
            url:  'admin/ajax/updateview/'+cid,
            type: 'GET',
            cache: false,
            data: {
                "view":view,
                "cid":cid
            },
            // success: function(data){
            //     $('#data-cat').html(data);
            // }
        });
    });
});

$(document).ready(function(){
    $("button#dell_img").click(function(){
        var id = $(this).val();
        // alert(id_img);
        $.ajax({
            url:  'admin/ajax/delete_img/'+id,
            type: 'GET',
            cache: false,
            data: {
            },
            // success: function(data){
            //     $('#data-cat').html(data);
            // }
        });
    });
});
$(document).ready(function(){
    $(document).on('click', '#dell_img', function(e){ 
        e.preventDefault();
        $(this).parent('.imgdetail').remove();
        x--;
    });
});

// seo
function changetitle (el) {
    var max_title = 70;
    if (el.value.length > max_title) {
        el.value = el.value.substr(0, max_title);
    }
    document.getElementById('chars_title').innerHTML = max_title - el.value.length;
    return true;
}
function changedescription (el) {
    var max_desc = 170;
    if (el.value.length > max_desc) {
        el.value = el.value.substr(0, max_desc);
    }
    document.getElementById('chars_left').innerHTML = max_desc - el.value.length;
    return true;
}
$(function(){
    $("input#seo_title").keyup(function () {
        var value = $(this).val();
        $(".seo_title").text(value);
    }).keyup();
});

$(function(){
    $("input#seo_description").keyup(function () {
        var value = $(this).val();
        $(".seo_description").text(value);
    }).keyup();
});


// end seo

// nhập hang
$(document).ready(function(){
    $("#sanpham").change(function(){
        var sp_id = $(this).val();
        $.get("admin/ajax/change_sp/"+sp_id,function(data){
            $("#form").html(data);
        });
    });
});
$(document).ready(function(){
    $("#mausac").change(function(){
        var id = $(this).val();
        var a_id = document.getElementById("articles").value;
        // alert(a_id);
        $.get("admin/ajax/mausac1/"+id+"/"+a_id,function(data){
            $("#form").html(data);
        });
    });
});
// nhập hang

// bán hang
$(document).ready(function(){
    $("#articles").change(function(){
        var id = $(this).val();
        $.get("admin/ajax/articles/"+id,function(data){
            $("#mausac").html(data);
        });
    });
}); // change sản phẩm show màu sắc
$(document).ready(function(){
    $("#mausac").change(function(){
        var id = $(this).val();
        var a_id = document.getElementById("articles").value;
        // alert(a_id);
        $.get("admin/ajax/mausac/"+id+"/"+a_id,function(data){
            $("#size").html(data);
        });
    });
});
$(document).ready(function(){
    $("#customer").change(function(){
        var kh_id = $(this).val();
        $.get("admin/ajax/change_khang/"+kh_id,function(data){
            $("#showkhang").html(data);
        });
    });
}); // khách hàng
$(document).ready(function(){
    $("#order").change(function(){
        var od_id = $(this).val();
        $.get("admin/ajax/change_order/"+od_id,function(data){
            $("#showorder").html(data);
        });
    });
}); // đơn hàng
// bán hang

// sửa tồn kho
$(document).ready(function(){
    $("input#status").click(function(){
        var status = $(this).is(':checked');
        var id = $(this).parents('#t_kho').find('input[id="tk_id"]').val();
        // alert(id);
        $.ajax({
            url:  'admin/ajax/updatestatustonkho/'+id,
            type: 'GET',
            cache: false,
            data: {
                "status":status,
                "id":id
            },
        });
    });
});

$(document).ready(function(){
    $("input.edit_tonkho").blur(function(){
        var id = $(this).parents('#t_kho').find('input[id="tk_id"]').val();
        var number = $(this).parents('#t_kho').find('input[id="number"]').val();
        var sizechan = $(this).parents('#t_kho').find('input[id="sizechan"]').val();
        var price = $(this).parents('#t_kho').find('input[id="price"]').val();
        var f_id = $(this).parents('#t_kho').find('input[id="f_id"]').val();
        var sp_id = $(this).parents('#t_kho').find('input[id="sp_id"]').val();
        // alert(sizechan);
        $.ajax({
            url:  'admin/ajax/updatetonkho/'+id,
            type: 'GET',
            cache: false,
            data: {
                "id":id,
                "number":number,
                "sizechan":sizechan,
                "price":price,
                "f_id":f_id,
                "sp_id":sp_id
            },
        });
    });
});




