function signUp(){
    // alert ("okkd");

    var fname = document.getElementById("fname");
	var lname = document.getElementById("lname");
	var email = document.getElementById("email");
	var mobile = document.getElementById("mobile");
	var password = document.getElementById("password");

    // alert(cpassword.value);

    var f = new FormData();
    f.append("f", fname.value);
    f.append("l", lname.value);
    f.append("e", email.value);
    f.append("m", mobile.value);
    f.append("p", password.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange =  function () {
        if (request.readyState == 4 & request.status == 200){
            var response = request.responseText;
            // alert(response);

            if (response == "Success") {
                // alert(response);
                // document.getElementById("msg").innerHTML = "Registration Successfully";
				// document.getElementById("msg").classList = "alert alert-success";
				// document.getElementById("msgDiv").className = "d-block";
                swal("Good job!", "Sign In Successfully!", "success");

                fname.value = "";
				lname.value = "";
				email.value = "";
				mobile.value = "";
				password.value = "";
                
            } else {
                // alert(response);
                swal("", response , "warning");

                
            }
        }
    };

    
	request.open("POST","signUpProcess.php", true);
	request.send(f);

}


function signIn(){
    // alert ("okk");

    var un = document.getElementById("email");
	var pw = document.getElementById("pw");
	var rm = document.getElementById("rm");

    // alert (email.value);

    var f = new FormData();
	f.append("e", email.value);
	f.append("p", pw.value);
	f.append("r", rm.checked);

    var request = new XMLHttpRequest();
	request.onreadystatechange = function() {
		if (request.readyState == 4 & request.status == 200) {
			var response = request.responseText;
			// alert(response);
            if (response == "Success") {
                swal("Good job!", "Sign In Successfully!", "success");
				window.location = "index.php";

                
			} else {
				// alert(response);
                // document.getElementById("msg1").innerHTML = response;
				// document.getElementById("msgDiv1").className = "d-block";
                swal("", response , "error");

			}
			
		}
	};

	request.open("POST", "SigninProcess.php", true);
	request.send(f);


}



function adminSignin() {
	
	var un = document.getElementById("un");
	var pw = document.getElementById("pw");

	//alert(un.value);

	var f = new FormData();
	f.append("u", un.value);
	f.append("p", pw.value);

	var request = new XMLHttpRequest();
	request.onreadystatechange = function() {
		if (request.readyState == 4 & request.status == 200) {
			var response = request.responseText;
			//alert(response);
			if (response == "Success") {
				window.location = "adminDashboad.php";
			} else {
                swal("", response , "error");

			}
		}
	};

	request.open("POST", "adminSigninProcess.php", true);
	request.send(f);

}




function loadUser(){

	var request = new XMLHttpRequest();
	request.onreadystatechange = function (){
		if (request.readyState == 4 & request.status == 200) {
			var response = request.responseText;
			//alert(response);

			document.getElementById("tb").innerHTML = response;
		}
	};

	request.open("POST","loadUserProcess.php",true);
	request.send();
}




function updateUserStatus(){
	var userid = document.getElementById("uid");
	//alert(userid.value);

	var f = new FormData();
	f.append("u",userid.value);

	var request = new XMLHttpRequest();
	request.onreadystatechange = function () {
		if (request.readyState == 4 & request.status == 200) {
			var response = request.responseText;
			// alert(response);

			if (response == "Deactive") {
				// document.getElementById("msg").innerHTML = "USER DEACTIVATE SUCCESSFULLY";
				// document.getElementById("msg").className = "alert alert-success";
				// document.getElementById("msgDiv").className = "d-block";
                swal("", "User Deactivate Successfully!", "success");

				userid.value = "";
				loadUser();
		
				
			} else if (response == "Active"){
				// document.getElementById("msg").innerHTML = "USER ACTIVATE SUCCESSFULLY";
				// document.getElementById("msg").className = "alert alert-success";
				// document.getElementById("msgDiv").className = "d-block";
                swal("", "User Activate Successfully!", "success");
                userid.value = "";
				loadUser();



			}else {

				// other response
				// document.getElementById("msg").innerHTML = response;
				// document.getElementById("msgDiv").className = "d-block";
                swal("", response , "warning");


				loadUser();

				
			}
		}
		
	}

	request.open("POST", "updateUserStatusProcess.php", true);
	request.send(f);

}


function reload() {
	location.reload();
}

function brandReg() {

	//alert("okk");

	var brand = document.getElementById("brand");
	//alert(brand.value);

	var f = new FormData();
	f.append("b",brand.value);

	var request = new XMLHttpRequest();

	request.onreadystatechange = function () {
		if (request.readyState == 4 & request.status == 200) {
			var response = request.responseText;
			//alert(response);
			if (response == "Success") {
				swal("", "Brand Registration Successfully", "success");

				brand.value = "";
			} else {
                swal("", response , "warning");

				
			}
		}
		
	};

	request.open("POST","brandRegisterProcess.php",true);
	request.send(f);

}


function colorReg(){
	// alert ("asa");

	document.getElementById("color");
	// alert(color.value);

	var f = new FormData();
	f.append("cl",color.value);

	var request = new XMLHttpRequest();
	request.onreadystatechange = function (){
		if (request.readyState == 4 & request.status == 200) {
			var response = request.responseText;
			// alert (response);

			if (response == "Success") {
                swal("", "Color Registration Successfully", "success");

				color.value = "";
			} else {
                swal("", response , "warning");

				
			}
			
		}
	}

	request.open("POST","colorRegisterProcess.php",true);
	request.send(f);
}

function conditionReg(){
	// alert ("iajda");

	document.getElementById("condition");
	// alert(condition.value);

	var f = new FormData();
	f.append("c",condition.value);

	var request = new XMLHttpRequest();
	request.onreadystatechange = function (){
		if (request.readyState == 4 & request.status == 200) {
			var response = request.responseText;
			// alert (response);

			if (response == "Success") {
                swal("", "Condition Registration Successfully", "success");

				condition.value = "";
			} else {
                swal("", response , "warning");

				
			}
			
		}
	}

	request.open("POST","conditionRegisterProcess.php",true);
	request.send(f);
	
}


function regProduct(){
	// alert ("okk");
	var pname = document.getElementById("pname");
    var brand = document.getElementById("brand");
    var color = document.getElementById("color");
    var condition = document.getElementById("condition");
    var desc = document.getElementById("desc");
    var file = document.getElementById("file");

    var form = new FormData();
    form.append("pname", pname.value);
    form.append("brand", brand.value);
    form.append("color", color.value);
    form.append("condition", condition.value);
    form.append("desc", desc.value);
    form.append("image", file.files[0]);

	var request = new XMLHttpRequest();
	
	request.onreadystatechange = function() {
		if (request.readyState == 4 & request.status == 200) {
			var response = request.responseText;
			// alert (response);

			if (response == "Success") {
                swal("", "Product Registration Successfully", "success");

				pname.value = "";
				brand.value = "";
				color.value = "";
				condition.value = "";
				desc.value = "";
				file.value = "";
			} else {
                swal("", response , "warning");

				
			}
			
		}
		
	};
	request.open("POST", "productRegProcess.php", true);
	request.send(form);



}


function updateStock(){
	// alert ("asda");

	var pname = document.getElementById("selectProduct");
	var qty = document.getElementById("qty");
	var price = document.getElementById("uprice");

	// alert (qty.value);
	var f = new FormData();
    f.append("p", pname.value);
    f.append("q", qty.value);
    f.append("u", price.value);

	var request = new XMLHttpRequest();
	request.onreadystatechange = function () {
		if (request.readyState == 4 & request.status == 200) {
			var response = request.responseText;
			// alert(response);
			if (response == "New Stock Added Successfully") {
                swal("", "Stock Register Successfully", "success");

				pname.value="";
				qty.value="";
				price.value="";
				
			} else if (response == "Stock Updated Successfully") {
                swal("", "Brand Update Successfully", "success");

				pname.value="";
				qty.value="";
				price.value="";


			}
			
			
			
			else {
                swal("", response , "warning");

				
			}
			
			
		}
	};
	request.open("POST","updateStockProcess.php", true);
	request.send(f);
}

function stock(){
	// alert ("off");
	var content = document.getElementById("content1").innerHTML;
	var body1 = document.getElementById("body12").innerHTML ;
	document.getElementById("body12").innerHTML = content;
	print();
	document.getElementById("body12").innerHTML = body1;


}

function product(){
	// alert ("off");
	var content = document.getElementById("content2").innerHTML;
	var body1 = document.getElementById("body12").innerHTML ;
	document.getElementById("body12").innerHTML = content;
	print();
	document.getElementById("body12").innerHTML = body1;


}

function userPrint(){
	// alert("Asd");
    var fullcontent = document.body.innerHTML;
    var printArea = document.getElementById("printArea").innerHTML;

    document.body.innerHTML = printArea;

    window.print();

    document.body.innerHTML = fullcontent;
}

function productReport(){
    // alert ("ada");

    var fullcontent = document.body.innerHTML;
    var printArea = document.getElementById("printArea").innerHTML;

    document.body.innerHTML = printArea;

    window.print();

    document.body.innerHTML = fullcontent;
}


function loadProduct(x) {
    var page = x;
    // alert(x);

    var f = new FormData();
    f.append("p", page);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            document.getElementById("pid").innerHTML = response;
        }
    }

    request.open("POST", "loadProductProcess.php", true);
    request.send(f);

}

