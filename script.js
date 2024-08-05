function changeView() {

    // alert("okk");    
    var signINBox = document.getElementById("signINBox");
    var signUPBox = document.getElementById("signUPBox");

    signINBox.classList.toggle("d-none");
    signUPBox.classList.toggle("d-none");
}

// Page loader spiner///////////////////////////////////////////////////////////////////////////////////////////////////////
var myVar;
function myFunction() {
    myVar = setTimeout(showPage, 2000);
}

function showPage() {
    document.getElementById("loader").style.display = "none";
    document.getElementById("myDiv").style.display = "block";
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


// Alert function calling//////////////////////////////////////////////////////////////////////////////////////////////////
function createToast(type, icon, title, text) {
    let newToast = document.createElement('div');
    newToast.classList.add('noti');
    newToast.classList.add(type);
    newToast.innerHTML = `
        <i class="${icon}"></i>
        <div class="content">
            <div class="title">${title}</div>
            <span>${text}</span>
        </div>
    `;
    document.querySelector('.notifications').appendChild(newToast);

    // Remove notification after 5 seconds and show scrollbar again
    newToast.timeOut = setTimeout(() => {
        newToast.remove();
    }, 5000);
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function addminlogIn() {
    var e = document.getElementById("email");
    var pw = document.getElementById("password");
    var rm = document.getElementById("RememberMe");

    var f = new FormData();
    f.append("e", e.value);
    f.append("pw", pw.value);
    f.append("rm", rm.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            if (response == 'Success') {
                window.location = "addminDashbord.php";
            } else {
                let type = 'info';
                let icon = 'fa-solid fa-circle-info';
                let title = 'Info';
                var text = response;
                createToast(type, icon, title, text);
            }
        }
    }

    r.open("POST", "addminSignInProcess.php", true);
    r.send(f);
}


function createAccount() {
    var fn = document.getElementById("fname");
    var ln = document.getElementById("lname");
    var mb = document.getElementById("mobile");
    var e = document.getElementById("email2");
    var pw = document.getElementById("password2");

    var genders = document.getElementsByName('gender');
    var selectedGender;
    for (var i = 0; i < genders.length; i++) {
        if (genders[i].checked) {
            selectedGender = genders[i].value;
            break;
        }
    }
    // console.log(selectedGender); // This will log the selected gender value
    // // alert('Selected gender: ' + selectedGender); // This will show an alert with the selected gender value

    var f = new FormData();
    f.append("fn", fn.value);
    f.append("ln", ln.value);
    f.append("mb", mb.value);
    f.append("e", e.value);
    f.append("pw", pw.value);
    f.append("gen", selectedGender);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            if (response == 'Success') {
                Swal.fire({
                    title: "Good job!",
                    text: "Your account has been successfully created.",
                    icon: "success"
                });
            } else {
                let type = 'info';
                let icon = 'fa-solid fa-circle-info';
                let title = 'Info';
                var text = response;
                createToast(type, icon, title, text);
            }
        }
    }

    r.open("POST", "signUpProcess.php", true);
    r.send(f);

}

document.getElementById('priceRange').addEventListener('input', function () {
    const value = this.value;
    document.getElementById('minPrice').textContent = value;
});

///star click////////////////////////////////
document.addEventListener("DOMContentLoaded", function () {
    const stars = document.querySelectorAll(".fa-star");

    stars.forEach((star, index) => {
        star.addEventListener("click", () => {
            resetStars();
            for (let i = 0; i <= index; i++) {
                stars[i].classList.add("checked");
            }
            console.log("Rating:", index + 1);
            alert("Rating: " + (index + 1));
        });
    });

    function resetStars() {
        stars.forEach(star => {
            star.classList.remove("checked");
        });
    }
});


