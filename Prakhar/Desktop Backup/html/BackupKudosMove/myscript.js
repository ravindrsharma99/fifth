
$(document).ready(function(){
    $(".scrollIDS").on("click",".likeImageS",function(){

        $datasrc= $(this).data("src");
        $mainsrc = $(this).attr("src");
        $name = $(this).data("name");
        $status = $(this).attr("data-status");
        $(this).attr("id","changeId");
        $width = $(window).width();
        $.ajax({
              method: "POST" ,
              url: $base_url+"/site/addmylisting",
              data: { name : $name, status: $status }
            }).done(function(msg){
                console.log(msg);
                if($status=="0"){
                    $("#changeId").attr("data-status","1");
                }
                else{
                    $("#changeId").attr("data-status","0");
                }
                if($width>768){
                    $(".webcountvalue div").text(msg);
                }
                else{
                    $(".mobilecountvalue a").text(msg);
                }
                $("#changeId").attr("src",$datasrc);
                $("#changeId").data("src",$mainsrc);
                $("#changeId").removeAttr("id");
            });
    });
	if($(".feedproducts").length >0){
		var rowCount = $('#getcounts').val();
		$("#loading_image").hide();
		var CategoryName =  $('#categoryname').val();
		// alert(rowCount);return false;
		if(rowCount<24){
			$("#loading_image").hide();
			$(".footer_outer").show();
			$("body").attr("style","margin-bottom:300px!important");
		}else{
			// alert("more than 25");return false;
			$(window).scroll(function()
			{
				var newrowCount = $('#getcounts').val();
				var getvalues = $_GET ;
				$width = $(window).width();
				// console.log(newrowCount);return false;
				if($width>768){
						if ($(window).scrollTop() + $(window).height() == $(document).height()){
						 $('#getcounts').val(24+parseInt(newrowCount));
						 $("#loading_image").show();
						 $.ajax({
				            url: $base_url+"/Category/NextCategoryRecord",
				            type: 'POST',
				            data:{ "record" : newrowCount , "filter": getvalues ,"categoryname" : CategoryName , "style": 3},
				            success: function (response) {
				            	console.log(response);
				            	if(response==0){
				            		$("#loading_image").hide();
				            		$(".footer_outer").show();
				            		// $("body").attr("style","margin-bottom:300px!important");
				            	}
				            	else{
				            		// $('#scollableDiv').after(response);
				            		 $("#loading_image").hide();
				            		$("#scollableDiv").append(response);
				            	}
				            }
				        });
					}
				}


		} );
	}
}
if($(".feedproductivity").length>0){
        $("#load_img").hide();
    var rowCount = $('#mycount').val();
        if(rowCount<25){
            $("#load_img").hide();
            $(".footer_outer").show();
            $("body").attr("style","margin-bottom:300px!important");
        }else{
            $(window).scroll(function()
            {
                var newrowCount = $('#getcount').val();

                var getvalues = $_GET ;
                $width = $(window).width();
                if($width>768){
                    if ($(window).scrollTop() + $(window).height() == $(document).height()){
                         $('#getcount').val(25+parseInt(newrowCount));
                         $("#load_img").show();
                         $.ajax({
                            url: $base_url+"/site/gymparts",
                            type: 'POST',
                            data:{ "record" : newrowCount  },
                            success: function (response) {

                                if(response==0){
                                    $("#load_img").hide();
                                    $(".footer_outer").show();
                                    $("body").attr("style","margin-bottom:300px!important");
                                }
                                else{
                                    $('#scrollableTable tbody tr.countTr:last').after(response);
                                     $("#load_img").hide();
                                }
                            }
                        });
                    }
                }
                else{
                    if ($(window).scrollTop() + $(window).height() == $(document).height()){
                         $('#getcount').val(25+parseInt(newrowCount));
                         $("#load_img").show();
                         $.ajax({
                            url: $base_url+"/site/gymparts",
                            type: 'POST',
                            data:{ record : newrowCount , "filter": getvalues},
                            success: function (response) {
                                if(response==0){
                                    $(".text_align").hide();
                                    $(".footer_outer").show();
                                    $("body").attr("style","margin-bottom:300px!important");
                                }
                                else{
                                    $('.dashd:last').after(response);
                                    $("#load_img").hide();
                                }
                            }
                        });
                    }
                }
            });
        }
    }
	if($(".feedproduct").length>0){
		$("#load_img").hide();
	var rowCount = $('#getcount').val();
		if(rowCount<25){
			$("#load_img").hide();
			$(".footer_outer").show();
			$("body").attr("style","margin-bottom:300px!important");
		}else{
			$(window).scroll(function()
			{
				var newrowCount = $('#getcount').val();
				var getvalues = $_GET ;
				$width = $(window).width();
				if($width>768){
					if ($(window).scrollTop() + $(window).height() == $(document).height()){
						 $('#getcount').val(25+parseInt(newrowCount));
						 $("#load_img").show();
						 $.ajax({
				            url: $base_url+"/site/nextrecord",
				            type: 'POST',
				            data:{ "record" : newrowCount , "filter": getvalues },
				            success: function (response) {
				            	if(response==0){
				            		$("#load_img").hide();
				            		$(".footer_outer").show();
				            		$("body").attr("style","margin-bottom:300px!important");
				            	}
				            	else{
				            		$('#scollableTable tbody tr.countTr:last').after(response);
				            		 $("#load_img").hide();
				            	}
				            }
				        });
					}
				}
				else{
					if ($(window).scrollTop() + $(window).height() == $(document).height()){
						 $('#getcount').val(25+parseInt(newrowCount));
						 $("#load_img").show();
						 $.ajax({
				            url: $base_url+"/site/nextmobilerecord",
				            type: 'POST',
				            data:{ record : newrowCount , "filter": getvalues},
				            success: function (response) {
				            	if(response==0){
				            		$(".text_align").hide();
				            		$(".footer_outer").show();
				            		$("body").attr("style","margin-bottom:300px!important");
				            	}
				            	else{
				            		$('.dashd:last').after(response);
				               		$("#load_img").hide();
				            	}
				            }
				        });
					}
				}
			});
		}
	}
	if($(".feedingproduct").length >0){
		var rowCount = $('#productcounts').val();
		$("#load_filter_img").hide();
		var CategoryName =  $('#categoryname').val();

		if(rowCount<24){
			$("#load_filter_img").hide();
			$(".footer_outer").show();
			// $("body").attr("style","margin-bottom:300px!important");
		}else{
			// alert("more than 25");return false;
			$(window).scroll(function()
			{
				var newrowCount = $('#productcounts').val();
				var getvalues = $_GET ;
				$width = $(window).width();
				// console.log(newrowCount);return false;
				if($width>768){
					if ($(window).scrollTop() + $(window).height() == $(document).height()){
					 $('#productcounts').val(24+parseInt(newrowCount));
					 $("#load_filter_img").show();
					 $.ajax({
			            url: $base_url+"/Category/NextCategoryRecord",
			            type: 'POST',
			            data:{ "record" : newrowCount , "filter": getvalues ,"categoryname" : CategoryName , "style": 4 },
			            success: function (response) {
			            	console.log(response);
			            	if(response==0){
			            		$("#load_filter_img").hide();
			            		$(".footer_outer").show();
			            		// $("body").attr("style","margin-bottom:300px!important");
			            	}
			            	else{
			            		// $('#scollableDiv').after(response);
			            		 $("#load_filter_img").hide();
			            		$("#scrollablefilter").append(response);
			            	}
			            }
			        });
				}
				}


		} );
	}
}


	var $_GET = {};

			document.location.search.replace(/\??(?:([^=]+)=([^&]*)&?)/g, function () {
			    function decode(s) {
			        return decodeURIComponent(s.split("+").join(" "));
			    }

			    $_GET[decode(arguments[1])] = decode(arguments[2]);
			});


	$("#mypass, #myphn").keydown(function(event){
	    if(event.keyCode == 13){
	        $("#mylogin").click();
	    }
	});

	$("#mylogin").click(function(e){
		e.preventDefault();
		if(($("#myphn").val()!="") && ($("#mypass").val()!="")){
			$(".error").text("Processing...");
	        $("#myphn" ).removeAttr('style');
	        $("#mypass").removeAttr('style');
	 		$.ajax({
				  method: "POST" ,
				  url: $base_url+"/user/login",
				  data: { email: $("#myphn").val(), password: $("#mypass").val(),recaptcha: grecaptcha.getResponse(recaptcha1)}
				}).done(function(msg) {
					//console.log(msg); return false;
					if(msg =='2'){
						$(".error").text("Spam!! Bots are not allowed to submit. If you are not a bot then please check recaptcha.");
						grecaptcha.reset(recaptcha1);
					}
					else if(msg=="1"){
	 					$(".error").text("Email/Username and password are Incorrect");
	 					grecaptcha.reset(recaptcha1);
				    }
				    else{
				    	$("#checklooged").val(1);

				    	if($("#alertsubcheck").val()==1){
				    		$(".submitreviewBtn").trigger("click");
				    	}
				    	else if($("#alertsubcheck").val()==2){
				    		 window.location.href = $base_url+"/site/step2";
				    	}
				    	else{
				    		location.reload();
				    	}
				    }
				});
		}
		else{
			$(".error").text("Email/Username and password should not blank");
			$( "#myphn" ).css('border-color','red');
		    $("#mypass").css('border-color','red');
		}
	});



var vlogin_two = $("#email_m").validate({
	errorClass: "my-error-class",
   	validClass: "my-valid-class",
        rules: {
            firstname: {
                required: true ,
                },
            lastname: {
            	required: true ,
            },
            phone_number: {
                required: true,
                number: true,
                minlength:5 ,
                maxlength:12
                  },
            email_address: {
                required: true,
                email: true
                  },
            message: {
                required: true,
            }
        },
        messages: {
            firstname: {
                    required: "Please Enter First Name",
                },
            lastname: {
	            required: "Please Enter Last Name",
	        },
            email_address: {
                    required: "Please Enter valid Email",
                },
            phone_number: {
                    required: "Please Enter valid Moblie Number",
                },
            message: {
                    required: "Please Enter Message",
                }
        }
    });



var vlogin_three = $("#waitlist_m").validate({
	errorClass: "my-error-class",
   	validClass: "my-valid-class",
        rules: {
            firstname_waitlist: {
                required: true ,
                },
            lastname_waitlist: {
            	required: true ,
            },
            phone_number_waitlist: {
                required: true,
                number: true,
                minlength:5 ,
                maxlength:12
                  },
            email_address_waitlist: {
                required: true,
                email: true
                  },
            message_waitlist: {
                required: true,
            }
        },
        messages: {
            firstname_waitlist: {
                    required: "Please Enter First Name",
                },
            lastname_waitlist: {
	            required: "Please Enter Last Name",
	        },
            email_address_waitlist: {
                    required: "Please Enter valid Email",
                },
            phone_number_waitlist: {
                    required: "Please Enter valid Moblie Number",
                },
            message_waitlist: {
                    required: "Please Enter Message",
                }
        }
    });


    var vlogin_four = $("#RentProduct").validate({
	errorClass: "my-error-class",
   	validClass: "my-valid-class",
        rules: {
            firstname_RentProduct: {
                required: true ,
                },
            lastname_RentProduct: {
            	required: true ,
            },
            phone_number_RentProduct: {
                required: true,
                number: true,
                minlength:5 ,
                maxlength:12
                  },
            email_address_RentProduct: {
                required: true,
                email: true
                  },
            message_RentProduct: {
                required: true,
            }
        },
        messages: {
            firstname_RentProduct: {
                    required: "Please Enter First Name",
                },
            lastname_RentProduct: {
	            required: "Please Enter Last Name",
	        },
            email_address_RentProduct: {
                    required: "Please Enter valid Email",
                },
            phone_number_RentProduct: {
                    required: "Please Enter valid Moblie Number",
                },
            message_RentProduct: {
                    required: "Please Enter Message",
                }
        }
    });


var vlogin_five = $("#SellProduct").validate({
	errorClass: "my-error-class",
   	validClass: "my-valid-class",
        rules: {
            firstname_SellProduct: {
                required: true ,
                },
            lastname_SellProduct: {
            	required: true ,
            },
            phone_number_SellProduct: {
                required: true,
                number: true,
                minlength:5 ,
                maxlength:12
                  },
            email_address_SellProduct: {
                required: true,
                email: true
                  },
            message_SellProduct: {
                required: true,
            },
            zip_code_SellProduct: {
                required: true,
            }
        },
        messages: {
            firstname_SellProduct: {
                    required: "Please Enter First Name",
                },
            lastname_SellProduct: {
	            required: "Please Enter Last Name",
	        },
            phone_number_SellProduct: {
                    required: "Please Enter valid Moblie Number",
                },
            email_address_SellProduct: {
                    required: "Please Enter valid Email",
                },
            message_SellProduct: {
                    required: "Please Enter Message",
                },
            zip_code_SellProduct: {
                    required: "Please Enter Zip",
                }
        }
    });




///////////////////////// contact us code start/////////////////

var vlogin_eight = $("#contactus-form").validate({
	errorClass: "my-error-class",
   	validClass: "my-valid-class",
        rules: {
            firstname_contactus: {
                required: true ,
                },
            lastname_contactus: {
            	required: true ,
            },
            email_contactus: {
                required: true,
                email: true
                  },
            message_contactus: {
                required: true,
            },
                telephone_contactus: {
            	required: true ,
            },
            title_contactus : {
            	required :true ,
            } ,

            businessname_contactus : {
            	required :true ,
            } ,

            address_contactus : {
            	required :true ,
            } ,

            years_contactus : {
            	required :true ,
            } ,

            type_contactus : {
            	required :true ,
            }
        },








        messages: {
            firstname_contactus: {
                    required: "Please Enter First Name",
                },
            lastname_contactus: {
	            required: "Please Enter Last Name",
	        },
            email_contactus: {
                    required: "Please Enter Valid Email",
                },
            message_contactus: {
                    required: "Please Enter Message",
                },

                 telephone_contactus: {
                    required: "Please Enter Telephone Number",
                },
                 title_contactus : {
                    required: "Please Enter Title",
                },
                   businessname_contactus : {
                    required: "Please Enter Bussiness Name",
                },
                   address_contactus : {
                    required: "Please Enter Business Address",
                },

                   years_contactus : {
                    required: "Please Enter Years of Business",
                },
                   type_contactus : {
                    required: "Please Enter Type Of Bussiness",
                },
        }
    });
$("#contact_us").click(function(e){
		e.preventDefault();
	    if(vlogin_eight.form())
		{
				$.ajax({
					  method: "POST" ,
					  url: $base_url+"/Fitness_equipment/modalAjax",
					  data: { recaptcha: grecaptcha.getResponse(recaptcha8) }
					}).done(function(msg) {
						//console.log(msg); return false;
						if(msg == '2'){
							$("#error").text("Spam!! Bots are not allowed to submit. If you are not a bot then please check recaptcha.");
							grecaptcha.reset();

						}
		 			else{
					    	//location.reload(); //submission of form & desired procedure follows
					    	$("#contactus-form").submit();
					    }
					});
		}
		else{
			return false;
		}
	});
///////////////////////// contact us code end/////////////////



///////////////////////// rudra code start/////////////////



var vlogin_hello = $("#RegisterPurchase").validate({
    errorClass: "my-error-class",
    validClass: "my-valid-class",
        rules: {
            firstname_RegisterPurchase: {
                required: true ,
                },
            lastname_RegisterPurchase: {
                required: true ,
            },

            email_RegisterPurchase: {
                required: true,
                email: true
                  },
            dob_RegisterPurchase: {
                required: true,
            },

            DropDownOne_RegisterPurchase: {
                required: true,
                email: true
                  },

            DropDownTwo_RegisterPurchase: {
                required: true,
                email: true
                  },

            DropDownThree_RegisterPurchase: {
                required: true,
                email: true
                  }
        },
        messages: {
            firstname_RegisterPurchase: {
                    required: "Please Enter First Name",
                },
            lastname_RegisterPurchase: {
                required: "Please Enter Last Name",
            },
            email_RegisterPurchase: {
                    required: "Please Enter valid Email",
                },
            phone_number_GenProduct: {
                    required: "Please Enter valid Moblie Number",
                },
            dob_RegisterPurchase: {
                    required: "Please Enter Date Of Purchase ",
                }
        }
    });
$("#submit_RegisterProduct").click(function(e){
        e.preventDefault();
        if(vlogin_hello.form())
        {

                $.ajax({
                      method: "POST" ,
                      url: $base_url+"/Fitness_equipment/modalAjax",
                      data: { recaptcha10: grecaptcha.getResponse(recaptcha10) }
                    }).done(function(msg) {
                        //console.log(msg); return false;
                        if(msg == '2'){
                            $("#error").text("Spam!! Bots are not allowed to submit. If you are not a bot then please check recaptcha.");
                            grecaptcha.reset();
                            console.log('2');
                        }
                    else{
                            //location.reload(); //submission of form & desired procedure follows
                            $("#RegisterPurchase").submit();
                        }
                    });
        }
        else{
            return false;
        }
    });



var vlogin_seven = $("#GenProduct").validate({
	errorClass: "my-error-class",
   	validClass: "my-valid-class",
        rules: {
            firstname_GenProduct: {
                required: true ,
                },
            lastname_GenProduct: {
            	required: true ,
            },
            phone_number_GenProduct: {
                required: true,
                number: true,
                minlength:5 ,
                maxlength:12
                  },
            email_address_GenProduct: {
                required: true,
                email: true
                  },
            message_GenProduct: {
                required: true,
            }
        },
        messages: {
            firstname_GenProduct: {
                    required: "Please Enter First Name",
                },
            lastname_GenProduct: {
	            required: "Please Enter Last Name",
	        },
            email_address_GenProduct: {
                    required: "Please Enter valid Email",
                },
            phone_number_GenProduct: {
                    required: "Please Enter valid Moblie Number",
                },
            message_GenProduct: {
                    required: "Please Enter Message",
                }
        }
    });
$("#email_GenProduct").click(function(e){
		e.preventDefault();
	    if(vlogin_seven.form())
		{

				$.ajax({
					  method: "POST" ,
					  url: $base_url+"/Fitness_equipment/modalAjax",
					  data: { recaptcha: grecaptcha.getResponse(recaptcha7) }
					}).done(function(msg) {
						//console.log(msg); return false;
						if(msg == '2'){
							$("#error").text("Spam!! Bots are not allowed to submit. If you are not a bot then please check recaptcha.");
							grecaptcha.reset();

						}
		 			else{
					    	//location.reload(); //submission of form & desired procedure follows
					    	$("#GenProduct").submit();
					    }
					});
		}
		else{
			return false;
		}
	});

///////////////////////// rudra code end/////////////////
	$("#email_me").click(function(e){
		e.preventDefault();
	    if(vlogin_two.form())
		{
				$.ajax({
					  method: "POST" ,
					  url: $base_url+"/Fitness_equipment/modalAjax",
					  data: { recaptcha: grecaptcha.getResponse(recaptcha2) }
					}).done(function(msg) {
						//console.log(msg); return false;
						if(msg == '2'){
							$("#error").text("Spam!! Bots are not allowed to submit. If you are not a bot then please check recaptcha.");
							grecaptcha.reset();
						}
		 			else{
					    	//location.reload(); //submission of form & desired procedure follows
					    	$("#email_m").submit();
					    }
					});
		}
		else{
			return false;
		}
	});

$("#email_request").click(function(e){
        e.preventDefault();
        if(vlogin_two.form())
        {
                $.ajax({
                      method: "POST" ,
                      url: $base_url+"/Fitness_equipment/modalAjax",
                      data: { recaptcha: grecaptcha.getResponse(recaptcha2) }
                    }).done(function(msg) {
                        //console.log(msg); return false;
                        if(msg == '2'){
                            $("#error").text("Spam!! Bots are not allowed to submit. If you are not a bot then please check recaptcha.");
                            grecaptcha.reset();
                        }
                    else{
                            //location.reload(); //submission of form & desired procedure follows
                            $("#user_manual").submit();
                        }
                    });
        }
        else{
            return false;
        }
    });

	$("#waitlist_me").click(function(e){
		e.preventDefault();
	    if(vlogin_three.form())
		{
				$.ajax({
					  method: "POST" ,
					  url: $base_url+"/Fitness_equipment/modalAjax",
					  data: { recaptcha: grecaptcha.getResponse(recaptcha4) }
					}).done(function(msg) {
						//console.log(msg); return false;
						if(msg == '2'){
							$("#error").text("Spam!! Bots are not allowed to submit. If you are not a bot then please check recaptcha.");
							grecaptcha.reset();
						}
		 			else{
					    	//location.reload(); //submission of form & desired procedure follows
					    	$("#waitlist_m").submit();
					    }
					});
		}
		else{
			return false;
		}
	});


	$("#email_RentProduct").click(function(e){
		e.preventDefault();
	    if(vlogin_four.form())
		{
				$.ajax({
					  method: "POST" ,
					  url: $base_url+"/Fitness_equipment/modalAjax",
					  data: { recaptcha: grecaptcha.getResponse(recaptcha5) }
					}).done(function(msg) {
						//console.log(msg); return false;
						if(msg == '2'){
							$("#error").text("Spam!! Bots are not allowed to submit. If you are not a bot then please check recaptcha.");
							grecaptcha.reset();
						}
		 			else{
					    	//location.reload(); //submission of form & desired procedure follows
					    	$("#RentProduct").submit();
					    }
					});
		}
		else{
			return false;
		}
	});


	$("#email_SellProduct").click(function(e){
		e.preventDefault();
	    if(vlogin_five.form())
		{
				$.ajax({
					  method: "POST" ,
					  url: $base_url+"/Fitness_equipment/modalAjax",
					  data: { recaptcha: grecaptcha.getResponse(recaptcha6) }
					}).done(function(msg) {
						//console.log(msg); return false;
						if(msg == '2'){
							$("#error").text("Spam!! Bots are not allowed to submit. If you are not a bot then please check recaptcha.");
							grecaptcha.reset();
						}
		 			else{
					    	//location.reload(); //submission of form & desired procedure follows
					    	$("#SellProduct").submit();
					    }
					});
		}
		else{
			return false;
		}
	});



	$("#LoginId").click(function(e){
		e.preventDefault();
		if(($("#LoginEamail").val()!="") && ($("#Loginpasswor").val()!="")){
			$.ajax({
			  method: "POST" ,
			  url: $base_url+"/user/login",
			  data: { email: $("#LoginEamail").val(), password: $("#Loginpasswor").val() }
			}).done(function(msg) {
				if(msg=="1"){
			    	$(".texterror").text("Email/Username and password are Incorrect");
			    }
			    else{
			    	 window.location.href = $base_url+"/site/step2";
			    }
			});
		}
		else{
			$(".texterror").text("Email/Username and password should not blank");
		}
	});




	$emailrejax = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

	$rejax = /^[1-9]{1}[0-9]{9}$/;

	$('#shipingDetails').click(function(e)
	{
		e.preventDefault();
		$error="";
		if($('input:checkbox[name=home]:checked').val()=="2"){
			$("#firstname").val("");
			$("#lastname").val("");
			$("#CompanyName").val("");
			$("#AreaCode").val("");
			$("#PrimaryPhone").val("");
			$("#StreetAddress").val("");
			$("#state").val("");
			$("#city").val("");
			$("#ZipCode").val("");
		}
		else{
			if($("#firstname").val()==""){
				$error = "* Please Fill the First Name Field <br>";
			}
			if($("#lastname").val()==""){
				$error += "* Please Fill the Last Name Field <br>";
			}
			if($('#buisness_checkbox').prop('checked')) {
				  if($("#CompanyName").val()==""){
				  $error += "* Please Fill the Company Name Field <br>";
				  }
			}
			if($("#AreaCode").val()==""){
				$error += "* Please Fill the Area Code Field <br>";
			}
			if($("#PrimaryPhone").val()==""){
				$error += "* Please Fill the Primary Phone Field <br>";
			}
			else if($rejax.test($("#PrimaryPhone").val()) == false){
				$error += "* Please enter valid 10 digit Phone Number <br>";
			}
			if($("#StreetAddress").val()==""){
				$error += "* Please Fill the Street Address Field <br>";
			}
			if($("#state").val()==""){
				$error += "* Please Fill the State Field <br>";
			}
			if($("#city").val()==""){
				$error += "* Please Fill the City Field <br>";
			}
			if($("#ZipCode").val()==""){
				$error += "* Please Fill the Zip Code Field <br>";
			}
			// if($('input[name="home"]:checked').length==0){
			// 	$error += "* Please select order placed type <br>";
			// }
		}

		if($error!=""){
			$("#shippingerror").html($error);
		}
		else{
			$("#shippingerror").html("");

			if($('input:checkbox[name=home]:checked').val()=="1"){
				$('#Modal_important').modal('show');
			}
			else{
				$("#shipform").submit();
			}
		}

		$(".submitContinue").click(function(e){
			e.preventDefault();
			$("#shipform").submit();
		});
		// if(($("#firstname").val()!="") && ($("#lastname").val()!="") && ($("#AreaCode").val()!="") && ($("#PrimaryPhone").val()!="") && ($("#StreetAddress").val()!="") && ($("#state").val()!="") && ($("#city").val()!="") && ($("#ZipCode").val()!="")){
		// 	if($('#buisness_checkbox').prop('checked')) {
		// 		  if($("#CompanyName").val()!=""){
		// 		  	$("#shipform").submit();
		// 		  }
		// 		  else{
		// 		  	$("#shippingerror").text("Please fill Company Name. ");;
		// 		  }
		// 	}
		// 	else{
		// 		$("#shipform").submit();
		// 	}

		// }
		// else{
		// 	$("#shippingerror").text("All Fields are required. ");
		// }
		// var DestZipCode=$('#ZipCode').val();
		// var DestCityName=$('#city').val();
		// var DestStateCode=$('#state').val();
		// var totalWeight ="";
		// var totalWeight = <?php // echo "$totalWeight"; ?>;
		// $.ajax(
		//     {
		// 	 type: 'post',
		// 	 url: '<?php echo base_url();?>Site/shipingDetails',
		// 	 data : {DestZipCode : DestZipCode, DestCityName : DestCityName, DestStateCode : DestStateCode, totalWeight : totalWeight},
		// 	 cache:false,
		// 	 success: function(data)
		// 	 {
		// 	 	console.log(data);
		// 	   $("#shipingprice").text(data);
		// 	 }
	 	//  });
	});

	$("#samechecked").change(function(event){
   		if (this.checked){
	        $("#firstnames").val($("#firstname").val());
	        $("#lastnames").val($("#lastname").val());
	        $("#areacodes").val($("#AreaCode").val());
	        $("#primaryphones").val($("#PrimaryPhone").val());
	        $("#companynames").val($("#CompanyName").val());
	        $("#streetaddress").val($("#StreetAddress").val());
	        $("#suites").val($("#suite").val());
	        $("#states").val($("#state").val());
	        $("#citys").val($("#city").val());
	        $("#zipcodes").val($("#ZipCode").val());
	    }
	});

	/* Auto suggestion script*/

	// $(".mysearch").keyup(function()
	// {
	// 	var searchbox = $(this).val();
	// 	var dataString = 'searchword='+ searchbox;
	// 	if(searchbox=='')
	// 	{
	// 		$(".mydisplay").hide();
	// 	}
	// 	else
	// 	{
	// 		$.ajax({
	// 		type: "POST",
	// 		url: $base_url+"/site/searchajax",
	// 		data: dataString,
	// 		cache: false,
	// 		success: function(html)
	// 			{
	// 				//console.log(html);
	// 				$(".mydisplay").html(html).show();
	// 			}
	// 		});
	// 	}
	// 	return false;
	// });


		$("input:checkbox[name=home]").change(function () {
	        $rval = $(this).val();
	        if($rval==1){
	       		//$('#Modal_important').modal('show');
	        	$(".gloveDelivery").slideUp("slow");
	        }
	        else if($rval==0){
	        //	$('#Modal_important').modal('hide');
	        	$(".gloveDelivery").slideDown("slow");
	        }
	        else{
	        	//$('#Modal_important').modal('hide');
	        	$(".gloveDelivery").slideUp("slow");
	        }
	    });

	//$('#Modal_important').modal('show');

	$(document).on("click",".clickwishlist",function(e){
			e.preventDefault();
		$value = $(this).data("val");
		$main = $(this);
		if($value!=""){
			$.ajax({
			type: "POST",
			url: $base_url+"/site/add_wish",
			data: {'value':$value},
			cache: false,
			success: function(html)
				{
					$main.parent('.outr').remove();
				}
			});
		}
	});





	var clickcall_me = $("#clickcall_me").validate({
	errorClass: "my-error-class",
   	validClass: "my-valid-class",
        rules: {
            name: {
                required: true ,
                },
            number: {
               // required: true,
                number: true,
                minlength:5 ,
                maxlength:12
               },
           email: {
                required: true,
                email: true
                  }
        },
        messages: {
          name: {
                    required: "Please Enter First Name",
                },
          email: {
                    required: "Please Enter valid Email",
                }
        }
    });



	$(document).on("click","#clickcallme_now",function(e){
		e.preventDefault();
		if(clickcall_me.form()){
			$("#clickcall_me").submit();
		}
		else{
			return false;
		}
	});

});