function searchProduct(x) {

    var page = x;
    var product = document.getElementById("product");

    // alert(page);
    // alert(product.value);

    var f = new FormData();
    f.append("p", product.value);
    f.append("pg", page);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            document.getElementById("pid").innerHTML = response;
        }
    }
    request.open("POST", "searchProductProcess.php", true);
    request.send(f);
}

function viewFilter() {

    // document.getElementById("filterId").className = "d=block";
    // alert ("ASd");

    var filterElement = document.getElementById("filterId");
    var currentClass = filterElement.className;

    if (currentClass.includes("d-block")) {
        filterElement.className = "d-none";
    } else {
        filterElement.className = "d-block";
    }

}

// advance search 
function advSearchProduct(x) {
    // alert("ok");
    var page = x;
    var brand = document.getElementById("brand");
    var color = document.getElementById("color");
    var condition = document.getElementById("condition");
    var min = document.getElementById("min");
    var max = document.getElementById("max");

    // alert (max.value);

    var f = new FormData();
    f.append("pg", page);
    f.append("b", brand.value);
    f.append("co", color.value);
    f.append("c", condition.value);
    f.append("min", min.value);
    f.append("max", max.value);

    


    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 & r.status == 200) {
            var response = r.responseText;
            // alert(response);
            document.getElementById("pid").innerHTML = response;

            color.value = "0";
            cat.value = "0";
            brand.value = "0";
            size.value = "0";
            min.value = "";
            max.value = "";
        }
    };

    r.open("POST", "advSearchProductProcess.php", true);
    r.send(f);
}