function signIn() {
    var em = document.getElementById("email");
    var pw = document.getElementById("password");
    var rm = document.getElementById("RememberMe");

    // alert(un.value);
    // alert(pw.value);
    // alert(rm.value);

    var f = new FormData();
    f.append("em", em.value);
    f.append("pw", pw.value);
    f.append("rm", rm.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;

            if (response == "Success") {
                window.location = "taskboxHome.php";
            } else {
                let type = 'info';
                let icon = 'fa-solid fa-circle-info';
                let title = 'Info';
                var text = response;
                createToast(type, icon, title, text);
            }
        }
    }

    request.open("POST", "signinProcess.php", true);
    request.send(f);
}

function loaduser() {

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            //alert(response);
            document.getElementById("tb").innerHTML = response;
        }
    }

    r.open("POST", "loaduserProcess.php", true);
    r.send();
}

function updateTextField(userId) {
    //document.querySelector('.form-control').value = userId;
    document.getElementById("userIdTextFild").value = userId;
}

function updateuserstatus() {
    var userId = document.getElementById("userIdTextFild");
    var f = new FormData();
    f.append("u", userId.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            var msgDiv = document.getElementById("msgDiv");
            var msg = document.getElementById("msg");

            if (response == "Inactive") {
                msg.innerHTML = "User inactive successfully";
                msg.className = "alert alert-success";
                msgDiv.className = "d-block";
                userId.value = "";
                loaduser();
            } else if (response == "Active") {
                msg.innerHTML = "User active successfully";
                msg.className = "alert alert-success";
                msgDiv.className = "d-block";
                userId.value = "";
                loaduser();
            } else {
                msg.innerHTML = response;
                msg.className = "alert alert-danger";
                msgDiv.className = "d-block";
            }

            // Automatically hide the alert after 5 seconds
            setTimeout(function () {
                msgDiv.className = "d-none";
            }, 5000);
        }
    };
    r.open("POST", "upsateuserprofilestatus.php", true);
    r.send(f);
}

function PlatformReg() {

    //alert("ok");
    var Platform = document.getElementById("Platform");

    var f = new FormData();
    f.append("p", Platform.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            //alert(response);
            if (response == "Success") {
                document.getElementById("msg1").innerHTML = "The registation is success.";
                document.getElementById("msg1").className = "alert alert-success";
                document.getElementById("msgDiv1").className = "d-block";
            }

            else {
                document.getElementById("msg1").innerHTML = response;
                document.getElementById("msg1").className = "alert alert-danger";
                document.getElementById("msgDiv1").className = "d-block";
            }

            setTimeout(function () {
                document.getElementById("msgDiv1").className = "d-none";
            }, 5000);

        }
    }

    r.open("POST", "Platformprocess.php", true);
    r.send(f);
}

function GenreReg() {

    //alert("ok");
    var Genre = document.getElementById("Genre");

    var f = new FormData();
    f.append("g", Genre.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            //alert(response);
            if (response == "Success") {
                document.getElementById("msg2").innerHTML = "The registation is success.";
                document.getElementById("msg2").className = "alert alert-success";
                document.getElementById("msgDiv2").className = "d-block";
            }

            else {
                document.getElementById("msg2").innerHTML = response;
                document.getElementById("msg2").className = "alert alert-danger";
                document.getElementById("msgDiv2").className = "d-block";
            }

            setTimeout(function () {
                document.getElementById("msgDiv2").className = "d-none";
            }, 5000);

        }
    }

    r.open("POST", "Genreprocess.php", true);
    r.send(f);
}

function AgeReg() {

    //alert("ok");
    var AgeRating = document.getElementById("AgeRating");

    var f = new FormData();
    f.append("a", AgeRating.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            //alert(response);
            if (response == "Success") {
                document.getElementById("msg3").innerHTML = "The registation is success.";
                document.getElementById("msg3").className = "alert alert-success";
                document.getElementById("msgDiv3").className = "d-block";
            }

            else {
                document.getElementById("msg3").innerHTML = response;
                document.getElementById("msg3").className = "alert alert-danger";
                document.getElementById("msgDiv3").className = "d-block";
            }

            setTimeout(function () {
                document.getElementById("msgDiv3").className = "d-none";
            }, 5000);

        }
    }

    r.open("POST", "AgeRatingprocess.php", true);
    r.send(f);
}