function validateEmail($email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  return emailReg.test( $email );
}





// Register validation


$.validator.addMethod("lettersonly", function(value, element){
  return this.optional(element) || /^[0-9a-zA-Z]+$/.test(value);
}, "Accept only letter and number");

var vlogin = $("#register_form").validate({
	errorClass: "my-error-class",
   	validClass: "my-valid-class",
        rules: {
            first: {
                required: true ,
                },
            last: {
            	required: true ,
            },
            username: {
            	required: true ,
           	    lettersonly: true
            },
            // middle: {
           	//   required: true ,
            // },
            phone_number: {
                required: true,
                number: true,
                minlength:5 ,
                maxlength:12
                  },
           email: {
                required: true,
                email: true
                  },
            password: {
                required: true,
                minlength: 4,
                  }
        },
        messages: {
          first: {
                    required: "Please Enter First Name",
                },
          last: {
	            required: "Please Enter Last Name",
	        },
	        // middle: {
	        //     required: "Please Enter Middle Name",
	        // },
	        username: {
	            required: "Please Enter User Name",
	        },
          email: {
                    required: "Please Enter valid Email",
                },
          phone_number: {
                    required: "Please Enter valid Moblie Number",
                },
          password: {
                    required: "Please Enter Password",
                }
        }
    });