// advance search 


function uploadImg() {
    var img = document.getElementById("imgUploader");

    // alert("okk");

    var f = new FormData();
    f.append("i", img.files[0]);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if ((request.readyState == 4) & (request.status == 200)) {
            var response = request.responseText;
            if (response == "empty") {
                swal("", "Please Select Profile Image" , "warning");

            } else if (response !== "success") {
                reload();
            } else {
                swal("", response , "warning");
                img.value = "";
            }
        }
    };

    request.open("POST", "profileImgUploadProcess.php", true);
    request.send(f);
}

function updateData() {
    // alert ("Ads");
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var uname = document.getElementById("uname");
    var mobile = document.getElementById("mobile");
    var line1 = document.getElementById("line1");
    var line2 = document.getElementById("line2");
    var city = document.getElementById("city");
    var pcode = document.getElementById("pcode");

    // alert (pcode.value);


    var f = new FormData();
    f.append("f", fname.value);
    f.append("l", lname.value);
    f.append("u", uname.value);
    f.append("m", mobile.value);
    f.append("l1", line1.value);
    f.append("l2", line2.value);
    f.append("c", city.value);
    f.append("p", pcode.value);



    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
				swal("", "Update Successfully!", "success");

				color.value = "";
			} else {
                swal("", response , "warning");
				
			}
        }
    }

    request.open("POST", "updateDataProcess.php", true);
    request.send(f);
}