function DeveloperReg() {

    //alert("ok");
    var Developer = document.getElementById("Developer");

    var f = new FormData();
    f.append("d", Developer.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            //alert(response);
            if (response == "Success") {
                document.getElementById("msg4").innerHTML = "The registation is success.";
                document.getElementById("msg4").className = "alert alert-success";
                document.getElementById("msgDiv4").className = "d-block";
            }

            else {
                document.getElementById("msg4").innerHTML = response;
                document.getElementById("msg4").className = "alert alert-danger";
                document.getElementById("msgDiv4").className = "d-block";
            }

            setTimeout(function () {
                document.getElementById("msgDiv4").className = "d-none";
            }, 5000);

        }
    }

    r.open("POST", "Developerprocess.php", true);
    r.send(f);
}

function PublisherReg() {

    //alert("ok");
    var Publisher = document.getElementById("Publisher");

    var f = new FormData();
    f.append("p", Publisher.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            //alert(response);
            if (response == "Success") {
                document.getElementById("msg5").innerHTML = "The registation is success.";
                document.getElementById("msg5").className = "alert alert-success";
                document.getElementById("msgDiv5").className = "d-block";
            }

            else {
                document.getElementById("msg5").innerHTML = response;
                document.getElementById("msg5").className = "alert alert-danger";
                document.getElementById("msgDiv5").className = "d-block";
            }

            setTimeout(function () {
                document.getElementById("msgDiv5").className = "d-none";
            }, 5000);

        }
    }

    r.open("POST", "Publisherprocess.php", true);
    r.send(f);
}

function regProduct() {
    var n = document.getElementById("name");
    var p = document.getElementById("Platform");
    var g = document.getElementById("Genre");
    var a = document.getElementById("Age");
    var deve = document.getElementById("Developer");
    var pub = document.getElementById("Publisher");
    var dis = document.getElementById("dis");
    var img = document.getElementById("img");



    var f = new FormData();
    f.append("n", n.value);
    f.append("p", p.value);
    f.append("g", g.value);
    f.append("a", a.value);
    f.append("deve", deve.value);
    f.append("pub", pub.value);
    f.append("dis", dis.value);
    f.append("img", img.files[0]);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            //alert(response);
            if (response == "Success") {
                // alert("Product registation successfuly");
                Swal.fire({
                    title: "Good job!",
                    text: "Product registation successfuly.",
                    icon: "success"
                });
            } else {
                // alert(response);
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: response,
                });
            }
        }
    }

    r.open("POST", "productRegProccess.php", true);
    r.send(f);
}

function updateStock() {
    var selectP = document.getElementById("selectProduct");
    var qut = document.getElementById("quantity");
    var unit = document.getElementById("unitprice");

    // alert(selectP.value);
    // alert(qut.value);
    // alert(unit.value);

    var f = new FormData();
    f.append("selectP", selectP.value);
    f.append("qut", qut.value);
    f.append("unit", unit.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            // alert(response);
            // location.reload();
            if (response == "NEW STOCK ADDED SUCCESSFULY") {
                Swal.fire({
                    title: "Good job!",
                    text: response,
                    icon: "success"
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: response,
                });
            }
        }
    }

    r.open("POST", "addminstockProcess.php", true);
    r.send(f);
}

function buttonPrint() {
    var orginalContainer = document.body.innerHTML;
    var printArea = document.getElementById("printArea").innerHTML;

    document.body.innerHTML = printArea;
    window.print();
    document.body.innerHTML = orginalContainer;
}

function loadProduct(x) {
    var page = x;
    // alert(page);

    var f = new FormData();
    f.append("p", page);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            // alert(response);
            document.getElementById("pid").innerHTML = response;
        }
    }

    r.open("POST", "loadProductProcess.php", true);
    r.send(f);

}