$("#submit_register").click(function(e){
	e.preventDefault();
    if(vlogin.form())
    {
    	$("#register_error").text("");
    	$.ajax({
			  method: "POST" ,
			  url: $base_url+"/Fitness_equipment/modalAjax",
			  data: { recaptcha: grecaptcha.getResponse(recaptcha3) }
			}).done(function(msg) {
				if(msg == '2'){
					$("#register_error").text("Spam!! Bots are not allowed to submit. If you are not a bot then please check recaptcha.");
					 grecaptcha.reset(recaptcha3);
				}
 				else{
 					$("#register_error").text("Processing...");
      				var formData = $("#register_form").serialize();
			    	  $.ajax({
				            url: $base_url+"/user/ajax_register",
				            type: 'POST',
				            data:formData,
				            success: function (dataCheck) {
				            	// console.log(dataCheck);
				        	    if(dataCheck==1){

									$("#checklooged").val(1);
				        	    	$("#register_error").html("You have registered successfully and logged in.");

							    	if($("#alertsubcheck").val()==1){
							    		$(".submitreviewBtn").trigger("click");
							    	}
							    	else if($("#alertsubcheck").val()==2){
							    		 window.location.href = $base_url+"/site/step2";
							    	}
							    	else{
							   		 	setInterval('location.reload();', 3000);
							    	}
				        	    }
				                else{
				                	$("#register_error").html(dataCheck);
				                	grecaptcha.reset(recaptcha3);
				                }
				            }
				       });
			    }
			});
    }
    else{
      return false;
    }
})
//
// $("#show_register").click(function(e){
// 	e.preventDefault();
// 	$('.modal').modal('hide');
// 	$('#myModal_register').modal('show');
// });