function signOut() {
    // alert ("das");

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            reload();
            // document.getElementById("so").className = "d-none";

        }
    }

    request.open("POST", "signOutProcess.php");
    request.send();

}

function addtoCart(x) {

    // alert(x);

    var stockId = x;
    var qty = document.getElementById("qty");
    // alert (qty.value);

    if (qty.value > 0) { //not = empty
        // alert("OK");

        var f = new FormData();
        f.append("s", stockId);
        f.append("q", qty.value);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 & request.status == 200) {
                var response = request.responseText;
                // alert(response);
                swal("Good job!", response , "success");
                qty.value = "";
            }
        }

        request.open("POST", "addtoCartProcess.php", true);
        request.send(f);

    } else {
        swal("ERROR", "Please Enter Valid Quantity" , "warning");
    }

}

function loadCart() {
    // alert("OK");

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            document.getElementById("cartBody").innerHTML = response;
        }
    }

    request.open("POST", "loadCartProcess.php", true);
    request.send();
}


function loadWhichlist() {
    // alert("OK");

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            document.getElementById("cartBody").innerHTML = response;
        }
    }

    request.open("POST", "loadWichlistProcess.php", true);
    request.send();
}


function incrementCartQty(x) {

    // alert(x);

    var cardId = x;
    var qty = document.getElementById("qty" + x);
    //alert(qty.value);

    var newQty = parseInt(qty.value) + 1; //integer
    //alert(newQty);

    var f = new FormData();
    f.append("c", cardId);
    f.append("q", newQty);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            //alert(response);

            if (response == "Success") {
                qty.value = parseInt(qty.value) + 1;
                loadCart();
            } else {
                // alert(response);
                swal(response);
            }
        }
    }
    

    request.open("POST", "updateCartQtyProcess.php", true);
    request.send(f);


}

function decrementCartQty(x) {
    //alert(x);

    var cardId = x;
    var qty = document.getElementById("qty" + x);

    var newQty = parseInt(qty.value) - 1; //integer
    //alert(newQty);

    var f = new FormData();
    f.append("c", cardId);
    f.append("q", newQty);

    if (newQty > 0) {
        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 & request.status == 200) {
                var response = request.responseText;
                //alert(response);

                if (response == "Success") {
                    qty.value = parseInt(qty.value) - 1;
                    loadCart();
                } else {
                    // alert(response);
                swal(response);

                }
            }
        }

        request.open("POST", "updateCartQtyProcess.php", true);
        request.send(f);
    }


}

function removeCart(x) {
    //alert(x);

    if (confirm("Are You Suer Deleting This Item?")) {

        var f = new FormData();
        f.append("c", x);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 & request.status == 200) {
                var response = request.responseText;
                alert(response);
                reload();
            
                

            }
        }


        request.open("POST", "removeCartProcess.php", true);
        request.send(f);

    }

}

function checkOut() {
    var f = new FormData();
    f.append("cart", true);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if ((request.readyState == 4) & (request.status == 200)) {
            var response = request.responseText;
            var payment = JSON.parse(response);
            doCheckout(payment, "checkoutProcess.php");
            // alert(response);
        }
    };
    request.open("POST", "paymentProcess.php", true);
    request.send(f);
}

function doCheckout(payment, path) {
    // Payment completed. It can be a successful failure
    payhere.onCompleted = function onCompleted(orderId) {
        console.log("Payment completed. OrderID:" + orderId);
        // Note: validate the payment and show success or failure page to the customer

        var f = new FormData();
        f.append("payment", JSON.stringify(payment));

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if ((request.readyState == 4) & (request.status == 200)) {
                var response = request.responseText;
                // alert(response);

                var order = JSON.parse(response);

                if (order.resp == "Success") {
                    // reload();
                    window.location = "invoice.php?orderId=" + order.order_id;
                } else {
                    alert(response);
                }
            }
        };
        request.open("POST", path, true);
        request.send(f);
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

    // Show the payhere.js popup, when "PayHere Pay" is clicked
    // document.getElementById('payhere-payment').onclick = function (e) {
    payhere.startPayment(payment);
    // };
}