function searchProduct(x) {

    var page = x;
    var product = document.getElementById("product");

    // alert(page);
    // alert(product.value);

    var f = new FormData();
    f.append("page", page);
    f.append("p", product.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            document.getElementById("pid").innerHTML = response;
        }
    }

    r.open("POST", "searchProduct.php", true);
    r.send(f);
}

function updatePrice(value) {
    document.getElementById('currentPrice').textContent = value;
}

function advSearchProduct(x) {
    var page = x;
    var p = document.getElementById("Platform");
    var g = document.getElementById("Genre");
    var age = document.getElementById("Ager");
    var deve = document.getElementById("Developer");
    var pub = document.getElementById("Publisher");
    var max = document.getElementById("priceRange"); // Get the price range value

    var f = new FormData();
    f.append("pg", page);
    f.append("p", p.value);
    f.append("g", g.value);
    f.append("age", age.value);
    f.append("deve", deve.value);
    f.append("pub", pub.value);
    f.append("max", max.value); // Append the price range value

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            document.getElementById("pid").innerHTML = response;
        }
    };
    request.open("POST", "advanceSearchProductProcess.php", true);
    request.send(f);
}

function uploadimage() {
    var img = document.getElementById("imageuploader");

    var f = new FormData();
    f.append("i", img.files[0]);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            // alert(response);
            if (response == "empty") {
                // alert("You did not choose an image file.");
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "You did not choose an image file.",
                });
            } else {
                document.getElementById("i").src = response;
                img.value = "";
            }
        }
    }

    r.open("POST", "profileImageUpload.php", true);
    r.send(f);
}

function updatedata() {
    var fn = document.getElementById("fname");
    var ln = document.getElementById("lname");
    var e = document.getElementById("email");
    var m = document.getElementById("mobile");
    var pw = document.getElementById("password");
    var no = document.getElementById("no");
    var a01 = document.getElementById("add01");
    var a02 = document.getElementById("add02");

    var f = new FormData();
    f.append("fn", fn.value);
    f.append("ln", ln.value);
    f.append("e", e.value);
    f.append("m", m.value);
    f.append("pw", pw.value);
    f.append("no", no.value);
    f.append("a01", a01.value);
    f.append("a02", a02.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            // alert(response);
            // location.reload();

            if (response == "Update successfully") {
                Swal.fire({
                    title: "Good job!",
                    text: response,
                    icon: "success"
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: response,
                });
            }
        }
    }
    r.open("POST", "uploadProfileDetails.php", true);
    r.send(f);
}

function signOut() {
    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            alert(response);
            window.location.href = 'index.php';
        }
    }
    r.open("POST", "signOutProcess.php", true);
    r.send();
}

function addtoCart(x) {
    var stockID = x;
    var qty = document.getElementById("qty");

    if (qty.value > 0) {

        var f = new FormData();
        f.append("stockID", stockID);
        f.append("qty", qty.value);

        var r = new XMLHttpRequest();
        r.onreadystatechange = function () {
            if (r.readyState == 4 && r.status == 200) {
                var response = r.responseText;
                if (response == "stockID not aveilabale") {
                    window.open('signin.php', '_blank');
                } else {
                    Swal.fire({
                        title: "Good job!",
                        text: response,
                        icon: "success"
                    });
                    qty.value = "";
                }
            }
        }

        r.open("POST", "addtocartProcess.php", true);
        r.send(f);

    } else {
        alert("Please Enter valid Quantity");
    }
}

function loadcart() {
    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            document.getElementById("cartBody").innerHTML = response;
        }
    }

    r.open("POST", "loadCartProcess.php", true);
    r.send();
}

function incremantCartQty(x) {
    var cartId = x;
    var qty = document.getElementById("qty" + x);
    var newQty = parseInt(qty.value) + 1;

    var f = new FormData();
    f.append("c", cartId);
    f.append("q", newQty);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            if (response == "success") {
                qty.value = parseInt(qty.value) + 1;
                loadcart();
            } else {
                alert(response);
            }
        }
    }

    r.open("POST", "updateCartQtyProcess.php", true);
    r.send(f);
}

