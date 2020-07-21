function savedSuccess() {
    swal("Successfully!", "Your content saved!", "success");
}


//////////////////////////////////////////////////////////////////////////////////////////////////
function reloadPage() {
    window.location.reload()
}

/////////////////////////////////////////////////////////////////////////////////////////////////

function copytext(text) {
    var textField = document.createElement('textarea');
    textField.innerText = text;
    document.body.appendChild(textField);
    textField.select();
    document.execCommand('copy');
    textField.remove();
}

/////////////////////////////////////////////////////////////////////////////////////////////////
function imgDelete(imgname) {
        swal({
                html: true,
                title: "Are you sure delete *" + imgname + "* image?",
                text: "Once deleted, you will not be able to recover this image !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    removeImage(imgname);
                } else {
                    swal("Your image has been safe!");
                }
            });
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////

function removeImage(name) {

    var url = "../setting/imgupload.php"; // the script where you handle the form input.

    $.ajax({
        type: "POST",
        url: url,
        data: {
            imagename: name,
            imagedelete: 'ok'
        }, // serializes the form's elements.
        success: function() {
            swal("Poof! Your image has been deleted!", {
                icon: "success",
            }).then(function(result) {
                reloadPage();
            })
        }
    });
}

/////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////
$('#library').change(function() {
    libname = $(this).val();
    $("#catname").val(libname);
});

function addCatecory() {
    swal({
            html: true,
            title: "Are you sure change catecory?",
            text: "All image will move to " + libname + "!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((move) => {
            if (move) {
                $.ajax({
                    type: 'post',
                    url: '../setting/imgupload.php',
                    data: $("#Gallery").serialize() + "&catecoryupdate=ok",
                    success: function() {
                        swal("Successfully!", "Your catecory has been changed!", "success").then(function(result) {
                            reloadPage();
                        });
                    }
                });
            }
        });
}

/////////////////////////////////////////////////////////////////////////////////////////////////

function deleteAllImage() {

    swal({
            html: true,
            title: "Are you sure delete all selected images?",
            text: "Once deleted, you will not be able to recover these images !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: 'post',
                    url: '../setting/imgupload.php',
                    data: $("#Gallery").serialize() + "&gallerydell=ok",
                    success: function() {
                        swal("Successfully!", "Your images has been deleted!", "success").then(function(result) {
                            reloadPage();
                        })
                    }
                });
            } else {
                swal("Your images has been safe!");
            }
        });

}

function AddNewPage() {

    $.ajax({
        type: 'post',
        url: '../setting/engine.php',
        data: $("#addnewpage").serialize(),
        success: function() {
            swal("Successfully!", "Your new page created!", "success").then(function(result) {
                reloadPage();
            })
        }
    });
}




/////////////////////////////////////////////////////////////////////////////////////////////////
$(function() {

    $("#removePages").on('submit', function(e) {

        e.preventDefault();

        swal({
                html: true,
                title: "Are you sure delete all selected pages?",
                text: "Once deleted, you will not be able to recover these pages !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: 'post',
                        url: '../setting/engine.php',
                        data: $("#removePages").serialize(),
                        success: function() {
                            swal("Successfully!", "Your pages deleted!", "success").then(function(result) {
                                reloadPage();
                            })
                        }
                    });
                } else {
                    swal("Your pages is safe!");
                }
            });

    });

});
/////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////Porfolio galery////////////////////////////////////////////////////////
$(document).ready(function() {
    setTimeout(function() {
        filterSelection('all');
    }, 100);
});

function filterSelection(c) {
    var x, i;
    x = document.getElementsByClassName("column");
    if (c == "all") c = "";
    for (i = 0; i < x.length; i++) {
        w3RemoveClass(x[i], "show");
        if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
    }
}

function w3AddClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
        if (arr1.indexOf(arr2[i]) == -1) {
            element.className += " " + arr2[i];
        }
    }
}

function w3RemoveClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
        while (arr1.indexOf(arr2[i]) > -1) {
            arr1.splice(arr1.indexOf(arr2[i]), 1);
        }
    }
    element.className = arr1.join(" ");
}


// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = document.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function() {
        var current = document.getElementsByClassName("active");
        current[0].className = current[0].className.replace(" active", "");
        this.className += " active";
    });
}

///////////////////////////////////////////////////////////////////////////////////

//pages

function pageDelete(page_id, page_name) {

    swal({
            html: true,
            title: "Are you sure delete *" + page_name + "* page?",
            text: "Once deleted, you will not be able to recover this page !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                removePage(page_id);
            } else {
                swal("Your page is safe!");
            }
        });
}


//////////////////////////////////////////////////
// When the user clicks on div, open the popup
function myFunction() {
    var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
}

function toDay(){
var date = new Date();

var day = date.getDate();
var month = date.getMonth() + 1;
var year = date.getFullYear();

if (month < 10) month = "0" + month;
if (day < 10) day = "0" + day;

var today = year + "-" + month + "-" + day;

document.getElementById('theDate').value = today;
}
/////////////////////////////////////////////////////////


/////////////////////////////////////////////////////////////////////////////////////////////////
function removePage(id) {

        var url = "../setting/engine.php"; // the script where you handle the form input.

        $.ajax({
            type: "POST",
            url: url,
            data: {
                page_id: id,
                pagedelete: 'ok'
            }, // serializes the form's elements.
            success: function() {
                swal("Poof! Your page has been deleted!", {
                    icon: "success",
                }).then(function(result) {
                    reloadPage();
                })
            }
        });
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////



/////////////////////////////////////////////////////////////////////////////////////////////////
// setting change ajax post popub window
function openWindowWithPostRequest(page_id) {
        var winName = 'Setting';
        var winURL = 'popup.php';
        var windowoption = 'resizable=yes,height=600,width=800,location=0,menubar=0,scrollbars=1';
        var params = {
            'page_id': page_id
        };
        var form = document.createElement("form");
        form.setAttribute("method", "post");
        form.setAttribute("action", winURL);
        form.setAttribute("target", winName);
        for (var i in params) {
            if (params.hasOwnProperty(i)) {
                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = i;
                input.value = params[i];
                form.appendChild(input);
            }
        }
        document.body.appendChild(form);
        window.open('', winName, windowoption);
        form.target = winName;
        form.submit();
        document.body.removeChild(form);
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////



function ShowDeleteBTN() {

    var delbtn = document.getElementById("DeleteAll");
    var cacecory = document.getElementById("CatChange");

    if ($('input.checked').is(':checked')) {
        delbtn.style.display = "block";
        cacecory.style.display = "block";
    } else {
        delbtn.style.display = "none";
        cacecory.style.display = "none";
    }
}

/////////////////////////////////////////////////////////////////////////////////////////////////

function deleteSliderAllImage() {

    swal({
            html: true,
            title: "Are you sure delete all selected images?",
            text: "if you delete images they stay in gallery !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: 'post',
                    url: '../setting/imgupload.php',
                    data: $("#Gallery").serialize() + "&sliderdell=ok",
                    success: function() {
                        swal("Successfully!", "Your images has been deleted!", "success").then(function(result) {
                            reloadPage();
                        })
                    }
                });
            } else {
                swal("Your images has been safe!");
            }
        });

}
