function onlyAlert(msg, closes, themes = "primary") {
    let classes, wording;
    switch (themes) {
        case "info":
            classes = "alert-info";
            wording = "Info";
        break;
        case "warning":
            classes = "alert-warning";
            wording = "Warning";
        break;
        case "danger":
            classes = "alert-danger";
            wording = "Ooops...";
        break;
        case "success":
            classes = "alert-success";
            wording = "Yes...";
        break;
    
        default:
            classes = "alert-primary";
            wording = "Info";
        break;
    }
    bootbox.alert({title: wording, message: msg}).find('.modal-header').addClass(classes);
    if(closes) {
        bootbox.hideAll();
    }
}

function getFormattedDate(date) {
    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear().toString().slice(2);
    return day + '-' + month + '-' + year;
}

function postAjax(url, data, success) {
    var params = typeof data == 'string' ? data : Object.keys(data).map(
            function(k){ return encodeURIComponent(k) + '=' + encodeURIComponent(data[k]) }
        ).join('&');

    var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
    xhr.open('POST', url);
    xhr.onreadystatechange = function() {
        // if (xhr.readyState>3 && xhr.status==200) {
        //   success({ status: xhr.status,  response: xhr.responseText}); 
        // }
        if(xhr.readyState>3) {
          success({ status: xhr.status,  response: xhr.responseText}); 
        }
    };
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(params);
    return xhr;
}

function ChangeImages() {
    $('[name="tmpImages"]').click();

    var control = document.getElementById("tmpImages");
    var validExt = ['jpeg', 'jpg'];
    control.addEventListener("change", function(event) {
        var data = fileSizeValidate(control);
        var types = data.name.substring(data.name.lastIndexOf('.') + 1).toLowerCase();
        var valTypes = validExt.includes(types);
        var base64 = "";
        if(valTypes) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.previewImages').attr("src", e.target.result);
                $('[name="images"]').val(e.target.result);
            }
            reader.readAsDataURL(data);
        } else {
            onlyAlert( "Jenis gambar yang dipilih harus .jpeg atau .jpg", false);
        }
    }, false);
}

function fileSizeValidate(fdata) {
    var maxSize = '5360';
    if (fdata.files && fdata.files[0]) {
        var fsize = fdata.files[0].size / 1024;
        if (fsize > maxSize) {
            onlyAlert( "Ukuran maksimum file 5 Mb, Silakan gunakan file lain.", false);
            return false;
        } else {
            return fdata.files[0];
        }
    }
}

function previewImages(img) {
    var dialog = bootbox.dialog({
        size: 'medium',
        message: '<img src="'+img+'" style="width: 100%;" class="rounded float-left" alt="...">',
        onEscape: function() {
            
        },
    });
}

function validateEmail(emailField){
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

    if (reg.test(emailField.value) == false) 
    {
        onlyAlert("Format email tidak sesuai.", false);
        return false;
    }

    return true;

}