function decrementCartQty(x) {
    var cartId = x;
    var qty = document.getElementById("qty" + x);
    var newQty = parseInt(qty.value) - 1;

    var f = new FormData();
    f.append("c", cartId);
    f.append("q", newQty);

    if (newQty > 0) {
        var r = new XMLHttpRequest();
        r.onreadystatechange = function () {
            if (r.readyState == 4 && r.status == 200) {
                var response = r.responseText;
                if (response == "success") {
                    qty.value = parseInt(qty.value) - 1;
                    loadcart();
                } else {
                    alert(response);
                }
            }
        }

        r.open("POST", "updateCartQtyProcess.php", true);
        r.send(f);
    }
}

function removeCart(x) {

    if (confirm("Are you suru you want ot delete this iterm?")) {


        var f = new FormData();
        f.append("c", x);

        var r = new XMLHttpRequest();
        r.onreadystatechange = function () {
            if (r.readyState == 4 && r.status == 200) {
                var response = r.responseText;
                alert(response);
                location.reload();
            }
        }

        r.open("POST", "removeCartProcess.php", true);
        r.send(f);
    }
}

function checkOut() {
    var f = new FormData();
    f.append("cart", true);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;

            if (response == "Pleace enter your dilivary address in your profile") {

                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: response,
                    footer: '<a href="profile.php">Go to your profile, click here.</a>'
                });

            }
            var paydata = JSON.parse(response);
            docheckOut(paydata, "checkOutProcess.php");

        }
    }

    r.open("POST", "paymentProcess.php", true);
    r.send(f);
}

function docheckOut(paydata, path) {
    // Payment completed. It can be a successful failure.
    payhere.onCompleted = function onCompleted(orderId) {
        console.log("Payment completed. OrderID:" + orderId);
        // Note: validate the payment and show success or failure page to the customer

        var f = new FormData();
        f.append("payment", JSON.stringify(paydata));

        var r = new XMLHttpRequest();
        r.onreadystatechange = function () {

            if (r.readyState == 4 && r.status == 200) {
                var response = r.responseText;
                // alert(response);
                var order = JSON.parse(response);

                if (order.res == "success") {
                    // location.reload();
                    window.location = "invoice.php?orderId=" + order.order_id;
                } else {
                    alert(response);
                }
            }

        }
        r.open("POST", path, true);
        r.send(f);
    };

    // Payment window closed
    payhere.onDismissed = function onDismissed() {
        // Note: Prompt user to pay again or show an error page
        console.log("Payment dismissed");
    };

    // Error occurred
    payhere.onError = function onError(error) {
        // Note: show an error page
        console.log("Error:" + error);
    };

    // Put the payment variables here
    var payment = {
        "sandbox": paydata["sandbox"],
        "merchant_id": paydata["merchant_id"],    // Replace your Merchant ID
        "return_url": paydata["return_url"],     // Important
        "cancel_url": paydata["cancel_url"],     // Important
        "notify_url": paydata["notify_url"],
        "order_id": paydata["order_id"],
        "items": paydata["items"],
        "amount": paydata["amount"],
        "currency": paydata["currency"],
        "hash": paydata["hash"], // *Replace with generated hash retrieved from backend
        "first_name": paydata["first_name"],
        "last_name": paydata["last_name"],
        "email": paydata["email"],
        "phone": paydata["phone"],
        "address": paydata["address"],
        "city": paydata["city"],
        "country": paydata["country"],
        "delivery_address": paydata["address"],
        "delivery_city": paydata["city"],
        "delivery_country": paydata["country"],
        "custom_1": "",
        "custom_2": ""
    };

    // Show the payhere.js popup, when "PayHere Pay" is clicked
    payhere.startPayment(payment);
}