$(".modal").on('click', '.clickloginButton', function(e){

// $(".clickloginButton").click(function(e){
	e.preventDefault();
	$('.modal').modal('hide');
	$('#myModal_login').modal('show');
});




var reviewForm = $("#reviewform").validate({
	errorClass: "my-error-class",
   	validClass: "my-valid-class",
        rules: {
            brief: {
                required: true,
                minlength:1 ,
                maxlength:10
                  },
           star: {
                	required: true
                },
            review: {
                required: true,
                maxlength: 300,
              }
        },
        messages: {
          star: {
                    required: "Please give star rating",
                },
          review: {
	            required: "Please Enter Review",
	        },
          brief: {
                required: "Please Enter Brief description",
            }
        }
    });


$(".submitreviewBtn").click(function(e){
	e.preventDefault();
	if(reviewForm.form()){
		if($("#checklooged").val()=="1"){
			$("#reviewform").submit();
		}
		else{
			$("#alertsubcheck").val(1);
			$('.modal').modal('hide');
			$('#myModal_login').modal('show');
		}
	}
	else{
		return false;
	}
})



   $("#loginCart").click(function(e){
	e.preventDefault();
		$("#alertsubcheck").val(2);
		$('.modal').modal('hide');
		$('#myModal_login').modal('show');
	})


 $("input:checkbox[name=home]").click(function(){
        var group = "input:checkbox[name='"+$(this).prop("name")+"']";
        $(group).not(this).prop("checked",false);
    });



 $('input[name="paymenttype"]').change(function() {
   if($(this).is(':checked') && $(this).val() == '1') {
        $('#Modal_important_cod').modal('show');
   }
});