// singl productview buy now 
function buyNow(stockId) {

    // alert (stockId);
    var qty = document.getElementById("qty");

    if (qty.value > 0) {
        var f = new FormData();
        f.append("cart", false);
        f.append("stockId", stockId);
        f.append("qty", qty.value);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if ((request.readyState == 4) & (request.status == 200)) {
                var response = request.responseText;
                // alert(response);
                var payment = JSON.parse(response);
                payment.stock_id = stockId;
                payment.qty = qty.value;
                doCheckout(payment, "buynowProcess.php");
            }
        };
        request.open("POST", "paymentProcess.php", true);
        request.send(f);
    } else {
        alert("Please enter a vlid quantity");
    }
}
// singl productview buy now 



function forgetPassword() {
    var email = document.getElementById("e");

    // alert (email.value);

    if (email.value != "") {
        
        var f = new FormData();
        f.append("e", email.value);


        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 & request.status == 200) {
                var response = request.responseText;
                // alert(response); 
                if (response == "Success") {
                    // document.getElementById("msg").innerHTML = "Check your email to reset password";
                    // document.getElementById("msg").className = "alert alert-success";
                    // document.getElementById("msgDiv").className = "d-block";
                    swal("", "Check your email to reset password", "success");

                    email.value = "";
                } else {
                    // document.getElementById("msg").innerHTML = response;
                    // document.getElementById("msg").className = "alert alert-danger";
                    // document.getElementById("msgDiv").className = "d-block";
                    swal("", response , "warning");
                }
            }
        };

        request.open("POST", "forgetPasswordProcess.php", true);
        request.send(f);

    }else{
        alert("Please enter your email");
    }  
}



function resetPassword() {

    // alert ("Ads");
    var vcode = document.getElementById("vcode");
    var np = document.getElementById("np");
    var np2 = document.getElementById("np2");
   
    var f = new FormData();
    f.append("vcode", vcode.value);
    f.append("np", np.value);
    f.append("np2", np2.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                window.location = "signin.php";
            } else {
              document.getElementById("msg").innerHTML = response;
              document.getElementById("msg").className = "alert alert-danger";
              document.getElementById("msgDiv").className = "d-block";


            }
        }
        
    };

    request.open("POST", "resetPasswordProcess.php", true);
    request.send(f);
}

function oderhistoryPrint(){
    // alert ("ASDa");
    var fullcontent = document.body.innerHTML;
    var printArea = document.getElementById("printArea").innerHTML;

    
    document.body.innerHTML = printArea;
    document.getElementById("prin").className = "d-none";
   
    window.print();

    document.body.innerHTML = fullcontent;
}

function PrintallOder(){
    // alert ("As");
    var fullcontent = document.body.innerHTML;
    var printArea = document.getElementById("all").innerHTML;

    
    document.body.innerHTML = printArea;
    document.getElementById("prin").className = "d-none";
    document.getElementById("printbnt").className = "d-none";

   
    window.print();

    document.body.innerHTML = fullcontent;
}

function loadChart(){
    // alert ("as");

    var ctx = document.getElementById('myChart')

    var request = new XMLHttpRequest();
    request.onreadystatechange = function (){
        if(request.readyState == 4 & request.status == 200){
            var response = request.responseText;
            // alert (response);
            var data = JSON.parse(response);

            new Chart(ctx, {
                type: 'polarArea',
                data: {
                  labels: data.label,
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
        }
    };

    request.open("POST", "loadChartProcesss.php", true);
    request.send();
}


function printInvoice(){
    // alert ("Sa");
    var fullcontent = document.body.innerHTML;
    var printArea = document.getElementById("invoiceprint").innerHTML;

    
    document.body.innerHTML = printArea;
    document.getElementById("p1").className = "d-none";
    document.getElementById("p2").className = "d-none";

   
    window.print();

    document.body.innerHTML = fullcontent;
}