function buyNow(stockID) {
    // alert(stcockID);
    var qty = document.getElementById("qty");

    if (qty.value > 0) {
        var f = new FormData();
        f.append("cart", false);
        f.append("stockID", stockID);
        f.append("qty", qty.value);

        var r = new XMLHttpRequest();
        r.onreadystatechange = function () {
            if (r.readyState == 4 && r.status == 200) {
                var response = r.responseText;

                if (response == "Pleace enter your dilivary address in your profile") {

                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: response,
                        footer: '<a href="profile.php">Go to your profile, click here.</a>'
                    });

                }

                var paydata = JSON.parse(response);
                paydata.stock_id = stockID;
                paydata.qty = qty.value;
                docheckOut(paydata, "buynowProcess.php");
            }
        }

        r.open("POST", "paymentProcess.php", true);
        r.send(f);

    } else {
        alert("Please enter valid Quantity");
    }
}

function frogetpassword_Btn() {
    var btn = document.getElementById("btn");
    btn.innerHTML = "";
    btn.classList = "btn btn-primary col-6 spinner-border text-dark";
}

function frogetpassword() {
    frogetpassword_Btn();
    var email = document.getElementById("e");
    var btn = document.getElementById("btn");

    if (email.value != "") {

        var f = new FormData();
        f.append("e", email.value);

        var r = new XMLHttpRequest();
        r.onreadystatechange = function () {
            if (r.readyState == 4 && r.status == 200) {
                var response = r.responseText;
                // alert(response);
                if (response == "Message has been sent") {
                    Swal.fire({
                        title: "Success",
                        text: response,
                        icon: "success"
                    });
                    email.value = '';
                    btn.classList = "btn btn-primary col-6";
                    btn.innerHTML = "Send Email";

                } else {

                    email.value = '';
                    btn.classList = "btn btn-primary col-6";
                    btn.innerHTML = "Send Email";

                    let type = 'info';
                    let icon = 'fa-solid fa-circle-info';
                    let title = 'Info';
                    var text = response;
                    createToast(type, icon, title, text);
                    // alert(response);
                }
            }
        }

        r.open("POST", "forgetPasswordProcess.php", true);
        r.send(f);

    } else {

        email.value = '';
        btn.classList = "btn btn-primary col-6";
        btn.innerHTML = "Send Email";
        // alert("Please enter your valid email address.");
        let type = 'info';
        let icon = 'fa-solid fa-circle-info';
        let title = 'Info';
        var text = "Please enter your valid email address.";
        createToast(type, icon, title, text);
    }
}

function resetpassword() {
    var vcode = document.getElementById("vcode");
    var np = document.getElementById("np");
    var np2 = document.getElementById("np2");

    // alert(vcode.value);
    // alert(np.value);
    // alert(np2.value);

    if (np.value != '') {
        var f = new FormData();
        f.append("vcode", vcode.value);
        f.append("np", np.value);
        f.append("np2", np2.value);

        var r = new XMLHttpRequest();
        r.onreadystatechange = function () {
            if (r.readyState == 4 && r.status == 200) {
                var response = r.responseText;
                // alert(response);
                if (response == 'success') {
                    window.location.href = 'index.php';
                } else {
                    let type = 'info';
                    let icon = 'fa-solid fa-circle-info';
                    let title = 'Info';
                    var text = response;
                    createToast(type, icon, title, text);
                }
            }
        }

        r.open("POST", "resetPasswordProcess.php", true);
        r.send(f);
    } else {
        // alert("Please enter your new password.");
        // document.getElementById("msg").innerHTML = "Please enter your new password.";
        let type = 'info';
        let icon = 'fa-solid fa-circle-info';
        let title = 'Info';
        var text = "Please enter your new password.";
        createToast(type, icon, title, text);
    }

}

function loadchart() {

    var ctx = document.getElementById('myChart');

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            // alert(response);
            var data = JSON.parse(response);

            ////chart
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: data.lebals,
                    datasets: [{
                        label: '# of Votes',
                        data: data.data,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            /////////////////

        }
    }

    r.open("POST", "loadchartProcess.php", true);
    r.send();
}