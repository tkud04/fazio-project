
	let  toolbar = ['title', 'bold', 'italic', 'underline', 'strikethrough', 'fontScale', 'color', '|', 'ol', 'ul', 'blockquote', 'code', 'table', '|', 'link', 'image', 'hr', '|', 'indent', 'outdent', 'alignment'];
	
$(document).ready(function() {
    "use strict";
	hideInputErrors(["signup","login","forgot-password","reset-password","oauth-sp"]);
	hideElem(["#signup-loading","#signup-finish","#signup-error",
	          "#login-loading","#login-finish",
			  "#fp-loading","#fp-finish",
			  "#rp-loading","#rp-finish",
			  "#apt-chat-loading","#apt-chat-finish","#message-reply-loading"
			  ]);
	hideElem(["#sps-row","#add-apartment-bank-new","#add-apartment-side-1","#add-apartment-side-2","#add-apartment-side-3"]);
	hideElem(["#apartment-preference-side-2"]);
	hideElem(["#my-apartment-bank-new","#my-apartment-side-2","#my-apartment-side-3"]);
	hideElem([".review-loading","#host-total-revenue-loading","#host-best-selling-apartments-loading"]);
	hideElem(['#booking-pay-now-payment-type-error','#booking-send-message-type-error',
	          '#booking-send-message-subject-error','#booking-send-message-msg-error',
			  '#booking-send-message-email-div']);
	
	//Init wysiwyg editors
	Simditor.locale = 'en-US';
	let aptDescriptionTextArea = $('#add-apartment-description');
	//console.log('area: ',aptDescriptionTextArea);
	
	
	
    $("a.lno-cart").on("click", function(e) {
    	if(isMobile()){
    	  window.location = "cart";
       }
    })
    
	$("#ca-state").on("change", function(e) {
       // e.preventDefault();
      let s = $('#ca-state').val();
	   if(s == "none"){}
	   else{
		 getDeliveryFee(s);   
	   }
    });
	
	$("#signup-submit").click(e => {
       e.preventDefault();
	  
       hideInputErrors("signup");	 
       hideElem(["#signup-error"]);	   
      let mode = $('#s-mode').val(),fname = $('#s-fname').val(),lname = $('#s-lname').val(),em = $('#s-email').val(),
	      phone = $('#s-phone').val(),p = $('#s-pass').val(),p2 = $('#s-pass2').val();
		  
		  
	   if(mode == "none" || fname == "" || lname == "" || em == "" || phone == "" || p == "" || p2 == "" || p != p2){
		   if(mode == "") showElem('#s-mode-error');
		   if(fname == "") showElem('#s-fname-error');
		   if(lname == "") showElem('#s-lname-error');
		   if(em == "") showElem('#s-em-error');
		   if(phone == "") showElem('#s-phone-error');
		   if(p == "") showElem('#s-pass-error');
		   if(p2 == "") showElem('#s-pass2-error');
		   if(p != p2) showElem('#s-pass2-error');
	   }
	   else{
		  hideElem("#signup-submit");
		  showElem("#signup-loading");
		  
		 signup({
			 mode: mode,
			 fname: fname,
			 lname: lname,
			 email: em,
			 phone: phone,
			 pass: p,
			 pass_confirmation: p2
		 });   
	   }
    });
	
	$("#login-submit").click(e => {
       e.preventDefault();
	  
       hideInputErrors("login");	  
      let id = $('#l-id').val(),p = $('#l-pass').val();
		  
		  
	   if(id == "" || p == ""){
		   if(id == "") showElem('#l-id-error');
		   if(p == "") showElem('#l-pass-error');
	   }
	   else{
		  hideElem("#login-submit");
		  showElem("#login-loading");
		  
		 login({
			 id: id,
			 pass: p
		 });   
	   }
    });
	
	$("#fp-submit").click(e => {
       e.preventDefault();
	  
       hideInputErrors("forgot-password");	  
      let id = $('#fp-email').val();
		  
		  
	   if(id == ""){
		   if(id == "") showElem('#fp-id-error');
	   }
	   else{
		  hideElem("#fp-submit");
		  showElem("#fp-loading");
		  
		 fp({
			 email: id
		 });   
	   }
    });
	
	$("#rp-submit").click(e => {
       e.preventDefault();
	  
       hideInputErrors("reset-password");	  
      let id = $('#acsrf').val(), p = $('#rp-pass').val(), p2 = $('#rp-pass2').val();
		  
		  
	   if(p == "" || p2 == "" || p != p2){
		   if(p == "") showElem('#rp-pass-error');
		   if(p2 == "" || p != p2) showElem('#rp-pass2-error');
	   }
	   else{
		  hideElem("#rp-submit");
		  showElem("#rp-loading");
		  
		 rp({
			 id: id,
			 pass: p
		 });   
	   }
    });
	
	$("#osp-submit").click(e => {
       e.preventDefault();
	  
       hideInputErrors("oauth-sp");	  
      let mode = $('#osp-mode').val(), p = $('#osp-pass').val(), p2 = $('#osp-pass2').val();
		  
		  
	   if(mode == "none" || p == "" || p2 == "" || p != p2){
		   if(mode == "none") showElem('#osp-mode-error');
		   if(p == "") showElem('#osp-pass-error');
		   if(p2 == "" || p != p2) showElem('#osp-pass2-error');
	   }
	   else{
		 $('#osp-form').submit();   
	   }
    });
	
	
	//ADD APARTMENT
	$("#add-apartment-plan").change(e => {
		let p = $('#add-apartment-plan').val();
		
		if(parseInt(p) == 1 || p == "none"){
			hideElem(['#sps-row']);
		}
		else{
			showElem(['#sps-row']);
		}
	});
	$("#add-apartment-bank").change(e => {
		let b = $('#add-apartment-bank').val();
		
		if(b == "new"){
			showElem(['#add-apartment-bank-new']);
		}
		else{
			hideElem(['#add-apartment-bank-new']);
		}
	});
	$("#add-apartment-side-0-next").click(e => {
		e.preventDefault();
		let plan = $('#add-apartment-plan').val(), ac = $('#ac').val(), paymentType = $('#posting-payment-type').val();
		console.log(plan);
		
		if(ac == "sey"){
	 	      selectCheckoutSide({side: 1,type: ".add-apartment",content: "ti-check"});
	          hideElem(['#add-apartment-side-0']);
			  showElem(['#add-apartment-side-1']);	
		}
		else if(ac == "lluf" && plan == "1"){
		  Swal.fire({
				icon: 'error',
				title: 'You have reached your limit for your current plan'
			});
		}
		else{
		  if(plan == "none"){
			Swal.fire({
				icon: 'error',
				title: 'Select a plan'
			});
		  }
		  else if(plan != "1" && paymentType == "none"){
			Swal.fire({
				icon: 'error',
				title: 'Select a payment type'
			});
		  }
		  else{
			if(parseInt(plan) == 1){
			  selectCheckoutSide({side: 1,type: ".add-apartment",content: "ti-check"});
	          hideElem(['#add-apartment-side-0']);
			  showElem(['#add-apartment-side-1']);
		    }
		    else{
			  //paying now
			  let paymentURL = $("#card-action").val(), ds = {
				  pid: plan,
				  pt: paymentType,
				  sps: $('#posting-sps').val()
			  }; 
			 
			 console.log(ds);
			 
			  $('#posting-md').val(JSON.stringify(ds));
			  
			  $('#posting-form').attr('action',paymentURL);
			   $('#posting-form').submit();
		    }
		  }	
		}
		
		
	});
	
	$("#add-apartment-side-1-next").click(e => {
       e.preventDefault();
	   
	   let aptUrl = $('#add-apartment-url').val(), aptName = $('#add-apartment-name').val(), aptAmount = $('#add-apartment-amount').val(),
	   aptMaxAdults = $('#add-apartment-max-adults').val(),aptMaxChildren = $('#add-apartment-max-children').val(),aptDescription = $('#add-apartment-description').val(),
	       aptCategory = $('#add-apartment-category').val(), aptPType = $('#add-apartment-ptype').val(),aptRooms = $('#add-apartment-rooms').val(),
	       aptUnits = $('#add-apartment-units').val(),aptBathrooms = $('#add-apartment-bathrooms').val(),
		   aptBedrooms = $('#add-apartment-bedrooms').val(), aptPets = $('#add-apartment-pets').val(),
		      side1_validation = (aptUrl == "" || aptName == "" || aptMaxAdults == "" || aptMaxChildren == "" || aptAmount < 0 || aptDescription == "" || aptCategory == "none" || aptPType == "none" || aptRooms == "none" || aptUnits == "none" || aptBedrooms == "none" || aptBathrooms == "none" || aptPets == "none" || facilities.length < 1);	  
	  
	   if(side1_validation){
		  Swal.fire({
			     icon: 'error',
                 title: `All fields are required`
               }); 
	   }
	   else{
		 let aptSidebarFacilitiesHTML = ``;
		   for(let adf = 0; adf < facilities.length; adf++){
			   aptSidebarFacilitiesHTML += `<li>${facilities[adf].id}</li>`;
		   }
		   $('#apt-sidebar-facilities').html(aptSidebarFacilitiesHTML);
		   hideElem(['#add-apartment-side-1','#add-apartment-side-3']);
	       selectCheckoutSide({side: 2,type: ".add-apartment",content: "ti-check"});
	       showElem(['#add-apartment-side-2']);
	   }
    });
	$("#add-apartment-side-1-prev").click(e => {
       e.preventDefault();
	  hideElem(['#add-apartment-side-1','#add-apartment-side-2','#add-apartment-side-3']);
	  showElem(['#add-apartment-side-0']);
    });	
	
	$("#add-apartment-side-2-next").click(e => {
       e.preventDefault();
	   
	   //side 2 validation imgs = $(`${BUUPlist[bc].id}-images-div input[type=file]`);
	   let aptAddress = $('#add-apartment-address').val(), aptCity = $('#add-apartment-city').val(), aptLGA = $('#add-apartment-lga').val(),aptState = $('#add-apartment-state').val(),
	       aptImages = $(`#add-apartment-images input[type=file]`), emptyImage = false,
           side2_validation = (aptAddress == "" || aptCity == "" || aptLGA == "" || aptState == "none");
		   
		   if(side2_validation){
			 Swal.fire({
			     icon: 'error',
                 title: `All fields are required`
               });   
		   }
		   else{
			  hideElem(['#add-apartment-side-1','#add-apartment-side-2']);
	         selectCheckoutSide({side: 3,type: ".add-apartment",content: "ti-check"});
	         aptFinalPreview("add-apartment"); 
	  
	         let ac = aptCover == "none" ? 0 : aptCover;
	         //Add the cover image to the apt sidebar
	         if (aptImages[ac].files && aptImages[ac].files[0]) {
	         let reader = new FileReader();
    
	         reader.onload = function(e) {
	           $(`#apt-sidebar-cover`).attr({
	             'src': e.target.result,
	             'width': "236",
	             'height': "161"
	           });
            }
    
            reader.readAsDataURL(aptImages[ac].files[0]); // convert to base64 string
		
		    let ii = aptImages.length == 1 ? "image" : "images";
		    $('#apt-sidebar-img-count').html(`${aptImages.length} ${ii}`);
           }
	       
		   showElem(['#add-apartment-side-3']);
    
		   }
	     });
	$("#add-apartment-side-3-prev").click(e => {
       e.preventDefault();
	  hideElem(['#add-apartment-side-1','#add-apartment-side-3']);
	  selectCheckoutSide({side: 2,type: ".add-apartment",content: "ti-check"});
	  showElem(['#add-apartment-side-2']);
    });	
	$("#add-apartment-side-3-next").click(e => {
       e.preventDefault();
	   console.log("add apartment submit");
	   
	   //side 1 validation
	   let aptUrl = $('#add-apartment-url').val(), aptName = $('#add-apartment-name').val(), aptAmount = $('#add-apartment-amount').val(),
	   aptMaxAdults = $('#add-apartment-max-adults').val(),aptMaxChildren = $('#add-apartment-max-children').val(),aptDescription = $('#add-apartment-description').val(),
	       aptCategory = $('#add-apartment-category').val(), aptPType = $('#add-apartment-ptype').val(),aptRooms = $('#add-apartment-rooms').val(),
	       aptUnits = $('#add-apartment-units').val(),aptBathrooms = $('#add-apartment-bathrooms').val(),
		   aptBedrooms = $('#add-apartment-bedrooms').val(), aptPets = $('#add-apartment-pets').val(),
		   side1_validation = (aptUrl == "" || aptName == "" || aptMaxAdults == "" || aptMaxChildren == "" || aptAmount < 0 || aptDescription == "" || aptCategory == "none" || aptPType == "none" || aptRooms == "none" || aptUnits == "none" || aptBedrooms == "none" || aptBathrooms == "none" || aptPets == "none" || facilities.length < 1);	  
	  
       //side 2 validation imgs = $(`${BUUPlist[bc].id}-images-div input[type=file]`);
	   let aptAddress = $('#add-apartment-address').val(), aptCity = $('#add-apartment-city').val(), aptLGA = $('#add-apartment-lga').val(),aptState = $('#add-apartment-state').val(),aptCountry = $('#add-apartment-country').val(),
	       aptImages = $(`#add-apartment-images input[type=file]`), emptyImage = false,
           side2_validation = (aptAddress == "" || aptCity == "" || aptLGA == "" || aptState == "none" || aptCountry == "none");
           
		   for(let i = 0; i < aptImages.length; i++){
			   if(aptImages[i].files.length < 1) emptyImage = true;
		   }
		   
        // console.log("video: ",aptVideo);
         //console.log("images: ",aptImages);
	   
	   let aptPlan = $('#add-apartment-plan').val(), ac = $('#ac').val(), side3_validation = (aptPlan == "none"); 
	   let aptBank = $('#add-apartment-bank').val(), aptBname = $('#add-apartment-bname').val(), aptAcname = $('#add-apartment-acname').val(), aptAcnum = $('#add-apartment-acnum').val(),
	   bankValidation = (aptBank == "none" || ( aptBank == "new" && (aptBname == "none" || aptAcname == "" || aptAcnum == "") ) );
	   
	   
	   if(side1_validation || side2_validation){
		   Swal.fire({
			 icon: 'error',
             title: "Please fill all the required fields"
           })
	   }
	   else if(emptyImage){
		   Swal.fire({
			 icon: 'error',
             title: "You have an empty image field."
           })
	   }
	   else if(aptCover == "none"){
		   Swal.fire({
			 icon: 'error',
             title: "Select a cover image."
           })
	   }
	   else if(side3_validation){
		   Swal.fire({
			 icon: 'error',
             title: "Select a subscription plan."
           })
	   }
	   else if(bankValidation){
		   Swal.fire({
			 icon: 'error',
             title: "Select a bank account or fill all required bank details."
           })
	   }
	   /**
	   else if(aptVideo[0].size > 15000000){
		   Swal.fire({
			 icon: 'error',
             title: "Video must not be larger than 10MB"
           })
	   }
	   **/
	   else{
		 //let aptName = $('#add-apartment-name').val(),   
		 console.log("final");
		 
		 let ff = [];
		 for(let y = 0; y < facilities.length; y++){
			 if(facilities[y].selected) ff.push(facilities[y]);
		 }
		 
		 let fd =  new FormData();
		 fd.append("url",aptUrl);
		 fd.append("name",aptName);
		 fd.append("max_adults",aptMaxAdults);
		 fd.append("max_children",aptMaxChildren);
		 fd.append("description",aptDescription);
		 fd.append("rooms",aptRooms);
		 fd.append("category",aptCategory);
		 fd.append("property_type",aptPType);
		 fd.append("amount",aptAmount);
		 fd.append("bedrooms",aptBedrooms);
		fd.append("bathrooms",aptBathrooms);
		fd.append("units",aptUnits);
		 fd.append("pets",aptPets);
		 fd.append("address",aptAddress);
		 fd.append("city",aptCity);
		 fd.append("city",aptCountry);
		 fd.append("lga",aptLGA);
		 fd.append("state",aptState);
		 fd.append("country",aptCountry);
		 fd.append("bank",aptBank);
		 fd.append("bname",aptBname);
		 fd.append("acname",aptAcname);
		 fd.append("acnum",aptAcnum);
		 fd.append("facilities",JSON.stringify(ff));
		 
		 //fd.append("video",aptVideo[0]);
		 fd.append("cover",aptCover);
		 fd.append("img_count",aptImages.length);
		 
		 for(let r = 0; r < aptImages.length; r++)
		 {
		    let imgg = aptImages[r];
			let imgName = imgg.getAttribute("id");
            //console.log("imgg name: ",imgName);			
            fd.append(imgName,imgg.files[0]);   			   			
		 }
		 
		 /**
		 for(let vv of fd.values()){
			 console.log("vv: ",vv);
		 }
		 **/
		  fd.append("_token",$('#tk-apt').val());
		  
		  $('#add-apartment-submit').hide();
		  $('#add-apartment-loading').fadeIn();
		  console.log("ac: ",ac);
		  
		  if(aptPlan == fpp){
			addApartment(fd);  
		  }
		  else{
			  if(ac == "sey"){
				  addApartment(fd);  
			  }
		  }
		  
	   }
    });
	
	//APARTMENT PREFERENCES
	$("#apartment-preference-side-1-next").click(e => {
       e.preventDefault();
	   
	   if(facilities.length > 0){
		   let aptSidebarFacilitiesHTML = ``;
		   for(let adf = 0; adf < facilities.length; adf++){
			   aptSidebarFacilitiesHTML += `<li>${facilities[adf].id}</li>`;
		   }
		   $('#apt-sidebar-facilities').html(aptSidebarFacilitiesHTML);
	   }
	   
	  hideElem(['#apartment-preference-side-1']);
	  selectCheckoutSide({side: 2,type: ".apartment-preferencet",content: "ti-check"});
	  aptPreferencePreview("apartment-preference"); 
	  showElem(['#apartment-preference-side-2']);
    });
	
	$("#apartment-preference-side-2-prev").click(e => {
       e.preventDefault();
	  hideElem(['#apartment-preference-side-2']);
	  selectCheckoutSide({side: 1,type: ".apartment-preference",content: "ti-check"});
	  showElem(['#apartment-preference-side-1']);
    });	
	
	$("#apartment-preference-side-2-next").click(e => {
       e.preventDefault();
	   console.log("update apartment preference submit");
	   
	   //validation
	  let  aptAmount = $('#apartment-preference-amount').val(),aptMaxAdults = $('#apartment-preference-max-adults').val(),
	      aptMaxChildren = $('#apartment-preference-max-children').val(),aptCategory = $('#apartment-preference-category').val(),
		  aptChildren = $('#apartment-preference-children').val(),aptPets = $('#apartment-preference-pets').val(),
		  aptPType = $('#apartment-preference-ptype').val(),aptRooms = $('#apartment-preference-rooms').val(),
	       aptUnits = $('#apartment-preference-units').val(),aptBathrooms = $('#apartment-preference-bathrooms').val(),
		   aptBedrooms = $('#apartment-preference-bedrooms').val(),aptAvb = $('#apartment-preference-avb').val(),
		   aptRating = $('#apartment-preference-rating').val(),
		   side1_validation = (facilities.length < 1);	  
	  
       //side 2 validation imgs = $(`${BUUPlist[bc].id}-images-div input[type=file]`);
	   let aptAddress = $('#apartment-preference-address').val(), aptCity = $('#apartment-preference-city').val(),
	   aptLGA = $('#apartment-preference-lga').val(),aptState = $('#apartment-preference-state').val(), aptCountry = $('#apartment-preference-country').val(),
	       side2_validation = (aptState == "none" || aptCountry == "none");
     
	   if(side1_validation || side2_validation){
		   Swal.fire({
			 icon: 'error',
             title: "Please fill all the required fields"
           })
	   }

	   else{
		 //let aptName = $('#add-apartment-name').val(),   
		 console.log("final");
		 
		 let ff = [];
		 for(let y = 0; y < facilities.length; y++){
			 if(facilities[y].selected) ff.push(facilities[y]);
		 }
		 
		 let fd =  new FormData();
		 fd.append("avb",aptAvb);
		 fd.append("rating",aptRating);
		fd.append("max_adults",aptMaxAdults);
		 fd.append("max_children",aptMaxChildren);
		  fd.append("rooms",aptRooms);
		 fd.append("category",aptCategory);
		 fd.append("property_type",aptPType);
		 fd.append("amount",aptAmount);
		 fd.append("bedrooms",aptBedrooms);
		fd.append("bathrooms",aptBathrooms);
		fd.append("units",aptUnits);
		 fd.append("children",aptChildren);
		 fd.append("pets",aptPets);
		 fd.append("address",aptAddress);
		 fd.append("city",aptCity);
		 fd.append("lga",aptLGA);
		 fd.append("state",aptState);
		 fd.append("country",aptCountry);
		 fd.append("facilities",JSON.stringify(ff));
		 

		  fd.append("_token",$('#tk-apf').val());
		  
		  $('#apartment-preference-submit').hide();
		  $('#apartment-preference-loading').fadeIn();
		  updateApartmentPreference(fd);
	   }
    });
	
	
	
	//MY APARTMENT
	$("#my-apartment-bank").change(e => {
		let b = $('#my-apartment-bank').val();
		
		if(b == "new"){
			showElem(['#my-apartment-bank-new']);
		}
		else{
			hideElem(['#my-apartment-bank-new']);
		}
	});
	
	$("#my-apartment-side-1-next").click(e => {
       e.preventDefault();
	   
	   if(facilities.length > 0){
		   let aptSidebarFacilitiesHTML = ``;
		   for(let adf = 0; adf < facilities.length; adf++){
			   aptSidebarFacilitiesHTML += `<li>${facilities[adf].id}</li>`;
		   }
		   $('#apt-sidebar-facilities').html(aptSidebarFacilitiesHTML);
	   }
	  hideElem(['#my-apartment-side-1','#my-apartment-side-3']);
	  selectCheckoutSide({side: 2,type: ".my-apartment",content: "ti-check"});
	  showElem(['#my-apartment-side-2']);
    });
	$("#my-apartment-side-2-prev").click(e => {
       e.preventDefault();
	  hideElem(['#my-apartment-side-2','#my-apartment-side-3']);
	  selectCheckoutSide({side: 1,type: ".my-apartment",content: "ti-check"});
	  showElem(['#my-apartment-side-1']);
    });	
	$("#my-apartment-side-2-next").click(e => {
       e.preventDefault();
	  hideElem(['#my-apartment-side-1','#my-apartment-side-2']);
	  selectCheckoutSide({side: 3,type: ".my-apartment",content: "ti-check"});
	  aptFinalPreview("my-apartment");
	  let aptImages = $(`#my-apartment-images input[type=file]`), acc = parseInt(aptCurrentImgCount) + parseInt(aptImages.length);
	  let ii = acc == 1 ? "image" : "images";
		$('#apt-sidebar-img-count').html(`${acc} ${ii}`);
	  showElem(['#my-apartment-side-3']);
    });
	$("#my-apartment-side-3-prev").click(e => {
       e.preventDefault();
	  hideElem(['#my-apartment-side-1','#my-apartment-side-3']);
	  selectCheckoutSide({side: 2,type: ".my-apartment",content: "ti-check"});
	  showElem(['#my-apartment-side-2']);
    });	
	$("#my-apartment-side-3-next").click(e => {
       e.preventDefault();
	   console.log("my apartment submit");
	   
	   //side 1 validation
	   let aptUrl = $('#my-apartment-url').val(), aptName = $('#my-apartment-name').val(), aptAmount = $('#my-apartment-amount').val(), aptAvb = $('#my-apartment-avb').val(),
	   aptMaxAdults = $('#my-apartment-max-adults').val(),aptMaxChildren = $('#my-apartment-max-children').val(),aptDescription = $('#my-apartment-description').val(),
	      aptCategory = $('#my-apartment-category').val(), aptPType = $('#my-apartment-ptype').val(),aptRooms = $('#my-apartment-rooms').val(),
	       aptUnits = $('#my-apartment-units').val(),aptBathrooms = $('#my-apartment-bathrooms').val(),
		   aptBedrooms = $('#my-apartment-bedrooms').val(), aptPets = $('#my-apartment-pets').val(),
		   side1_validation = (aptUrl == "" || aptName == "" || aptAvb == "none" || aptMaxAdults == "" || aptAmount < 0 || aptDescription == "" || aptCategory == "none" || aptPType == "none" || aptRooms == "none" || aptUnits == "none" || aptBedrooms == "none" || aptBathrooms == "none" || aptPets == "none" || facilities.length < 1);		  
	  
       //side 2 validation imgs = $(`${BUUPlist[bc].id}-images-div input[type=file]`);
	   let aptAddress = $('#my-apartment-address').val(), aptCity = $('#my-apartment-city').val(),
	       aptLGA = $('#my-apartment-lga').val(),aptState = $('#my-apartment-state').val(), aptCountry = $('#my-apartment-country').val(),
	       aptImages = $(`#my-apartment-images input[type=file]`), emptyImage = false,
           side2_validation = (aptAddress == "" || aptCity == "" || aptLGA == "" || aptState == "none" || aptCountry == "none");
           
		   for(let i = 0; i < aptImages.length; i++){
			   if(aptImages[i].files.length < 1) emptyImage = true;
		   }
		   
        // console.log("video: ",aptVideo);
         //console.log("images: ",aptImages);
	   
	   let aptBank = $('#my-apartment-bank').val(), aptBname = $('#my-apartment-bname').val(), aptAcname = $('#my-apartment-acname').val(), aptAcnum = $('#my-apartment-acnum').val(),
	   bankValidation = (aptBank == "none" || ( aptBank == "new" && (aptBname == "none" || aptAcname == "" || aptAcnum == "") ) );

	   
	   if(side1_validation || side2_validation){
		   Swal.fire({
			 icon: 'error',
             title: "Please fill all the required fields"
           })
	   }
	   else if(emptyImage){
		   Swal.fire({
			 icon: 'error',
             title: "You have an empty image field."
           })
	   }
	   else if(aptCover == "none"){
		   Swal.fire({
			 icon: 'error',
             title: "Select a cover image."
           })
	   }
	   else if(bankValidation){
		   Swal.fire({
			 icon: 'error',
             title: "Select a bank account or fill all required bank details."
           })
	   }
	   /**
	   else if(aptVideo[0].size > 15000000){
		   Swal.fire({
			 icon: 'error',
             title: "Video must not be larger than 10MB"
           })
	   }
	   **/
	   else{
		 //let aptName = $('#my-apartment-name').val(),   
		 console.log("final");
		 
		 let ff = [];
		 for(let y = 0; y < facilities.length; y++){
			 if(facilities[y].selected) ff.push(facilities[y]);
		 }
		 
		 let fd =  new FormData();
		 fd.append("url",aptUrl);
		 fd.append("name",aptName);
		 fd.append("avb",aptAvb);
		 fd.append("max_adults",aptMaxAdults);
		 fd.append("description",aptDescription);
		 fd.append("rooms",aptRooms);
		 fd.append("category",aptCategory);
		 fd.append("property_type",aptPType);
		 fd.append("amount",aptAmount);
		 fd.append("bedrooms",aptBedrooms);
		 fd.append("bathrooms",aptBathrooms);
		 fd.append("units",aptUnits);
		 fd.append("pets",aptPets);
		 fd.append("address",aptAddress);
		 fd.append("city",aptCity);
		 fd.append("lga",aptLGA);
		 fd.append("state",aptState);
		 fd.append("country",aptCountry);
		 fd.append("bank",aptBank);
		 fd.append("bname",aptBname);
		 fd.append("acname",aptAcname);
		 fd.append("acnum",aptAcnum);
		 fd.append("facilities",JSON.stringify(ff));
		 
		 //fd.append("video",aptVideo[0]);
		 fd.append("cover",aptCover);
		 fd.append("img_count",aptImages.length);
		 
		 for(let r = 0; r < aptImages.length; r++)
		 {
		    let imgg = aptImages[r];
			let imgName = imgg.getAttribute("id");
            //console.log("imgg name: ",imgName);			
            fd.append(imgName,imgg.files[0]);   			   			
		 }
		 
		 /**
		 for(let vv of fd.values()){
			 console.log("vv: ",vv);
		 }
		 **/
		  fd.append("_token",$('#tk-apt').val());
		  fd.append("apartment_id",$('#tk-xf').val());
		  
		  $('#my-apartment-submit').hide();
		  $('#my-apartment-loading').fadeIn();
		  updateApartment(fd);
	   }
    });	
	
	
	//APARTMENTS
	$('#guest-apt-sidebar-submit').click(e => {
		e.preventDefault();

		let aptMaxAdults = $(`#guest-apt-sidebar-max-adults`).val(), aptMaxChildren = $(`#guest-apt-sidebar-max-children`).val(),
		aptAvb = $(`#guest-apt-sidebar-avb`).val(), aptAmount = $(`#guest-apt-sidebar-amount`).val(),
       aptRating = $(`#guest-apt-sidebar-rating`).val(),aptCategory = $(`#guest-apt-sidebar-category`).val(),
       aptPType = $(`#guest-apt-ptype`).val(),aptRooms = $(`#guest-apt-rooms`).val(),aptBedrooms = $(`#guest-apt-bedrooms`).val(),
       aptUnits = $(`#guest-apt-units`).val(),aptBathrooms = $(`#guest-apt-bathrooms`).val(),
	   aptChildren = $(`#guest-apt-sidebar-children`).val(), aptPets = $(`#guest-apt-sidebar-pets`).val(),
       aptCity = $(`#guest-apt-sidebar-city`).val(), aptLGA = "", aptState = $(`#guest-apt-sidebar-state`).val(),
	   facilities = $('input.guest-apt-sidebar-facility:checked'), validation = (facilities.length < 1 || aptState == "");
	   
		console.log(facilities);
		
		if(validation){
			  Swal.fire({
			 icon: 'error',
             title: "Please fill all the required fields"
           })
		}
		else{
			let ff = [];
			for(let i = 0; i < facilities.length; i++){
				let f = facilities[i];
				console.log(f);
				ff.push($(f).attr('data-tag'));
			}
			
			let searchDT = {
				avb: aptAvb,
				city: aptCity,
				lga: "",
				state: aptState,
				category: aptCategory,
				property_type: aptPType,
				rooms: aptRooms,
				units: aptUnits,
				bedrooms: aptBedrooms,
				bathrooms: aptBathrooms,
				max_adults: aptMaxAdults,
				max_children: aptMaxChildren,
				amount: aptAmount,
				children: aptChildren,
				pets: aptPets,
				facilities: ff,
				rating: aptRating
			};
			
			$("#guest-apt-sidebar-dt").val(JSON.stringify(searchDT));
			
			//console.log($("#guest-apt-sidebar-dt").val());
			$('#search-form').submit();
		}
			
	});
	
	$('#landing-search-btn').click(e => {
		e.preventDefault();
		console.log("landing search");
		
		let loc = $('#landing-search-location').val(), dts = $('#landing-search-dates').val(),
		    country = $('#landing-search-country').val(), city = $('#landing-search-city').val(),
		    state = $('#landing-search-state').val(), kids = $('#landing-search-kids').val(), adults = $('#landing-search-adults').val();
		
		if(loc == "" || parseInt(adults) < 1){
			let hh = "";
			
			if(loc == "") hh = "Enter your location.";
			if(parseInt(adults) < 1) hh = "Enter the number of adults.";
			Swal.fire({
			 icon: 'error',
             title: `${hh}`
           });
		}
		else{
			 landingSearchDT.country = country;
			 landingSearchDT.city = city;
			 landingSearchDT.state = state;
			 landingSearchDT.kids = kids;
			 landingSearchDT.adults = adults;
			
			$('#landing-search-dt').val(JSON.stringify(landingSearchDT));
	        $('#landing-search-form').submit();
		}
		
	});
	
	
	//APARTMENT
	$('#apartment-reservation-btn').click(e => {
		e.preventDefault();
		//scrollTo({'id': "#apartment-hostchat"});
		let aptID = $('#apt-id').val(), aptGXF = $('#apt-gxf').val();
		if(aptGXF == ""){
			$('#login').modal("show");
		}
		else{
		window.location = `reserve-apartment?axf=${aptID}&gxf=${aptGXF}`;
		}
		
	});
	
	$('#apt-chat-btn').click(e => {
		e.preventDefault();
		let name = $('#apt-message-name').val(), em = $('#apt-message-email').val(),
   		    msg = $('#apt-chat-msg').val(), aptID = $('#apt-id').val(),
			aptGXF = $('#apt-gxf').val(), aptGSB = $('#apt-gsb').val();
		
		if(name == "" || em == "" || msg == ""){
			Swal.fire({
			 icon: 'error',
             title: "Please fill all the required fields"
           });
		}
		else{
			 $('#apt-chat-btn').hide();
		  $('#apt-chat-loading').fadeIn();
		   let fd =  new FormData();
		   fd.append("_token",$('#tk-apt-chat').val());
		   fd.append("name",name);
		   fd.append("email",em);
		   fd.append("apartment_id",aptID);
		   fd.append("gsb",aptGSB);
		   fd.append("gxf",aptGXF);
		   fd.append("msg",msg);
			sendMessage(fd,"apt-chat");
		}
			
	});
	
	$('#apartment-add-first-review-btn').click(e => {
		e.preventDefault();
		scrollTo({'id': "#apartment-add-review"});
			
	});
	
	$('#apartment-add-review-btn').click(e => {
		e.preventDefault();
		
		/**
		 <input type="hidden" id="apartment-add-review-svc" name="svc" value="0">
							   <input type="hidden" id="apartment-add-review-sec" name="sec" value="0">
							   <input type="hidden" id="apartment-add-review-loc" name="loc" value="0">
							   <input type="hidden" id="apartment-add-review-cln" name="cln" value="0">
							   <input type="hidden" id="apartment-add-review-cmf" name="cmf" value="0">
		**/
		
		let msg = $('#apartment-add-review-msg').val();

        let validation = sec < 1 || svc < 1 || loc < 1 || cln < 1 || cmf < 1 || msg == "";
		
        if(validation){
			Swal.fire({
			 icon: 'error',
             title: "Please fill all required fields."
           });
		}
        else{
			$('#apartment-add-review-sec').val(sec);
			$('#apartment-add-review-svc').val(svc);
			$('#apartment-add-review-loc').val(loc);
			$('#apartment-add-review-cln').val(cln);
			$('#apartment-add-review-cmf').val(cmf);
			$('#apartment-add-review-form').submit();
		}		
	});
	
	$('#apartment-book-now-btn').click(e => {
		e.preventDefault();
		
		let as = $('#apt-as').val(), c1 = $('#apartment-checkin').val(), c2 = $('#apartment-checkout').val(),
   		    g = $('#guestNo').val(), mg = $('#mg').val(), k = "0", validation = (c1 == "" || c2 == "" || parseInt(g) < 1 );
		
		
        if(as == "occupied" || as == "booked"){
			let asText = "";
			
			switch(as){
				case "occupied":
				  asText = "This apartment is currently occupied";
				break;
				
				case "booked":
				  asText = "This apartment has been booked till [booking date]";
				break;
			}
			Swal.fire({
			 icon: 'error',
             title: asText
           });
		}
		else if(validation){
			Swal.fire({
			 icon: 'error',
             title: "Please fill all required fields."
           });
		}
		else if(parseInt(g) > parseInt(mg)){
			Swal.fire({
			 icon: 'error',
             title: `Maximum of ${mg} guests allowed`
           });
		}
        else{
			$('#add-to-cart-form').submit();
		}		
	});
	
	
	//CHAT
	$('#message-reply-btn').click(e => {
		e.preventDefault();
		
		let msg = $('#message-reply-msg').val();
		
		if(msg == ""){
			Swal.fire({
			 icon: 'error',
             title: "Your reply cannot be empty."
           });
		}
		else{
			 $('#message-reply-btn').hide();
		    $('#message-reply-loading').fadeIn();

		   let fd =  new FormData();
		   fd.append("_token",$('#tk-message').val());
           fd.append("apartment_id",aapt);
		   fd.append("gsb",hhxf);
		   fd.append("gxf",ggxf);
		   fd.append("msg",msg);
			sendMessage(fd,"message-reply");
	
		}
		
			
	});
	
	//CHECKOUT
	$('#checkout-pay-btn').click(e => {
		e.preventDefault();
		
		console.log("pay btn");
		
		let pt = $('#checkout-payment-type').val(), ref = $('#checkout-ref').val(), cc = $('#checkout-cc').val();
		
		if(cc == "" || cc == "0"){
			Swal.fire({
			 icon: 'error',
             title: "Your cart is empty."
           });
		}
		else if(pt == "none"){
			Swal.fire({
			 icon: 'error',
             title: "Select a payment type."
           });
		}
		else{
			 payCard({ref: ref,pt: pt});
		}
	});
	
	$('#checkout-book-btn').click(e => {
		e.preventDefault();
		console.log("book btn");
		
		let cc = $('#checkout-cc').val(), ref = $('#checkout-ref').val();
		
		if(cc == "" || cc == "0"){
			Swal.fire({
			 icon: 'error',
             title: "Your cart is empty."
           });
		}
		else{ 
			bookApartment({ref: ref});
		}
		
	});
	
	//MY BOOKINGS
	$('#booking-pay-now-submit').click(e => {
		e.preventDefault();
		hideElem('#booking-pay-now-payment-type-error');
		console.log("booking pay now btn");
		
		let pt = $('#booking-pay-now-payment-type').val();
		
		if(pt == "none"){
			showElem('#booking-pay-now-payment-type-error');
		}
		else{
			 $('#booking-pay-now-form').submit();
		}
	});
	
	$('#booking-send-message-type').change(e => {
		e.preventDefault();
		let mt = $('#booking-send-message-type').val();
		
		if(mt == "email"){
			showElem('#booking-send-message-email-div');
		}
		else{
			hideElem('#booking-send-message-email-div');
		}
	});
	
	$('#booking-send-message-submit').click(e => {
		e.preventDefault();
		hideElem(['#booking-send-message-type-error','#booking-send-message-subject-error','#booking-send-message-msg-error']);
		
		let mt = $('#booking-send-message-type').val(), ms = $('#booking-send-message-subject').val(), mm = $('#booking-send-message-msg').val();
		let v = (mt == "none" || (ms == "" && mt == "email") || mm == "");
		
		if(v){
			if(mt == "none") showElem('#booking-send-message-type-error');
			if(ms == "" && mt == "email") showElem('#booking-send-message-subject-error');
			if(mm == "") showElem('#booking-send-message-msg-error');
		}
		else{
			 $('#booking-send-message-form').submit();
		}
	});


	//ANALYTICS
	$('#host-total-revenue-btn').click(e => {
		e.preventDefault();
		
		let m = $('#host-total-revenue-month').val(), y = $('#host-total-revenue-year').val();
		
		if(m == "none" || y == ""){
			Swal.fire({
			 icon: 'error',
             title: "Select a period."
           });
		}
		else{
			 $(`#host-total-revenue-loading`).fadeIn();
			 getAnalytics({type: "total-revenue",month: m,year: y});
		}
		
	});
	
	$('#host-best-selling-apartments-btn').click(e => {
		e.preventDefault();
		
		let m = $('#host-best-selling-apartments-month').val(), y = $('#host-best-selling-apartments-year').val();
		
		if(m == "none" || y == ""){
			Swal.fire({
			 icon: 'error',
             title: "Select a period."
           });
		}
		else{
			 $(`#host-best-selling-apartments-loading`).fadeIn();
			 getAnalytics({type: "best-selling-apartments",month: m,year: y});
		}
		
	});
	
	
	
	
	//CONTACT US
	$('#contact-btn').click(e => {
		e.preventDefault();
		
		let msg = $('#contact-msg').val(), em = $('#contact-em').val(), dept = $('#contact-dept').val(),
      		name = $('#contact-name').val(), subject = $('#contact-subject').val();

        let validation = name == "" || subject == "" || em == "" || msg == "" || dept == "none";
				
        if(validation){
			Swal.fire({
			 icon: 'error',
             title: "Please fill all required fields."
           });
		}
        else{
			$('#contact-form').submit();
		}		
	});
	
	//AUTOCOMPLETE
	//$('.swal2-input.ac').on("keydown",ac);
	

	//LOCATION PICKER

	$('#location-picker-btn').click(e => {
		e.preventDefault();
		let baseAPI = "ac";
	 
	Swal.queue([{
  title: 'Country',
   html: `<input type="text" class="swal2-input" id="country-input">`,
  confirmButtonText: 'Next &rarr;',
  showLoaderOnConfirm: true,
  preConfirm: (country) => {
	  let c = $('#country-input').val();
    return fetch(`ac?type=state&country=${c}`)
      .then(response => response.json())
      .then(data => {
		  console.log("json response: ",data); 
		  if(data.status == "ok"){
			 let stateData = data.data;
			 stateACData = {
				 elem: "#state-input",
				 container: ".swal2-content",
				 src: JSON.stringify(stateData),
				 placeholder: "Enter your state",
				 keys: ["state"]
				 };
			 
			 Swal.insertQueueStep({
		       title: 'State',
               html: `<input type="text" class="swal2-input" id="state-input">`,
               confirmButtonText: 'Next &rarr;',
               showLoaderOnConfirm: true,
			   willOpen: (elem) => {
				   //console.log(elem);
				   activateAC('state');	
			   },
                preConfirm: (state) => {
					let s = $('#state-input').val();
					return fetch(`ac?type=city&country=${c}&state=${s}`)
                     .then(response => response.json())
                     .then(data => {
		             //console.log("json response: ",data); 
		             if(data.status == "ok"){
						 let cityData = data.data;
			             cityACData = {
				           elem: "#city-input",
				           container: ".swal2-content",
				           src: JSON.stringify(cityData),
				           placeholder: "Enter your city",
				           keys: ["city"]
				        };
						 Swal.insertQueueStep({
		                   title: 'City',
		                   html: `<input type="text" class="swal2-input" id="city-input">`,
		                   confirmButtonText: 'OK',
						   showLoaderOnConfirm: true,
						   willOpen: (elem) => {
							   console.log(elem);
							   activateAC('city');	
						   },
						   preConfirm: (state) => {
							   let c2 = $('#city-input').val();
							   //window.location = `landing-search?country=${c}&state=${s}&city=${c2}`;
							   $('#landing-search-country').val(c);
							   $('#landing-search-state').val(s);
							   $('#landing-search-city').val(c2);
							   $('#landing-search-location').val(`${c} - ${s} - ${c2}`);
						   }
	                     })
					 }
					 else{
						 Swal.insertQueueStep({
                          icon: 'error',
                          title: `Unable to find cities for ${s}`
                         }) 
					 }
					 });
					//
				}
	         });
             		 
			 
		  }
		  else{
			 Swal.insertQueueStep({
               icon: 'error',
               title: `Unable to find cities for ${c}`
             }) 
		  }
		  
	  })
  }
}]);
 let cc = JSON.parse(countries), ccc = [];
 
 for(let i = 0; i < cc.data.length; i++){
	 ccc.push(cc.data[i].country);
 }
 
 $('#country-input').ready(() => {
	 ac({
	   elem: '#country-input',
	   container: '.swal2-content',
	   src: JSON.stringify(cc.data),
	   placeholder: 'Enter your country',
	   keys: ["country"]
     });
});
});

//SPECIAL SEARCH FILTER
	$('#ssf-btn').click(e => {
		e.preventDefault();
		
		let  aptType = $('#ssf-apt-type').val(), beds = $('#ssf-beds').val(), lowest = $('#ssf-min').val(),
		     location = $('#ssf-apt-type').val(), amount = $('#ssf-amount').val(), 
			 validation = (aptType == "none" || parseInt(beds) < 1 || location == "none" || parseInt(amount) < 1000),
			 validation2 = (parseInt(amount) <= parseInt(lowest));
		
		if(validation){
			Swal.fire({
			 icon: 'error',
             title: "All fields are required"
           });
		}
		else if(validation2){
			Swal.fire({
			 icon: 'error',
             title: "No apartments with that price range"
           });
		}
		else{
			 $('#ssf-form').submit();
		}
		
			
	});
	
	$('#ssf-amount').change(e => {
		handleRange(e);
	});
	
//NEWSLETTER
	$('#newsletter-btn').click(e => {
		let em = $('#newsletter-em').val(), validation = (em == "");
		if(validation){
			Swal.fire({
			 icon: 'error',
             title: "Enter your email address"
           });
		}
		else{
			 $('#newsletter-form').submit();
		}
	});
	
 //SUBSCRIPTIONS
	$('#cancel-btn').click(e => {
		Swal.fire({
    title: `Cancel Subscription?`,
  imageUrl: "img/randoms/ask.jpg",
  imageWidth: 400,
  imageHeight: 200,
  imageAlt: `Are you sure?`,
  showCloseButton: true,
  html:
     "<h4 class='text-danger'><b>NOTE: You cannot downgrade back to the Free plan, and all your postings will be disabled</b>.</h4><p class='text-primary'>Click OK if you are sure.</p>"
}).then((result) => {
  if (result.value) {
	  let h = $('#cancel-btn').attr('data-href');
	  window.location = h;
  }
});
	});

});
