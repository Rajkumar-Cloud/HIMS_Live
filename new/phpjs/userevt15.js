// Field event handlers
(function($) {

	// Table 'patient' Field 'dob'
	$('[data-table=patient][data-field=x_dob]').on(
		{ // dob to age Calculations
		            "change keyup paste mouseup onChangeMonthYear onClose onSelect create picker_event hide changeDate": function (e) {
						var $row = $(this).fields();
		                var dobVal = $row["dob"];
		                var dobp = dobVal[0].value;
		                var parts = dobp.split('/');
		                var dob = new Date(parts[2], parts[1] - 1, parts[0]);
						var now = new Date();
				  var today = new Date(now.getYear(),now.getMonth(),now.getDate());
				  var yearNow = now.getYear();
				  var monthNow = now.getMonth();
				  var dateNow = now.getDate();

				 // //var dob = new Date(dateString.substring(6,10),
				 // //                   dateString.substring(0,2)-1,                   
				 // //                   dateString.substring(3,5)                  
				 // //                   );

				  var yearDob = dob.getYear();
				  var monthDob = dob.getMonth();
				  var dateDob = dob.getDate();
				  var age = {};
				  var ageString = "";
				  var yearString = "";
				  var monthString = "";
				  var dayString = "";
				  yearAge = yearNow - yearDob;
				  if (monthNow >= monthDob)
				    var monthAge = monthNow - monthDob;
				  else {
				    yearAge--;
				    var monthAge = 12 + monthNow -monthDob;
				  }
				  if (dateNow >= dateDob)
				    var dateAge = dateNow - dateDob;
				  else {
				    monthAge--;
				    var dateAge = 31 + dateNow - dateDob;
				    if (monthAge < 0) {
				      monthAge = 11;
				      yearAge--;
				    }
				  }
				  age = {
				      years: yearAge,
				      months: monthAge,
				      days: dateAge
				      };
				  if ( age.years > 1 ) yearString = " years";
				  else yearString = " year";
				  if ( age.months> 1 ) monthString = " months";
				  else monthString = " month";
				  if ( age.days > 1 ) dayString = " days";
				  else dayString = " day";
				  if ( (age.years > 0) && (age.months > 0) && (age.days > 0) )
				  {
							  if(age.years < 5)
							  {
									ageString = age.years + yearString + ", " + age.months + monthString + ", and " + age.days + dayString + " old.";
							  }else{
								   ageString = age.years + yearString + ", and " + age.months + monthString + " old.";
							  }
				   }
				  else if ( (age.years == 0) && (age.months == 0) && (age.days > 0) )
				    ageString = "Only " + age.days + dayString + " old!";
				  else if ( (age.years > 0) && (age.months == 0) && (age.days == 0) )
				    ageString = age.years + yearString + " old. Happy Birthday!!";
				  else if ( (age.years > 0) && (age.months > 0) && (age.days == 0) )
				    ageString = age.years + yearString + " and " + age.months + monthString + " old.";
				  else if ( (age.years == 0) && (age.months > 0) && (age.days > 0) )
				    ageString = age.months + monthString + " and " + age.days + dayString + " old.";
				  else if ( (age.years > 0) && (age.months == 0) && (age.days > 0) )
				    ageString = age.years + yearString + " and " + age.days + dayString + " old.";
				  else if ( (age.years == 0) && (age.months > 0) && (age.days == 0) )
				    ageString = age.months + monthString + " old.";
				  else ageString = " ";

				  //return ageString;
		                $row["Age"].value(ageString);
				}
		}
	);

	// Table 'patient' Field 'Age'
	$('[data-table=patient][data-field=x_Age]').on(
		{ // keys = Age to DOB Calculation
		            "change keyup": function (e) {
		                var $row = $(this).fields();
		                var date = new Date();
		                var AgeY = $row["Age"].toNumber();
		                date.setFullYear(date.getFullYear() - AgeY);
		                var CDob = date.getDate() + '/' + ("0" + (date.getMonth() + 1)).slice(-2) + '/' + date.getFullYear();
		                $row["dob"].val(CDob);
					}
		}
	);

	// Table 'patient' Field 'spouse_dob'
	$('[data-table=patient][data-field=x_spouse_dob]').on(
		{ // dob to age Calculations
		            "change keyup paste mouseup onChangeMonthYear onClose onSelect create picker_event hide changeDate": function (e) {
						var $row = $(this).fields();
		                var dobVal = $row["spouse_dob"];
		                var dobp = dobVal[0].value;
		                var parts = dobp.split('/');
		                var dob = new Date(parts[2], parts[1] - 1, parts[0]);
						var now = new Date();
				  var today = new Date(now.getYear(),now.getMonth(),now.getDate());
				  var yearNow = now.getYear();
				  var monthNow = now.getMonth();
				  var dateNow = now.getDate();

				 // //var dob = new Date(dateString.substring(6,10),
				 // //                   dateString.substring(0,2)-1,                   
				 // //                   dateString.substring(3,5)                  
				 // //                   );

				  var yearDob = dob.getYear();
				  var monthDob = dob.getMonth();
				  var dateDob = dob.getDate();
				  var age = {};
				  var ageString = "";
				  var yearString = "";
				  var monthString = "";
				  var dayString = "";
				  yearAge = yearNow - yearDob;
				  if (monthNow >= monthDob)
				    var monthAge = monthNow - monthDob;
				  else {
				    yearAge--;
				    var monthAge = 12 + monthNow -monthDob;
				  }
				  if (dateNow >= dateDob)
				    var dateAge = dateNow - dateDob;
				  else {
				    monthAge--;
				    var dateAge = 31 + dateNow - dateDob;
				    if (monthAge < 0) {
				      monthAge = 11;
				      yearAge--;
				    }
				  }
				  age = {
				      years: yearAge,
				      months: monthAge,
				      days: dateAge
				      };
				  if ( age.years > 1 ) yearString = " years";
				  else yearString = " year";
				  if ( age.months> 1 ) monthString = " months";
				  else monthString = " month";
				  if ( age.days > 1 ) dayString = " days";
				  else dayString = " day";
				  if ( (age.years > 0) && (age.months > 0) && (age.days > 0) )
				    {
							  if(age.years < 5)
							  {
									ageString = age.years + yearString + ", " + age.months + monthString + ", and " + age.days + dayString + " old.";
							  }else{
								   ageString = age.years + yearString + ", and " + age.months + monthString + " old.";
							  }
					}
				  else if ( (age.years == 0) && (age.months == 0) && (age.days > 0) )
				    ageString = "Only " + age.days + dayString + " old!";
				  else if ( (age.years > 0) && (age.months == 0) && (age.days == 0) )
				    ageString = age.years + yearString + " old. Happy Birthday!!";
				  else if ( (age.years > 0) && (age.months > 0) && (age.days == 0) )
				    ageString = age.years + yearString + " and " + age.months + monthString + " old.";
				  else if ( (age.years == 0) && (age.months > 0) && (age.days > 0) )
				    ageString = age.months + monthString + " and " + age.days + dayString + " old.";
				  else if ( (age.years > 0) && (age.months == 0) && (age.days > 0) )
				    ageString = age.years + yearString + " and " + age.days + dayString + " old.";
				  else if ( (age.years == 0) && (age.months > 0) && (age.days == 0) )
				    ageString = age.months + monthString + " old.";
				  else ageString = " ";

				  //return ageString;
		                $row["spouse_Age"].value(ageString);
				}
		}
	);

	// Table 'patient' Field 'spouse_Age'
	$('[data-table=patient][data-field=x_spouse_Age]').on(
		{ // keys = Age to DOB Calculation
		            "change keyup": function (e) {
		                var $row = $(this).fields();
		                var date = new Date();
		                var AgeY = $row["spouse_Age"].toNumber();
		                date.setFullYear(date.getFullYear() - AgeY);
		                var CDob = date.getDate() + '/' + ("0" + (date.getMonth() + 1)).slice(-2) + '/' + date.getFullYear();
		                $row["spouse_dob"].val(CDob);
					}
		}
	);

	// Table 'ip_admission' Field 'DOB'
	$('[data-table=ip_admission][data-field=x_DOB]').on(
		{ // dob to age Calculations
		            "change keyup paste mouseup onChangeMonthYear onClose onSelect create picker_event hide changeDate": function (e) {
						var $row = $(this).fields();
		                var dobVal = $row["DOB"];
		                var dobp = dobVal[0].value;
		                var parts = dobp.split('/');
		                var dob = new Date(parts[2], parts[1] - 1, parts[0]);
						var now = new Date();
				  var today = new Date(now.getYear(),now.getMonth(),now.getDate());
				  var yearNow = now.getYear();
				  var monthNow = now.getMonth();
				  var dateNow = now.getDate();

				 // //var dob = new Date(dateString.substring(6,10),
				 // //                   dateString.substring(0,2)-1,                   
				 // //                   dateString.substring(3,5)                  
				 // //                   );

				  var yearDob = dob.getYear();
				  var monthDob = dob.getMonth();
				  var dateDob = dob.getDate();
				  var age = {};
				  var ageString = "";
				  var yearString = "";
				  var monthString = "";
				  var dayString = "";
				  yearAge = yearNow - yearDob;
				  if (monthNow >= monthDob)
				    var monthAge = monthNow - monthDob;
				  else {
				    yearAge--;
				    var monthAge = 12 + monthNow -monthDob;
				  }
				  if (dateNow >= dateDob)
				    var dateAge = dateNow - dateDob;
				  else {
				    monthAge--;
				    var dateAge = 31 + dateNow - dateDob;
				    if (monthAge < 0) {
				      monthAge = 11;
				      yearAge--;
				    }
				  }
				  age = {
				      years: yearAge,
				      months: monthAge,
				      days: dateAge
				      };
				  if ( age.years > 1 ) yearString = " years";
				  else yearString = " year";
				  if ( age.months> 1 ) monthString = " months";
				  else monthString = " month";
				  if ( age.days > 1 ) dayString = " days";
				  else dayString = " day";
				  if ( (age.years > 0) && (age.months > 0) && (age.days > 0) )
				  {
							  if(age.years < 5)
							  {
									ageString = age.years + yearString + ", " + age.months + monthString + ", and " + age.days + dayString + " old.";
							  }else{
								   ageString = age.years + yearString + ", and " + age.months + monthString + " old.";
							  }
					}
				  else if ( (age.years == 0) && (age.months == 0) && (age.days > 0) )
				    ageString = "Only " + age.days + dayString + " old!";
				  else if ( (age.years > 0) && (age.months == 0) && (age.days == 0) )
				    ageString = age.years + yearString + " old. Happy Birthday!!";
				  else if ( (age.years > 0) && (age.months > 0) && (age.days == 0) )
				    ageString = age.years + yearString + " and " + age.months + monthString + " old.";
				  else if ( (age.years == 0) && (age.months > 0) && (age.days > 0) )
				    ageString = age.months + monthString + " and " + age.days + dayString + " old.";
				  else if ( (age.years > 0) && (age.months == 0) && (age.days > 0) )
				    ageString = age.years + yearString + " and " + age.days + dayString + " old.";
				  else if ( (age.years == 0) && (age.months > 0) && (age.days == 0) )
				    ageString = age.months + monthString + " old.";
				  else ageString = " ";

				  //return ageString;
		                $row["age"].value(ageString);
				}
		}
	);

	// Table 'ivf' Field 'Male'
	$('[data-table=ivf][data-field=x_Male]').on(
		{ // keys = event types, values = handler functions
			"change keyup": function(e) {

				// Your code
						var $row = $(this).fields();
						var Volume = $row["Male"].toNumber();
						var user = [{
							'patientId': Volume
						}];
						var jsonString = JSON.stringify(user);
						$.ajax({
							type: "GET",
							url: "ajaxinsert.php?control=patientProPicture",
							data: { data: jsonString },
							cache: false,
							success: function (data) {
								let jsonObject = JSON.parse(data);
								var json = jsonObject["records"];
								for (var i = 0; i < json.length; i++) {
									var obj = json[i];

									//console.log(obj.id);
									if(obj.profilePic == null)
									{
										$row["malepic"].value("hims\\profile-picture.png");
										document.getElementById('maleprofilePicturePatient').src= "uploads/hims\\profile-picture.png";
									}else{
										$row["malepic"].value(obj.profilePic);
										document.getElementById('maleprofilePicturePatient').src= 'uploads/' + obj.profilePic;
									}
										document.getElementById("maleprofilePicturePatient").style.display = "block";
								}
							}
						});		
			}
		}
	);

	// Table 'ivf' Field 'Female'
	$('[data-table=ivf][data-field=x_Female]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
					var $row = $(this).fields();
						var Volume = $row["Female"].toNumber();
						var user = [{
							'patientId': Volume
						}];
						var jsonString = JSON.stringify(user);
						$.ajax({
							type: "GET",
							url: "ajaxinsert.php?control=patientProPicture",
							data: { data: jsonString },
							cache: false,
							success: function (data) {
								let jsonObject = JSON.parse(data);
								var json = jsonObject["records"];
								for (var i = 0; i < json.length; i++) {
									var obj = json[i];

									//console.log(obj.id);
									if(obj.profilePic == null)
									{
										$row["femalepic"].value("hims\\profile-picture.png");
										document.getElementById('femaleprofilePicturePatient').src="uploads/hims\\profile-picture.png";
									}else{
										$row["femalepic"].value(obj.profilePic);
										document.getElementById('femaleprofilePicturePatient').src= 'uploads/' + obj.profilePic;
									}
									document.getElementById("femaleprofilePicturePatient").style.display = "block";
								}
							}
						});	
			}
		}
	);

	// Table 'ivf_semenanalysisreport' Field 'RequestSample'
	$('[data-table=ivf_semenanalysisreport][data-field=x_RequestSample]').on(
		{ // keys = event types, values = handler functions
			"change onchange": function(e) {

				// Your code
						var $row = $(this).fields();
						var RequestSample = $row["RequestSample"].value();
						var TankLocation = document.getElementById("TankLocation");
						var Method = document.getElementById("Method");

						/////////////////////
							var capacitationTable = document.getElementById("capacitationTable");
							capacitationTable.style.width = "60%";
							 document.getElementById("Volume1").style.visibility = "hidden";
							 document.getElementById("Concentration1").style.visibility = "hidden";
							 document.getElementById("Total1").style.visibility = "hidden";
							 document.getElementById("ProgressiveMotility1").style.visibility = "hidden";
							 document.getElementById("NonProgrssiveMotile1").style.visibility = "hidden";
							 document.getElementById("Immotile1").style.visibility = "hidden";
							 document.getElementById("TotalProgrssiveMotile1").style.visibility = "hidden";
							 document.getElementById("capacitationTableHead").style.visibility = "hidden";
							 document.getElementById("PreCapacitation").innerText = "";
							 document.getElementById("PostCapacitation").innerText = "";
							 document.getElementById("x_Volume1").style.width = "0px";
							 document.getElementById("x_Concentration1").style.width = "0px";
							 document.getElementById("x_Total1").style.width = "0px";
							 document.getElementById("x_ProgressiveMotility1").style.width = "0px";
							 document.getElementById("x_NonProgrssiveMotile1").style.width = "0px";
							 document.getElementById("x_Immotile1").style.width = "0px";
							 document.getElementById("x_TotalProgrssiveMotile1").style.width = "0px";
							 document.getElementById("x_Volume2").style.width = "0px";
							 document.getElementById("x_Concentration2").style.width = "0px";
							 document.getElementById("x_Total2").style.width = "0px";
							 document.getElementById("x_ProgressiveMotility2").style.width = "0px";
							 document.getElementById("x_NonProgrssiveMotile2").style.width = "0px";
							 document.getElementById("x_Immotile2").style.width = "0px";
							 document.getElementById("x_TotalProgrssiveMotile2").style.width = "0px";
							 document.getElementById("Volume2").style.visibility = "hidden";
							 document.getElementById("Concentration2").style.visibility = "hidden";
							 document.getElementById("Total2").style.visibility = "hidden";
							 document.getElementById("ProgressiveMotility2").style.visibility = "hidden";
							 document.getElementById("NonProgrssiveMotile2").style.visibility = "hidden";
							 document.getElementById("Immotile2").style.visibility = "hidden";
							 document.getElementById("TotalProgrssiveMotile2").style.visibility = "hidden";
							 document.getElementById("Big").style.visibility = "hidden";
							 document.getElementById("Medium").style.visibility = "hidden";
							 document.getElementById("Small").style.visibility = "hidden";
							 document.getElementById("NoHalo").style.visibility = "hidden";
							 document.getElementById("Fragmented").style.visibility = "hidden";
							 document.getElementById("NonFragmented").style.visibility = "hidden";
							 document.getElementById("DFI").style.visibility = "hidden";
							 document.getElementById("InseminationTime").style.visibility = "hidden";
							 document.getElementById("InseminationBy").style.visibility = "hidden";
							 document.getElementById("IsueBy").style.visibility = "hidden";
							document.getElementById("idMacs").style.visibility = "hidden";
			document.getElementById('SemenHeading').innerText = 'Spermiogram';
						if(RequestSample == "Freezing")
						{
								document.getElementById('SemenHeading').innerText = 'Semen Freezing';
							TankLocation.style.visibility = "visible";
							Method.style.visibility = "visible";
						}else{
							TankLocation.style.visibility = "hidden";
							Method.style.visibility = "visible";
						}
						var capacitationTable = document.getElementById("capacitationTable");
						if(RequestSample == "Semen Analysis")
						{
							capacitationTable.style.width = "60%";
							 document.getElementById("Volume1").style.visibility = "hidden";
							 document.getElementById("Concentration1").style.visibility = "hidden";
							 document.getElementById("Total1").style.visibility = "hidden";
							 document.getElementById("ProgressiveMotility1").style.visibility = "hidden";
							 document.getElementById("NonProgrssiveMotile1").style.visibility = "hidden";
							 document.getElementById("Immotile1").style.visibility = "hidden";
							 document.getElementById("TotalProgrssiveMotile1").style.visibility = "hidden";
							 document.getElementById("capacitationTableHead").style.visibility = "hidden";
							 document.getElementById("PreCapacitation").innerText = "";
							 document.getElementById("PostCapacitation").innerText = "";
							 document.getElementById("x_Volume1").style.width = "0px";
							 document.getElementById("x_Concentration1").style.width = "0px";
							 document.getElementById("x_Total1").style.width = "0px";
							 document.getElementById("x_ProgressiveMotility1").style.width = "0px";
							 document.getElementById("x_NonProgrssiveMotile1").style.width = "0px";
							 document.getElementById("x_Immotile1").style.width = "0px";
							 document.getElementById("x_TotalProgrssiveMotile1").style.width = "0px";
							 document.getElementById("x_Volume2").style.width = "0px";
							 document.getElementById("x_Concentration2").style.width = "0px";
							 document.getElementById("x_Total2").style.width = "0px";
							 document.getElementById("x_ProgressiveMotility2").style.width = "0px";
							 document.getElementById("x_NonProgrssiveMotile2").style.width = "0px";
							 document.getElementById("x_Immotile2").style.width = "0px";
							 document.getElementById("x_TotalProgrssiveMotile2").style.width = "0px";
							 document.getElementById("Volume2").style.visibility = "hidden";
							 document.getElementById("Concentration2").style.visibility = "hidden";
							 document.getElementById("Total2").style.visibility = "hidden";
							 document.getElementById("ProgressiveMotility2").style.visibility = "hidden";
							 document.getElementById("NonProgrssiveMotile2").style.visibility = "hidden";
							 document.getElementById("Immotile2").style.visibility = "hidden";
							 document.getElementById("TotalProgrssiveMotile2").style.visibility = "hidden";
							 document.getElementById("Big").style.visibility = "hidden";
							 document.getElementById("Medium").style.visibility = "hidden";
							 document.getElementById("Small").style.visibility = "hidden";
							 document.getElementById("NoHalo").style.visibility = "hidden";
							 document.getElementById("Fragmented").style.visibility = "hidden";
							 document.getElementById("NonFragmented").style.visibility = "hidden";
							 document.getElementById("DFI").style.visibility = "hidden";
							 document.getElementById("InseminationTime").style.visibility = "hidden";
							 document.getElementById("InseminationBy").style.visibility = "hidden";
							 document.getElementById("IsueBy").style.visibility = "hidden";
						}
						else if(RequestSample == "ICSI")
						{
								capacitationTable.style.width = "60%";
							 document.getElementById("Volume1").style.visibility = "hidden";
							 document.getElementById("Concentration1").style.visibility = "hidden";
							 document.getElementById("Total1").style.visibility = "hidden";
							 document.getElementById("ProgressiveMotility1").style.visibility = "hidden";
							 document.getElementById("NonProgrssiveMotile1").style.visibility = "hidden";
							 document.getElementById("Immotile1").style.visibility = "hidden";
							 document.getElementById("TotalProgrssiveMotile1").style.visibility = "hidden";
							 document.getElementById("capacitationTableHead").style.visibility = "hidden";
							 document.getElementById("PreCapacitation").innerText = "";
							 document.getElementById("PostCapacitation").innerText = "";
							 document.getElementById("x_Volume1").style.width = "0px";
							 document.getElementById("x_Concentration1").style.width = "0px";
							 document.getElementById("x_Total1").style.width = "0px";
							 document.getElementById("x_ProgressiveMotility1").style.width = "0px";
							 document.getElementById("x_NonProgrssiveMotile1").style.width = "0px";
							 document.getElementById("x_Immotile1").style.width = "0px";
							 document.getElementById("x_TotalProgrssiveMotile1").style.width = "0px";
							 document.getElementById("x_Volume2").style.width = "0px";
							 document.getElementById("x_Concentration2").style.width = "0px";
							 document.getElementById("x_Total2").style.width = "0px";
							 document.getElementById("x_ProgressiveMotility2").style.width = "0px";
							 document.getElementById("x_NonProgrssiveMotile2").style.width = "0px";
							 document.getElementById("x_Immotile2").style.width = "0px";
							 document.getElementById("x_TotalProgrssiveMotile2").style.width = "0px";
							 document.getElementById("Volume2").style.visibility = "hidden";
							 document.getElementById("Concentration2").style.visibility = "hidden";
							 document.getElementById("Total2").style.visibility = "hidden";
							 document.getElementById("ProgressiveMotility2").style.visibility = "hidden";
							 document.getElementById("NonProgrssiveMotile2").style.visibility = "hidden";
							 document.getElementById("Immotile2").style.visibility = "hidden";
							 document.getElementById("TotalProgrssiveMotile2").style.visibility = "hidden";
							 document.getElementById("Big").style.visibility = "hidden";
							 document.getElementById("Medium").style.visibility = "hidden";
							 document.getElementById("Small").style.visibility = "hidden";
							 document.getElementById("NoHalo").style.visibility = "hidden";
							 document.getElementById("Fragmented").style.visibility = "hidden";
							 document.getElementById("NonFragmented").style.visibility = "hidden";
							 document.getElementById("DFI").style.visibility = "hidden";
							 document.getElementById("InseminationTime").style.visibility = "hidden";
							 document.getElementById("InseminationBy").style.visibility = "hidden";
							 document.getElementById("IsueBy").style.visibility = "hidden";

		    //////////////////////////////////////////////////
						 	var IsueBy = document.getElementById("IsueBy");
						 	IsueBy.style.visibility = "visible";
						 		capacitationTable.style.width = "100%";
							 document.getElementById("Volume1").style.visibility = "visible";
							 document.getElementById("Concentration1").style.visibility = "visible";
							 document.getElementById("Total1").style.visibility = "visible";
							 document.getElementById("ProgressiveMotility1").style.visibility = "visible";
							 document.getElementById("NonProgrssiveMotile1").style.visibility = "visible";
							 document.getElementById("Immotile1").style.visibility = "visible";
							 document.getElementById("TotalProgrssiveMotile1").style.visibility = "visible";
							 document.getElementById("capacitationTableHead").style.visibility = "visible";
		document.getElementById("idMacs").style.visibility = "visible";
							 document.getElementById("PreCapacitation").innerText = "Pre Capacitation";
							 document.getElementById("PostCapacitation").innerText = "Post Capacitation";
							document.getElementById("x_Volume1").style.width = "80px";
		 					document.getElementById("x_Concentration1").style.width = "80px";
		 					document.getElementById("x_Total1").style.width = "80px";
		 					document.getElementById("x_ProgressiveMotility1").style.width = "80px";
		 					document.getElementById("x_NonProgrssiveMotile1").style.width = "80px";
		 					document.getElementById("x_Immotile1").style.width = "80px";
		 					document.getElementById("x_TotalProgrssiveMotile1").style.width = "80px";
						}
						else if(RequestSample == "DFI")
						{
				document.getElementById('SemenHeading').innerText = 'DNA Framgmentation Index';
						  	 document.getElementById("Big").style.visibility = "visible";
							 document.getElementById("Medium").style.visibility = "visible";
							 document.getElementById("Small").style.visibility = "visible";
							 document.getElementById("NoHalo").style.visibility = "visible";
							 document.getElementById("Fragmented").style.visibility = "visible";
							 document.getElementById("NonFragmented").style.visibility = "visible";
							 document.getElementById("DFI").style.visibility = "visible";
						}
						else if(RequestSample == "IUI processing")
						{
							document.getElementById('SemenHeading').innerText = 'INTRA UTERINE INSEMINATION';
												document.getElementById("Big").style.visibility = "hidden";
							document.getElementById("Medium").style.visibility = "hidden";
							document.getElementById("Small").style.visibility = "hidden";
							document.getElementById("NoHalo").style.visibility = "hidden";
							document.getElementById("Fragmented").style.visibility = "hidden";
							document.getElementById("NonFragmented").style.visibility = "hidden";
							document.getElementById("DFI").style.visibility = "hidden";
							capacitationTable.style.width = "100%";
							 document.getElementById("Volume1").style.visibility = "visible";
							 document.getElementById("Concentration1").style.visibility = "visible";
							 document.getElementById("Total1").style.visibility = "visible";
							 document.getElementById("ProgressiveMotility1").style.visibility = "visible";
							 document.getElementById("NonProgrssiveMotile1").style.visibility = "visible";
							 document.getElementById("Immotile1").style.visibility = "visible";
							 document.getElementById("TotalProgrssiveMotile1").style.visibility = "visible";
							 document.getElementById("capacitationTableHead").style.visibility = "visible";
							  document.getElementById("InseminationTime").style.visibility = "visible";
							   document.getElementById("InseminationBy").style.visibility = "visible";
							 document.getElementById("PreCapacitation").innerText = "Pre Capacitation";
							 document.getElementById("PostCapacitation").innerText = "Post Capacitation";
							document.getElementById("x_Volume1").style.width = "80px";
		 					document.getElementById("x_Concentration1").style.width = "80px";
		 					document.getElementById("x_Total1").style.width = "80px";
		 					document.getElementById("x_ProgressiveMotility1").style.width = "80px";
		 					document.getElementById("x_NonProgrssiveMotile1").style.width = "80px";
		 					document.getElementById("x_Immotile1").style.width = "80px";
		 					document.getElementById("x_TotalProgrssiveMotile1").style.width = "80px";
		 					document.getElementById("idMacs").style.visibility = "visible";
						}else{
							capacitationTable.style.width = "60%";
							 document.getElementById("Volume1").style.visibility = "hidden";
							 document.getElementById("Concentration1").style.visibility = "hidden";
							 document.getElementById("Total1").style.visibility = "hidden";
							 document.getElementById("ProgressiveMotility1").style.visibility = "hidden";
							 document.getElementById("NonProgrssiveMotile1").style.visibility = "hidden";
							 document.getElementById("Immotile1").style.visibility = "hidden";
							 document.getElementById("TotalProgrssiveMotile1").style.visibility = "hidden";
							 document.getElementById("capacitationTableHead").style.visibility = "hidden";
							 document.getElementById("PreCapacitation").innerText = "";
							 document.getElementById("PostCapacitation").innerText = "";
							 document.getElementById("x_Volume1").style.width = "0px";
							 document.getElementById("x_Concentration1").style.width = "0px";
							 document.getElementById("x_Total1").style.width = "0px";
							 document.getElementById("x_ProgressiveMotility1").style.width = "0px";
							 document.getElementById("x_NonProgrssiveMotile1").style.width = "0px";
							 document.getElementById("x_Immotile1").style.width = "0px";
							 document.getElementById("x_TotalProgrssiveMotile1").style.width = "0px";
						}
			}
		}
	);

	// Table 'ivf_semenanalysisreport' Field 'Volume'
	$('[data-table=ivf_semenanalysisreport][data-field=x_Volume]').on(
		{ // keys = event types, values = handler functions
			"change keyup": function(e) {

				// Your code
				var $row = $(this).fields();
				var Volume = $row["Volume"].toNumber();
				var Concentration = $row["Concentration"].toNumber();
				var Total = Volume * Concentration;
				$row["Total"].val(Total.toFixed(2));
			}
		}
	);

	// Table 'ivf_semenanalysisreport' Field 'Concentration'
	$('[data-table=ivf_semenanalysisreport][data-field=x_Concentration]').on(
		{ // keys = event types, values = handler functions
			"change keyup": function(e) {

				// Your code
				var $row = $(this).fields();
		var Volume = $row["Volume"].toNumber();
		var Concentration = $row["Concentration"].toNumber();
		var Total = Volume * Concentration;
		$row["Total"].val(Total.toFixed(2));
			}
		}
	);

	// Table 'ivf_semenanalysisreport' Field 'Total'
	$('[data-table=ivf_semenanalysisreport][data-field=x_Total]').on(
		{ // keys = event types, values = handler functions
			"change keyup": function(e) {

				// Your code
				var $row = $(this).fields();
		var Volume = $row["Volume"].toNumber();
		var Concentration = $row["Concentration"].toNumber();
		var Total = Volume * Concentration;

		//$row["Total"].val(Total.toFixed(2));
			}
		}
	);

	// Table 'ivf_semenanalysisreport' Field 'ProgressiveMotility'
	$('[data-table=ivf_semenanalysisreport][data-field=x_ProgressiveMotility]').on(
		{ // keys = event types, values = handler functions
			"change keyup": function(e) {

				// Your code
				var $row = $(this).fields();
				var ProgressiveMotility = $row["ProgressiveMotility"].toNumber();
				var NonProgrssiveMotile = $row["NonProgrssiveMotile"].toNumber();
				var Immotile = 100 - ( ProgressiveMotility +  NonProgrssiveMotile);
				$row["Immotile"].val(Immotile.toFixed(2));
				var ttootal = ProgressiveMotility +  NonProgrssiveMotile;
				$row["TotalProgrssiveMotile"].val(ttootal.toFixed(2));
			}
		}
	);

	// Table 'ivf_semenanalysisreport' Field 'NonProgrssiveMotile'
	$('[data-table=ivf_semenanalysisreport][data-field=x_NonProgrssiveMotile]').on(
		{ // keys = event types, values = handler functions
			"change keyup": function(e) {

				// Your code
				var $row = $(this).fields();
				var ProgressiveMotility = $row["ProgressiveMotility"].toNumber();
				var NonProgrssiveMotile = $row["NonProgrssiveMotile"].toNumber();
				var Immotile = 100 - ( ProgressiveMotility +  NonProgrssiveMotile);
				$row["Immotile"].val(Immotile.toFixed(2));
				var tttotal = ProgressiveMotility +  NonProgrssiveMotile;
					$row["TotalProgrssiveMotile"].val(tttotal.toFixed(2));
			}
		}
	);

	// Table 'ivf_semenanalysisreport' Field 'Immotile'
	$('[data-table=ivf_semenanalysisreport][data-field=x_Immotile]').on(
		{ // keys = event types, values = handler functions
			"change keyup": function(e) {

				// Your code
				var $row = $(this).fields();
				var ProgressiveMotility = $row["ProgressiveMotility"].toNumber();
				var NonProgrssiveMotile = $row["NonProgrssiveMotile"].toNumber();
				var Immotile = 100 - ( ProgressiveMotility +  NonProgrssiveMotile);
				$row["Immotile"].val(Immotile.toFixed(2));
			}
		}
	);

	// Table 'ivf_semenanalysisreport' Field 'Normal'
	$('[data-table=ivf_semenanalysisreport][data-field=x_Normal]').on(
		{ // keys = event types, values = handler functions
			"change keyup": function(e) {

				// Your code
				var $row = $(this).fields();
		var Normal = $row["Normal"].toNumber();
		$row["Abnormal"].val(100-Normal);
			}
		}
	);

	// Table 'ivf_semenanalysisreport' Field 'Abnormal'
	$('[data-table=ivf_semenanalysisreport][data-field=x_Abnormal]').on(
		{ // keys = event types, values = handler functions
			"change keyup": function(e) {

				// Your code
				var $row = $(this).fields();
		var Abnormal = $row["Abnormal"].toNumber();
		$row["Normal"].val(100-Abnormal);
			}
		}
	);

	// Table 'ivf_semenanalysisreport' Field 'Headdefects'
	$('[data-table=ivf_semenanalysisreport][data-field=x_Headdefects]').on(
		{ // keys = event types, values = handler functions
		"change keyup": function(e) {

				// Your code
				var $row = $(this).fields();
		var Headdefects = $row["Headdefects"].toNumber();
		var MidpieceDefects = $row["MidpieceDefects"].toNumber();
		var Abnormal = $row["Abnormal"].toNumber();
		var Total = Abnormal - ( Headdefects + MidpieceDefects);

		//var Total = 100 - ( Headdefects + MidpieceDefects);
		$row["TailDefects"].val(Total.toFixed(2));
			}
		}
	);

	// Table 'ivf_semenanalysisreport' Field 'MidpieceDefects'
	$('[data-table=ivf_semenanalysisreport][data-field=x_MidpieceDefects]').on(
		{ // keys = event types, values = handler functions
		"change keyup": function(e) {

				// Your code
				var $row = $(this).fields();
		var Headdefects = $row["Headdefects"].toNumber();
		var MidpieceDefects = $row["MidpieceDefects"].toNumber();
		var Abnormal = $row["Abnormal"].toNumber();
		var Total = Abnormal - ( Headdefects + MidpieceDefects);

		//var Total = 100 - ( Headdefects + MidpieceDefects);
		$row["TailDefects"].val(Total.toFixed(2));
			}
		}
	);

	// Table 'ivf_semenanalysisreport' Field 'TailDefects'
	$('[data-table=ivf_semenanalysisreport][data-field=x_TailDefects]').on(
		{ // keys = event types, values = handler functions
		"change keyup": function(e) {

				// Your code
				var $row = $(this).fields();
		var Headdefects = $row["Headdefects"].toNumber();
		var MidpieceDefects = $row["MidpieceDefects"].toNumber();
		var Abnormal = $row["Abnormal"].toNumber();
		var Total = Abnormal - ( Headdefects + MidpieceDefects);

		//var Total = 100 - ( Headdefects + MidpieceDefects);
		$row["TailDefects"].val(Total.toFixed(2));
			}
		}
	);

	// Table 'ivf_semenanalysisreport' Field 'SemenOrgin'
	$('[data-table=ivf_semenanalysisreport][data-field=x_SemenOrgin]').on(
		{ // keys = event types, values = handler functions
			"change onchange": function(e) {

				// Your code
						var $row = $(this).fields();
						var SemenOrgin = $row["SemenOrgin"].value();
						var donorId = document.getElementById("donorId");
						var DonorBloodGroupId = document.getElementById("DonorBloodGroupId");
						if(SemenOrgin == "Donor")
						{
							donorId.style.visibility = "visible";
							DonorBloodGroupId.style.visibility = "visible";
						}else{
							donorId.style.visibility = "hidden";
							DonorBloodGroupId.style.visibility = "hidden";
						}
			}
		}
	);

	// Table 'ivf_semenanalysisreport' Field 'Volume1'
	$('[data-table=ivf_semenanalysisreport][data-field=x_Volume1]').on(
		{ // keys = event types, values = handler functions
			"change keyup": function(e) {

				// Your code
				var $row = $(this).fields();
				var Volume = $row["Volume1"].toNumber();
				var Concentration = $row["Concentration1"].toNumber();
				var Total = Volume * Concentration;
				$row["Total1"].val(Total);
			}
		}
	);

	// Table 'ivf_semenanalysisreport' Field 'Concentration1'
	$('[data-table=ivf_semenanalysisreport][data-field=x_Concentration1]').on(
		{ // keys = event types, values = handler functions
			"change keyup": function(e) {

				// Your code
				var $row = $(this).fields();
				var Volume = $row["Volume1"].toNumber();
				var Concentration = $row["Concentration1"].toNumber();
				var Total = Volume * Concentration;
				$row["Total1"].val(Total);
			}
		}
	);

	// Table 'ivf_semenanalysisreport' Field 'ProgressiveMotility1'
	$('[data-table=ivf_semenanalysisreport][data-field=x_ProgressiveMotility1]').on(
		{ // keys = event types, values = handler functions
			"change keyup": function(e) {

				// Your code
				var $row = $(this).fields();
				var ProgressiveMotility = $row["ProgressiveMotility1"].toNumber();
				var NonProgrssiveMotile = $row["NonProgrssiveMotile1"].toNumber();
				var Immotile = 100 - ( ProgressiveMotility +  NonProgrssiveMotile);
				$row["Immotile1"].val(Immotile);
				$row["TotalProgrssiveMotile1"].val(ProgressiveMotility +  NonProgrssiveMotile);
			}
		}
	);

	// Table 'ivf_semenanalysisreport' Field 'NonProgrssiveMotile1'
	$('[data-table=ivf_semenanalysisreport][data-field=x_NonProgrssiveMotile1]').on(
		{ // keys = event types, values = handler functions
			"change keyup": function(e) {

				// Your code
				var $row = $(this).fields();
				var ProgressiveMotility = $row["ProgressiveMotility1"].toNumber();
				var NonProgrssiveMotile = $row["NonProgrssiveMotile1"].toNumber();
				var Immotile = 100 - ( ProgressiveMotility +  NonProgrssiveMotile);
				$row["Immotile1"].val(Immotile);
				$row["TotalProgrssiveMotile1"].val(ProgressiveMotility +  NonProgrssiveMotile);
			}
		}
	);

	// Table 'ivf_semenanalysisreport' Field 'Big'
	$('[data-table=ivf_semenanalysisreport][data-field=x_Big]').on(
		{ // keys = event types, values = handler functions
			"change keyup": function(e) {

				// Your code
				var $row = $(this).fields();
				var X = $row["Big"].toNumber();
				var Y = $row["Medium"].toNumber();
				var Z = $row["Small"].toNumber();
				var A = $row["NoHalo"].toNumber();
				$row["Fragmented"].val(X+Y);
				$row["NonFragmented"].val(Z+A);
				$row["DFI"].val(((X+Y)/(X+Y+Z+A))*100);		
			}
		}
	);

	// Table 'ivf_semenanalysisreport' Field 'Medium'
	$('[data-table=ivf_semenanalysisreport][data-field=x_Medium]').on(
		{ // keys = event types, values = handler functions
			"change keyup": function(e) {

				// Your code
				var $row = $(this).fields();
				var X = $row["Big"].toNumber();
				var Y = $row["Medium"].toNumber();
				var Z = $row["Small"].toNumber();
				var A = $row["NoHalo"].toNumber();
				$row["Fragmented"].val(X+Y);
				$row["NonFragmented"].val(Z+A);
				$row["DFI"].val(((X+Y)/(X+Y+Z+A))*100);		
			}
		}
	);

	// Table 'ivf_semenanalysisreport' Field 'Small'
	$('[data-table=ivf_semenanalysisreport][data-field=x_Small]').on(
		{ // keys = event types, values = handler functions
			"change keyup": function(e) {

				// Your code
				var $row = $(this).fields();
				var X = $row["Big"].toNumber();
				var Y = $row["Medium"].toNumber();
				var Z = $row["Small"].toNumber();
				var A = $row["NoHalo"].toNumber();
				$row["Fragmented"].val(X+Y);
				$row["NonFragmented"].val(Z+A);
				$row["DFI"].val(((X+Y)/(X+Y+Z+A))*100);		
			}
		}
	);

	// Table 'ivf_semenanalysisreport' Field 'NoHalo'
	$('[data-table=ivf_semenanalysisreport][data-field=x_NoHalo]').on(
		{ // keys = event types, values = handler functions
			"change keyup": function(e) {

				// Your code
				var $row = $(this).fields();
				var X = $row["Big"].toNumber();
				var Y = $row["Medium"].toNumber();
				var Z = $row["Small"].toNumber();
				var A = $row["NoHalo"].toNumber();
				$row["Fragmented"].val(X+Y);
				$row["NonFragmented"].val(Z+A);
				$row["DFI"].val(((X+Y)/(X+Y+Z+A))*100);		
			}
		}
	);

	// Table 'ivf_semenanalysisreport' Field 'Volume2'
	$('[data-table=ivf_semenanalysisreport][data-field=x_Volume2]').on(
		{ // keys = event types, values = handler functions
			"change keyup": function(e) {

				// Your code
				var $row = $(this).fields();
				var Volume = $row["Volume2"].toNumber();
				var Concentration = $row["Concentration2"].toNumber();
				var Total = Volume * Concentration;
				$row["Total2"].val(Total);
			}
		}
	);

	// Table 'ivf_semenanalysisreport' Field 'Concentration2'
	$('[data-table=ivf_semenanalysisreport][data-field=x_Concentration2]').on(
		{ // keys = event types, values = handler functions
			"change keyup": function(e) {

				// Your code
				var $row = $(this).fields();
				var Volume = $row["Volume2"].toNumber();
				var Concentration = $row["Concentration2"].toNumber();
				var Total = Volume * Concentration;
				$row["Total2"].val(Total);
			}
		}
	);

	// Table 'ivf_semenanalysisreport' Field 'ProgressiveMotility2'
	$('[data-table=ivf_semenanalysisreport][data-field=x_ProgressiveMotility2]').on(
		{ // keys = event types, values = handler functions
			"change keyup": function(e) {

				// Your code
				var $row = $(this).fields();
				var ProgressiveMotility = $row["ProgressiveMotility2"].toNumber();
				var NonProgrssiveMotile = $row["NonProgrssiveMotile2"].toNumber();
				var Immotile = 100 - ( ProgressiveMotility +  NonProgrssiveMotile);
				$row["Immotile2"].val(Immotile);
				$row["TotalProgrssiveMotile2"].val(ProgressiveMotility +  NonProgrssiveMotile);
			}
		}
	);

	// Table 'ivf_semenanalysisreport' Field 'NonProgrssiveMotile2'
	$('[data-table=ivf_semenanalysisreport][data-field=x_NonProgrssiveMotile2]').on(
		{ // keys = event types, values = handler functions
			"change keyup": function(e) {

				// Your code
				var $row = $(this).fields();
				var ProgressiveMotility = $row["ProgressiveMotility2"].toNumber();
				var NonProgrssiveMotile = $row["NonProgrssiveMotile2"].toNumber();
				var Immotile = 100 - ( ProgressiveMotility +  NonProgrssiveMotile);
				$row["Immotile2"].val(Immotile);
				$row["TotalProgrssiveMotile2"].val(ProgressiveMotility +  NonProgrssiveMotile);
			}
		}
	);

	// Table 'ivf_semenanalysisreport' Field 'MACS'
	$('[data-table=ivf_semenanalysisreport][data-field=x_MACS]').on(
		{ // keys = event types, values = handler functions
			"click": function(e) {

				// Your code
						var $row = $(this).fields();
						var MACS = $row["MACS"].value();
						if(MACS == "MACS")
						{
						  					 					 document.getElementById("Volume2").style.visibility = "visible";
							 document.getElementById("Concentration2").style.visibility = "visible";
							 document.getElementById("Total2").style.visibility = "visible";
							 document.getElementById("ProgressiveMotility2").style.visibility = "visible";
							 document.getElementById("NonProgrssiveMotile2").style.visibility = "visible";
							 document.getElementById("Immotile2").style.visibility = "visible";
							 document.getElementById("TotalProgrssiveMotile2").style.visibility = "visible";
							document.getElementById("x_Volume2").style.width = "80px";
		 					document.getElementById("x_Concentration2").style.width = "80px";
		 					document.getElementById("x_Total2").style.width = "80px";
		 					document.getElementById("x_ProgressiveMotility2").style.width = "80px";
		 					document.getElementById("x_NonProgrssiveMotile2").style.width = "80px";
		 					document.getElementById("x_Immotile2").style.width = "80px";
		 					document.getElementById("x_TotalProgrssiveMotile2").style.width = "80px";
						}else{
							 document.getElementById("x_Volume2").style.width = "0px";
							 document.getElementById("x_Concentration2").style.width = "0px";
							 document.getElementById("x_Total2").style.width = "0px";
							 document.getElementById("x_ProgressiveMotility2").style.width = "0px";
							 document.getElementById("x_NonProgrssiveMotile2").style.width = "0px";
							 document.getElementById("x_Immotile2").style.width = "0px";
							 document.getElementById("x_TotalProgrssiveMotile2").style.width = "0px";
							 document.getElementById("Volume2").style.visibility = "hidden";
							 document.getElementById("Concentration2").style.visibility = "hidden";
							 document.getElementById("Total2").style.visibility = "hidden";
							 document.getElementById("ProgressiveMotility2").style.visibility = "hidden";
							 document.getElementById("NonProgrssiveMotile2").style.visibility = "hidden";
							 document.getElementById("Immotile2").style.visibility = "hidden";
							 document.getElementById("TotalProgrssiveMotile2").style.visibility = "hidden";		
						}
			}
		}
	);

	// Table 'pres_tradenames_new' Field 'TypeOfDrug'
	$('[data-table=pres_tradenames_new][data-field=x_TypeOfDrug]').on(
		{ // keys = event types, values = handler functions
			"change onchange": function(e) {

				// Your code
						var $row = $(this).fields();
						var TypeOfDrug = $row["TypeOfDrug"].value();
						document.getElementById("Combination1").style.display = "block";
						document.getElementById("Combination2").style.display = "none";
						document.getElementById("Combination3").style.display = "none";
						document.getElementById("Combination4").style.display = "none";
						document.getElementById("Combination5").style.display = "none";
						document.getElementById("Combination6").style.display = "none";
						if(TypeOfDrug == "2")
						{
							document.getElementById("Combination2").style.display = "block";
						document.getElementById("Combination3").style.display = "block";
						document.getElementById("Combination4").style.display = "block";
						document.getElementById("Combination5").style.display = "block";
						document.getElementById("Combination6").style.display = "block";
						}
			}
		}
	);

	// Table 'pres_tradenames_new' Field 'ProductType'
	$('[data-table=pres_tradenames_new][data-field=x_ProductType]').on(
		{ // keys = event types, values = handler functions
			"change onchange": function(e) {

				// Your code
						var $row = $(this).fields();
						var ProductType = $row["ProductType"].value();
						document.getElementById("DrugDetails").style.display = "none";
						document.getElementById("Combination1").style.display = "none";
						document.getElementById("Combination2").style.display = "none";
						document.getElementById("Combination3").style.display = "none";
						document.getElementById("Combination4").style.display = "none";
						document.getElementById("Combination5").style.display = "none";
						document.getElementById("Combination6").style.display = "none";
						if(ProductType == "DRUG")
						{
							document.getElementById("DrugDetails").style.display = "block";
							document.getElementById("Combination1").style.display = "block";
						}
			}
		}
	);

	// Table 'patient_vitals' Field 'PatientSearch'
	$('[data-table=patient_vitals][data-field=x_PatientSearch]').on(
		{ // keys = event types, values = handler functions
		"change keyup": function(e) {

						// Your code
								var $row = $(this).fields();
								var Volume = $row["PatientSearch"].toNumber();
								var user = [{
									'patientId': Volume
								}];
								var jsonString = JSON.stringify(user);
								$.ajax({
									type: "GET",
									url: "ajaxinsert.php?control=patientProPictureMRN",
									data: { data: jsonString },
									cache: false,
									success: function (data) {
										let jsonObject = JSON.parse(data);
										var json = jsonObject["records"];
										for (var i = 0; i < json.length; i++) {
											var obj = json[i];
													document.getElementById('SemPatientId').innerText = 'Patient Id : ' + obj.PatientID;
													document.getElementById('SemPatientPatientName').innerText = 'Patient Name : ' + obj.first_name;
		if(obj.gender == null)
		{
			obj.gender ="";
		}
		if(obj.blood_group == null)
		{
			obj.blood_group ="";
		}
		if(obj.Age == null)
		{
			obj.Age ="";
		}
		if(obj.mobile_no == null)
		{
			obj.mobile_no ="";
		}
		if(obj.PEmail == null)
		{
			obj.PEmail ="";
		}
		if(obj.mrnNo == null)
		{
			obj.mrnNo ="";
		}
													document.getElementById('SemPatientGender').innerText = 'Gender : ' + obj.gender;
													document.getElementById('SemPatientBloodGroup').innerText = 'Blood Group : ' + obj.blood_group;
													var picurl = "";
													if (obj.profilePic == "" || obj.profilePic == null) {
														picurl = "hims/profile-picture.png";
													} else {
														picurl = obj.profilePic;
													}
													document.getElementById('profilePicturePatient').src = 'uploads/' + picurl;
													document.getElementById('SemPatientAge').innerText = 'Age : ' + obj.Age;
													document.getElementById('SemPatientMobile').innerText = 'Mobile : ' + obj.mobile_no;
													document.getElementById('SemPatientEmail').innerText = 'MRN No : ' + obj.mrnNo;
		document.getElementById('x_Reception').value = obj.Reception;
		document.getElementById('x_PatientId').value = obj.patientIdOne;
		document.getElementById('x_mrnno').value = obj.mrnNo;
		document.getElementById('x_PatientName').value = obj.first_name;
		document.getElementById('x_Age').value = obj.Age;
		document.getElementById('x_Gender').value = obj.gender;
		document.getElementById('x_profilePic').value = picurl;
		document.getElementById('x_PatID').value = obj.PatientID;
		document.getElementById('x_MobileNumber').value = obj.mobile_no;
										}
									}
								});		
					}
		}
	);

	// Table 'patient_opd_follow_up' Field 'PatientSearch'
	$('[data-table=patient_opd_follow_up][data-field=x_PatientSearch]').on(
		{ // keys = event types, values = handler functions
		"change keyup": function(e) {

						// Your code
								var $row = $(this).fields();
								var Volume = $row["PatientSearch"].toNumber();
								var user = [{
									'patientId': Volume
								}];
								var jsonString = JSON.stringify(user);
								$.ajax({
									type: "GET",
									url: "ajaxinsert.php?control=patientProPictureprocedurenotes",
									data: { data: jsonString },
									cache: false,
									success: function (data) {
										let jsonObject = JSON.parse(data);
										var json = jsonObject["records"];
										for (var i = 0; i < json.length; i++) {
											var obj = json[i];
													document.getElementById('SemPatientId').innerText = 'Patient Id : ' + obj.PatientID;
													document.getElementById('SemPatientPatientName').innerText = 'Patient Name : ' + obj.first_name;
		if(obj.gender == null)
		{
			obj.gender ="";
		}
		if(obj.blood_group == null)
		{
			obj.blood_group ="";
		}
		if(obj.Age == null)
		{
			obj.Age ="";
		}
		if(obj.mobile_no == null)
		{
			obj.mobile_no ="";
		}
		if(obj.PEmail == null)
		{
			obj.PEmail ="";
		}
		if(obj.mrnNo == null)
		{
			obj.mrnNo ="";
		}
													document.getElementById('SemPatientGender').innerText = 'Gender : ' + obj.gender;
													document.getElementById('SemPatientBloodGroup').innerText = 'Blood Group : ' + obj.blood_group;
													var picurl = "";
													if (obj.profilePic == "" || obj.profilePic == null) {
														picurl = "hims/profile-picture.png";
													} else {
														picurl = obj.profilePic;
													}
													document.getElementById('profilePicturePatient').src = 'uploads/' + picurl;
													document.getElementById('SemPatientAge').innerText = 'Age : ' + obj.Age;
													document.getElementById('SemPatientMobile').innerText = 'Mobile : ' + obj.mobile_no;
													document.getElementById('SemPatientEmail').innerText = 'MRN No : ' + obj.mrnNo;
		document.getElementById('x_Reception').value = obj.Reception;
		document.getElementById('x_PatientId').value = obj.patientIdOne;
		document.getElementById('x_mrnno').value = obj.mrnNo;
		document.getElementById('x_PatientName').value = obj.first_name;
		document.getElementById('x_Age').value = obj.Age;
		document.getElementById('x_Gender').value = obj.gender;
		document.getElementById('x_profilePic').value = picurl;
		document.getElementById('x_PatID').value = obj.PatientID;
		document.getElementById('x_MobileNumber').value = obj.mobile_no;
												document.getElementById('iidprocedurenotes').innerHTML  =  obj.iidprocedurenotes;
												document.getElementById('iidICSIDate').innerHTML  =  obj.iidICSIDate;
										}
									}
								});		
					}
		}
	);

	// Table 'patient_history' Field 'PatientSearch'
	$('[data-table=patient_history][data-field=x_PatientSearch]').on(
		{ // keys = event types, values = handler functions
		"change keyup": function(e) {

						// Your code
								var $row = $(this).fields();
								var Volume = $row["PatientSearch"].toNumber();
								var user = [{
									'patientId': Volume
								}];
								var jsonString = JSON.stringify(user);
								$.ajax({
									type: "GET",
									url: "ajaxinsert.php?control=patientProPictureMRN",
									data: { data: jsonString },
									cache: false,
									success: function (data) {
										let jsonObject = JSON.parse(data);
										var json = jsonObject["records"];
										for (var i = 0; i < json.length; i++) {
											var obj = json[i];
													document.getElementById('SemPatientId').innerText = 'Patient Id : ' + obj.PatientID;
													document.getElementById('SemPatientPatientName').innerText = 'Patient Name : ' + obj.first_name;
		if(obj.gender == null)
		{
			obj.gender ="";
		}
		if(obj.blood_group == null)
		{
			obj.blood_group ="";
		}
		if(obj.Age == null)
		{
			obj.Age ="";
		}
		if(obj.mobile_no == null)
		{
			obj.mobile_no ="";
		}
		if(obj.PEmail == null)
		{
			obj.PEmail ="";
		}
		if(obj.mrnNo == null)
		{
			obj.mrnNo ="";
		}
													document.getElementById('SemPatientGender').innerText = 'Gender : ' + obj.gender;
													document.getElementById('SemPatientBloodGroup').innerText = 'Blood Group : ' + obj.blood_group;
													var picurl = "";
													if (obj.profilePic == "" || obj.profilePic == null) {
														picurl = "hims/profile-picture.png";
													} else {
														picurl = obj.profilePic;
													}
													document.getElementById('profilePicturePatient').src = 'uploads/' + picurl;
													document.getElementById('SemPatientAge').innerText = 'Age : ' + obj.Age;
													document.getElementById('SemPatientMobile').innerText = 'Mobile : ' + obj.mobile_no;
													document.getElementById('SemPatientEmail').innerText = 'MRN No : ' + obj.mrnNo;
		document.getElementById('x_Reception').value = obj.Reception;
		document.getElementById('x_PatientId').value = obj.patientIdOne;
		document.getElementById('x_mrnno').value = obj.mrnNo;
		document.getElementById('x_PatientName').value = obj.first_name;
		document.getElementById('x_Age').value = obj.Age;
		document.getElementById('x_Gender').value = obj.gender;
		document.getElementById('x_profilePic').value = picurl;
		document.getElementById('x_PatID').value = obj.PatientID;
		document.getElementById('x_MobileNumber').value = obj.mobile_no;
										}
									}
								});		
					}
		}
	);

	// Table 'patient_final_diagnosis' Field 'PatientSearch'
	$('[data-table=patient_final_diagnosis][data-field=x_PatientSearch]').on(
		{ // keys = event types, values = handler functions
		"change keyup": function(e) {

						// Your code
								var $row = $(this).fields();
								var Volume = $row["PatientSearch"].toNumber();
								var user = [{
									'patientId': Volume
								}];
								var jsonString = JSON.stringify(user);
								$.ajax({
									type: "GET",
									url: "ajaxinsert.php?control=patientProPictureMRN",
									data: { data: jsonString },
									cache: false,
									success: function (data) {
										let jsonObject = JSON.parse(data);
										var json = jsonObject["records"];
										for (var i = 0; i < json.length; i++) {
											var obj = json[i];
													document.getElementById('SemPatientId').innerText = 'Patient Id : ' + obj.PatientID;
													document.getElementById('SemPatientPatientName').innerText = 'Patient Name : ' + obj.first_name;
		if(obj.gender == null)
		{
			obj.gender ="";
		}
		if(obj.blood_group == null)
		{
			obj.blood_group ="";
		}
		if(obj.Age == null)
		{
			obj.Age ="";
		}
		if(obj.mobile_no == null)
		{
			obj.mobile_no ="";
		}
		if(obj.PEmail == null)
		{
			obj.PEmail ="";
		}
		if(obj.mrnNo == null)
		{
			obj.mrnNo ="";
		}
													document.getElementById('SemPatientGender').innerText = 'Gender : ' + obj.gender;
													document.getElementById('SemPatientBloodGroup').innerText = 'Blood Group : ' + obj.blood_group;
													var picurl = "";
													if (obj.profilePic == "" || obj.profilePic == null) {
														picurl = "hims/profile-picture.png";
													} else {
														picurl = obj.profilePic;
													}
													document.getElementById('profilePicturePatient').src = 'uploads/' + picurl;
													document.getElementById('SemPatientAge').innerText = 'Age : ' + obj.Age;
													document.getElementById('SemPatientMobile').innerText = 'Mobile : ' + obj.mobile_no;
													document.getElementById('SemPatientEmail').innerText = 'MRN No : ' + obj.mrnNo;
		document.getElementById('x_Reception').value = obj.Reception;
		document.getElementById('x_PatientId').value = obj.patientIdOne;
		document.getElementById('x_mrnno').value = obj.mrnNo;
		document.getElementById('x_PatientName').value = obj.first_name;
		document.getElementById('x_Age').value = obj.Age;
		document.getElementById('x_Gender').value = obj.gender;
		document.getElementById('x_profilePic').value = picurl;
		document.getElementById('x_PatID').value = obj.PatientID;
		document.getElementById('x_MobileNumber').value = obj.mobile_no;
										}
									}
								});		
					}
		}
	);

	// Table 'patient_follow_up' Field 'PatientSearch'
	$('[data-table=patient_follow_up][data-field=x_PatientSearch]').on(
		{ // keys = event types, values = handler functions
		"change keyup": function(e) {

						// Your code
								var $row = $(this).fields();
								var Volume = $row["PatientSearch"].toNumber();
								var user = [{
									'patientId': Volume
								}];
								var jsonString = JSON.stringify(user);
								$.ajax({
									type: "GET",
									url: "ajaxinsert.php?control=patientProPictureMRN",
									data: { data: jsonString },
									cache: false,
									success: function (data) {
										let jsonObject = JSON.parse(data);
										var json = jsonObject["records"];
										for (var i = 0; i < json.length; i++) {
											var obj = json[i];
													document.getElementById('SemPatientId').innerText = 'Patient Id : ' + obj.PatientID;
													document.getElementById('SemPatientPatientName').innerText = 'Patient Name : ' + obj.first_name;
		if(obj.gender == null)
		{
			obj.gender ="";
		}
		if(obj.blood_group == null)
		{
			obj.blood_group ="";
		}
		if(obj.Age == null)
		{
			obj.Age ="";
		}
		if(obj.mobile_no == null)
		{
			obj.mobile_no ="";
		}
		if(obj.PEmail == null)
		{
			obj.PEmail ="";
		}
		if(obj.mrnNo == null)
		{
			obj.mrnNo ="";
		}
													document.getElementById('SemPatientGender').innerText = 'Gender : ' + obj.gender;
													document.getElementById('SemPatientBloodGroup').innerText = 'Blood Group : ' + obj.blood_group;
													var picurl = "";
													if (obj.profilePic == "" || obj.profilePic == null) {
														picurl = "hims/profile-picture.png";
													} else {
														picurl = obj.profilePic;
													}
													document.getElementById('profilePicturePatient').src = 'uploads/' + picurl;
													document.getElementById('SemPatientAge').innerText = 'Age : ' + obj.Age;
													document.getElementById('SemPatientMobile').innerText = 'Mobile : ' + obj.mobile_no;
													document.getElementById('SemPatientEmail').innerText = 'MRN No : ' + obj.mrnNo;
		document.getElementById('x_Reception').value = obj.Reception;
		document.getElementById('x_PatientId').value = obj.patientIdOne;
		document.getElementById('x_mrnno').value = obj.mrnNo;
		document.getElementById('x_PatientName').value = obj.first_name;
		document.getElementById('x_Age').value = obj.Age;
		document.getElementById('x_Gender').value = obj.gender;
		document.getElementById('x_profilePic').value = picurl;
		document.getElementById('x_PatID').value = obj.PatientID;
		document.getElementById('x_MobileNumber').value = obj.mobile_no;
										}
									}
								});		
					}
		}
	);

	// Table 'patient_ot_delivery_register' Field 'PatientSearch'
	$('[data-table=patient_ot_delivery_register][data-field=x_PatientSearch]').on(
		{ // keys = event types, values = handler functions
		"change keyup": function(e) {

						// Your code
								var $row = $(this).fields();
								var Volume = $row["PatientSearch"].toNumber();
								var user = [{
									'patientId': Volume
								}];
								var jsonString = JSON.stringify(user);
								$.ajax({
									type: "GET",
									url: "ajaxinsert.php?control=patientProPictureMRN",
									data: { data: jsonString },
									cache: false,
									success: function (data) {
										let jsonObject = JSON.parse(data);
										var json = jsonObject["records"];
										for (var i = 0; i < json.length; i++) {
											var obj = json[i];
													document.getElementById('SemPatientId').innerText = 'Patient Id : ' + obj.PatientID;
													document.getElementById('SemPatientPatientName').innerText = 'Patient Name : ' + obj.first_name;
		if(obj.gender == null)
		{
			obj.gender ="";
		}
		if(obj.blood_group == null)
		{
			obj.blood_group ="";
		}
		if(obj.Age == null)
		{
			obj.Age ="";
		}
		if(obj.mobile_no == null)
		{
			obj.mobile_no ="";
		}
		if(obj.PEmail == null)
		{
			obj.PEmail ="";
		}
		if(obj.mrnNo == null)
		{
			obj.mrnNo ="";
		}
													document.getElementById('SemPatientGender').innerText = 'Gender : ' + obj.gender;
													document.getElementById('SemPatientBloodGroup').innerText = 'Blood Group : ' + obj.blood_group;
													var picurl = "";
													if (obj.profilePic == "" || obj.profilePic == null) {
														picurl = "hims/profile-picture.png";
													} else {
														picurl = obj.profilePic;
													}
													document.getElementById('profilePicturePatient').src = 'uploads/' + picurl;
													document.getElementById('SemPatientAge').innerText = 'Age : ' + obj.Age;
													document.getElementById('SemPatientMobile').innerText = 'Mobile : ' + obj.mobile_no;
													document.getElementById('SemPatientEmail').innerText = 'MRN No : ' + obj.mrnNo;
		document.getElementById('x_Reception').value = obj.Reception;
		document.getElementById('x_PatientID').value = obj.patientIdOne;
		document.getElementById('x_PId').value = obj.patientIdOne;
		document.getElementById('x_mrnno').value = obj.mrnNo;
		document.getElementById('x_PatientName').value = obj.first_name;
		document.getElementById('x_Age').value = obj.Age;
		document.getElementById('x_Gender').value = obj.gender;
		document.getElementById('x_profilePic').value = picurl;
		document.getElementById('x_PatID').value = obj.PatientID;
		document.getElementById('x_MobileNumber').value = obj.mobile_no;
										}
									}
								});		
					}
		}
	);

	// Table 'patient_provisional_diagnosis' Field 'PatientSearch'
	$('[data-table=patient_provisional_diagnosis][data-field=x_PatientSearch]').on(
		{ // keys = event types, values = handler functions
		"change keyup": function(e) {

						// Your code
								var $row = $(this).fields();
								var Volume = $row["PatientSearch"].toNumber();
								var user = [{
									'patientId': Volume
								}];
								var jsonString = JSON.stringify(user);
								$.ajax({
									type: "GET",
									url: "ajaxinsert.php?control=patientProPictureMRN",
									data: { data: jsonString },
									cache: false,
									success: function (data) {
										let jsonObject = JSON.parse(data);
										var json = jsonObject["records"];
										for (var i = 0; i < json.length; i++) {
											var obj = json[i];
													document.getElementById('SemPatientId').innerText = 'Patient Id : ' + obj.PatientID;
													document.getElementById('SemPatientPatientName').innerText = 'Patient Name : ' + obj.first_name;
		if(obj.gender == null)
		{
			obj.gender ="";
		}
		if(obj.blood_group == null)
		{
			obj.blood_group ="";
		}
		if(obj.Age == null)
		{
			obj.Age ="";
		}
		if(obj.mobile_no == null)
		{
			obj.mobile_no ="";
		}
		if(obj.PEmail == null)
		{
			obj.PEmail ="";
		}
		if(obj.mrnNo == null)
		{
			obj.mrnNo ="";
		}
													document.getElementById('SemPatientGender').innerText = 'Gender : ' + obj.gender;
													document.getElementById('SemPatientBloodGroup').innerText = 'Blood Group : ' + obj.blood_group;
													var picurl = "";
													if (obj.profilePic == "" || obj.profilePic == null) {
														picurl = "hims/profile-picture.png";
													} else {
														picurl = obj.profilePic;
													}
													document.getElementById('profilePicturePatient').src = 'uploads/' + picurl;
													document.getElementById('SemPatientAge').innerText = 'Age : ' + obj.Age;
													document.getElementById('SemPatientMobile').innerText = 'Mobile : ' + obj.mobile_no;
													document.getElementById('SemPatientEmail').innerText = 'MRN No : ' + obj.mrnNo;
		document.getElementById('x_Reception').value = obj.Reception;
		document.getElementById('x_PatientId').value = obj.patientIdOne;
		document.getElementById('x_mrnno').value = obj.mrnNo;
		document.getElementById('x_PatientName').value = obj.first_name;
		document.getElementById('x_Age').value = obj.Age;
		document.getElementById('x_Gender').value = obj.gender;
		document.getElementById('x_profilePic').value = picurl;
		document.getElementById('x_PatID').value = obj.PatientID;
		document.getElementById('x_MobileNumber').value = obj.mobile_no;
										}
									}
								});		
					}
		}
	);

	// Table 'patient_services' Field 'Quantity'
	$('[data-table=patient_services][data-field=x_Quantity]').on(
		{ // keys = event types, values = handler functions
			"change keyup": function(e) {
			var $row = $(this).fields();
		                var ServiceSelect = $row["ServiceSelect"].toNumber();
		                if (ServiceSelect == 1) {

		                   // $row["Quantity"].value(1);
		                   // $row["Discount"].value(0);

		                    var st = $row["amount"].toNumber() *
		                        $row["Quantity"].toNumber() *
		                        (1 - $row["Discount"].toNumber());
		                    $row["SubTotal"].value(st);
		                } else {
		                    $row["Quantity"].value('');
		                    $row["Discount"].value('');
		                    $row["SubTotal"].value('');
		                }
		                addtotalSum();
			}
		}
	);

	// Table 'patient_services' Field 'Discount'
	$('[data-table=patient_services][data-field=x_Discount]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				var $row = $(this).fields();
		                var ServiceSelect = $row["ServiceSelect"].toNumber();
		                if (ServiceSelect == 1) {

		                   // $row["Quantity"].value(1);
		                   // $row["Discount"].value(0);

		                    var st = $row["amount"].toNumber() *
		                        $row["Quantity"].toNumber() *
		                        (1 - $row["Discount"].toNumber());
		                    $row["SubTotal"].value(st);
		                } else {
		                    $row["Quantity"].value('');
		                    $row["Discount"].value('');
		                    $row["SubTotal"].value('');
		                }
		                addtotalSum();
			}
		}
	);

	// Table 'patient_services' Field 'ServiceSelect'
	$('[data-table=patient_services][data-field=x_ServiceSelect]').on(
		{ // keys = event types, values = handler functions
					"click": function(e) {

						// Your code
							var $row = $(this).fields();
						var ServiceSelect = $row["ServiceSelect"].toNumber();
						if(ServiceSelect == 1)
						{
		                    $row["Quantity"].value(1);
		                    $row["Discount"].value(0);
						var st = $row["amount"].toNumber() *
							$row["Quantity"].toNumber() *
							(1 - $row["Discount"].toNumber());
						$row["SubTotal"].value(st);
						}else{
		                    $row["Quantity"].value('');
		                    $row["Discount"].value('');
		                    $row["SubTotal"].value('');
						}
						addtotalSum();
					}
		}
	);

	// Table 'patient_ot_surgery_register' Field 'PatientSearch'
	$('[data-table=patient_ot_surgery_register][data-field=x_PatientSearch]').on(
		{ // keys = event types, values = handler functions
		"change keyup": function(e) {

						// Your code
								var $row = $(this).fields();
								var Volume = $row["PatientSearch"].toNumber();
								var user = [{
									'patientId': Volume
								}];
								var jsonString = JSON.stringify(user);
								$.ajax({
									type: "GET",
									url: "ajaxinsert.php?control=patientProPictureMRN",
									data: { data: jsonString },
									cache: false,
									success: function (data) {
										let jsonObject = JSON.parse(data);
										var json = jsonObject["records"];
										for (var i = 0; i < json.length; i++) {
											var obj = json[i];
													document.getElementById('SemPatientId').innerText = 'Patient Id : ' + obj.PatientID;
													document.getElementById('SemPatientPatientName').innerText = 'Patient Name : ' + obj.first_name;
		if(obj.gender == null)
		{
			obj.gender ="";
		}
		if(obj.blood_group == null)
		{
			obj.blood_group ="";
		}
		if(obj.Age == null)
		{
			obj.Age ="";
		}
		if(obj.mobile_no == null)
		{
			obj.mobile_no ="";
		}
		if(obj.PEmail == null)
		{
			obj.PEmail ="";
		}
		if(obj.mrnNo == null)
		{
			obj.mrnNo ="";
		}
													document.getElementById('SemPatientGender').innerText = 'Gender : ' + obj.gender;
													document.getElementById('SemPatientBloodGroup').innerText = 'Blood Group : ' + obj.blood_group;
													var picurl = "";
													if (obj.profilePic == "" || obj.profilePic == null) {
														picurl = "hims/profile-picture.png";
													} else {
														picurl = obj.profilePic;
													}
													document.getElementById('profilePicturePatient').src = 'uploads/' + picurl;
													document.getElementById('SemPatientAge').innerText = 'Age : ' + obj.Age;
													document.getElementById('SemPatientMobile').innerText = 'Mobile : ' + obj.mobile_no;
													document.getElementById('SemPatientEmail').innerText = 'MRN No : ' + obj.mrnNo;
		document.getElementById('x_Reception').value = obj.Reception;
		document.getElementById('x_PatientID').value = obj.patientIdOne;
		document.getElementById('x_mrnno').value = obj.mrnNo;
		document.getElementById('x_PatientName').value = obj.first_name;
		document.getElementById('x_Age').value = obj.Age;
		document.getElementById('x_Gender').value = obj.gender;
		document.getElementById('x_profilePic').value = picurl;
		document.getElementById('x_PatID').value = obj.PatientID;
		document.getElementById('x_MobileNumber').value = obj.mobile_no;
										}
									}
								});		
					}
		}
	);

	// Table 'billing_other_voucher' Field 'ModeofPayment'
	$('[data-table=billing_other_voucher][data-field=x_ModeofPayment]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
						var $row = $(this).fields();
						var ModeofPayment = $row["ModeofPayment"].value();
						if(ModeofPayment=='CARD' || ModeofPayment=='PAYTM' || ModeofPayment=='NEFT')
						{
							document.getElementById("viewBankName").style.display = "block";
							document.getElementById("viewBankDetails").innerText = ModeofPayment + " Details";
						}
						else{
							document.getElementById("viewBankName").style.display = "none";
						}
			}
		}
	);

	// Table 'billing_other_voucher' Field 'PatID'
	$('[data-table=billing_other_voucher][data-field=x_PatID]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				var $row = $(this).fields();
				document.getElementById("LoadGetOPAdvance").innerHTML = "";
				var PatID = $row["PatID"].toNumber();
					var user = [{
									'patientId': PatID
								}];
								var jsonString = JSON.stringify(user);
								$.ajax({
									type: "GET",
									url: "ajaxinsert.php?control=GetOPAdvance",
									data: { data: jsonString },
									cache: false,
									success: function (data) {
										let jsonObject = JSON.parse(data);
										var json = jsonObject["records"];
											var	TotalAdvance = '';
											var	TotalBill = '';
											var	BalanceAmount = '';
										var tabbllee = '<table id="customers"><tr><th>Advance No. </th><th>Amount </th><th>Mode of Payment</th><th>Remarks</th></tr>';
										for (var i = 0; i < json.length; i++) {
											var obj = json[i];
												var tabbllee = tabbllee + '  <tr><td>'+ obj.AdvanceNo +'</td> <td>'+ obj.Amount +'</td> <td>'+ obj.ModeofPayment +'</td> <td>'+ obj.Remarks +'</td></tr>';
													TotalAdvance = obj.TotalAdvance;
													TotalBill = obj.TotalBill;
													BalanceAmount = obj.BalanceAmount;
										}
										var tabbllee = tabbllee + '</table>';
										var tabbllee = tabbllee + '<table style="width:100%"><tr><th>Total Advance = '+TotalAdvance+'</th><th>Total Bill = '+ TotalBill +'</th><th>Balance Amount = '+ BalanceAmount +'</th></tr></table>';
										if(json.length > 0)
										{
											document.getElementById("LoadGetOPAdvance").innerHTML =  tabbllee;
										}
									}
								});
			}
		}
	);

	// Table '_appointment_scheduler' Field 'PatientType'
	$('[data-table=_appointment_scheduler][data-field=x_PatientType]').on(
		{ // keys = event types, values = handler functions
			"click": function(e) {

				// Your code
				var $row = $(this).fields();
		                 var dobVal = $row["PatientType"].value();
		                if(dobVal == "New")
		                {
		$('#addNewPatient').show();
		                }else{$('#addNewPatient').hide();}
			}
		}
	);

	// Table '_appointment_scheduler' Field 'Dob'
	$('[data-table=_appointment_scheduler][data-field=x_Dob]').on(
		{ // keys = event types, values = handler functions
		"change keyup paste mouseup onChangeMonthYear onClose onSelect create picker_event hide changeDate": function (e) {
						var $row = $(this).fields();
		                var dobVal = $row["Dob"];
		                var dobp = dobVal[0].value;
		                var parts = dobp.split('/');
		                var dob = new Date(parts[2], parts[1] - 1, parts[0]);
						var now = new Date();
				  var today = new Date(now.getYear(),now.getMonth(),now.getDate());
				  var yearNow = now.getYear();
				  var monthNow = now.getMonth();
				  var dateNow = now.getDate();

				 // //var dob = new Date(dateString.substring(6,10),
				 // //                   dateString.substring(0,2)-1,                   
				 // //                   dateString.substring(3,5)                  
				 // //                   );

				  var yearDob = dob.getYear();
				  var monthDob = dob.getMonth();
				  var dateDob = dob.getDate();
				  var age = {};
				  var ageString = "";
				  var yearString = "";
				  var monthString = "";
				  var dayString = "";
				  yearAge = yearNow - yearDob;
				  if (monthNow >= monthDob)
				    var monthAge = monthNow - monthDob;
				  else {
				    yearAge--;
				    var monthAge = 12 + monthNow -monthDob;
				  }
				  if (dateNow >= dateDob)
				    var dateAge = dateNow - dateDob;
				  else {
				    monthAge--;
				    var dateAge = 31 + dateNow - dateDob;
				    if (monthAge < 0) {
				      monthAge = 11;
				      yearAge--;
				    }
				  }
				  age = {
				      years: yearAge,
				      months: monthAge,
				      days: dateAge
				      };
				  if ( age.years > 1 ) yearString = " years";
				  else yearString = " year";
				  if ( age.months> 1 ) monthString = " months";
				  else monthString = " month";
				  if ( age.days > 1 ) dayString = " days";
				  else dayString = " day";
				  if ( (age.years > 0) && (age.months > 0) && (age.days > 0) )
				  {
							  if(age.years < 5)
							  {
									ageString = age.years + yearString + ", " + age.months + monthString + ", and " + age.days + dayString + " old.";
							  }else{
								   ageString = age.years + yearString + ", and " + age.months + monthString + " old.";
							  }
				   }
				  else if ( (age.years == 0) && (age.months == 0) && (age.days > 0) )
				    ageString = "Only " + age.days + dayString + " old!";
				  else if ( (age.years > 0) && (age.months == 0) && (age.days == 0) )
				    ageString = age.years + yearString + " old. Happy Birthday!!";
				  else if ( (age.years > 0) && (age.months > 0) && (age.days == 0) )
				    ageString = age.years + yearString + " and " + age.months + monthString + " old.";
				  else if ( (age.years == 0) && (age.months > 0) && (age.days > 0) )
				    ageString = age.months + monthString + " and " + age.days + dayString + " old.";
				  else if ( (age.years > 0) && (age.months == 0) && (age.days > 0) )
				    ageString = age.years + yearString + " and " + age.days + dayString + " old.";
				  else if ( (age.years == 0) && (age.months > 0) && (age.days == 0) )
				    ageString = age.months + monthString + " old.";
				  else ageString = " ";

				  //return ageString;
		                $row["Age"].value(ageString);
				}
		}
	);

	// Table '_appointment_scheduler' Field 'Age'
	$('[data-table=_appointment_scheduler][data-field=x_Age]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {
		   var $row = $(this).fields();
		                var date = new Date();
		                var AgeY = $row["Age"].toNumber();
		                date.setFullYear(date.getFullYear() - AgeY);
		                var CDob = date.getDate() + '/' + ("0" + (date.getMonth() + 1)).slice(-2) + '/' + date.getFullYear();
		                $row["Dob"].val(CDob);
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'LMP'
	$('[data-table=ivf_stimulation_chart][data-field=x_LMP]').on(
		{ // keys = event types, values = handler functions
		            "change keyup paste mouseup onChangeMonthYear onClose onSelect create picker_event hide changeDate": function (e) {
						var $row = $(this).fields();
		                var dobVal = $row["LMP"];
				}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'SCDate'
	$('[data-table=ivf_stimulation_chart][data-field=x_SCDate]').on(
		{ // keys = event types, values = handler functions
		            "change keyup paste mouseup onChangeMonthYear onClose onSelect create picker_event hide changeDate": function (e) {
						var $row = $(this).fields();
		                var dobVal = $row["SCDate"];
		                var dobp = dobVal[0].value;
		                var parts = dobp.split('/');
		                var dob = new Date(parts[2], parts[1] - 1, parts[0]);
						var now = new Date();
				  var today = new Date(now.getYear(),now.getMonth(),now.getDate());
				  var yearNow = now.getYear();
				  var monthNow = now.getMonth();
				  var dateNow = now.getDate();
				  var yearDob = dob.getYear();
				  var monthDob = dob.getMonth();
				  var dateDob = dob.getDate();
				  var age = {};
				  var ageString = "";
				  var yearString = "";
				  var monthString = "";
				  var dayString = "";

					//	dob = addDays(dob, 1);
						$row["StChDate1"].value(("0" + dob.getDate()).slice(-2)  + '/' + ("0" + (dob.getMonth() + 1)).slice(-2) + '/' + dob.getFullYear());
										dob = addDays(dob, 1);
						$row["StChDate2"].value(("0" + dob.getDate()).slice(-2)  + '/' + ("0" + (dob.getMonth() + 1)).slice(-2) + '/' + dob.getFullYear());
										dob = addDays(dob, 1);
						$row["StChDate3"].value(("0" + dob.getDate()).slice(-2)  + '/' + ("0" + (dob.getMonth() + 1)).slice(-2) + '/' + dob.getFullYear());
										dob = addDays(dob, 1);
						$row["StChDate4"].value(("0" + dob.getDate()).slice(-2)  + '/' + ("0" + (dob.getMonth() + 1)).slice(-2) + '/' + dob.getFullYear());
										dob = addDays(dob, 1);
						$row["StChDate5"].value(("0" + dob.getDate()).slice(-2)  + '/' + ("0" + (dob.getMonth() + 1)).slice(-2) + '/' + dob.getFullYear());
										dob = addDays(dob, 1);
						$row["StChDate6"].value(("0" + dob.getDate()).slice(-2)  + '/' + ("0" + (dob.getMonth() + 1)).slice(-2) + '/' + dob.getFullYear());
										dob = addDays(dob, 1);
						$row["StChDate7"].value(("0" + dob.getDate()).slice(-2)  + '/' + ("0" + (dob.getMonth() + 1)).slice(-2) + '/' + dob.getFullYear());
										dob = addDays(dob, 1);
						$row["StChDate8"].value(("0" + dob.getDate()).slice(-2)  + '/' + ("0" + (dob.getMonth() + 1)).slice(-2) + '/' + dob.getFullYear());
										dob = addDays(dob, 1);
						$row["StChDate9"].value(("0" + dob.getDate()).slice(-2)  + '/' + ("0" + (dob.getMonth() + 1)).slice(-2) + '/' + dob.getFullYear());
										dob = addDays(dob, 1);
						$row["StChDate10"].value(("0" + dob.getDate()).slice(-2)  + '/' + ("0" + (dob.getMonth() + 1)).slice(-2) + '/' + dob.getFullYear());
						dob = addDays(dob, 1);
						$row["StChDate11"].value(("0" + dob.getDate()).slice(-2)  + '/' + ("0" + (dob.getMonth() + 1)).slice(-2) + '/' + dob.getFullYear());
						dob = addDays(dob, 1);
						$row["StChDate12"].value(("0" + dob.getDate()).slice(-2)  + '/' + ("0" + (dob.getMonth() + 1)).slice(-2) + '/' + dob.getFullYear());
						dob = addDays(dob, 1);
						$row["StChDate13"].value(("0" + dob.getDate()).slice(-2)  + '/' + ("0" + (dob.getMonth() + 1)).slice(-2) + '/' + dob.getFullYear());
						dob = addDays(dob, 1);
						$row["StChDate14"].value(("0" + dob.getDate()).slice(-2)  + '/' + ("0" + (dob.getMonth() + 1)).slice(-2) + '/' + dob.getFullYear());
						dob = addDays(dob, 1);
						$row["StChDate15"].value(("0" + dob.getDate()).slice(-2)  + '/' + ("0" + (dob.getMonth() + 1)).slice(-2) + '/' + dob.getFullYear());
						dob = addDays(dob, 1);
						$row["StChDate16"].value(("0" + dob.getDate()).slice(-2)  + '/' + ("0" + (dob.getMonth() + 1)).slice(-2) + '/' + dob.getFullYear());
						dob = addDays(dob, 1);
						$row["StChDate17"].value(("0" + dob.getDate()).slice(-2)  + '/' + ("0" + (dob.getMonth() + 1)).slice(-2) + '/' + dob.getFullYear());
						dob = addDays(dob, 1);
						$row["StChDate18"].value(("0" + dob.getDate()).slice(-2)  + '/' + ("0" + (dob.getMonth() + 1)).slice(-2) + '/' + dob.getFullYear());
						dob = addDays(dob, 1);
						$row["StChDate19"].value(("0" + dob.getDate()).slice(-2)  + '/' + ("0" + (dob.getMonth() + 1)).slice(-2) + '/' + dob.getFullYear());
						dob = addDays(dob, 1);
						$row["StChDate20"].value(("0" + dob.getDate()).slice(-2)  + '/' + ("0" + (dob.getMonth() + 1)).slice(-2) + '/' + dob.getFullYear());
						dob = addDays(dob, 1);
						$row["StChDate21"].value(("0" + dob.getDate()).slice(-2)  + '/' + ("0" + (dob.getMonth() + 1)).slice(-2) + '/' + dob.getFullYear());
						dob = addDays(dob, 1);
						$row["StChDate22"].value(("0" + dob.getDate()).slice(-2)  + '/' + ("0" + (dob.getMonth() + 1)).slice(-2) + '/' + dob.getFullYear());
						dob = addDays(dob, 1);
						$row["StChDate23"].value(("0" + dob.getDate()).slice(-2)  + '/' + ("0" + (dob.getMonth() + 1)).slice(-2) + '/' + dob.getFullYear());
						dob = addDays(dob, 1);
						$row["StChDate24"].value(("0" + dob.getDate()).slice(-2)  + '/' + ("0" + (dob.getMonth() + 1)).slice(-2) + '/' + dob.getFullYear());
						dob = addDays(dob, 1);
						$row["StChDate25"].value(("0" + dob.getDate()).slice(-2)  + '/' + ("0" + (dob.getMonth() + 1)).slice(-2) + '/' + dob.getFullYear());
						var dobVal = $row["SCDate"];
						var dobp = dobVal[0].value;
						var parts = dobp.split('/');
						var dobVal1 = $row["LMP"];
						var dobp1 = dobVal1[0].value;
						var parts1 = dobp1.split('/');
						var date2 = new Date(parts[2], parts[1] - 1, parts[0]);
						var date1 = new Date(parts1[2], parts1[1] - 1, parts1[0]);
						var Difference_In_Time = date2.getTime() - date1.getTime();

						// To calculate the no. of days between two dates 
						var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24); 
						var i = parseInt(Difference_In_Days);
						$row["CycleDay1"].value("C" + (i + 1));
						$row["CycleDay2"].value("C" + (i + 2));
						$row["CycleDay3"].value("C" + (i + 3));
						$row["CycleDay4"].value("C" + (i + 4));
						$row["CycleDay5"].value("C" + (i + 5));
						$row["CycleDay6"].value("C" + (i + 6));
						$row["CycleDay7"].value("C" + (i + 7));
						$row["CycleDay8"].value("C" + (i + 8));
						$row["CycleDay9"].value("C" + (i + 9));
						$row["CycleDay10"].value("C" + (i + 10));
						$row["CycleDay11"].value("C" + (i + 11));
						$row["CycleDay12"].value("C" + (i + 12));
						$row["CycleDay13"].value("C" + (i + 13));
						$row["CycleDay14"].value("C" + (i + 14));
						$row["CycleDay15"].value("C" + (i + 15));
						$row["CycleDay16"].value("C" + (i + 16));
						$row["CycleDay17"].value("C" + (i + 17));
						$row["CycleDay18"].value("C" + (i + 18));
						$row["CycleDay19"].value("C" + (i + 19));
						$row["CycleDay20"].value("C" + (i + 20));
						$row["CycleDay21"].value("C" + (i + 21));
						$row["CycleDay22"].value("C" + (i + 22));
						$row["CycleDay23"].value("C" + (i + 23));
						$row["CycleDay24"].value("C" + (i + 24));
						$row["CycleDay25"].value("C" + (i + 25));
					$row["StimulationDay1"].value("S1");
		  $row["StimulationDay2"].value("S2");
		  $row["StimulationDay3"].value("S3");
		  $row["StimulationDay4"].value("S4");
		  $row["StimulationDay5"].value("S5");
		  $row["StimulationDay6"].value("S6");
		  $row["StimulationDay7"].value("S7");
		  $row["StimulationDay8"].value("S8");
		  $row["StimulationDay9"].value("S9");
		  $row["StimulationDay10"].value("S10");
		  $row["StimulationDay11"].value("S11");
		  $row["StimulationDay12"].value("S12");
		  $row["StimulationDay13"].value("S13");
		  $row["StimulationDay14"].value("S14");
		  $row["StimulationDay15"].value("S15");
		  $row["StimulationDay16"].value("S16");
		  $row["StimulationDay17"].value("S17");
		  $row["StimulationDay18"].value("S18");
		  $row["StimulationDay19"].value("S19");
		  $row["StimulationDay20"].value("S20");
		  $row["StimulationDay21"].value("S21");
		  $row["StimulationDay22"].value("S22");
		  $row["StimulationDay23"].value("S23");
		  $row["StimulationDay24"].value("S24");
		  $row["StimulationDay25"].value("S25");
				}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'Tablet1'
	$('[data-table=ivf_stimulation_chart][data-field=x_Tablet1]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDoseofGonadotropins();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'Tablet2'
	$('[data-table=ivf_stimulation_chart][data-field=x_Tablet2]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDoseofGonadotropins();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'Tablet3'
	$('[data-table=ivf_stimulation_chart][data-field=x_Tablet3]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDoseofGonadotropins();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'Tablet4'
	$('[data-table=ivf_stimulation_chart][data-field=x_Tablet4]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDoseofGonadotropins();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'Tablet5'
	$('[data-table=ivf_stimulation_chart][data-field=x_Tablet5]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDoseofGonadotropins();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'Tablet6'
	$('[data-table=ivf_stimulation_chart][data-field=x_Tablet6]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDoseofGonadotropins();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'Tablet7'
	$('[data-table=ivf_stimulation_chart][data-field=x_Tablet7]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDoseofGonadotropins();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'Tablet8'
	$('[data-table=ivf_stimulation_chart][data-field=x_Tablet8]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDoseofGonadotropins();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'Tablet9'
	$('[data-table=ivf_stimulation_chart][data-field=x_Tablet9]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDoseofGonadotropins();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'Tablet10'
	$('[data-table=ivf_stimulation_chart][data-field=x_Tablet10]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDoseofGonadotropins();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'Tablet11'
	$('[data-table=ivf_stimulation_chart][data-field=x_Tablet11]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDoseofGonadotropins();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'Tablet12'
	$('[data-table=ivf_stimulation_chart][data-field=x_Tablet12]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDoseofGonadotropins();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'Tablet13'
	$('[data-table=ivf_stimulation_chart][data-field=x_Tablet13]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDoseofGonadotropins();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'RFSH1'
	$('[data-table=ivf_stimulation_chart][data-field=x_RFSH1]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDoseofRFSHHMG();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'RFSH2'
	$('[data-table=ivf_stimulation_chart][data-field=x_RFSH2]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDoseofRFSHHMG();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'RFSH3'
	$('[data-table=ivf_stimulation_chart][data-field=x_RFSH3]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDoseofRFSHHMG();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'RFSH4'
	$('[data-table=ivf_stimulation_chart][data-field=x_RFSH4]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDoseofRFSHHMG();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'RFSH5'
	$('[data-table=ivf_stimulation_chart][data-field=x_RFSH5]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDoseofRFSHHMG();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'RFSH6'
	$('[data-table=ivf_stimulation_chart][data-field=x_RFSH6]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDoseofRFSHHMG();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'RFSH7'
	$('[data-table=ivf_stimulation_chart][data-field=x_RFSH7]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDoseofRFSHHMG();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'RFSH8'
	$('[data-table=ivf_stimulation_chart][data-field=x_RFSH8]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDoseofRFSHHMG();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'RFSH9'
	$('[data-table=ivf_stimulation_chart][data-field=x_RFSH9]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDoseofRFSHHMG();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'RFSH10'
	$('[data-table=ivf_stimulation_chart][data-field=x_RFSH10]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDoseofRFSHHMG();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'RFSH11'
	$('[data-table=ivf_stimulation_chart][data-field=x_RFSH11]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDoseofRFSHHMG();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'RFSH12'
	$('[data-table=ivf_stimulation_chart][data-field=x_RFSH12]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDoseofRFSHHMG();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'RFSH13'
	$('[data-table=ivf_stimulation_chart][data-field=x_RFSH13]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDoseofRFSHHMG();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'HMG1'
	$('[data-table=ivf_stimulation_chart][data-field=x_HMG1]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDoseofRFSHHMG();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'HMG2'
	$('[data-table=ivf_stimulation_chart][data-field=x_HMG2]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDoseofRFSHHMG();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'HMG3'
	$('[data-table=ivf_stimulation_chart][data-field=x_HMG3]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDoseofRFSHHMG();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'HMG4'
	$('[data-table=ivf_stimulation_chart][data-field=x_HMG4]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDoseofRFSHHMG();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'HMG5'
	$('[data-table=ivf_stimulation_chart][data-field=x_HMG5]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDoseofRFSHHMG();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'HMG6'
	$('[data-table=ivf_stimulation_chart][data-field=x_HMG6]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDoseofRFSHHMG();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'HMG7'
	$('[data-table=ivf_stimulation_chart][data-field=x_HMG7]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDoseofRFSHHMG();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'HMG8'
	$('[data-table=ivf_stimulation_chart][data-field=x_HMG8]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDoseofRFSHHMG();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'HMG9'
	$('[data-table=ivf_stimulation_chart][data-field=x_HMG9]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDoseofRFSHHMG();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'HMG10'
	$('[data-table=ivf_stimulation_chart][data-field=x_HMG10]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDoseofRFSHHMG();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'HMG11'
	$('[data-table=ivf_stimulation_chart][data-field=x_HMG11]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDoseofRFSHHMG();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'HMG12'
	$('[data-table=ivf_stimulation_chart][data-field=x_HMG12]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDoseofRFSHHMG();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'HMG13'
	$('[data-table=ivf_stimulation_chart][data-field=x_HMG13]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDoseofRFSHHMG();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'GnRH1'
	$('[data-table=ivf_stimulation_chart][data-field=x_GnRH1]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDaysofGnRH();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'GnRH2'
	$('[data-table=ivf_stimulation_chart][data-field=x_GnRH2]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDaysofGnRH();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'GnRH3'
	$('[data-table=ivf_stimulation_chart][data-field=x_GnRH3]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDaysofGnRH();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'GnRH4'
	$('[data-table=ivf_stimulation_chart][data-field=x_GnRH4]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDaysofGnRH();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'GnRH5'
	$('[data-table=ivf_stimulation_chart][data-field=x_GnRH5]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDaysofGnRH();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'GnRH6'
	$('[data-table=ivf_stimulation_chart][data-field=x_GnRH6]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDaysofGnRH();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'GnRH7'
	$('[data-table=ivf_stimulation_chart][data-field=x_GnRH7]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDaysofGnRH();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'GnRH8'
	$('[data-table=ivf_stimulation_chart][data-field=x_GnRH8]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDaysofGnRH();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'GnRH9'
	$('[data-table=ivf_stimulation_chart][data-field=x_GnRH9]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDaysofGnRH();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'GnRH10'
	$('[data-table=ivf_stimulation_chart][data-field=x_GnRH10]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDaysofGnRH();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'GnRH11'
	$('[data-table=ivf_stimulation_chart][data-field=x_GnRH11]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDaysofGnRH();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'GnRH12'
	$('[data-table=ivf_stimulation_chart][data-field=x_GnRH12]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDaysofGnRH();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'GnRH13'
	$('[data-table=ivf_stimulation_chart][data-field=x_GnRH13]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateDaysofGnRH();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'TreatmentCancel'
	$('[data-table=ivf_stimulation_chart][data-field=x_TreatmentCancel]').on(
		{ // keys = event types, values = handler functions
			"click": function(e) {

				// Your code
					var $row = $(this).fields();
						var TreatmentCancel = $row["TreatmentCancel"].value();
						if(TreatmentCancel=='Yes')
						{
		document.getElementById("CancelReason").style.visibility = "visible";
						}else{
		document.getElementById("CancelReason").style.visibility = "hidden";
						}
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'Projectron'
	$('[data-table=ivf_stimulation_chart][data-field=x_Projectron]').on(
		{ // keys = event types, values = handler functions
			"click": function(e) {

				// Your code
							var $row = $(this).fields();
						var TreatmentCancel = $row["Projectron"].value();
						if(TreatmentCancel=='Yes')
						{
							var ProgesteroneAdminTable = document.getElementById("ProgesteroneAdminTable").style.display = "block";
						}else{
							var ProgesteroneAdminTable = document.getElementById("ProgesteroneAdminTable").style.display = "none";
						}
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'RFSH14'
	$('[data-table=ivf_stimulation_chart][data-field=x_RFSH14]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
					calculateDoseofRFSHHMG();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'RFSH15'
	$('[data-table=ivf_stimulation_chart][data-field=x_RFSH15]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
					calculateDoseofRFSHHMG();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'RFSH16'
	$('[data-table=ivf_stimulation_chart][data-field=x_RFSH16]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
					calculateDoseofRFSHHMG();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'RFSH17'
	$('[data-table=ivf_stimulation_chart][data-field=x_RFSH17]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
					calculateDoseofRFSHHMG();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'RFSH18'
	$('[data-table=ivf_stimulation_chart][data-field=x_RFSH18]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
					calculateDoseofRFSHHMG();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'RFSH19'
	$('[data-table=ivf_stimulation_chart][data-field=x_RFSH19]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
					calculateDoseofRFSHHMG();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'RFSH20'
	$('[data-table=ivf_stimulation_chart][data-field=x_RFSH20]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
					calculateDoseofRFSHHMG();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'RFSH21'
	$('[data-table=ivf_stimulation_chart][data-field=x_RFSH21]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
					calculateDoseofRFSHHMG();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'RFSH22'
	$('[data-table=ivf_stimulation_chart][data-field=x_RFSH22]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
					calculateDoseofRFSHHMG();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'RFSH23'
	$('[data-table=ivf_stimulation_chart][data-field=x_RFSH23]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
					calculateDoseofRFSHHMG();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'RFSH24'
	$('[data-table=ivf_stimulation_chart][data-field=x_RFSH24]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
					calculateDoseofRFSHHMG();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'RFSH25'
	$('[data-table=ivf_stimulation_chart][data-field=x_RFSH25]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
					calculateDoseofRFSHHMG();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'GnRH14'
	$('[data-table=ivf_stimulation_chart][data-field=x_GnRH14]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
					calculateDaysofGnRH();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'GnRH15'
	$('[data-table=ivf_stimulation_chart][data-field=x_GnRH15]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
					calculateDaysofGnRH();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'GnRH16'
	$('[data-table=ivf_stimulation_chart][data-field=x_GnRH16]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
					calculateDaysofGnRH();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'GnRH17'
	$('[data-table=ivf_stimulation_chart][data-field=x_GnRH17]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
					calculateDaysofGnRH();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'GnRH18'
	$('[data-table=ivf_stimulation_chart][data-field=x_GnRH18]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
					calculateDaysofGnRH();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'GnRH19'
	$('[data-table=ivf_stimulation_chart][data-field=x_GnRH19]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
					calculateDaysofGnRH();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'GnRH20'
	$('[data-table=ivf_stimulation_chart][data-field=x_GnRH20]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
					calculateDaysofGnRH();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'GnRH21'
	$('[data-table=ivf_stimulation_chart][data-field=x_GnRH21]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
					calculateDaysofGnRH();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'GnRH22'
	$('[data-table=ivf_stimulation_chart][data-field=x_GnRH22]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
					calculateDaysofGnRH();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'GnRH23'
	$('[data-table=ivf_stimulation_chart][data-field=x_GnRH23]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
					calculateDaysofGnRH();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'GnRH24'
	$('[data-table=ivf_stimulation_chart][data-field=x_GnRH24]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
					calculateDaysofGnRH();
			}
		}
	);

	// Table 'ivf_stimulation_chart' Field 'GnRH25'
	$('[data-table=ivf_stimulation_chart][data-field=x_GnRH25]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
					calculateDaysofGnRH();
			}
		}
	);

	// Table 'ivf_ovum_pick_up_chart' Field 'ExperctedOocytes'
	$('[data-table=ivf_ovum_pick_up_chart][data-field=x_ExperctedOocytes]').on(
		{ // keys = event types, values = handler functions
			"change onchange": function(e) {

				// Your code
				var $row = $(this).fields();
				var ExperctedOocytes = $row["ExperctedOocytes"].toNumber();
				var NoOfOocytesRetrieved = $row["NoOfOocytesRetrieved"].toNumber();
				$row["OocytesRetreivalRate"].val((NoOfOocytesRetrieved/ExperctedOocytes)*100);
			}
		}
	);

	// Table 'ivf_ovum_pick_up_chart' Field 'NoOfOocytesRetrieved'
	$('[data-table=ivf_ovum_pick_up_chart][data-field=x_NoOfOocytesRetrieved]').on(
		{ // keys = event types, values = handler functions
			"change onchange": function(e) {

				// Your code
				var $row = $(this).fields();
				var ExperctedOocytes = $row["ExperctedOocytes"].toNumber();
				var NoOfOocytesRetrieved = $row["NoOfOocytesRetrieved"].toNumber();
				$row["OocytesRetreivalRate"].val((NoOfOocytesRetrieved/ExperctedOocytes)*100);
			}
		}
	);

	// Table 'ivf_embryology_chart' Field 'Day5Cryoptop'
	$('[data-table=ivf_embryology_chart][data-field=x_Day5Cryoptop]').on(
		{ // keys = event types, values = handler functions
			"change onchange": function(e) {

				// Your code
						var $row = $(this).fields();
						var End = $row["Day5Cryoptop"].value();
						if(End =="Frozen")
						{

						//	$row["EndingDay"].value("Day 0");
						//	$row["EndingState"].value(End);

						}
			}
		}
	);

	// Table 'ivf_treatment_plan' Field 'ARTCYCLE'
	$('[data-table=ivf_treatment_plan][data-field=x_ARTCYCLE]').on(
		{ // keys = event types, values = handler functions
			"click": function(e) {

				// Your code
		  document.getElementById("Treatment").style.display = "none";
		  document.getElementById("TreatmentTec").style.display = "none";
		  document.getElementById("TypeOfCycle").style.display = "none";
		  document.getElementById("SpermOrgin").style.display = "none";
		  document.getElementById("State").style.display = "none";
		  document.getElementById("Origin").style.display = "none";
		  document.getElementById("MACS").style.display = "none";
		  document.getElementById("Technique").style.display = "none";
		  document.getElementById("PgdPlanning").style.display = "none";
		  document.getElementById("IMSI").style.display = "none";
		  document.getElementById("SequentialCulture").style.display = "none";
		  document.getElementById("TimeLapse").style.display = "none";
		  document.getElementById("AH").style.display = "none";
		  document.getElementById("Weight").style.display = "none";
		  document.getElementById("BMI").style.display = "none";

		 // document.getElementById("MaleIndications").style.display = "none";
		 // document.getElementById("FemaleIndications").style.display = "none";

		 document.getElementById("TreatmentTreatment").style.display  = "none";
		   document.getElementById("Ectopic").style.display = "none";
		  document.getElementById("use").style.display = "none";
		  		if (this.value == "Intrauterine insemination(IUI)") {
		  		  document.getElementById("Treatment").style.display = "block";
		  document.getElementById("TreatmentTec").style.display = "block";
		  document.getElementById("TypeOfCycle").style.display = "block";
		  document.getElementById("SpermOrgin").style.display = "block";
		  document.getElementById("State").style.display = "block";
		  document.getElementById("Origin").style.display = "block";
		  document.getElementById("MACS").style.display = "block";
		  document.getElementById("Technique").style.display = "none";
		  document.getElementById("PgdPlanning").style.display = "none";
		  document.getElementById("IMSI").style.display = "none";
		  document.getElementById("SequentialCulture").style.display = "none";
		  document.getElementById("TimeLapse").style.display = "none";
		  document.getElementById("AH").style.display = "none";
		  document.getElementById("Weight").style.display = "none";
		  document.getElementById("BMI").style.display = "none";

		//  document.getElementById("MaleIndications").style.display = "none";
		//  document.getElementById("FemaleIndications").style.display = "none";

		  		}
		    	if (this.value == "IVF") {
		  		  document.getElementById("Treatment").style.display = "block";
		  document.getElementById("TreatmentTec").style.display = "block";
		  document.getElementById("TypeOfCycle").style.display = "block";
		  document.getElementById("SpermOrgin").style.display = "block";
		  document.getElementById("State").style.display = "block";
		  document.getElementById("Origin").style.display = "block";
		  document.getElementById("MACS").style.display = "block";
		  document.getElementById("Technique").style.display = "block";
		  document.getElementById("PgdPlanning").style.display = "block";
		  document.getElementById("IMSI").style.display = "block";
		  document.getElementById("SequentialCulture").style.display = "block";
		  document.getElementById("TimeLapse").style.display = "block";
		  document.getElementById("AH").style.display = "block";
		  document.getElementById("Weight").style.display = "block";
		  document.getElementById("BMI").style.display = "block";

		 // document.getElementById("MaleIndications").style.display = "block";
		//  document.getElementById("FemaleIndications").style.display = "block";

		    	}
		    	    	if (this.value == "Oocyte Vitrification") {
		  		  document.getElementById("Treatment").style.display = "block";
		  document.getElementById("TreatmentTec").style.display = "block";
		  document.getElementById("TypeOfCycle").style.display = "block";
		  document.getElementById("SpermOrgin").style.display = "block";
		  document.getElementById("State").style.display = "block";
		  document.getElementById("Origin").style.display = "block";
		  document.getElementById("MACS").style.display = "block";
		  document.getElementById("Technique").style.display = "block";
		  document.getElementById("PgdPlanning").style.display = "block";
		  document.getElementById("IMSI").style.display = "block";
		  document.getElementById("SequentialCulture").style.display = "block";
		  document.getElementById("TimeLapse").style.display = "block";
		  document.getElementById("AH").style.display = "block";
		  document.getElementById("Weight").style.display = "block";
		  document.getElementById("BMI").style.display = "block";

		 // document.getElementById("MaleIndications").style.display = "block";
		//  document.getElementById("FemaleIndications").style.display = "block";

		    	}
		    	    	    	if (this.value == "Egg Donation") {

		  	//	  document.getElementById("Treatment").style.display = "block";
		 // document.getElementById("TreatmentTec").style.display = "block";

		  document.getElementById("TypeOfCycle").style.display = "block";

		 // document.getElementById("SpermOrgin").style.display = "block";
		//  document.getElementById("State").style.display = "block";

		  document.getElementById("Origin").style.display = "block";
		    document.getElementById("Ectopic").style.display = "block";
		  document.getElementById("use").style.display = "block";

		//  document.getElementById("MACS").style.display = "block";
		//  document.getElementById("Technique").style.display = "block";
		//  document.getElementById("PgdPlanning").style.display = "block";
		//  document.getElementById("IMSI").style.display = "block";
		 // document.getElementById("SequentialCulture").style.display = "block";
		 // document.getElementById("TimeLapse").style.display = "block";
		 /// document.getElementById("AH").style.display = "block";
		 // document.getElementById("Weight").style.display = "block";
		 // document.getElementById("BMI").style.display = "block";
		 // document.getElementById("MaleIndications").style.display = "block";
		//  document.getElementById("FemaleIndications").style.display = "block";

		    	}
		    	if (this.value == "Frozen Embryo Transfer") {
		    	 document.getElementById("TypeOfCycle").style.display = "block";
		    	  document.getElementById("PgdPlanning").style.display = "block";
		    	  document.getElementById("TreatmentTreatment").style.display  = "block";
		    	}
		    	 if (this.value == "Evaluation cycle") {
		    	  document.getElementById("TypeOfCycle").style.display = "block";
		    	  document.getElementById("PgdPlanning").style.display = "block";
		    	  document.getElementById("TreatmentTreatment").style.display  = "block";
		    	}
			}
		}
	);

	// Table 'view_patient_services' Field 'Services'
	$('[data-table=view_patient_services][data-field=x_Services]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
								var $row = $(this).fields();
								var Services = $row["Services"].value();

								//alert(Services);
								var HospitalID  =  document.getElementById("HospitalIDDD").value;
								var user = [{
								'HospitalID' : HospitalID,
								'Services' : Services}];
											var jsonString = JSON.stringify(user);
											$.ajax({
											type: "GET",
											url: "ajaxinsert.php?control=selectServices",
											data: { data: jsonString },
											cache: false,
												success: function (data) {
												let jsonObject = JSON.parse(data);
												var json = jsonObject["records"];
												for(var i = 0; i < json.length; i++) {
													var obj = json[i];
													console.log(obj.id);
													$row["amount"].value(obj.AMOUNT);
													$row["DiscountCategory"].value('');
													$row["Quantity"].value('1');
													$row["Discount"].value('0');
													$row["SubTotal"].value(obj.AMOUNT);
													$row["ItemCode"].value(obj.ItemCode);
													$row["sid"].value(obj.id);
													var TestType = obj.TestType;
													addtotalSum();
													if(TestType.includes("Lab") != -1)
													{
														document.getElementById('x_LabTest').value = "LabTest";
													}
											 	}
											}
										});
			}
		}
	);

	// Table 'view_patient_services' Field 'amount'
	$('[data-table=view_patient_services][data-field=x_amount]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
						var $row = $(this).fields();
							var $amount = $row["amount"].toNumber();
							var $Quantity = $row["Quantity"].toNumber();
							$amount = $amount * $Quantity;
							$row["SubTotal"].value($amount);
				addtotalSum();
			}
		}
	);

	// Table 'view_patient_services' Field 'Quantity'
	$('[data-table=view_patient_services][data-field=x_Quantity]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
								var $row = $(this).fields();
							var $amount = $row["amount"].toNumber();
							var $Quantity = $row["Quantity"].toNumber();
							$amount = $amount * $Quantity;
							$row["SubTotal"].value($amount);
				addtotalSum();
			}
		}
	);

	// Table 'view_patient_services' Field 'Discount'
	$('[data-table=view_patient_services][data-field=x_Discount]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				var $row = $(this).fields();
						var $Discount = $row["Discount"].toNumber();
						var $amount = $row["amount"].toNumber();
						var $DiscountPer = ($Discount / 100);
						var $SubTotal = $DiscountPer * $amount;

						// Your code
							var $Quantity = $row["Quantity"].toNumber();
						var st = ($amount * $Quantity) - ($SubTotal * $Quantity ) ;
				                    $row["SubTotal"].value(st);
				        addtotalSum();            
			}
		}
	);

	// Table 'view_patient_services' Field 'SubTotal'
	$('[data-table=view_patient_services][data-field=x_SubTotal]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				addtotalSum();
			}
		}
	);

	// Table 'view_billing_voucher' Field 'ModeofPayment'
	$('[data-table=view_billing_voucher][data-field=x_ModeofPayment]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
						var $row = $(this).fields();
						var ModeofPayment = $row["ModeofPayment"].value();
						if(ModeofPayment=='CARD' || ModeofPayment=='PAYTM' || ModeofPayment=='NEFT')
						{
							document.getElementById("viewBankName").style.display = "block";
							document.getElementById("viewBankDetails").innerText = ModeofPayment + " Details";
						}
						else{
							document.getElementById("viewBankName").style.display = "none";
						}
			}
		}
	);

	// Table 'view_billing_voucher' Field 'RIDNO'
	$('[data-table=view_billing_voucher][data-field=x_RIDNO]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
										// Your code

										var $row = $(this).fields();
										var PatId = $row["PatId"].toNumber();
										var user = [{
											'PatId': PatId
										}];
										var jsonString = JSON.stringify(user);
										$.ajax({
											type: "GET",
											url: "ajaxinsert.php?control=FindivfCoupleReg",
											data: { data: jsonString },
											cache: false,
											success: function (data) {
												let jsonObject = JSON.parse(data);
												var json = jsonObject["records"];
												for (var i = 0; i < json.length; i++) {
													var obj = json[i];
															document.getElementById('x_PartnerName').value =  obj.Partnerfirst_name;

															//document.getElementById('lu_x_RefferedBy').innerText =  obj.ReferedBy;
														//	document.getElementById('sv_x_RefferedBy').innerText =  obj.ReferedBy;

		                            var   Services  =  document.getElementById('lu_x_RefferedBy');
									Services.innerHTML  = obj.ReferedBy;
									Services.selectedIndex = obj.ReferedBy;
									Services.value = obj.ReferedBy;
									Services.text = obj.ReferedBy;
							 var Services = document.getElementById("x_RefferedBy");
							 Services.value = obj.ReferedBy;
															document.getElementById('lu_x_DrID').innerText =  obj.DrID;
															document.getElementById('x_Doctor').value =  obj.Doctor;
															document.getElementById('x_DrDepartment').value =  obj.DrDepartment;
															document.getElementById('ipAdmissiontype').innerText =  obj.typeRegsisteration + " " + obj.Procedure;
															if(obj.typeRegsisteration != 'null')
															{
																document.getElementById('ipAdmissiontype').style.display = "block";
																document.getElementById('BillClosingType').style.display = "block";
															}else
															{
																document.getElementById('ipAdmissiontype').style.display = "none";
																document.getElementById('BillClosingType').style.display = "none";
															}
												}
											}
										});
										document.getElementById("LoadGetOPAdvance").innerHTML = "";
										var PatID = $row["PatId"].toNumber();
										var HospID = document.getElementById('HospIDId').value;
										var user = [{
									'patientId': PatID,
									'HospID': HospID
								}];
								var jsonString = JSON.stringify(user);
								$.ajax({
									type: "GET",
									url: "ajaxinsert.php?control=GetOPAdvance",
									data: { data: jsonString },
									cache: false,
									success: function (data) {
										let jsonObject = JSON.parse(data);
										var json = jsonObject["records"];
											var	TotalAdvance = '';
											var	TotalBill = '';
											var	BalanceAmount = '';
										var tabbllee = '<table id="customers"><tr><th>Advance No. </th><th>Date</th><th>Amount </th><th>Mode of Payment</th><th>Remarks</th></tr>';
										for (var i = 0; i < json.length; i++) {
											var obj = json[i];
												var tabbllee = tabbllee + '  <tr><td>'+ obj.AdvanceNo +'</td><td>'+ obj.Date +'</td> <td>'+ obj.Amount +'</td> <td>'+ obj.ModeofPayment +'</td> <td>'+ obj.Remarks +'</td></tr>';
													TotalAdvance = obj.TotalAdvance;
													TotalBill = obj.TotalBill;
													BalanceAmount = obj.BalanceAmount;
										}
										var tabbllee = tabbllee + '</table>';
										var tabbllee = tabbllee + '<table style="width:100%"><tr><th>Total Advance = '+TotalAdvance+'</th><th>Total Bill = '+ TotalBill +'</th><th>Balance Amount = '+ BalanceAmount +'</th></tr></table>';								
										if(json.length > 0)
										{
											document.getElementById("LoadGetOPAdvance").innerHTML =  tabbllee;
										}
									}
								});
								var PatID = $row["PatId"].toNumber();
								var user = [{
										'patientId': PatID,
									'HospID': HospID
								}];
								var jsonString = JSON.stringify(user);
								$.ajax({
									type: "GET",
									url: "ajaxinsert.php?control=IPPatientSearch",
									data: { data: jsonString },
									cache: false,
									success: function (data) {
										let jsonObject = JSON.parse(data);
										var json = jsonObject["records"];
										for (var i = 0; i < json.length; i++) {
											var obj = json[i];
											var k = i+1;
													var row = document.getElementById('r'+k+'_view_patient_services');
													var x = row.insertCell(-1);
													x.innerHTML = '<td class="ew-list-option-body text-nowrap" data-name="button"><div class="btn-group btn-group-sm ew-btn-group"><a class="btn btn-default ew-grid-link ew-grid-delete" title="" data-caption="Delete" onclick="return ERdeleteGridRow(this, '+k+');" data-original-title="Delete"><i data-phrase="DeleteLink" class="fa fas fa-eraser ew-icon" data-caption="Delete"></i></a></div></td>';
											document.getElementById('sv_x'+k+'_Services').value =  obj.Product;
											document.getElementById('x'+k+'_amount').value =  obj.RT;
											document.getElementById('x'+k+'_Quantity').value =  parseInt(obj.IQ);
											document.getElementById('x'+k+'_SubTotal').value =  obj.DAMT;
											document.getElementById('x'+k+'_ItemCode').value =  obj.PRC;
											document.getElementById('x'+k+'_sid').value =  obj.iiiddd;
											document.getElementById('x_ProcedureAmount').value =  obj.Amound;
													document.getElementById('x_ProcedureName').value =  obj.Procedure;
													 var Services = document.getElementById("sv_x" +k+ "_Services");
													 Services.innerHTML  = obj.Product;
													 Services.selectedIndex = obj.Product;
													 Services.value = obj.Product;
													 Services.text = obj.Product;
									  				var Services = document.getElementById("x" +k+ "_Services");
									  				Services.value = obj.Product;
											var jjAddRow = $('*[data-caption="Add Blank Row"]');
											ew.addGridRow(jjAddRow);
										}
										document.getElementById("ProcedureIITem").style.visibility = "visible";
										addtotalSum();
									}
								});
								var PatID = $row["PatId"].toNumber();
								var user = [{
										'patientId': PatID,
									'HospID': HospID
								}];
								var jsonString = JSON.stringify(user);
								$.ajax({
									type: "GET",
									url: "ajaxinsert.php?control=OPPatientISSUESearch",
									data: { data: jsonString },
									cache: false,
									success: function (data) {
										let jsonObject = JSON.parse(data);
										var json = jsonObject["records"];
										for (var i = 0; i < json.length; i++) {
											var obj = json[i];
											var k = i+1;
													var row = document.getElementById('r'+k+'_view_patient_services');
													var x = row.insertCell(-1);
													x.innerHTML = '<td class="ew-list-option-body text-nowrap" data-name="button"><div class="btn-group btn-group-sm ew-btn-group"><a class="btn btn-default ew-grid-link ew-grid-delete" title="" data-caption="Delete" onclick="return ERdeleteGridRow(this, '+k+');" data-original-title="Delete"><i data-phrase="DeleteLink" class="fa fas fa-eraser ew-icon" data-caption="Delete"></i></a></div></td>';
											document.getElementById('sv_x'+k+'_Services').value =  obj.Product;
											document.getElementById('x'+k+'_amount').value =  obj.RT;
											document.getElementById('x'+k+'_Quantity').value =  parseInt(obj.IQ);
											document.getElementById('x'+k+'_SubTotal').value =  obj.DAMT;
											document.getElementById('x'+k+'_ItemCode').value =  obj.PRC;
											document.getElementById('x'+k+'_sid').value =  obj.iiiddd;
											document.getElementById('x_ProcedureAmount').value =  obj.Amound;
													document.getElementById('x_ProcedureName').value =  obj.Procedure;
													 var Services = document.getElementById("sv_x" +k+ "_Services");
													 Services.innerHTML  = obj.Product;
													 Services.selectedIndex = obj.Product;
													 Services.value = obj.Product;
													 Services.text = obj.Product;
									  				var Services = document.getElementById("x" +k+ "_Services");
									  				Services.value = obj.Product;
											var jjAddRow = $('*[data-caption="Add Blank Row"]');
											ew.addGridRow(jjAddRow);
										}
										document.getElementById("ProcedureIITem").style.visibility = "visible";
										addtotalSum();
									}
								});
								  $("[data-field='x_BillClosing']").prop( "checked", true );
			}
		}
	);

	// Table 'view_billing_voucher' Field 'PatId'
	$('[data-table=view_billing_voucher][data-field=x_PatId]').on(
		{ // keys = event types, values = handler functions
		"change keyup": function(e) {

								// Your code
										var $row = $(this).fields();
										var PatId = $row["PatId"].toNumber();
										var user = [{
											'PatId': PatId
										}];
										var jsonString = JSON.stringify(user);
										$.ajax({
											type: "GET",
											url: "ajaxinsert.php?control=FindivfCoupleReg",
											data: { data: jsonString },
											cache: false,
											success: function (data) {
												let jsonObject = JSON.parse(data);
												var json = jsonObject["records"];
												for (var i = 0; i < json.length; i++) {
													var obj = json[i];
															document.getElementById('x_PartnerName').value =  obj.Partnerfirst_name;

															//document.getElementById('lu_x_RefferedBy').innerText =  obj.ReferedBy;
														//	document.getElementById('sv_x_RefferedBy').innerText =  obj.ReferedBy;

		                            var   Services  =  document.getElementById('lu_x_RefferedBy');
									Services.innerHTML  = obj.ReferedBy;
									Services.selectedIndex = obj.ReferedBy;
									Services.value = obj.ReferedBy;
									Services.text = obj.ReferedBy;
							 var Services = document.getElementById("x_RefferedBy");
							 Services.value = obj.ReferedBy;
															document.getElementById('lu_x_DrID').innerText =  obj.DrID;
															document.getElementById('x_Doctor').value =  obj.Doctor;
															document.getElementById('x_DrDepartment').value =  obj.DrDepartment;
															document.getElementById('ipAdmissiontype').innerText =  obj.typeRegsisteration + " " + obj.Procedure;
															if(obj.typeRegsisteration != 'null')
															{
																document.getElementById('ipAdmissiontype').style.display = "block";
																document.getElementById('BillClosingType').style.display = "block";
															}else
															{
																document.getElementById('ipAdmissiontype').style.display = "none";
																document.getElementById('BillClosingType').style.display = "none";
															}
												}
											}
										});
										document.getElementById("LoadGetOPAdvance").innerHTML = "";
										var PatID = $row["PatId"].toNumber();
										var HospID = document.getElementById('HospIDId').value;
										var user = [{
									'patientId': PatID,
									'HospID': HospID
								}];
								var jsonString = JSON.stringify(user);
								$.ajax({
									type: "GET",
									url: "ajaxinsert.php?control=GetOPAdvance",
									data: { data: jsonString },
									cache: false,
									success: function (data) {
										let jsonObject = JSON.parse(data);
										var json = jsonObject["records"];
											var	TotalAdvance = '';
											var	TotalBill = '';
											var	BalanceAmount = '';
										var tabbllee = '<table id="customers"><tr><th>Advance No. </th><th>Date</th><th>Amount </th><th>Mode of Payment</th><th>Remarks</th></tr>';
										for (var i = 0; i < json.length; i++) {
											var obj = json[i];
												var tabbllee = tabbllee + '  <tr><td>'+ obj.AdvanceNo +'</td><td>'+ obj.Date +'</td> <td>'+ obj.Amount +'</td> <td>'+ obj.ModeofPayment +'</td> <td>'+ obj.Remarks +'</td></tr>';
													TotalAdvance = obj.TotalAdvance;
													TotalBill = obj.TotalBill;
													BalanceAmount = obj.BalanceAmount;
										}
										var tabbllee = tabbllee + '</table>';
										var tabbllee = tabbllee + '<table style="width:100%"><tr><th>Total Advance = '+TotalAdvance+'</th><th>Total Bill = '+ TotalBill +'</th><th>Balance Amount = '+ BalanceAmount +'</th></tr></table>';								
										if(json.length > 0)
										{
											document.getElementById("LoadGetOPAdvance").innerHTML =  tabbllee;
										}
									}
								});
								var PatID = $row["PatId"].toNumber();
								var user = [{
										'patientId': PatID,
									'HospID': HospID
								}];
								var jsonString = JSON.stringify(user);
								$.ajax({
									type: "GET",
									url: "ajaxinsert.php?control=IPPatientSearch",
									data: { data: jsonString },
									cache: false,
									success: function (data) {
										let jsonObject = JSON.parse(data);
										var json = jsonObject["records"];
										for (var i = 0; i < json.length; i++) {
											var obj = json[i];
											var k = i+1;
													var row = document.getElementById('r'+k+'_view_patient_services');
													var x = row.insertCell(-1);
													x.innerHTML = '<td class="ew-list-option-body text-nowrap" data-name="button"><div class="btn-group btn-group-sm ew-btn-group"><a class="btn btn-default ew-grid-link ew-grid-delete" title="" data-caption="Delete" onclick="return ERdeleteGridRow(this, '+k+');" data-original-title="Delete"><i data-phrase="DeleteLink" class="fa fas fa-eraser ew-icon" data-caption="Delete"></i></a></div></td>';
											document.getElementById('sv_x'+k+'_Services').value =  obj.Product;
											document.getElementById('x'+k+'_amount').value =  obj.RT;
											document.getElementById('x'+k+'_Quantity').value =  parseInt(obj.IQ);
											document.getElementById('x'+k+'_SubTotal').value =  obj.DAMT;
											document.getElementById('x'+k+'_ItemCode').value =  obj.PRC;
											document.getElementById('x'+k+'_sid').value =  obj.iiiddd;
											document.getElementById('x_ProcedureAmount').value =  obj.Amound;
													document.getElementById('x_ProcedureName').value =  obj.Procedure;
													 var Services = document.getElementById("sv_x" +k+ "_Services");
													 Services.innerHTML  = obj.Product;
													 Services.selectedIndex = obj.Product;
													 Services.value = obj.Product;
													 Services.text = obj.Product;
									  				var Services = document.getElementById("x" +k+ "_Services");
									  				Services.value = obj.Product;
											var jjAddRow = $('*[data-caption="Add Blank Row"]');
											ew.addGridRow(jjAddRow);
										}
										document.getElementById("ProcedureIITem").style.visibility = "visible";
										addtotalSum();
									}
								});
								var PatID = $row["PatId"].toNumber();
								var user = [{
										'patientId': PatID,
									'HospID': HospID
								}];
								var jsonString = JSON.stringify(user);
								$.ajax({
									type: "GET",
									url: "ajaxinsert.php?control=OPPatientISSUESearch",
									data: { data: jsonString },
									cache: false,
									success: function (data) {
										let jsonObject = JSON.parse(data);
										var json = jsonObject["records"];
										for (var i = 0; i < json.length; i++) {
											var obj = json[i];
											var k = i+1;
													var row = document.getElementById('r'+k+'_view_patient_services');
													var x = row.insertCell(-1);
													x.innerHTML = '<td class="ew-list-option-body text-nowrap" data-name="button"><div class="btn-group btn-group-sm ew-btn-group"><a class="btn btn-default ew-grid-link ew-grid-delete" title="" data-caption="Delete" onclick="return ERdeleteGridRow(this, '+k+');" data-original-title="Delete"><i data-phrase="DeleteLink" class="fa fas fa-eraser ew-icon" data-caption="Delete"></i></a></div></td>';
											document.getElementById('sv_x'+k+'_Services').value =  obj.Product;
											document.getElementById('x'+k+'_amount').value =  obj.RT;
											document.getElementById('x'+k+'_Quantity').value =  parseInt(obj.IQ);
											document.getElementById('x'+k+'_SubTotal').value =  obj.DAMT;
											document.getElementById('x'+k+'_ItemCode').value =  obj.PRC;
											document.getElementById('x'+k+'_sid').value =  obj.iiiddd;
											document.getElementById('x_ProcedureAmount').value =  obj.Amound;
													document.getElementById('x_ProcedureName').value =  obj.Procedure;
													 var Services = document.getElementById("sv_x" +k+ "_Services");
													 Services.innerHTML  = obj.Product;
													 Services.selectedIndex = obj.Product;
													 Services.value = obj.Product;
													 Services.text = obj.Product;
									  				var Services = document.getElementById("x" +k+ "_Services");
									  				Services.value = obj.Product;
											var jjAddRow = $('*[data-caption="Add Blank Row"]');
											ew.addGridRow(jjAddRow);
										}
										document.getElementById("ProcedureIITem").style.visibility = "visible";
										addtotalSum();
									}
								});
				}
		}
	);

	// Table 'view_billing_voucher' Field 'AdjustmentAdvance'
	$('[data-table=view_billing_voucher][data-field=x_AdjustmentAdvance]').on(
		{ // keys = event types, values = handler functions
			"click": function(e) {

				// Your code
				var $row = $(this).fields();
				var AdjustmentAdvance = $row["AdjustmentAdvance"].value();
				if(AdjustmentAdvance == 'Yes' )
				{
					document.getElementById('x_ModeofPayment').value =  'Adjustment with Advance';
				}
			}
		}
	);

	// Table 'view_semenanalysis' Field 'RIDNo'
	$('[data-table=view_semenanalysis][data-field=x_RIDNo]').on(
		{ // keys = event types, values = handler functions
		"change keyup": function(e) {

						// Your code
								var $row = $(this).fields();
								var Volume = $row["RIDNo"].toNumber();
								var user = [{
									'RIDNo': Volume
								}];
								var jsonString = JSON.stringify(user);
								$.ajax({
									type: "GET",
									url: "ajaxinsert.php?control=ivfCoupleReg",
									data: { data: jsonString },
									cache: false,
									success: function (data) {
										let jsonObject = JSON.parse(data);
										var json = jsonObject["records"];
										for (var i = 0; i < json.length; i++) {
											var obj = json[i];
													document.getElementById('SemPatientId').innerText = 'Patient Id : ' + obj.PatientID;
													document.getElementById('SemPatientPatientName').innerText = 'Patient Name : ' + obj.first_name;
													document.getElementById('SemPatientGender').innerText = 'Gender : ' + obj.gender;
													document.getElementById('SemPatientBloodGroup').innerText = 'Blood Group : ' + obj.blood_group;
													var picurl = "";
													if (obj.profilePic == "" || obj.profilePic == null) {
														picurl = "hims/profile-picture.png";
													} else {
														picurl = obj.profilePic;
													}
													document.getElementById('profilePicturePatient').src = 'uploads/' + picurl;
													document.getElementById('SemPatientAge').innerText = 'Age : ' + obj.Age;
													document.getElementById('SemPatientMobile').innerText = 'Mobile : ' + obj.mobile_no;
													document.getElementById('SemPatientEmail').innerText = 'Email : ' + obj.PEmail;
													document.getElementById('SemPartnerId').innerText = 'Partner Id : ' + obj.PartnerPatientID;
													document.getElementById('SemPartnerPatientName').innerText = 'Partner Name : ' + obj.Partnerfirst_name;
													document.getElementById('SemPartnerGender').innerText = 'Gender : ' + obj.Partnergender;
													document.getElementById('SemPartnerBloodGroup').innerText = 'Blood Group : ' + obj.Partnerblood_group;
													var picurl = "";
													if (obj.PartnerprofilePic == "" || obj.PartnerprofilePic == null) {
														picurl = "hims/profile-picture.png";
													} else {
														picurl = obj.PartnerprofilePic;
													}
													document.getElementById('SemPartnerprofilePicturePatient').src = 'uploads/' + picurl;
													document.getElementById('SemPartnerAge').innerText = 'Age : ' + obj.PartnerAge;
													document.getElementById('SemPartnerMobile').innerText = 'Mobile : ' + obj.Partnermobile_no;
													document.getElementById('SemPartnerEmail').innerText = 'Email : ' + obj.PartnerPEmail;
															document.getElementById("partnerdataview").style.display = "block";
															document.getElementById("patientdataview").className = "col-md-6";
										}
									}
								});		
					}
		}
	);

	// Table 'view_semenanalysis' Field 'HusbandName'
	$('[data-table=view_semenanalysis][data-field=x_HusbandName]').on(
		{ // keys = event types, values = handler functions
		"change keyup": function(e) {

						// Your code
								var $row = $(this).fields();
								var Volume = $row["HusbandName"].toNumber();
								var user = [{
									'patientId': Volume
								}];
								var jsonString = JSON.stringify(user);
								$.ajax({
									type: "GET",
									url: "ajaxinsert.php?control=patientProPicture",
									data: { data: jsonString },
									cache: false,
									success: function (data) {
										let jsonObject = JSON.parse(data);
										var json = jsonObject["records"];
										for (var i = 0; i < json.length; i++) {
											var obj = json[i];
													document.getElementById('SemPatientId').innerText = 'Patient Id : ' + obj.PatientID;
													document.getElementById('SemPatientPatientName').innerText = 'Patient Name : ' + obj.first_name;
													document.getElementById('SemPatientGender').innerText = 'Gender : ' + obj.gender;
													document.getElementById('SemPatientBloodGroup').innerText = 'Blood Group : ' + obj.blood_group;
													var picurl = "";
													if (obj.profilePic == "" || obj.profilePic == null) {
														picurl = "hims/profile-picture.png";
													} else {
														picurl = obj.profilePic;
													}
													document.getElementById('profilePicturePatient').src = 'uploads/' + picurl;
													document.getElementById('SemPatientAge').innerText = 'Age : ' + obj.Age;
													document.getElementById('SemPatientMobile').innerText = 'Mobile : ' + obj.mobile_no;
													document.getElementById('SemPatientEmail').innerText = 'Email : ' + obj.PEmail;
															document.getElementById("partnerdataview").style.display = "none";
															document.getElementById("patientdataview").className = "col-md-12";
										}
									}
								});		
					}
		}
	);

	// Table 'view_semenanalysis' Field 'RequestSample'
	$('[data-table=view_semenanalysis][data-field=x_RequestSample]').on(
		{ // keys = event types, values = handler functions
			"change onchange": function(e) {

				// Your code
						var $row = $(this).fields();
						var RequestSample = $row["RequestSample"].value();
						var TankLocation = document.getElementById("TankLocation");
						var Method = document.getElementById("Method");

						/////////////////////
							var capacitationTable = document.getElementById("capacitationTable");
							capacitationTable.style.width = "60%";
							 document.getElementById("Volume1").style.visibility = "hidden";
							 document.getElementById("Concentration1").style.visibility = "hidden";
							 document.getElementById("Total1").style.visibility = "hidden";
							 document.getElementById("ProgressiveMotility1").style.visibility = "hidden";
							 document.getElementById("NonProgrssiveMotile1").style.visibility = "hidden";
							 document.getElementById("Immotile1").style.visibility = "hidden";
							 document.getElementById("TotalProgrssiveMotile1").style.visibility = "hidden";
							 document.getElementById("capacitationTableHead").style.visibility = "hidden";
							 document.getElementById("PreCapacitation").innerText = "";
							 document.getElementById("PostCapacitation").innerText = "";
							 document.getElementById("x_Volume1").style.width = "0px";
							 document.getElementById("x_Concentration1").style.width = "0px";
							 document.getElementById("x_Total1").style.width = "0px";
							 document.getElementById("x_ProgressiveMotility1").style.width = "0px";
							 document.getElementById("x_NonProgrssiveMotile1").style.width = "0px";
							 document.getElementById("x_Immotile1").style.width = "0px";
							 document.getElementById("x_TotalProgrssiveMotile1").style.width = "0px";
							 document.getElementById("x_Volume2").style.width = "0px";
							 document.getElementById("x_Concentration2").style.width = "0px";
							 document.getElementById("x_Total2").style.width = "0px";
							 document.getElementById("x_ProgressiveMotility2").style.width = "0px";
							 document.getElementById("x_NonProgrssiveMotile2").style.width = "0px";
							 document.getElementById("x_Immotile2").style.width = "0px";
							 document.getElementById("x_TotalProgrssiveMotile2").style.width = "0px";
							 document.getElementById("Volume2").style.visibility = "hidden";
							 document.getElementById("Concentration2").style.visibility = "hidden";
							 document.getElementById("Total2").style.visibility = "hidden";
							 document.getElementById("ProgressiveMotility2").style.visibility = "hidden";
							 document.getElementById("NonProgrssiveMotile2").style.visibility = "hidden";
							 document.getElementById("Immotile2").style.visibility = "hidden";
							 document.getElementById("TotalProgrssiveMotile2").style.visibility = "hidden";
							 document.getElementById("Big").style.visibility = "hidden";
							 document.getElementById("Medium").style.visibility = "hidden";
							 document.getElementById("Small").style.visibility = "hidden";
							 document.getElementById("NoHalo").style.visibility = "hidden";
							 document.getElementById("Fragmented").style.visibility = "hidden";
							 document.getElementById("NonFragmented").style.visibility = "hidden";
							 document.getElementById("DFI").style.visibility = "hidden";
							 document.getElementById("InseminationTime").style.visibility = "hidden";
							 document.getElementById("InseminationBy").style.visibility = "hidden";
							 document.getElementById("IsueBy").style.visibility = "hidden";
							document.getElementById("idMacs").style.visibility = "hidden";
		document.getElementById("IUILocation").style.visibility = "hidden";
			document.getElementById('SemenHeading').innerText = 'Spermiogram';
						if(RequestSample == "Freezing")
						{
								document.getElementById('SemenHeading').innerText = 'Semen Freezing';
							TankLocation.style.visibility = "visible";
							Method.style.visibility = "visible";
						}else{
							TankLocation.style.visibility = "hidden";
							Method.style.visibility = "visible";
						}
						var capacitationTable = document.getElementById("capacitationTable");
						if(RequestSample == "Semen Analysis")
						{
							capacitationTable.style.width = "60%";
							 document.getElementById("Volume1").style.visibility = "hidden";
							 document.getElementById("Concentration1").style.visibility = "hidden";
							 document.getElementById("Total1").style.visibility = "hidden";
							 document.getElementById("ProgressiveMotility1").style.visibility = "hidden";
							 document.getElementById("NonProgrssiveMotile1").style.visibility = "hidden";
							 document.getElementById("Immotile1").style.visibility = "hidden";
							 document.getElementById("TotalProgrssiveMotile1").style.visibility = "hidden";
							 document.getElementById("capacitationTableHead").style.visibility = "hidden";
							 document.getElementById("PreCapacitation").innerText = "";
							 document.getElementById("PostCapacitation").innerText = "";
							 document.getElementById("x_Volume1").style.width = "0px";
							 document.getElementById("x_Concentration1").style.width = "0px";
							 document.getElementById("x_Total1").style.width = "0px";
							 document.getElementById("x_ProgressiveMotility1").style.width = "0px";
							 document.getElementById("x_NonProgrssiveMotile1").style.width = "0px";
							 document.getElementById("x_Immotile1").style.width = "0px";
							 document.getElementById("x_TotalProgrssiveMotile1").style.width = "0px";
							 document.getElementById("x_Volume2").style.width = "0px";
							 document.getElementById("x_Concentration2").style.width = "0px";
							 document.getElementById("x_Total2").style.width = "0px";
							 document.getElementById("x_ProgressiveMotility2").style.width = "0px";
							 document.getElementById("x_NonProgrssiveMotile2").style.width = "0px";
							 document.getElementById("x_Immotile2").style.width = "0px";
							 document.getElementById("x_TotalProgrssiveMotile2").style.width = "0px";
							 document.getElementById("Volume2").style.visibility = "hidden";
							 document.getElementById("Concentration2").style.visibility = "hidden";
							 document.getElementById("Total2").style.visibility = "hidden";
							 document.getElementById("ProgressiveMotility2").style.visibility = "hidden";
							 document.getElementById("NonProgrssiveMotile2").style.visibility = "hidden";
							 document.getElementById("Immotile2").style.visibility = "hidden";
							 document.getElementById("TotalProgrssiveMotile2").style.visibility = "hidden";
							 document.getElementById("Big").style.visibility = "hidden";
							 document.getElementById("Medium").style.visibility = "hidden";
							 document.getElementById("Small").style.visibility = "hidden";
							 document.getElementById("NoHalo").style.visibility = "hidden";
							 document.getElementById("Fragmented").style.visibility = "hidden";
							 document.getElementById("NonFragmented").style.visibility = "hidden";
							 document.getElementById("DFI").style.visibility = "hidden";
							 document.getElementById("InseminationTime").style.visibility = "hidden";
							 document.getElementById("InseminationBy").style.visibility = "hidden";
							 document.getElementById("IsueBy").style.visibility = "hidden";
						}
						else if(RequestSample == "ICSI")
						{
								capacitationTable.style.width = "60%";
							 document.getElementById("Volume1").style.visibility = "hidden";
							 document.getElementById("Concentration1").style.visibility = "hidden";
							 document.getElementById("Total1").style.visibility = "hidden";
							 document.getElementById("ProgressiveMotility1").style.visibility = "hidden";
							 document.getElementById("NonProgrssiveMotile1").style.visibility = "hidden";
							 document.getElementById("Immotile1").style.visibility = "hidden";
							 document.getElementById("TotalProgrssiveMotile1").style.visibility = "hidden";
							 document.getElementById("capacitationTableHead").style.visibility = "hidden";
							 document.getElementById("PreCapacitation").innerText = "";
							 document.getElementById("PostCapacitation").innerText = "";
							 document.getElementById("x_Volume1").style.width = "0px";
							 document.getElementById("x_Concentration1").style.width = "0px";
							 document.getElementById("x_Total1").style.width = "0px";
							 document.getElementById("x_ProgressiveMotility1").style.width = "0px";
							 document.getElementById("x_NonProgrssiveMotile1").style.width = "0px";
							 document.getElementById("x_Immotile1").style.width = "0px";
							 document.getElementById("x_TotalProgrssiveMotile1").style.width = "0px";
							 document.getElementById("x_Volume2").style.width = "0px";
							 document.getElementById("x_Concentration2").style.width = "0px";
							 document.getElementById("x_Total2").style.width = "0px";
							 document.getElementById("x_ProgressiveMotility2").style.width = "0px";
							 document.getElementById("x_NonProgrssiveMotile2").style.width = "0px";
							 document.getElementById("x_Immotile2").style.width = "0px";
							 document.getElementById("x_TotalProgrssiveMotile2").style.width = "0px";
							 document.getElementById("Volume2").style.visibility = "hidden";
							 document.getElementById("Concentration2").style.visibility = "hidden";
							 document.getElementById("Total2").style.visibility = "hidden";
							 document.getElementById("ProgressiveMotility2").style.visibility = "hidden";
							 document.getElementById("NonProgrssiveMotile2").style.visibility = "hidden";
							 document.getElementById("Immotile2").style.visibility = "hidden";
							 document.getElementById("TotalProgrssiveMotile2").style.visibility = "hidden";
							 document.getElementById("Big").style.visibility = "hidden";
							 document.getElementById("Medium").style.visibility = "hidden";
							 document.getElementById("Small").style.visibility = "hidden";
							 document.getElementById("NoHalo").style.visibility = "hidden";
							 document.getElementById("Fragmented").style.visibility = "hidden";
							 document.getElementById("NonFragmented").style.visibility = "hidden";
							 document.getElementById("DFI").style.visibility = "hidden";
							 document.getElementById("InseminationTime").style.visibility = "hidden";
							 document.getElementById("InseminationBy").style.visibility = "hidden";
							 document.getElementById("IsueBy").style.visibility = "hidden";

		    //////////////////////////////////////////////////
						 	var IsueBy = document.getElementById("IsueBy");
						 	IsueBy.style.visibility = "visible";
						 		capacitationTable.style.width = "100%";
							 document.getElementById("Volume1").style.visibility = "visible";
							 document.getElementById("Concentration1").style.visibility = "visible";
							 document.getElementById("Total1").style.visibility = "visible";
							 document.getElementById("ProgressiveMotility1").style.visibility = "visible";
							 document.getElementById("NonProgrssiveMotile1").style.visibility = "visible";
							 document.getElementById("Immotile1").style.visibility = "visible";
							 document.getElementById("TotalProgrssiveMotile1").style.visibility = "visible";
							 document.getElementById("capacitationTableHead").style.visibility = "visible";
		document.getElementById("idMacs").style.visibility = "visible";
							 document.getElementById("PreCapacitation").innerText = "Pre Capacitation";
							 document.getElementById("PostCapacitation").innerText = "Post Capacitation";
							document.getElementById("x_Volume1").style.width = "80px";
		 					document.getElementById("x_Concentration1").style.width = "80px";
		 					document.getElementById("x_Total1").style.width = "80px";
		 					document.getElementById("x_ProgressiveMotility1").style.width = "80px";
		 					document.getElementById("x_NonProgrssiveMotile1").style.width = "80px";
		 					document.getElementById("x_Immotile1").style.width = "80px";
		 					document.getElementById("x_TotalProgrssiveMotile1").style.width = "80px";
						}
						else if(RequestSample == "DFI")
						{
				document.getElementById('SemenHeading').innerText = 'DNA Framgmentation Index';
						  	 document.getElementById("Big").style.visibility = "visible";
							 document.getElementById("Medium").style.visibility = "visible";
							 document.getElementById("Small").style.visibility = "visible";
							 document.getElementById("NoHalo").style.visibility = "visible";
							 document.getElementById("Fragmented").style.visibility = "visible";
							 document.getElementById("NonFragmented").style.visibility = "visible";
							 document.getElementById("DFI").style.visibility = "visible";
						}
						else if(RequestSample == "IUI processing")
						{
							document.getElementById('SemenHeading').innerText = 'INTRA UTERINE INSEMINATION';
												document.getElementById("Big").style.visibility = "hidden";
							document.getElementById("Medium").style.visibility = "hidden";
							document.getElementById("Small").style.visibility = "hidden";
							document.getElementById("NoHalo").style.visibility = "hidden";
							document.getElementById("Fragmented").style.visibility = "hidden";
							document.getElementById("NonFragmented").style.visibility = "hidden";
							document.getElementById("DFI").style.visibility = "hidden";
							capacitationTable.style.width = "100%";
							 document.getElementById("Volume1").style.visibility = "visible";
							 document.getElementById("Concentration1").style.visibility = "visible";
							 document.getElementById("Total1").style.visibility = "visible";
							 document.getElementById("ProgressiveMotility1").style.visibility = "visible";
							 document.getElementById("NonProgrssiveMotile1").style.visibility = "visible";
							 document.getElementById("Immotile1").style.visibility = "visible";
							 document.getElementById("TotalProgrssiveMotile1").style.visibility = "visible";
							 document.getElementById("capacitationTableHead").style.visibility = "visible";
							  document.getElementById("InseminationTime").style.visibility = "visible";
							   document.getElementById("InseminationBy").style.visibility = "visible";
							 document.getElementById("PreCapacitation").innerText = "Pre Capacitation";
							 document.getElementById("PostCapacitation").innerText = "Post Capacitation";
							document.getElementById("x_Volume1").style.width = "80px";
		 					document.getElementById("x_Concentration1").style.width = "80px";
		 					document.getElementById("x_Total1").style.width = "80px";
		 					document.getElementById("x_ProgressiveMotility1").style.width = "80px";
		 					document.getElementById("x_NonProgrssiveMotile1").style.width = "80px";
		 					document.getElementById("x_Immotile1").style.width = "80px";
		 					document.getElementById("x_TotalProgrssiveMotile1").style.width = "80px";
		 					document.getElementById("idMacs").style.visibility = "visible";
		 					document.getElementById("IUILocation").style.visibility = "visible";
						}else{
							capacitationTable.style.width = "60%";
							 document.getElementById("Volume1").style.visibility = "hidden";
							 document.getElementById("Concentration1").style.visibility = "hidden";
							 document.getElementById("Total1").style.visibility = "hidden";
							 document.getElementById("ProgressiveMotility1").style.visibility = "hidden";
							 document.getElementById("NonProgrssiveMotile1").style.visibility = "hidden";
							 document.getElementById("Immotile1").style.visibility = "hidden";
							 document.getElementById("TotalProgrssiveMotile1").style.visibility = "hidden";
							 document.getElementById("capacitationTableHead").style.visibility = "hidden";
							 document.getElementById("PreCapacitation").innerText = "";
							 document.getElementById("PostCapacitation").innerText = "";
							 document.getElementById("x_Volume1").style.width = "0px";
							 document.getElementById("x_Concentration1").style.width = "0px";
							 document.getElementById("x_Total1").style.width = "0px";
							 document.getElementById("x_ProgressiveMotility1").style.width = "0px";
							 document.getElementById("x_NonProgrssiveMotile1").style.width = "0px";
							 document.getElementById("x_Immotile1").style.width = "0px";
							 document.getElementById("x_TotalProgrssiveMotile1").style.width = "0px";
						}
			}
		}
	);

	// Table 'view_semenanalysis' Field 'Volume'
	$('[data-table=view_semenanalysis][data-field=x_Volume]').on(
		{ // keys = event types, values = handler functions
			"change keyup": function(e) {

				// Your code
				var $row = $(this).fields();
				var Volume = $row["Volume"].toNumber();
				var Concentration = $row["Concentration"].toNumber();
				var Total = Volume * Concentration;
				$row["Total"].val(Total);
			}
		}
	);

	// Table 'view_semenanalysis' Field 'Concentration'
	$('[data-table=view_semenanalysis][data-field=x_Concentration]').on(
		{ // keys = event types, values = handler functions
			"change keyup": function(e) {

				// Your code
				var $row = $(this).fields();
		var Volume = $row["Volume"].toNumber();
		var Concentration = $row["Concentration"].toNumber();
		var Total = Volume * Concentration;
		$row["Total"].val(Total.toFixed(1));
			}
		}
	);

	// Table 'view_semenanalysis' Field 'Total'
	$('[data-table=view_semenanalysis][data-field=x_Total]').on(
		{ // keys = event types, values = handler functions
			"change keyup": function(e) {

				// Your code
				var $row = $(this).fields();
		var Volume = $row["Volume"].toNumber();
		var Concentration = $row["Concentration"].toNumber();
		var Total = Volume * Concentration;

		//$row["Total"].val(Total.toFixed(2));
			}
		}
	);

	// Table 'view_semenanalysis' Field 'ProgressiveMotility'
	$('[data-table=view_semenanalysis][data-field=x_ProgressiveMotility]').on(
		{ // keys = event types, values = handler functions
			"change keyup": function(e) {

				// Your code
				var $row = $(this).fields();
				var ProgressiveMotility = $row["ProgressiveMotility"].toNumber();
				var NonProgrssiveMotile = $row["NonProgrssiveMotile"].toNumber();
				var Immotile = 100 - ( ProgressiveMotility +  NonProgrssiveMotile);
				$row["Immotile"].val(Immotile.toFixed(1));
				var tttprmob = ProgressiveMotility +  NonProgrssiveMotile;

			//	$row["TotalProgrssiveMotile"].val(tttprmob.toFixed(1));
			var Volume = $row["Volume"].toNumber();
		var Concentration = $row["Concentration"].toNumber();
			var ProgressiveMotility = $row["ProgressiveMotility"].toNumber();
		var hhh = (Volume * Concentration * ProgressiveMotility)/100;
		$row["TotalProgrssiveMotile"].val(hhh.toFixed(1));
			}
		}
	);

	// Table 'view_semenanalysis' Field 'NonProgrssiveMotile'
	$('[data-table=view_semenanalysis][data-field=x_NonProgrssiveMotile]').on(
		{ // keys = event types, values = handler functions
			"change keyup": function(e) {

				// Your code
				var $row = $(this).fields();
				var ProgressiveMotility = $row["ProgressiveMotility"].toNumber();
				var NonProgrssiveMotile = $row["NonProgrssiveMotile"].toNumber();
				var Immotile = 100 - ( ProgressiveMotility +  NonProgrssiveMotile);

			//	$row["Immotile"].val(Immotile);
			//	$row["TotalProgrssiveMotile"].val(ProgressiveMotility +  NonProgrssiveMotile);

				$row["Immotile"].val(Immotile.toFixed(1));
				var tttprmob = ProgressiveMotility +  NonProgrssiveMotile;

			//	$row["TotalProgrssiveMotile"].val(tttprmob.toFixed(1));
				var Volume = $row["Volume"].toNumber();
		var Concentration = $row["Concentration"].toNumber();
			var ProgressiveMotility = $row["ProgressiveMotility"].toNumber();
		var hhh = (Volume * Concentration * ProgressiveMotility)/100;
		$row["TotalProgrssiveMotile"].val(hhh.toFixed(1));
			}
		}
	);

	// Table 'view_semenanalysis' Field 'Normal'
	$('[data-table=view_semenanalysis][data-field=x_Normal]').on(
		{ // keys = event types, values = handler functions
			"change keyup": function(e) {

				// Your code
				var $row = $(this).fields();
		var Normal = $row["Normal"].toNumber();
		$row["Abnormal"].val(100-Normal);
			}
		}
	);

	// Table 'view_semenanalysis' Field 'Abnormal'
	$('[data-table=view_semenanalysis][data-field=x_Abnormal]').on(
		{ // keys = event types, values = handler functions
			"change keyup": function(e) {

				// Your code
				var $row = $(this).fields();
		var Abnormal = $row["Abnormal"].toNumber();
		$row["Normal"].val(100-Abnormal);
			}
		}
	);

	// Table 'view_semenanalysis' Field 'Headdefects'
	$('[data-table=view_semenanalysis][data-field=x_Headdefects]').on(
		{ // keys = event types, values = handler functions
			"change keyup": function(e) {

				// Your code
				var $row = $(this).fields();
		var Headdefects = $row["Headdefects"].toNumber();
		var MidpieceDefects = $row["MidpieceDefects"].toNumber();
		var Abnormal = $row["Abnormal"];
		var Total = Abnormal - ( Headdefects + MidpieceDefects);

		//var Total = 100 - ( Headdefects + MidpieceDefects);
		$row["TailDefects"].val(Total);
			}
		}
	);

	// Table 'view_semenanalysis' Field 'MidpieceDefects'
	$('[data-table=view_semenanalysis][data-field=x_MidpieceDefects]').on(
		{ // keys = event types, values = handler functions
			"change keyup": function(e) {

				// Your code
				var $row = $(this).fields();
		var Headdefects = $row["Headdefects"].toNumber();
		var MidpieceDefects = $row["MidpieceDefects"].toNumber();

		//var Total = 100 - ( Headdefects + MidpieceDefects);
		//$row["TailDefects"].val(Total);

		var Abnormal = $row["Abnormal"].toNumber();
		var Total = Abnormal - ( Headdefects + MidpieceDefects);

		//var Total = 100 - ( Headdefects + MidpieceDefects);
		$row["TailDefects"].val(Total);
			}
		}
	);

	// Table 'view_semenanalysis' Field 'TailDefects'
	$('[data-table=view_semenanalysis][data-field=x_TailDefects]').on(
		{ // keys = event types, values = handler functions
			"change keyup": function(e) {

				// Your code
				var $row = $(this).fields();
		var Headdefects = $row["Headdefects"].toNumber();
		var MidpieceDefects = $row["MidpieceDefects"].toNumber();

		//var Total = 100 - ( Headdefects + MidpieceDefects);
		//$row["TailDefects"].val(Total);

		var Abnormal = $row["Abnormal"].toNumber();
		var Total = Abnormal - ( Headdefects + MidpieceDefects);

		//var Total = 100 - ( Headdefects + MidpieceDefects);
		$row["TailDefects"].val(Total);
			}
		}
	);

	// Table 'view_semenanalysis' Field 'SemenOrgin'
	$('[data-table=view_semenanalysis][data-field=x_SemenOrgin]').on(
		{ // keys = event types, values = handler functions
			"change onchange": function(e) {

				// Your code
						var $row = $(this).fields();
						var SemenOrgin = $row["SemenOrgin"].value();
						var donorId = document.getElementById("donorId");
						var DonorBloodGroupId = document.getElementById("DonorBloodGroupId");
						if(SemenOrgin == "Donor")
						{
							donorId.style.visibility = "visible";
							DonorBloodGroupId.style.visibility = "visible";
						}else{
							donorId.style.visibility = "hidden";
							DonorBloodGroupId.style.visibility = "hidden";
						}
			}
		}
	);

	// Table 'view_semenanalysis' Field 'Volume1'
	$('[data-table=view_semenanalysis][data-field=x_Volume1]').on(
		{ // keys = event types, values = handler functions
			"change keyup": function(e) {

				// Your code
				var $row = $(this).fields();
				var Volume = $row["Volume1"].toNumber();
				var Concentration = $row["Concentration1"].toNumber();
				var Total = Volume * Concentration;
				$row["Total1"].val(Total);
			}
		}
	);

	// Table 'view_semenanalysis' Field 'Concentration1'
	$('[data-table=view_semenanalysis][data-field=x_Concentration1]').on(
		{ // keys = event types, values = handler functions
			"change keyup": function(e) {

				// Your code
				var $row = $(this).fields();
				var Volume = $row["Volume1"].toNumber();
				var Concentration = $row["Concentration1"].toNumber();
				var Total = Volume * Concentration;
				$row["Total1"].val(Total);
			}
		}
	);

	// Table 'view_semenanalysis' Field 'ProgressiveMotility1'
	$('[data-table=view_semenanalysis][data-field=x_ProgressiveMotility1]').on(
		{ // keys = event types, values = handler functions
			"change keyup": function(e) {

				// Your code
				var $row = $(this).fields();
				var ProgressiveMotility = $row["ProgressiveMotility1"].toNumber();
				var NonProgrssiveMotile = $row["NonProgrssiveMotile1"].toNumber();
				var Immotile = 100 - ( ProgressiveMotility +  NonProgrssiveMotile);
				$row["Immotile1"].val(Immotile);

			//	$row["TotalProgrssiveMotile1"].val(ProgressiveMotility +  NonProgrssiveMotile);
			var Volume = $row["Volume1"].toNumber();
		var Concentration = $row["Concentration1"].toNumber();
			var ProgressiveMotility = $row["ProgressiveMotility1"].toNumber();
				var NonProgrssiveMotile = $row["NonProgrssiveMotile1"].toNumber();
		var hhh = (Volume * Concentration * ProgressiveMotility )/100;
		$row["TotalProgrssiveMotile1"].val(hhh.toFixed(1));
			}
		}
	);

	// Table 'view_semenanalysis' Field 'NonProgrssiveMotile1'
	$('[data-table=view_semenanalysis][data-field=x_NonProgrssiveMotile1]').on(
		{ // keys = event types, values = handler functions
			"change keyup": function(e) {

				// Your code
				var $row = $(this).fields();
				var ProgressiveMotility = $row["ProgressiveMotility1"].toNumber();
				var NonProgrssiveMotile = $row["NonProgrssiveMotile1"].toNumber();
				var Immotile = 100 - ( ProgressiveMotility +  NonProgrssiveMotile);
				$row["Immotile1"].val(Immotile);

			//	$row["TotalProgrssiveMotile1"].val(ProgressiveMotility +  NonProgrssiveMotile);
			var Volume = $row["Volume1"].toNumber();
		var Concentration = $row["Concentration1"].toNumber();
			var ProgressiveMotility = $row["ProgressiveMotility1"].toNumber();
				var NonProgrssiveMotile = $row["NonProgrssiveMotile1"].toNumber();
		var hhh = (Volume * Concentration * ProgressiveMotility )/100;
		$row["TotalProgrssiveMotile1"].val(hhh.toFixed(1));
			}
		}
	);

	// Table 'view_semenanalysis' Field 'Volume2'
	$('[data-table=view_semenanalysis][data-field=x_Volume2]').on(
		{ // keys = event types, values = handler functions
			"change keyup": function(e) {

				// Your code
				var $row = $(this).fields();
				var Volume = $row["Volume2"].toNumber();
				var Concentration = $row["Concentration2"].toNumber();
				var Total = Volume * Concentration;
				$row["Total2"].val(Total);
			}
		}
	);

	// Table 'view_semenanalysis' Field 'Concentration2'
	$('[data-table=view_semenanalysis][data-field=x_Concentration2]').on(
		{ // keys = event types, values = handler functions
			"change keyup": function(e) {

				// Your code
				var $row = $(this).fields();
				var Volume = $row["Volume2"].toNumber();
				var Concentration = $row["Concentration2"].toNumber();
				var Total = Volume * Concentration;
				$row["Total2"].val(Total);
			}
		}
	);

	// Table 'view_semenanalysis' Field 'ProgressiveMotility2'
	$('[data-table=view_semenanalysis][data-field=x_ProgressiveMotility2]').on(
		{ // keys = event types, values = handler functions
			"change keyup": function(e) {

				// Your code
				var $row = $(this).fields();
				var ProgressiveMotility = $row["ProgressiveMotility2"].toNumber();
				var NonProgrssiveMotile = $row["NonProgrssiveMotile2"].toNumber();
				var Immotile = 100 - ( ProgressiveMotility +  NonProgrssiveMotile);
				$row["Immotile2"].val(Immotile);

			//	$row["TotalProgrssiveMotile2"].val(ProgressiveMotility +  NonProgrssiveMotile);
			var Volume = $row["Volume2"].toNumber();
		var Concentration = $row["Concentration2"].toNumber();
			var ProgressiveMotility = $row["ProgressiveMotility2"].toNumber();
				var NonProgrssiveMotile = $row["NonProgrssiveMotile2"].toNumber();
		var hhh = (Volume * Concentration * ProgressiveMotility )/100;
		$row["TotalProgrssiveMotile2"].val(hhh.toFixed(1));
			}
		}
	);

	// Table 'view_semenanalysis' Field 'NonProgrssiveMotile2'
	$('[data-table=view_semenanalysis][data-field=x_NonProgrssiveMotile2]').on(
		{ // keys = event types, values = handler functions
			"change keyup": function(e) {

				// Your code
				var $row = $(this).fields();
				var ProgressiveMotility = $row["ProgressiveMotility2"].toNumber();
				var NonProgrssiveMotile = $row["NonProgrssiveMotile2"].toNumber();
				var Immotile = 100 - ( ProgressiveMotility +  NonProgrssiveMotile);
				$row["Immotile2"].val(Immotile);

			//	$row["TotalProgrssiveMotile2"].val(ProgressiveMotility +  NonProgrssiveMotile);
				var Volume = $row["Volume2"].toNumber();
		var Concentration = $row["Concentration2"].toNumber();
			var ProgressiveMotility = $row["ProgressiveMotility2"].toNumber();
				var NonProgrssiveMotile = $row["NonProgrssiveMotile2"].toNumber();
		var hhh = (Volume * Concentration * ProgressiveMotility )/100;
		$row["TotalProgrssiveMotile2"].val(hhh.toFixed(1));
			}
		}
	);

	// Table 'view_semenanalysis' Field 'MACS'
	$('[data-table=view_semenanalysis][data-field=x_MACS]').on(
		{ // keys = event types, values = handler functions
			"click": function(e) {

				// Your code
						var $row = $(this).fields();
						var MACS = $row["MACS"].value();
						if(MACS == "MACS")
						{
						  					 					 document.getElementById("Volume2").style.visibility = "visible";
							 document.getElementById("Concentration2").style.visibility = "visible";
							 document.getElementById("Total2").style.visibility = "visible";
							 document.getElementById("ProgressiveMotility2").style.visibility = "visible";
							 document.getElementById("NonProgrssiveMotile2").style.visibility = "visible";
							 document.getElementById("Immotile2").style.visibility = "visible";
							 document.getElementById("TotalProgrssiveMotile2").style.visibility = "visible";
							document.getElementById("x_Volume2").style.width = "80px";
		 					document.getElementById("x_Concentration2").style.width = "80px";
		 					document.getElementById("x_Total2").style.width = "80px";
		 					document.getElementById("x_ProgressiveMotility2").style.width = "80px";
		 					document.getElementById("x_NonProgrssiveMotile2").style.width = "80px";
		 					document.getElementById("x_Immotile2").style.width = "80px";
		 					document.getElementById("x_TotalProgrssiveMotile2").style.width = "80px";
						}else{
							 document.getElementById("x_Volume2").style.width = "0px";
							 document.getElementById("x_Concentration2").style.width = "0px";
							 document.getElementById("x_Total2").style.width = "0px";
							 document.getElementById("x_ProgressiveMotility2").style.width = "0px";
							 document.getElementById("x_NonProgrssiveMotile2").style.width = "0px";
							 document.getElementById("x_Immotile2").style.width = "0px";
							 document.getElementById("x_TotalProgrssiveMotile2").style.width = "0px";
							 document.getElementById("Volume2").style.visibility = "hidden";
							 document.getElementById("Concentration2").style.visibility = "hidden";
							 document.getElementById("Total2").style.visibility = "hidden";
							 document.getElementById("ProgressiveMotility2").style.visibility = "hidden";
							 document.getElementById("NonProgrssiveMotile2").style.visibility = "hidden";
							 document.getElementById("Immotile2").style.visibility = "hidden";
							 document.getElementById("TotalProgrssiveMotile2").style.visibility = "hidden";		
						}
			}
		}
	);

	// Table 'pharmacy_batchmas' Field 'OQ'
	$('[data-table=pharmacy_batchmas][data-field=x_OQ]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				var $row = $(this).fields();
				var $OQ = $row["OQ"].toNumber();
				var $ItemValue = $row["UR"].toNumber();
				var $MRP = $row["MRP"].toNumber();
				var $PSGST = $row["SSGST"].toNumber();
				var $PCGST = $row["SCGST"].toNumber();
				var PValue = ( $ItemValue ) + (  ( $ItemValue  ) * (($PSGST + $PCGST)/100)) ;

			   //	var PRate = PValue * $Quantity;
				$row["RT"].value(PValue.toFixed(2));
			}
		}
	);

	// Table 'pharmacy_batchmas' Field 'MRP'
	$('[data-table=pharmacy_batchmas][data-field=x_MRP]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				var $row = $(this).fields();
				var $OQ = $row["OQ"].toNumber();
				var $ItemValue = $row["UR"].toNumber();
				var $MRP = $row["MRP"].toNumber();
				var $PSGST = $row["SSGST"].toNumber();
				var $PCGST = $row["SCGST"].toNumber();
				var PValue = ( $ItemValue ) + (  ( $ItemValue  ) * (($PSGST + $PCGST)/100)) ;

			   //	var PRate = PValue * $Quantity;
				$row["RT"].value(PValue.toFixed(2));
			}
		}
	);

	// Table 'pharmacy_batchmas' Field 'UR'
	$('[data-table=pharmacy_batchmas][data-field=x_UR]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				var $row = $(this).fields();
				var $OQ = $row["OQ"].toNumber();
				var $ItemValue = $row["UR"].toNumber();
				var $MRP = $row["MRP"].toNumber();
				var $PSGST = $row["SSGST"].toNumber();
				var $PCGST = $row["SCGST"].toNumber();
				var PValue = ( $ItemValue ) + (  ( $ItemValue  ) * (($PSGST + $PCGST)/100)) ;

			   //	var PRate = PValue * $Quantity;
				$row["RT"].value(PValue.toFixed(2));
			}
		}
	);

	// Table 'pharmacy_batchmas' Field 'SSGST'
	$('[data-table=pharmacy_batchmas][data-field=x_SSGST]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				var $row = $(this).fields();
				var $OQ = $row["OQ"].toNumber();
				var $ItemValue = $row["UR"].toNumber();
				var $MRP = $row["MRP"].toNumber();
				var $PSGST = $row["SSGST"].toNumber();
				var $PCGST = $row["SCGST"].toNumber();
				var PValue = ( $ItemValue ) + (  ( $ItemValue  ) * (($PSGST + $PCGST)/100)) ;

			   //	var PRate = PValue * $Quantity;
				$row["RT"].value(PValue.toFixed(2));
			}
		}
	);

	// Table 'pharmacy_batchmas' Field 'SCGST'
	$('[data-table=pharmacy_batchmas][data-field=x_SCGST]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				var $row = $(this).fields();
				var $OQ = $row["OQ"].toNumber();
				var $ItemValue = $row["UR"].toNumber();
				var $MRP = $row["MRP"].toNumber();
				var $PSGST = $row["SSGST"].toNumber();
				var $PCGST = $row["SCGST"].toNumber();
				var PValue = ( $ItemValue ) + (  ( $ItemValue  ) * (($PSGST + $PCGST)/100)) ;

			   //	var PRate = PValue * $Quantity;
				$row["RT"].value(PValue.toFixed(2));
			}
		}
	);

	// Table 'pharmacy_batchmas' Field 'RT'
	$('[data-table=pharmacy_batchmas][data-field=x_RT]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				var $row = $(this).fields();
				var $OQ = $row["OQ"].toNumber();
				var $ItemValue = $row["UR"].toNumber();
				var $MRP = $row["MRP"].toNumber();
				var $PSGST = $row["SSGST"].toNumber();
				var $PCGST = $row["SCGST"].toNumber();
				var PValue = ( $ItemValue ) + (  ( $ItemValue  ) * (($PSGST + $PCGST)/100)) ;

			   //	var PRate = PValue * $Quantity;
				$row["RT"].value(PValue.toFixed(2));
			}
		}
	);

	// Table 'pharmacy_pharled' Field 'SLNO'
	$('[data-table=pharmacy_pharled][data-field=x_SLNO]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
					addtotalSum();
			}
		}
	);

	// Table 'pharmacy_pharled' Field 'Product'
	$('[data-table=pharmacy_pharled][data-field=x_Product]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				addtotalSum();
			}
		}
	);

	// Table 'pharmacy_pharled' Field 'RT'
	$('[data-table=pharmacy_pharled][data-field=x_RT]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
						var $row = $(this).fields();
				var $IQ = $row["IQ"].toNumber();
				var $RT = $row["RT"].toNumber();
				var $DAMT = $IQ * $RT;
				$row["DAMT"].value($DAMT);
				addtotalSum();
			}
		}
	);

	// Table 'pharmacy_pharled' Field 'IQ'
	$('[data-table=pharmacy_pharled][data-field=x_IQ]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				var $row = $(this).fields();
				var $IQ = $row["IQ"].toNumber();
				var $UR = $row["UR"].toNumber();
				if($IQ > $UR)
				{
					alert("You Cant Issue more than stock...");
					$row["IQ"].value($UR);
					$IQ = $UR;
				}
				var $RT = $row["RT"].toNumber();
				var $DAMT = $IQ * $RT;
				$row["DAMT"].value($DAMT);
				addtotalSum();
			}
		}
	);

	// Table 'pharmacy_pharled' Field 'DAMT'
	$('[data-table=pharmacy_pharled][data-field=x_DAMT]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
						var $row = $(this).fields();
				var $IQ = $row["IQ"].toNumber();
				var $RT = $row["RT"].toNumber();
				var $DAMT = $IQ * $RT;
				$row["DAMT"].value($DAMT);
				addtotalSum();
			}
		}
	);

	// Table 'pharmacy_po' Field 'DT'
	$('[data-table=pharmacy_po][data-field=x_DT]').on(
		{ // keys = event types, values = handler functions
		            "change keyup paste mouseup onChangeMonthYear onClose onSelect create picker_event hide changeDate": function (e) {
						var $row = $(this).fields();
		                var dobVal = $row["DT"];
		                var dobp = dobVal[0].value;
		                var parts = dobp.split('/');
		                $row["YM"].value(parts[2] + parts[1]);
			}
		}
	);

	// Table 'view_pharmacygrn' Field 'PrName'
	$('[data-table=view_pharmacygrn][data-field=x_PrName]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				var $row = $(this).fields();
				var  xBILLDT  = document.getElementById("x_BILLDT").value;
				if(xBILLDT == "")
				{
		            alert ("Please add Bill Date .....");
		            $row["PRC"].value('');
		            $row["PrName"].value('');
		            $row["BatchNo"].value('');
		            $row["ExpDate"].value('');
		            $row["MFRCODE"].value('');
		            $row["MRP"].value('');
		            $row["HSN"].value('');
		            $row["PSGST"].value('');
		            $row["PCGST"].value('');
		            document.getElementById("x_BILLDT").focus();
				}else{
		$row["BillDate"].value(xBILLDT);
				}
			}
		}
	);

	// Table 'view_pharmacygrn' Field 'GrnQuantity'
	$('[data-table=view_pharmacygrn][data-field=x_GrnQuantity]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				var $row = $(this).fields();
					var $Quantity = $row["GrnQuantity"].toNumber();
				var $FreeQty = $row["FreeQty"].toNumber();
				var $ItemValue = $row["PurValue"].toNumber();
				var $Disc = $row["Disc"].toNumber();
				var $MRP = $row["MRP"].toNumber();
				var $PurValue = $row["PurValue"].toNumber();

				//var $PurRate = $row["PurRate"].toNumber();
				var $PSGST = $row["PSGST"].toNumber();
				var $PCGST = $row["PCGST"].toNumber();
				var PValue = ( $ItemValue - $Disc ) + (  ( $ItemValue - $Disc ) * (($PSGST + $PCGST)/100)) ;
		       var PTax = (( $ItemValue - $Disc ) * (($PSGST + $PCGST)/100)) * $Quantity;
				var PRate = PValue * $Quantity; 
				 var ItemValuevv =    $ItemValue *  $Quantity;
				$row["PTax"].value(PTax);
				$row["ItemValue"].value(ItemValuevv);
				var totalitm = ItemValuevv + PTax;
				$row["SalTax"].value(totalitm);

				//$row["PurValue"].value(PValue);
				//$row["PurRate"].value(PRate);

							var SUnit = $row["SUnit"].toNumber();
					var $Quantity = $row["GrnQuantity"].toNumber();
				if(SUnit > 0)
				{
					$Quantity = $Quantity * SUnit;
				}
				$row["Quantity"].value($Quantity);

		////////////////////////////////////////////////////////
		//////////////////////////////////////////////////////
		//////////////////////////////////////////////////
						// Your code

								var $row = $(this).fields();
					var $Quantity = $row["GrnQuantity"].toNumber();
						var $FreeQty = $row["FreeQty"].toNumber();
						var $ItemValue = $row["PurValue"].toNumber();
						var $Disc = $row["Disc"].toNumber();
						var $MRP = $row["MRP"].toNumber();
						var $PurValue = $row["PurValue"].toNumber();

						//var $PurRate = $row["PurRate"].toNumber();
						var $PSGST = $row["PSGST"].toNumber();
						var $PCGST = $row["PCGST"].toNumber();
						var DiscCC = $row["Disc"].value();
						if ($Disc == 0) {
							var PValue = ($ItemValue - $Disc) + (($ItemValue - $Disc) * (($PSGST + $PCGST) / 100));
							var PTax = (($ItemValue - $Disc) * (($PSGST + $PCGST) / 100)) * $Quantity;
							var PRate = PValue * $Quantity;
							var ItemValuevv = $ItemValue * $Quantity;
							var totalitm = ItemValuevv + PTax;
						}
						else {
							try {
							var kk = DiscCC.toString().indexOf("%");
							var yy = DiscCC.toString().includes("%");
								if (DiscCC.toString().indexOf("%") == -1) {
									var aaa = ($ItemValue * $Quantity);
									var bbb = ($ItemValue * $Quantity) - $Disc;

									//var PValue = ( ($ItemValue*$Quantity) - $Disc ) + (  (  ($ItemValue*$Quantity) - $Disc ) * (($PSGST + $PCGST)/100)) ;
									//var PTax = (( ($ItemValue*$Quantity) - $Disc ) * (($PSGST + $PCGST)/100)) * $Quantity;

									var PTax = (($PSGST + $PCGST) / 100) * bbb;
									var PValue = bbb + PTax;
									var PRate = PValue;// * $Quantity; 
									var ItemValuevv = bbb;//  $ItemValue ;//*  $Quantity;
									var totalitm = PValue;//  ItemValuevv + PTax;
								} else {
									var $Disc = DiscCC.toString().replace("%", "");

									//var $Disc = ($ItemValue * $Quantity) * ($Disc / 100);
									//var PValue = (($ItemValue * $Quantity) - $Disc) + ((($ItemValue * $Quantity) - $Disc) * (($PSGST + $PCGST) / 100));
									///var PTax = ((($ItemValue * $Quantity) - $Disc) * (($PSGST + $PCGST) / 100)) * $Quantity;
									//var PRate = PValue;// * $Quantity; 
									//var ItemValuevv = $ItemValue;//*  $Quantity;
									//var totalitm = ItemValuevv + PTax;

									var aaa = ($ItemValue * $Quantity);
									var $Disc = ($Disc / 100) * aaa;
									var bbb = ($ItemValue * $Quantity) - $Disc;

									//var PValue = ( ($ItemValue*$Quantity) - $Disc ) + (  (  ($ItemValue*$Quantity) - $Disc ) * (($PSGST + $PCGST)/100)) ;
									//var PTax = (( ($ItemValue*$Quantity) - $Disc ) * (($PSGST + $PCGST)/100)) * $Quantity;

									var PTax = (($PSGST + $PCGST) / 100) * bbb;
									var PValue = bbb + PTax;
									var PRate = PValue;// * $Quantity; 
									var ItemValuevv = bbb;//  $ItemValue ;//*  $Quantity;
									var totalitm = PValue;//  ItemValuevv + PTax;
								}
						}catch (ex)
							{
							}

							//a
						 }
						$row["PTax"].value(PTax);  ///==============
						$row["ItemValue"].value(ItemValuevv);  //==============
						$row["SalTax"].value(totalitm);

						//$row["PurValue"].value(PValue);
						//$row["PurRate"].value(PRate);

						addtotalSum();
				addtotalSum();
			}
		}
	);

	// Table 'view_pharmacygrn' Field 'Quantity'
	$('[data-table=view_pharmacygrn][data-field=x_Quantity]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				var $row = $(this).fields();
			var $Quantity = $row["Quantity"].toNumber();
				var $FreeQty = $row["FreeQty"].toNumber();
				var $ItemValue = $row["PurValue"].toNumber();
				var $Disc = $row["Disc"].toNumber();
				var $MRP = $row["MRP"].toNumber();
				var $PurValue = $row["PurValue"].toNumber();

				//var $PurRate = $row["PurRate"].toNumber();
				var $PSGST = $row["PSGST"].toNumber();
				var $PCGST = $row["PCGST"].toNumber();
				var PValue = ( $ItemValue - $Disc ) + (  ( $ItemValue - $Disc ) * (($PSGST + $PCGST)/100)) ;
		       var PTax = (( $ItemValue - $Disc ) * (($PSGST + $PCGST)/100)) * $Quantity;
				var PRate = PValue * $Quantity; 
				 var ItemValuevv =    $ItemValue *  $Quantity;
				$row["PTax"].value(PTax);
				$row["ItemValue"].value(ItemValuevv);
				var totalitm = ItemValuevv + PTax;
				$row["SalTax"].value(totalitm);

				//$row["PurValue"].value(PValue);
				//$row["PurRate"].value(PRate);

				addtotalSum();

				/////////////////////////////////////////////////
				//////////////////////////////////////////////
				//////////////////////////////////////
						// Your code

								var $row = $(this).fields();
					var $Quantity = $row["GrnQuantity"].toNumber();
						var $FreeQty = $row["FreeQty"].toNumber();
						var $ItemValue = $row["PurValue"].toNumber();
						var $Disc = $row["Disc"].toNumber();
						var $MRP = $row["MRP"].toNumber();
						var $PurValue = $row["PurValue"].toNumber();

						//var $PurRate = $row["PurRate"].toNumber();
						var $PSGST = $row["PSGST"].toNumber();
						var $PCGST = $row["PCGST"].toNumber();
						var DiscCC = $row["Disc"].value();
						if ($Disc == 0) {
							var PValue = ($ItemValue - $Disc) + (($ItemValue - $Disc) * (($PSGST + $PCGST) / 100));
							var PTax = (($ItemValue - $Disc) * (($PSGST + $PCGST) / 100)) * $Quantity;
							var PRate = PValue * $Quantity;
							var ItemValuevv = $ItemValue * $Quantity;
							var totalitm = ItemValuevv + PTax;
						}
						else {
							try {
							var kk = DiscCC.toString().indexOf("%");
							var yy = DiscCC.toString().includes("%");
								if (DiscCC.toString().indexOf("%") == -1) {
									var aaa = ($ItemValue * $Quantity);
									var bbb = ($ItemValue * $Quantity) - $Disc;

									//var PValue = ( ($ItemValue*$Quantity) - $Disc ) + (  (  ($ItemValue*$Quantity) - $Disc ) * (($PSGST + $PCGST)/100)) ;
									//var PTax = (( ($ItemValue*$Quantity) - $Disc ) * (($PSGST + $PCGST)/100)) * $Quantity;

									var PTax = (($PSGST + $PCGST) / 100) * bbb;
									var PValue = bbb + PTax;
									var PRate = PValue;// * $Quantity; 
									var ItemValuevv = bbb;//  $ItemValue ;//*  $Quantity;
									var totalitm = PValue;//  ItemValuevv + PTax;
								} else {
									var $Disc = DiscCC.toString().replace("%", "");

									//var $Disc = ($ItemValue * $Quantity) * ($Disc / 100);
									//var PValue = (($ItemValue * $Quantity) - $Disc) + ((($ItemValue * $Quantity) - $Disc) * (($PSGST + $PCGST) / 100));
									///var PTax = ((($ItemValue * $Quantity) - $Disc) * (($PSGST + $PCGST) / 100)) * $Quantity;
									//var PRate = PValue;// * $Quantity; 
									//var ItemValuevv = $ItemValue;//*  $Quantity;
									//var totalitm = ItemValuevv + PTax;

									var aaa = ($ItemValue * $Quantity);
									var $Disc = ($Disc / 100) * aaa;
									var bbb = ($ItemValue * $Quantity) - $Disc;

									//var PValue = ( ($ItemValue*$Quantity) - $Disc ) + (  (  ($ItemValue*$Quantity) - $Disc ) * (($PSGST + $PCGST)/100)) ;
									//var PTax = (( ($ItemValue*$Quantity) - $Disc ) * (($PSGST + $PCGST)/100)) * $Quantity;

									var PTax = (($PSGST + $PCGST) / 100) * bbb;
									var PValue = bbb + PTax;
									var PRate = PValue;// * $Quantity; 
									var ItemValuevv = bbb;//  $ItemValue ;//*  $Quantity;
									var totalitm = PValue;//  ItemValuevv + PTax;
								}
						}catch (ex)
							{
							}

							//a
						 }
						$row["PTax"].value(PTax);  ///==============
						$row["ItemValue"].value(ItemValuevv);  //==============
						$row["SalTax"].value(totalitm);

						//$row["PurValue"].value(PValue);
						//$row["PurRate"].value(PRate);

						addtotalSum();
			}
		}
	);

	// Table 'view_pharmacygrn' Field 'FreeQty'
	$('[data-table=view_pharmacygrn][data-field=x_FreeQty]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
						var $row = $(this).fields();
			var $Quantity = $row["GrnQuantity"].toNumber();
				var $FreeQty = $row["FreeQty"].toNumber();
				var $ItemValue = $row["PurValue"].toNumber();
				var $Disc = $row["Disc"].toNumber();
				var $MRP = $row["MRP"].toNumber();
				var $PurValue = $row["PurValue"].toNumber();

				//var $PurRate = $row["PurRate"].toNumber();
				var $PSGST = $row["PSGST"].toNumber();
				var $PCGST = $row["PCGST"].toNumber();
				var PValue = ( $ItemValue - $Disc ) + (  ( $ItemValue - $Disc ) * (($PSGST + $PCGST)/100)) ;
		       var PTax = (( $ItemValue - $Disc ) * (($PSGST + $PCGST)/100)) * $Quantity;
				var PRate = PValue * $Quantity; 
				 var ItemValuevv =    $ItemValue *  $Quantity;
				$row["PTax"].value(PTax);
				$row["ItemValue"].value(ItemValuevv);
				var totalitm = ItemValuevv + PTax;
				$row["SalTax"].value(totalitm);

				//$row["PurValue"].value(PValue);
				//$row["PurRate"].value(PRate);

		addtotalSum();

		///////////////////
		//////////////////////
		/////////////////
						// Your code

								var $row = $(this).fields();
					var $Quantity = $row["GrnQuantity"].toNumber();
						var $FreeQty = $row["FreeQty"].toNumber();
						var $ItemValue = $row["PurValue"].toNumber();
						var $Disc = $row["Disc"].toNumber();
						var $MRP = $row["MRP"].toNumber();
						var $PurValue = $row["PurValue"].toNumber();

						//var $PurRate = $row["PurRate"].toNumber();
						var $PSGST = $row["PSGST"].toNumber();
						var $PCGST = $row["PCGST"].toNumber();
						var DiscCC = $row["Disc"].value();
						if ($Disc == 0) {
							var PValue = ($ItemValue - $Disc) + (($ItemValue - $Disc) * (($PSGST + $PCGST) / 100));
							var PTax = (($ItemValue - $Disc) * (($PSGST + $PCGST) / 100)) * $Quantity;
							var PRate = PValue * $Quantity;
							var ItemValuevv = $ItemValue * $Quantity;
							var totalitm = ItemValuevv + PTax;
						}
						else {
							try {
							var kk = DiscCC.toString().indexOf("%");
							var yy = DiscCC.toString().includes("%");
								if (DiscCC.toString().indexOf("%") == -1) {
									var aaa = ($ItemValue * $Quantity);
									var bbb = ($ItemValue * $Quantity) - $Disc;

									//var PValue = ( ($ItemValue*$Quantity) - $Disc ) + (  (  ($ItemValue*$Quantity) - $Disc ) * (($PSGST + $PCGST)/100)) ;
									//var PTax = (( ($ItemValue*$Quantity) - $Disc ) * (($PSGST + $PCGST)/100)) * $Quantity;

									var PTax = (($PSGST + $PCGST) / 100) * bbb;
									var PValue = bbb + PTax;
									var PRate = PValue;// * $Quantity; 
									var ItemValuevv = bbb;//  $ItemValue ;//*  $Quantity;
									var totalitm = PValue;//  ItemValuevv + PTax;
								} else {
									var $Disc = DiscCC.toString().replace("%", "");

									//var $Disc = ($ItemValue * $Quantity) * ($Disc / 100);
									//var PValue = (($ItemValue * $Quantity) - $Disc) + ((($ItemValue * $Quantity) - $Disc) * (($PSGST + $PCGST) / 100));
									///var PTax = ((($ItemValue * $Quantity) - $Disc) * (($PSGST + $PCGST) / 100)) * $Quantity;
									//var PRate = PValue;// * $Quantity; 
									//var ItemValuevv = $ItemValue;//*  $Quantity;
									//var totalitm = ItemValuevv + PTax;

									var aaa = ($ItemValue * $Quantity);
									var $Disc = ($Disc / 100) * aaa;
									var bbb = ($ItemValue * $Quantity) - $Disc;

									//var PValue = ( ($ItemValue*$Quantity) - $Disc ) + (  (  ($ItemValue*$Quantity) - $Disc ) * (($PSGST + $PCGST)/100)) ;
									//var PTax = (( ($ItemValue*$Quantity) - $Disc ) * (($PSGST + $PCGST)/100)) * $Quantity;

									var PTax = (($PSGST + $PCGST) / 100) * bbb;
									var PValue = bbb + PTax;
									var PRate = PValue;// * $Quantity; 
									var ItemValuevv = bbb;//  $ItemValue ;//*  $Quantity;
									var totalitm = PValue;//  ItemValuevv + PTax;
								}
						}catch (ex)
							{
							}

							//a
						 }
						$row["PTax"].value(PTax);  ///==============
						$row["ItemValue"].value(ItemValuevv);  //==============
						$row["SalTax"].value(totalitm);

						//$row["PurValue"].value(PValue);
						//$row["PurRate"].value(PRate);

						addtotalSum();
			}
		}
	);

	// Table 'view_pharmacygrn' Field 'PUnit'
	$('[data-table=view_pharmacygrn][data-field=x_PUnit]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
						// Your code

								var $row = $(this).fields();
					var $Quantity = $row["GrnQuantity"].toNumber();
						var $FreeQty = $row["FreeQty"].toNumber();
						var $ItemValue = $row["PurValue"].toNumber();
						var $Disc = $row["Disc"].toNumber();
						var $MRP = $row["MRP"].toNumber();
						var $PurValue = $row["PurValue"].toNumber();

						//var $PurRate = $row["PurRate"].toNumber();
						var $PSGST = $row["PSGST"].toNumber();
						var $PCGST = $row["PCGST"].toNumber();
						var DiscCC = $row["Disc"].value();
						if ($Disc == 0) {
							var PValue = ($ItemValue - $Disc) + (($ItemValue - $Disc) * (($PSGST + $PCGST) / 100));
							var PTax = (($ItemValue - $Disc) * (($PSGST + $PCGST) / 100)) * $Quantity;
							var PRate = PValue * $Quantity;
							var ItemValuevv = $ItemValue * $Quantity;
							var totalitm = ItemValuevv + PTax;
						}
						else {
							try {
							var kk = DiscCC.toString().indexOf("%");
							var yy = DiscCC.toString().includes("%");
								if (DiscCC.toString().indexOf("%") == -1) {
									var aaa = ($ItemValue * $Quantity);
									var bbb = ($ItemValue * $Quantity) - $Disc;

									//var PValue = ( ($ItemValue*$Quantity) - $Disc ) + (  (  ($ItemValue*$Quantity) - $Disc ) * (($PSGST + $PCGST)/100)) ;
									//var PTax = (( ($ItemValue*$Quantity) - $Disc ) * (($PSGST + $PCGST)/100)) * $Quantity;

									var PTax = (($PSGST + $PCGST) / 100) * bbb;
									var PValue = bbb + PTax;
									var PRate = PValue;// * $Quantity; 
									var ItemValuevv = bbb;//  $ItemValue ;//*  $Quantity;
									var totalitm = PValue;//  ItemValuevv + PTax;
								} else {
									var $Disc = DiscCC.toString().replace("%", "");

									//var $Disc = ($ItemValue * $Quantity) * ($Disc / 100);
									//var PValue = (($ItemValue * $Quantity) - $Disc) + ((($ItemValue * $Quantity) - $Disc) * (($PSGST + $PCGST) / 100));
									///var PTax = ((($ItemValue * $Quantity) - $Disc) * (($PSGST + $PCGST) / 100)) * $Quantity;
									//var PRate = PValue;// * $Quantity; 
									//var ItemValuevv = $ItemValue;//*  $Quantity;
									//var totalitm = ItemValuevv + PTax;

									var aaa = ($ItemValue * $Quantity);
									var $Disc = ($Disc / 100) * aaa;
									var bbb = ($ItemValue * $Quantity) - $Disc;

									//var PValue = ( ($ItemValue*$Quantity) - $Disc ) + (  (  ($ItemValue*$Quantity) - $Disc ) * (($PSGST + $PCGST)/100)) ;
									//var PTax = (( ($ItemValue*$Quantity) - $Disc ) * (($PSGST + $PCGST)/100)) * $Quantity;

									var PTax = (($PSGST + $PCGST) / 100) * bbb;
									var PValue = bbb + PTax;
									var PRate = PValue;// * $Quantity; 
									var ItemValuevv = bbb;//  $ItemValue ;//*  $Quantity;
									var totalitm = PValue;//  ItemValuevv + PTax;
								}
						}catch (ex)
							{
							}

							//a
						 }
						$row["PTax"].value(PTax);  ///==============
						$row["ItemValue"].value(ItemValuevv);  //==============
						$row["SalTax"].value(totalitm);

						//$row["PurValue"].value(PValue);
						//$row["PurRate"].value(PRate);

						addtotalSum();
			}
		}
	);

	// Table 'view_pharmacygrn' Field 'SUnit'
	$('[data-table=view_pharmacygrn][data-field=x_SUnit]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				var $row = $(this).fields();
					var SUnit = $row["SUnit"].toNumber();
					var $Quantity = $row["GrnQuantity"].toNumber();
				if(SUnit > 0)
				{
					$Quantity = $Quantity * SUnit;
				}
				$row["Quantity"].value($Quantity);
						var $MRP = $row["MRP"].toNumber();
				var SUnit = $row["SUnit"].toNumber();
				var $Quantity = $row["GrnQuantity"].toNumber();
				if(SUnit > 0)
				{
					$MRP = $MRP / SUnit ;
				}
				$row["SalRate"].value($MRP.toFixed(2));

				///////////////////////////////
				///////////////////////////////////
				/////////////////////////////////////
						// Your code

								var $row = $(this).fields();
					var $Quantity = $row["GrnQuantity"].toNumber();
						var $FreeQty = $row["FreeQty"].toNumber();
						var $ItemValue = $row["PurValue"].toNumber();
						var $Disc = $row["Disc"].toNumber();
						var $MRP = $row["MRP"].toNumber();
						var $PurValue = $row["PurValue"].toNumber();

						//var $PurRate = $row["PurRate"].toNumber();
						var $PSGST = $row["PSGST"].toNumber();
						var $PCGST = $row["PCGST"].toNumber();
						var DiscCC = $row["Disc"].value();
						if ($Disc == 0) {
							var PValue = ($ItemValue - $Disc) + (($ItemValue - $Disc) * (($PSGST + $PCGST) / 100));
							var PTax = (($ItemValue - $Disc) * (($PSGST + $PCGST) / 100)) * $Quantity;
							var PRate = PValue * $Quantity;
							var ItemValuevv = $ItemValue * $Quantity;
							var totalitm = ItemValuevv + PTax;
						}
						else {
							try {
							var kk = DiscCC.toString().indexOf("%");
							var yy = DiscCC.toString().includes("%");
								if (DiscCC.toString().indexOf("%") == -1) {
									var aaa = ($ItemValue * $Quantity);
									var bbb = ($ItemValue * $Quantity) - $Disc;

									//var PValue = ( ($ItemValue*$Quantity) - $Disc ) + (  (  ($ItemValue*$Quantity) - $Disc ) * (($PSGST + $PCGST)/100)) ;
									//var PTax = (( ($ItemValue*$Quantity) - $Disc ) * (($PSGST + $PCGST)/100)) * $Quantity;

									var PTax = (($PSGST + $PCGST) / 100) * bbb;
									var PValue = bbb + PTax;
									var PRate = PValue;// * $Quantity; 
									var ItemValuevv = bbb;//  $ItemValue ;//*  $Quantity;
									var totalitm = PValue;//  ItemValuevv + PTax;
								} else {
									var $Disc = DiscCC.toString().replace("%", "");

									//var $Disc = ($ItemValue * $Quantity) * ($Disc / 100);
									//var PValue = (($ItemValue * $Quantity) - $Disc) + ((($ItemValue * $Quantity) - $Disc) * (($PSGST + $PCGST) / 100));
									///var PTax = ((($ItemValue * $Quantity) - $Disc) * (($PSGST + $PCGST) / 100)) * $Quantity;
									//var PRate = PValue;// * $Quantity; 
									//var ItemValuevv = $ItemValue;//*  $Quantity;
									//var totalitm = ItemValuevv + PTax;

									var aaa = ($ItemValue * $Quantity);
									var $Disc = ($Disc / 100) * aaa;
									var bbb = ($ItemValue * $Quantity) - $Disc;

									//var PValue = ( ($ItemValue*$Quantity) - $Disc ) + (  (  ($ItemValue*$Quantity) - $Disc ) * (($PSGST + $PCGST)/100)) ;
									//var PTax = (( ($ItemValue*$Quantity) - $Disc ) * (($PSGST + $PCGST)/100)) * $Quantity;

									var PTax = (($PSGST + $PCGST) / 100) * bbb;
									var PValue = bbb + PTax;
									var PRate = PValue;// * $Quantity; 
									var ItemValuevv = bbb;//  $ItemValue ;//*  $Quantity;
									var totalitm = PValue;//  ItemValuevv + PTax;
								}
						}catch (ex)
							{
							}

							//a
						 }
						$row["PTax"].value(PTax);  ///==============
						$row["ItemValue"].value(ItemValuevv);  //==============
						$row["SalTax"].value(totalitm);

						//$row["PurValue"].value(PValue);
						//$row["PurRate"].value(PRate);

						addtotalSum();
			}
		}
	);

	// Table 'view_pharmacygrn' Field 'Pack'
	$('[data-table=view_pharmacygrn][data-field=x_Pack]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				var $row = $(this).fields();
				var $Pack = $row["Pack"].toNumber();
				var $Quantity = $row["Quantity"].toNumber();
				$row["Quantity"].value($Quantity * $Pack);
			}
		}
	);

	// Table 'view_pharmacygrn' Field 'MRP'
	$('[data-table=view_pharmacygrn][data-field=x_MRP]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				var $row = $(this).fields();
				var $MRP = $row["MRP"].toNumber();
				var SUnit = $row["SUnit"].toNumber();
				var $Quantity = $row["GrnQuantity"].toNumber();
				if(SUnit > 0)
				{
					$MRP = $MRP / SUnit ;
				}
				$row["SalRate"].value($MRP.toFixed(2));
				var $FreeQty = $row["FreeQty"].toNumber();
				var $ItemValue = $row["PurValue"].toNumber();
				var $Disc = $row["Disc"].toNumber();
				var $MRP = $row["MRP"].toNumber();
				var $PurValue = $row["PurValue"].toNumber();

				//var $PurRate = $row["PurRate"].toNumber();
				var $PSGST = $row["PSGST"].toNumber();
				var $PCGST = $row["PCGST"].toNumber();
				var PValue = ( $ItemValue - $Disc ) + (  ( $ItemValue - $Disc ) * (($PSGST + $PCGST)/100)) ;
		       var PTax = (( $ItemValue - $Disc ) * (($PSGST + $PCGST)/100)) * $Quantity;
				var PRate = PValue * $Quantity; 
				 var ItemValuevv =   $ItemValue *  $Quantity;
				$row["PTax"].value(PTax.toFixed(2));
				$row["ItemValue"].value(ItemValuevv.toFixed(2));
				var totalitm = ItemValuevv + PTax;
				$row["SalTax"].value(totalitm.toFixed(2));
				$row["SalRate"].value($MRP);

				//$row["PurValue"].value(PValue);
				//$row["PurRate"].value(PRate);

				addtotalSum();

		////////////////////////////////////////////
		///////////////////////////////////////////////
		/////////////////////////////////////////////////////
						// Your code

								var $row = $(this).fields();
					var $Quantity = $row["GrnQuantity"].toNumber();
						var $FreeQty = $row["FreeQty"].toNumber();
						var $ItemValue = $row["PurValue"].toNumber();
						var $Disc = $row["Disc"].toNumber();
						var $MRP = $row["MRP"].toNumber();
						var $PurValue = $row["PurValue"].toNumber();

						//var $PurRate = $row["PurRate"].toNumber();
						var $PSGST = $row["PSGST"].toNumber();
						var $PCGST = $row["PCGST"].toNumber();
						var DiscCC = $row["Disc"].value();
						if ($Disc == 0) {
							var PValue = ($ItemValue - $Disc) + (($ItemValue - $Disc) * (($PSGST + $PCGST) / 100));
							var PTax = (($ItemValue - $Disc) * (($PSGST + $PCGST) / 100)) * $Quantity;
							var PRate = PValue * $Quantity;
							var ItemValuevv = $ItemValue * $Quantity;
							var totalitm = ItemValuevv + PTax;
						}
						else {
							try {
							var kk = DiscCC.toString().indexOf("%");
							var yy = DiscCC.toString().includes("%");
								if (DiscCC.toString().indexOf("%") == -1) {
									var aaa = ($ItemValue * $Quantity);
									var bbb = ($ItemValue * $Quantity) - $Disc;

									//var PValue = ( ($ItemValue*$Quantity) - $Disc ) + (  (  ($ItemValue*$Quantity) - $Disc ) * (($PSGST + $PCGST)/100)) ;
									//var PTax = (( ($ItemValue*$Quantity) - $Disc ) * (($PSGST + $PCGST)/100)) * $Quantity;

									var PTax = (($PSGST + $PCGST) / 100) * bbb;
									var PValue = bbb + PTax;
									var PRate = PValue;// * $Quantity; 
									var ItemValuevv = bbb;//  $ItemValue ;//*  $Quantity;
									var totalitm = PValue;//  ItemValuevv + PTax;
								} else {
									var $Disc = DiscCC.toString().replace("%", "");

									//var $Disc = ($ItemValue * $Quantity) * ($Disc / 100);
									//var PValue = (($ItemValue * $Quantity) - $Disc) + ((($ItemValue * $Quantity) - $Disc) * (($PSGST + $PCGST) / 100));
									///var PTax = ((($ItemValue * $Quantity) - $Disc) * (($PSGST + $PCGST) / 100)) * $Quantity;
									//var PRate = PValue;// * $Quantity; 
									//var ItemValuevv = $ItemValue;//*  $Quantity;
									//var totalitm = ItemValuevv + PTax;

									var aaa = ($ItemValue * $Quantity);
									var $Disc = ($Disc / 100) * aaa;
									var bbb = ($ItemValue * $Quantity) - $Disc;

									//var PValue = ( ($ItemValue*$Quantity) - $Disc ) + (  (  ($ItemValue*$Quantity) - $Disc ) * (($PSGST + $PCGST)/100)) ;
									//var PTax = (( ($ItemValue*$Quantity) - $Disc ) * (($PSGST + $PCGST)/100)) * $Quantity;

									var PTax = (($PSGST + $PCGST) / 100) * bbb;
									var PValue = bbb + PTax;
									var PRate = PValue;// * $Quantity; 
									var ItemValuevv = bbb;//  $ItemValue ;//*  $Quantity;
									var totalitm = PValue;//  ItemValuevv + PTax;
								}
						}catch (ex)
							{
							}

							//a
						 }
						$row["PTax"].value(PTax);  ///==============
						$row["ItemValue"].value(ItemValuevv);  //==============
						$row["SalTax"].value(totalitm);

						//$row["PurValue"].value(PValue);
						//$row["PurRate"].value(PRate);

						addtotalSum();
			}
		}
	);

	// Table 'view_pharmacygrn' Field 'PurValue'
	$('[data-table=view_pharmacygrn][data-field=x_PurValue]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
						var $row = $(this).fields();
			var $Quantity = $row["GrnQuantity"].toNumber();
				var $FreeQty = $row["FreeQty"].toNumber();
				var $ItemValue = $row["PurValue"].toNumber();
				var $Disc = $row["Disc"].toNumber();
				var $MRP = $row["MRP"].toNumber();
				var $PurValue = $row["PurValue"].toNumber();

				//var $PurRate = $row["PurRate"].toNumber();
				var $PSGST = $row["PSGST"].toNumber();
				var $PCGST = $row["PCGST"].toNumber();
				var PValue = ( $ItemValue - $Disc ) + (  ( $ItemValue - $Disc ) * (($PSGST + $PCGST)/100)) ;
		       var PTax = (( $ItemValue - $Disc ) * (($PSGST + $PCGST)/100)) * $Quantity;
				var PRate = PValue * $Quantity; 
				 var ItemValuevv =   $ItemValue *  $Quantity;
				$row["PTax"].value(PTax.toFixed(2));
				$row["ItemValue"].value(ItemValuevv.toFixed(2));
				var totalitm = ItemValuevv + PTax;
				$row["SalTax"].value(totalitm.toFixed(2));

				//$row["PurValue"].value(PValue);
				//$row["PurRate"].value(PRate);

				addtotalSum();

				/////////////////////////
						// Your code

								var $row = $(this).fields();
					var $Quantity = $row["GrnQuantity"].toNumber();
						var $FreeQty = $row["FreeQty"].toNumber();
						var $ItemValue = $row["PurValue"].toNumber();
						var $Disc = $row["Disc"].toNumber();
						var $MRP = $row["MRP"].toNumber();
						var $PurValue = $row["PurValue"].toNumber();

						//var $PurRate = $row["PurRate"].toNumber();
						var $PSGST = $row["PSGST"].toNumber();
						var $PCGST = $row["PCGST"].toNumber();
						var DiscCC = $row["Disc"].value();
						if ($Disc == 0) {
							var PValue = ($ItemValue - $Disc) + (($ItemValue - $Disc) * (($PSGST + $PCGST) / 100));
							var PTax = (($ItemValue - $Disc) * (($PSGST + $PCGST) / 100)) * $Quantity;
							var PRate = PValue * $Quantity;
							var ItemValuevv = $ItemValue * $Quantity;
							var totalitm = ItemValuevv + PTax;
						}
						else {
							try {
							var kk = DiscCC.toString().indexOf("%");
							var yy = DiscCC.toString().includes("%");
								if (DiscCC.toString().indexOf("%") == -1) {
									var aaa = ($ItemValue * $Quantity);
									var bbb = ($ItemValue * $Quantity) - $Disc;

									//var PValue = ( ($ItemValue*$Quantity) - $Disc ) + (  (  ($ItemValue*$Quantity) - $Disc ) * (($PSGST + $PCGST)/100)) ;
									//var PTax = (( ($ItemValue*$Quantity) - $Disc ) * (($PSGST + $PCGST)/100)) * $Quantity;

									var PTax = (($PSGST + $PCGST) / 100) * bbb;
									var PValue = bbb + PTax;
									var PRate = PValue;// * $Quantity; 
									var ItemValuevv = bbb;//  $ItemValue ;//*  $Quantity;
									var totalitm = PValue;//  ItemValuevv + PTax;
								} else {
									var $Disc = DiscCC.toString().replace("%", "");

									//var $Disc = ($ItemValue * $Quantity) * ($Disc / 100);
									//var PValue = (($ItemValue * $Quantity) - $Disc) + ((($ItemValue * $Quantity) - $Disc) * (($PSGST + $PCGST) / 100));
									///var PTax = ((($ItemValue * $Quantity) - $Disc) * (($PSGST + $PCGST) / 100)) * $Quantity;
									//var PRate = PValue;// * $Quantity; 
									//var ItemValuevv = $ItemValue;//*  $Quantity;
									//var totalitm = ItemValuevv + PTax;

									var aaa = ($ItemValue * $Quantity);
									var $Disc = ($Disc / 100) * aaa;
									var bbb = ($ItemValue * $Quantity) - $Disc;

									//var PValue = ( ($ItemValue*$Quantity) - $Disc ) + (  (  ($ItemValue*$Quantity) - $Disc ) * (($PSGST + $PCGST)/100)) ;
									//var PTax = (( ($ItemValue*$Quantity) - $Disc ) * (($PSGST + $PCGST)/100)) * $Quantity;

									var PTax = (($PSGST + $PCGST) / 100) * bbb;
									var PValue = bbb + PTax;
									var PRate = PValue;// * $Quantity; 
									var ItemValuevv = bbb;//  $ItemValue ;//*  $Quantity;
									var totalitm = PValue;//  ItemValuevv + PTax;
								}
						}catch (ex)
							{
							}

							//a
						 }
						$row["PTax"].value(PTax);  ///==============
						$row["ItemValue"].value(ItemValuevv);  //==============
						$row["SalTax"].value(totalitm);

						//$row["PurValue"].value(PValue);
						//$row["PurRate"].value(PRate);

						addtotalSum();
			}
		}
	);

	// Table 'view_pharmacygrn' Field 'Disc'
	$('[data-table=view_pharmacygrn][data-field=x_Disc]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
						// Your code

								var $row = $(this).fields();
					var $Quantity = $row["GrnQuantity"].toNumber();
						var $FreeQty = $row["FreeQty"].toNumber();
						var $ItemValue = $row["PurValue"].toNumber();
						var $Disc = $row["Disc"].toNumber();
						var $MRP = $row["MRP"].toNumber();
						var $PurValue = $row["PurValue"].toNumber();

						//var $PurRate = $row["PurRate"].toNumber();
						var $PSGST = $row["PSGST"].toNumber();
						var $PCGST = $row["PCGST"].toNumber();
						var DiscCC = $row["Disc"].value();
						if ($Disc == 0) {
							var PValue = ($ItemValue - $Disc) + (($ItemValue - $Disc) * (($PSGST + $PCGST) / 100));
							var PTax = (($ItemValue - $Disc) * (($PSGST + $PCGST) / 100)) * $Quantity;
							var PRate = PValue * $Quantity;
							var ItemValuevv = $ItemValue * $Quantity;
							var totalitm = ItemValuevv + PTax;
						}
						else {
							try {
							var kk = DiscCC.toString().indexOf("%");
							var yy = DiscCC.toString().includes("%");
								if (DiscCC.toString().indexOf("%") == -1) {
									var aaa = ($ItemValue * $Quantity);
									var bbb = ($ItemValue * $Quantity) - $Disc;

									//var PValue = ( ($ItemValue*$Quantity) - $Disc ) + (  (  ($ItemValue*$Quantity) - $Disc ) * (($PSGST + $PCGST)/100)) ;
									//var PTax = (( ($ItemValue*$Quantity) - $Disc ) * (($PSGST + $PCGST)/100)) * $Quantity;

									var PTax = (($PSGST + $PCGST) / 100) * bbb;
									var PValue = bbb + PTax;
									var PRate = PValue;// * $Quantity; 
									var ItemValuevv = bbb;//  $ItemValue ;//*  $Quantity;
									var totalitm = PValue;//  ItemValuevv + PTax;
								} else {
									var $Disc = DiscCC.toString().replace("%", "");

									//var $Disc = ($ItemValue * $Quantity) * ($Disc / 100);
									//var PValue = (($ItemValue * $Quantity) - $Disc) + ((($ItemValue * $Quantity) - $Disc) * (($PSGST + $PCGST) / 100));
									///var PTax = ((($ItemValue * $Quantity) - $Disc) * (($PSGST + $PCGST) / 100)) * $Quantity;
									//var PRate = PValue;// * $Quantity; 
									//var ItemValuevv = $ItemValue;//*  $Quantity;
									//var totalitm = ItemValuevv + PTax;

									var aaa = ($ItemValue * $Quantity);
									var $Disc = ($Disc / 100) * aaa;
									var bbb = ($ItemValue * $Quantity) - $Disc;

									//var PValue = ( ($ItemValue*$Quantity) - $Disc ) + (  (  ($ItemValue*$Quantity) - $Disc ) * (($PSGST + $PCGST)/100)) ;
									//var PTax = (( ($ItemValue*$Quantity) - $Disc ) * (($PSGST + $PCGST)/100)) * $Quantity;

									var PTax = (($PSGST + $PCGST) / 100) * bbb;
									var PValue = bbb + PTax;
									var PRate = PValue;// * $Quantity; 
									var ItemValuevv = bbb;//  $ItemValue ;//*  $Quantity;
									var totalitm = PValue;//  ItemValuevv + PTax;
								}
						}catch (ex)
							{
							}

							//a
						 }
						$row["PTax"].value(PTax);  ///==============
						$row["ItemValue"].value(ItemValuevv);  //==============
						$row["SalTax"].value(totalitm);

						//$row["PurValue"].value(PValue);
						//$row["PurRate"].value(PRate);

						addtotalSum();
			}
		}
	);

	// Table 'view_pharmacygrn' Field 'PSGST'
	$('[data-table=view_pharmacygrn][data-field=x_PSGST]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
						var $row = $(this).fields();
				var $PSGST = $row["PSGST"].toNumber();
				$row["SSGST"].value($PSGST);
					var $Quantity = $row["GrnQuantity"].toNumber();
				var $FreeQty = $row["FreeQty"].toNumber();
				var $ItemValue = $row["PurValue"].toNumber();
				var $Disc = $row["Disc"].toNumber();
				var $MRP = $row["MRP"].toNumber();
				var $PurValue = $row["PurValue"].toNumber();

				//var $PurRate = $row["PurRate"].toNumber();
				var $PSGST = $row["PSGST"].toNumber();
				var $PCGST = $row["PCGST"].toNumber();
				var PValue = ( $ItemValue - $Disc ) + (  ( $ItemValue - $Disc ) * (($PSGST + $PCGST)/100)) ;
		       var PTax = (( $ItemValue - $Disc ) * (($PSGST + $PCGST)/100)) * $Quantity;
				var PRate = PValue * $Quantity; 
				 var ItemValuevv =   $ItemValue *  $Quantity;
				$row["PTax"].value(PTax.toFixed(2));
				$row["ItemValue"].value(ItemValuevv.toFixed(2));
				var totalitm = ItemValuevv + PTax;
				$row["SalTax"].value(totalitm.toFixed(2));

				//$row["PurValue"].value(PValue);
				//$row["PurRate"].value(PRate);

				addtotalSum();

				////////////////////////////////
				////////////////////////////////
				/////////////////////////////
						// Your code

								var $row = $(this).fields();
					var $Quantity = $row["GrnQuantity"].toNumber();
						var $FreeQty = $row["FreeQty"].toNumber();
						var $ItemValue = $row["PurValue"].toNumber();
						var $Disc = $row["Disc"].toNumber();
						var $MRP = $row["MRP"].toNumber();
						var $PurValue = $row["PurValue"].toNumber();

						//var $PurRate = $row["PurRate"].toNumber();
						var $PSGST = $row["PSGST"].toNumber();
						var $PCGST = $row["PCGST"].toNumber();
						var DiscCC = $row["Disc"].value();
						if ($Disc == 0) {
							var PValue = ($ItemValue - $Disc) + (($ItemValue - $Disc) * (($PSGST + $PCGST) / 100));
							var PTax = (($ItemValue - $Disc) * (($PSGST + $PCGST) / 100)) * $Quantity;
							var PRate = PValue * $Quantity;
							var ItemValuevv = $ItemValue * $Quantity;
							var totalitm = ItemValuevv + PTax;
						}
						else {
							try {
							var kk = DiscCC.toString().indexOf("%");
							var yy = DiscCC.toString().includes("%");
								if (DiscCC.toString().indexOf("%") == -1) {
									var aaa = ($ItemValue * $Quantity);
									var bbb = ($ItemValue * $Quantity) - $Disc;

									//var PValue = ( ($ItemValue*$Quantity) - $Disc ) + (  (  ($ItemValue*$Quantity) - $Disc ) * (($PSGST + $PCGST)/100)) ;
									//var PTax = (( ($ItemValue*$Quantity) - $Disc ) * (($PSGST + $PCGST)/100)) * $Quantity;

									var PTax = (($PSGST + $PCGST) / 100) * bbb;
									var PValue = bbb + PTax;
									var PRate = PValue;// * $Quantity; 
									var ItemValuevv = bbb;//  $ItemValue ;//*  $Quantity;
									var totalitm = PValue;//  ItemValuevv + PTax;
								} else {
									var $Disc = DiscCC.toString().replace("%", "");

									//var $Disc = ($ItemValue * $Quantity) * ($Disc / 100);
									//var PValue = (($ItemValue * $Quantity) - $Disc) + ((($ItemValue * $Quantity) - $Disc) * (($PSGST + $PCGST) / 100));
									///var PTax = ((($ItemValue * $Quantity) - $Disc) * (($PSGST + $PCGST) / 100)) * $Quantity;
									//var PRate = PValue;// * $Quantity; 
									//var ItemValuevv = $ItemValue;//*  $Quantity;
									//var totalitm = ItemValuevv + PTax;

									var aaa = ($ItemValue * $Quantity);
									var $Disc = ($Disc / 100) * aaa;
									var bbb = ($ItemValue * $Quantity) - $Disc;

									//var PValue = ( ($ItemValue*$Quantity) - $Disc ) + (  (  ($ItemValue*$Quantity) - $Disc ) * (($PSGST + $PCGST)/100)) ;
									//var PTax = (( ($ItemValue*$Quantity) - $Disc ) * (($PSGST + $PCGST)/100)) * $Quantity;

									var PTax = (($PSGST + $PCGST) / 100) * bbb;
									var PValue = bbb + PTax;
									var PRate = PValue;// * $Quantity; 
									var ItemValuevv = bbb;//  $ItemValue ;//*  $Quantity;
									var totalitm = PValue;//  ItemValuevv + PTax;
								}
						}catch (ex)
							{
							}

							//a
						 }
						$row["PTax"].value(PTax);  ///==============
						$row["ItemValue"].value(ItemValuevv);  //==============
						$row["SalTax"].value(totalitm);

						//$row["PurValue"].value(PValue);
						//$row["PurRate"].value(PRate);

						addtotalSum();
			}
		}
	);

	// Table 'view_pharmacygrn' Field 'PCGST'
	$('[data-table=view_pharmacygrn][data-field=x_PCGST]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
			var $row = $(this).fields();
				var $PCGST = $row["PCGST"].toNumber();
				$row["SCGST"].value($PCGST);

				///========================
					var $Quantity = $row["GrnQuantity"].toNumber();
				var $FreeQty = $row["FreeQty"].toNumber();
				var $ItemValue = $row["PurValue"].toNumber();
				var $Disc = $row["Disc"].toNumber();
				var $MRP = $row["MRP"].toNumber();
				var $PurValue = $row["PurValue"].toNumber();

				//var $PurRate = $row["PurRate"].toNumber();
				var $PSGST = $row["PSGST"].toNumber();
				var $PCGST = $row["PCGST"].toNumber();
				var PValue = ( $ItemValue - $Disc ) + (  ( $ItemValue - $Disc ) * (($PSGST + $PCGST)/100)) ;
		       var PTax = (( $ItemValue - $Disc ) * (($PSGST + $PCGST)/100)) * $Quantity;
				var PRate = PValue * $Quantity; 
				 var ItemValuevv =   $ItemValue *  $Quantity;
				$row["PTax"].value(PTax.toFixed(2));
				$row["ItemValue"].value(ItemValuevv.toFixed(2));
				var totalitm = ItemValuevv + PTax;
				$row["SalTax"].value(totalitm.toFixed(2));

				//$row["PurValue"].value(PValue);
				//$row["PurRate"].value(PRate);

				addtotalSum();

				/////////////////////////////////
				/////////////////////////////////
				/////////////////////////////////
						// Your code

								var $row = $(this).fields();
					var $Quantity = $row["GrnQuantity"].toNumber();
						var $FreeQty = $row["FreeQty"].toNumber();
						var $ItemValue = $row["PurValue"].toNumber();
						var $Disc = $row["Disc"].toNumber();
						var $MRP = $row["MRP"].toNumber();
						var $PurValue = $row["PurValue"].toNumber();

						//var $PurRate = $row["PurRate"].toNumber();
						var $PSGST = $row["PSGST"].toNumber();
						var $PCGST = $row["PCGST"].toNumber();
						var DiscCC = $row["Disc"].value();
						if ($Disc == 0) {
							var PValue = ($ItemValue - $Disc) + (($ItemValue - $Disc) * (($PSGST + $PCGST) / 100));
							var PTax = (($ItemValue - $Disc) * (($PSGST + $PCGST) / 100)) * $Quantity;
							var PRate = PValue * $Quantity;
							var ItemValuevv = $ItemValue * $Quantity;
							var totalitm = ItemValuevv + PTax;
						}
						else {
							try {
							var kk = DiscCC.toString().indexOf("%");
							var yy = DiscCC.toString().includes("%");
								if (DiscCC.toString().indexOf("%") == -1) {
									var aaa = ($ItemValue * $Quantity);
									var bbb = ($ItemValue * $Quantity) - $Disc;

									//var PValue = ( ($ItemValue*$Quantity) - $Disc ) + (  (  ($ItemValue*$Quantity) - $Disc ) * (($PSGST + $PCGST)/100)) ;
									//var PTax = (( ($ItemValue*$Quantity) - $Disc ) * (($PSGST + $PCGST)/100)) * $Quantity;

									var PTax = (($PSGST + $PCGST) / 100) * bbb;
									var PValue = bbb + PTax;
									var PRate = PValue;// * $Quantity; 
									var ItemValuevv = bbb;//  $ItemValue ;//*  $Quantity;
									var totalitm = PValue;//  ItemValuevv + PTax;
								} else {
									var $Disc = DiscCC.toString().replace("%", "");

									//var $Disc = ($ItemValue * $Quantity) * ($Disc / 100);
									//var PValue = (($ItemValue * $Quantity) - $Disc) + ((($ItemValue * $Quantity) - $Disc) * (($PSGST + $PCGST) / 100));
									///var PTax = ((($ItemValue * $Quantity) - $Disc) * (($PSGST + $PCGST) / 100)) * $Quantity;
									//var PRate = PValue;// * $Quantity; 
									//var ItemValuevv = $ItemValue;//*  $Quantity;
									//var totalitm = ItemValuevv + PTax;

									var aaa = ($ItemValue * $Quantity);
									var $Disc = ($Disc / 100) * aaa;
									var bbb = ($ItemValue * $Quantity) - $Disc;

									//var PValue = ( ($ItemValue*$Quantity) - $Disc ) + (  (  ($ItemValue*$Quantity) - $Disc ) * (($PSGST + $PCGST)/100)) ;
									//var PTax = (( ($ItemValue*$Quantity) - $Disc ) * (($PSGST + $PCGST)/100)) * $Quantity;

									var PTax = (($PSGST + $PCGST) / 100) * bbb;
									var PValue = bbb + PTax;
									var PRate = PValue;// * $Quantity; 
									var ItemValuevv = bbb;//  $ItemValue ;//*  $Quantity;
									var totalitm = PValue;//  ItemValuevv + PTax;
								}
						}catch (ex)
							{
							}

							//a
						 }
						$row["PTax"].value(PTax);  ///==============
						$row["ItemValue"].value(ItemValuevv);  //==============
						$row["SalTax"].value(totalitm);

						//$row["PurValue"].value(PValue);
						//$row["PurRate"].value(PRate);

						addtotalSum();
			}
		}
	);

	// Table 'view_pharmacygrn' Field 'ItemValue'
	$('[data-table=view_pharmacygrn][data-field=x_ItemValue]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				var $row = $(this).fields();
						var $Quantity = $row["GrnQuantity"].toNumber();
				var $FreeQty = $row["FreeQty"].toNumber();
				var $ItemValue = $row["PurValue"].toNumber();
				var $Disc = $row["Disc"].toNumber();
				var $MRP = $row["MRP"].toNumber();
				var $PurValue = $row["PurValue"].toNumber();

				//var $PurRate = $row["PurRate"].toNumber();
				var $PSGST = $row["PSGST"].toNumber();
				var $PCGST = $row["PCGST"].toNumber();
				var PValue = ( $ItemValue - $Disc ) + (  ( $ItemValue - $Disc ) * (($PSGST + $PCGST)/100)) ;
		       var PTax = (( $ItemValue - $Disc ) * (($PSGST + $PCGST)/100)) * $Quantity;
				var PRate = PValue * $Quantity; 
				 var ItemValuevv =   $ItemValue *  $Quantity;
				$row["PTax"].value(PTax);
				$row["ItemValue"].value(ItemValuevv);
				var totalitm = ItemValuevv + PTax;
				$row["SalTax"].value(totalitm);

				//$row["PurValue"].value(PValue);
				//$row["PurRate"].value(PRate);

				addtotalSum();

				////////////////////////////////////
				/////////////////////////////////////
				////////////////////////////////////
						// Your code

								var $row = $(this).fields();
					var $Quantity = $row["GrnQuantity"].toNumber();
						var $FreeQty = $row["FreeQty"].toNumber();
						var $ItemValue = $row["PurValue"].toNumber();
						var $Disc = $row["Disc"].toNumber();
						var $MRP = $row["MRP"].toNumber();
						var $PurValue = $row["PurValue"].toNumber();

						//var $PurRate = $row["PurRate"].toNumber();
						var $PSGST = $row["PSGST"].toNumber();
						var $PCGST = $row["PCGST"].toNumber();
						var DiscCC = $row["Disc"].value();
						if ($Disc == 0) {
							var PValue = ($ItemValue - $Disc) + (($ItemValue - $Disc) * (($PSGST + $PCGST) / 100));
							var PTax = (($ItemValue - $Disc) * (($PSGST + $PCGST) / 100)) * $Quantity;
							var PRate = PValue * $Quantity;
							var ItemValuevv = $ItemValue * $Quantity;
							var totalitm = ItemValuevv + PTax;
						}
						else {
							try {
							var kk = DiscCC.toString().indexOf("%");
							var yy = DiscCC.toString().includes("%");
								if (DiscCC.toString().indexOf("%") == -1) {
									var aaa = ($ItemValue * $Quantity);
									var bbb = ($ItemValue * $Quantity) - $Disc;

									//var PValue = ( ($ItemValue*$Quantity) - $Disc ) + (  (  ($ItemValue*$Quantity) - $Disc ) * (($PSGST + $PCGST)/100)) ;
									//var PTax = (( ($ItemValue*$Quantity) - $Disc ) * (($PSGST + $PCGST)/100)) * $Quantity;

									var PTax = (($PSGST + $PCGST) / 100) * bbb;
									var PValue = bbb + PTax;
									var PRate = PValue;// * $Quantity; 
									var ItemValuevv = bbb;//  $ItemValue ;//*  $Quantity;
									var totalitm = PValue;//  ItemValuevv + PTax;
								} else {
									var $Disc = DiscCC.toString().replace("%", "");

									//var $Disc = ($ItemValue * $Quantity) * ($Disc / 100);
									//var PValue = (($ItemValue * $Quantity) - $Disc) + ((($ItemValue * $Quantity) - $Disc) * (($PSGST + $PCGST) / 100));
									///var PTax = ((($ItemValue * $Quantity) - $Disc) * (($PSGST + $PCGST) / 100)) * $Quantity;
									//var PRate = PValue;// * $Quantity; 
									//var ItemValuevv = $ItemValue;//*  $Quantity;
									//var totalitm = ItemValuevv + PTax;

									var aaa = ($ItemValue * $Quantity);
									var $Disc = ($Disc / 100) * aaa;
									var bbb = ($ItemValue * $Quantity) - $Disc;

									//var PValue = ( ($ItemValue*$Quantity) - $Disc ) + (  (  ($ItemValue*$Quantity) - $Disc ) * (($PSGST + $PCGST)/100)) ;
									//var PTax = (( ($ItemValue*$Quantity) - $Disc ) * (($PSGST + $PCGST)/100)) * $Quantity;

									var PTax = (($PSGST + $PCGST) / 100) * bbb;
									var PValue = bbb + PTax;
									var PRate = PValue;// * $Quantity; 
									var ItemValuevv = bbb;//  $ItemValue ;//*  $Quantity;
									var totalitm = PValue;//  ItemValuevv + PTax;
								}
						}catch (ex)
							{
							}

							//a
						 }
						$row["PTax"].value(PTax);  ///==============
						$row["ItemValue"].value(ItemValuevv);  //==============
						$row["SalTax"].value(totalitm);

						//$row["PurValue"].value(PValue);
						//$row["PurRate"].value(PRate);

						addtotalSum();
			}
		}
	);

	// Table 'view_pharmacygrn' Field 'PurRate'
	$('[data-table=view_pharmacygrn][data-field=x_PurRate]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
						var $row = $(this).fields();
				var $Quantity = $row["Quantity"].toNumber();
				var $FreeQty = $row["FreeQty"].toNumber();
				var $ItemValue = $row["ItemValue"].toNumber();
				var $Disc = $row["Disc"].toNumber();
				var $MRP = $row["MRP"].toNumber();

				//var $PurValue = $row["PurValue"].toNumber();
				//var $PurRate = $row["PurRate"].toNumber();

				var $PSGST = $row["PSGST"].toNumber();
				var $PCGST = $row["PCGST"].toNumber();
				var PValue = ( $ItemValue - $Disc ) + (  ( $ItemValue - $Disc ) * (($PSGST + $PCGST)/100)) ;
				var PRate = PValue * $Quantity;
				$row["PurValue"].value(PValue);
				$row["PurRate"].value(PRate);
			}
		}
	);

	// Table 'pharmacy_grn' Field 'DT'
	$('[data-table=pharmacy_grn][data-field=x_DT]').on(
		{ // keys = event types, values = handler functions
		            "change keyup paste mouseup onChangeMonthYear onClose onSelect create picker_event hide changeDate": function (e) {
						var $row = $(this).fields();
		                var dobVal = $row["DT"];
		                var dobp = dobVal[0].value;
		                var parts = dobp.split('/');
		                $row["YM"].value(parts[2] + parts[1]);
			}
		}
	);

	// Table 'pharmacy_grn' Field 'GRNTotalValue'
	$('[data-table=pharmacy_grn][data-field=x_GRNTotalValue]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
						var $row = $(this).fields();
						var $GRNTotalValue = $row["GRNTotalValue"].toNumber();
						var $TransPort = $row["TransPort"].toNumber();
						var $AnyOther = $row["AnyOther"].toNumber();
						var $BillDiscount = $row["BillDiscount"].toNumber();
						var $GrnValue = $row["GrnValue"].toNumber();
						$FFGRNTotalValue = ($GrnValue + $TransPort + $AnyOther) - $BillDiscount;
						$row["GRNTotalValue"].value($FFGRNTotalValue);
			}
		}
	);

	// Table 'pharmacy_grn' Field 'BillDiscount'
	$('[data-table=pharmacy_grn][data-field=x_BillDiscount]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
						var $row = $(this).fields();
						var $GRNTotalValue = $row["GRNTotalValue"].toNumber();
						var $TransPort = $row["TransPort"].toNumber();
						var $AnyOther = $row["AnyOther"].toNumber();
						var $BillDiscount = $row["BillDiscount"].toNumber();
						var $GrnValue = $row["GrnValue"].toNumber();
						$FFGRNTotalValue = ($GrnValue + $TransPort + $AnyOther) - $BillDiscount;
						$row["GRNTotalValue"].value($FFGRNTotalValue);
			}
		}
	);

	// Table 'pharmacy_grn' Field 'TransPort'
	$('[data-table=pharmacy_grn][data-field=x_TransPort]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
						var $row = $(this).fields();
						var $GRNTotalValue = $row["GRNTotalValue"].toNumber();
						var $TransPort = $row["TransPort"].toNumber();
						var $AnyOther = $row["AnyOther"].toNumber();
						var $BillDiscount = $row["BillDiscount"].toNumber();
						var $GrnValue = $row["GrnValue"].toNumber();
						$FFGRNTotalValue = ($GrnValue + $TransPort + $AnyOther) - $BillDiscount;
						$row["GRNTotalValue"].value($FFGRNTotalValue);
			}
		}
	);

	// Table 'pharmacy_grn' Field 'AnyOther'
	$('[data-table=pharmacy_grn][data-field=x_AnyOther]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
						var $row = $(this).fields();
						var $GRNTotalValue = $row["GRNTotalValue"].toNumber();
						var $TransPort = $row["TransPort"].toNumber();
						var $AnyOther = $row["AnyOther"].toNumber();
						var $BillDiscount = $row["BillDiscount"].toNumber();
						var $GrnValue = $row["GrnValue"].toNumber();
						$FFGRNTotalValue = ($GrnValue + $TransPort + $AnyOther) - $BillDiscount;
						$row["GRNTotalValue"].value($FFGRNTotalValue);
			}
		}
	);

	// Table 'view_ivf_treatment_plan' Field 'RIDNO'
	$('[data-table=view_ivf_treatment_plan][data-field=x_RIDNO]').on(
		{ // keys = event types, values = handler functions
		"change keyup": function(e) {

						// Your code
								var $row = $(this).fields();
								var Volume = $row["RIDNO"].toNumber();
								var user = [{
									'RIDNo': Volume
								}];
								var jsonString = JSON.stringify(user);
								$.ajax({
									type: "GET",
									url: "ajaxinsert.php?control=ivfCoupleReg",
									data: { data: jsonString },
									cache: false,
									success: function (data) {
										let jsonObject = JSON.parse(data);
										var json = jsonObject["records"];
										for (var i = 0; i < json.length; i++) {
											var obj = json[i];
													document.getElementById('SemPatientId').innerText = 'Patient Id : ' + obj.PatientID;
													document.getElementById('SemPatientPatientName').innerText = 'Patient Name : ' + obj.first_name;
													document.getElementById('SemPatientGender').innerText = 'Gender : ' + obj.gender;
													document.getElementById('SemPatientBloodGroup').innerText = 'Blood Group : ' + obj.blood_group;
													var picurl = "";
													if (obj.profilePic == "" || obj.profilePic == null) {
														picurl = "hims/profile-picture.png";
													} else {
														picurl = obj.profilePic;
													}
													document.getElementById('profilePicturePatient').src = 'uploads/' + picurl;
													document.getElementById('SemPatientAge').innerText = 'Age : ' + obj.Age;
													document.getElementById('SemPatientMobile').innerText = 'Mobile : ' + obj.mobile_no;
													document.getElementById('SemPatientEmail').innerText = 'Email : ' + obj.PEmail;
													document.getElementById('SemPartnerId').innerText = 'Partner Id : ' + obj.PartnerPatientID;
													document.getElementById('SemPartnerPatientName').innerText = 'Partner Name : ' + obj.Partnerfirst_name;
													document.getElementById('SemPartnerGender').innerText = 'Gender : ' + obj.Partnergender;
													document.getElementById('SemPartnerBloodGroup').innerText = 'Blood Group : ' + obj.Partnerblood_group;
													var picurl = "";
													if (obj.PartnerprofilePic == "" || obj.PartnerprofilePic == null) {
														picurl = "hims/profile-picture.png";
													} else {
														picurl = obj.PartnerprofilePic;
													}
													document.getElementById('SemPartnerprofilePicturePatient').src = 'uploads/' + picurl;
													document.getElementById('SemPartnerAge').innerText = 'Age : ' + obj.PartnerAge;
													document.getElementById('SemPartnerMobile').innerText = 'Mobile : ' + obj.Partnermobile_no;
													document.getElementById('SemPartnerEmail').innerText = 'Email : ' + obj.PartnerPEmail;
															document.getElementById("partnerdataview").style.display = "block";
															document.getElementById("patientdataview").className = "col-md-6";
										}
									}
								});		
					}
		}
	);

	// Table 'view_ivf_treatment_plan' Field 'ARTCYCLE'
	$('[data-table=view_ivf_treatment_plan][data-field=x_ARTCYCLE]').on(
		{ // keys = event types, values = handler functions
			"click": function(e) {

				// Your code
		  document.getElementById("Treatment").style.display = "none";
		  document.getElementById("TreatmentTec").style.display = "none";
		  document.getElementById("TypeOfCycle").style.display = "none";
		  document.getElementById("SpermOrgin").style.display = "none";
		  document.getElementById("State").style.display = "none";
		  document.getElementById("Origin").style.display = "none";
		  document.getElementById("MACS").style.display = "none";
		  document.getElementById("Technique").style.display = "none";
		  document.getElementById("PgdPlanning").style.display = "none";
		  document.getElementById("IMSI").style.display = "none";
		  document.getElementById("SequentialCulture").style.display = "none";
		  document.getElementById("TimeLapse").style.display = "none";
		  document.getElementById("AH").style.display = "none";
		  document.getElementById("Weight").style.display = "none";
		  document.getElementById("BMI").style.display = "none";

		 // document.getElementById("MaleIndications").style.display = "none";
		 // document.getElementById("FemaleIndications").style.display = "none";

		 document.getElementById("TreatmentTreatment").style.display  = "none";
		   document.getElementById("Ectopic").style.display = "none";
		  document.getElementById("use").style.display = "none";
		  		if (this.value == "Intrauterine insemination(IUI)") {
		  		  document.getElementById("Treatment").style.display = "block";
		  document.getElementById("TreatmentTec").style.display = "block";
		  document.getElementById("TypeOfCycle").style.display = "block";
		  document.getElementById("SpermOrgin").style.display = "block";
		  document.getElementById("State").style.display = "block";
		  document.getElementById("Origin").style.display = "block";
		  document.getElementById("MACS").style.display = "block";
		  document.getElementById("Technique").style.display = "none";
		  document.getElementById("PgdPlanning").style.display = "none";
		  document.getElementById("IMSI").style.display = "none";
		  document.getElementById("SequentialCulture").style.display = "none";
		  document.getElementById("TimeLapse").style.display = "none";
		  document.getElementById("AH").style.display = "none";
		  document.getElementById("Weight").style.display = "none";
		  document.getElementById("BMI").style.display = "none";

		//  document.getElementById("MaleIndications").style.display = "none";
		//  document.getElementById("FemaleIndications").style.display = "none";

		  		}
		    	if (this.value == "IVF") {
		  		  document.getElementById("Treatment").style.display = "block";
		  document.getElementById("TreatmentTec").style.display = "block";
		  document.getElementById("TypeOfCycle").style.display = "block";
		  document.getElementById("SpermOrgin").style.display = "block";
		  document.getElementById("State").style.display = "block";
		  document.getElementById("Origin").style.display = "block";
		  document.getElementById("MACS").style.display = "block";
		  document.getElementById("Technique").style.display = "block";
		  document.getElementById("PgdPlanning").style.display = "block";
		  document.getElementById("IMSI").style.display = "block";
		  document.getElementById("SequentialCulture").style.display = "block";
		  document.getElementById("TimeLapse").style.display = "block";
		  document.getElementById("AH").style.display = "block";
		  document.getElementById("Weight").style.display = "block";
		  document.getElementById("BMI").style.display = "block";

		 // document.getElementById("MaleIndications").style.display = "block";
		//  document.getElementById("FemaleIndications").style.display = "block";

		    	}
		    	    	if (this.value == "Oocyte Vitrification") {
		  		  document.getElementById("Treatment").style.display = "block";
		  document.getElementById("TreatmentTec").style.display = "block";
		  document.getElementById("TypeOfCycle").style.display = "block";
		  document.getElementById("SpermOrgin").style.display = "block";
		  document.getElementById("State").style.display = "block";
		  document.getElementById("Origin").style.display = "block";
		  document.getElementById("MACS").style.display = "block";
		  document.getElementById("Technique").style.display = "block";
		  document.getElementById("PgdPlanning").style.display = "block";
		  document.getElementById("IMSI").style.display = "block";
		  document.getElementById("SequentialCulture").style.display = "block";
		  document.getElementById("TimeLapse").style.display = "block";
		  document.getElementById("AH").style.display = "block";
		  document.getElementById("Weight").style.display = "block";
		  document.getElementById("BMI").style.display = "block";

		 // document.getElementById("MaleIndications").style.display = "block";
		//  document.getElementById("FemaleIndications").style.display = "block";

		    	}
		    	    	    	if (this.value == "Egg Donation") {

		  	//	  document.getElementById("Treatment").style.display = "block";
		 // document.getElementById("TreatmentTec").style.display = "block";

		  document.getElementById("TypeOfCycle").style.display = "block";

		 // document.getElementById("SpermOrgin").style.display = "block";
		//  document.getElementById("State").style.display = "block";

		  document.getElementById("Origin").style.display = "block";
		    document.getElementById("Ectopic").style.display = "block";
		  document.getElementById("use").style.display = "block";

		//  document.getElementById("MACS").style.display = "block";
		//  document.getElementById("Technique").style.display = "block";
		//  document.getElementById("PgdPlanning").style.display = "block";
		//  document.getElementById("IMSI").style.display = "block";
		 // document.getElementById("SequentialCulture").style.display = "block";
		 // document.getElementById("TimeLapse").style.display = "block";
		 /// document.getElementById("AH").style.display = "block";
		 // document.getElementById("Weight").style.display = "block";
		 // document.getElementById("BMI").style.display = "block";
		 // document.getElementById("MaleIndications").style.display = "block";
		//  document.getElementById("FemaleIndications").style.display = "block";

		    	}
		    	if (this.value == "Frozen Embryo Transfer") {
		    	 document.getElementById("TypeOfCycle").style.display = "block";
		    	  document.getElementById("PgdPlanning").style.display = "block";
		    	  document.getElementById("TreatmentTreatment").style.display  = "block";
		    	}
		    	 if (this.value == "Evaluation cycle") {
		    	  document.getElementById("TypeOfCycle").style.display = "block";
		    	  document.getElementById("PgdPlanning").style.display = "block";
		    	  document.getElementById("TreatmentTreatment").style.display  = "block";
		    	}
			}
		}
	);

	// Table 'view_donor_ivf' Field 'Female'
	$('[data-table=view_donor_ivf][data-field=x_Female]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
					var $row = $(this).fields();
						var Volume = $row["Female"].toNumber();
						var user = [{
							'patientId': Volume
						}];
						var jsonString = JSON.stringify(user);
						$.ajax({
							type: "GET",
							url: "ajaxinsert.php?control=patientProPicture",
							data: { data: jsonString },
							cache: false,
							success: function (data) {
								let jsonObject = JSON.parse(data);
								var json = jsonObject["records"];
								for (var i = 0; i < json.length; i++) {
									var obj = json[i];

									//console.log(obj.id);
									if(obj.profilePic == null)
									{
										$row["femalepic"].value("hims\\profile-picture.png");
										document.getElementById('femaleprofilePicturePatient').src="uploads/hims\\profile-picture.png";
									}else{
										$row["femalepic"].value(obj.profilePic);
										document.getElementById('femaleprofilePicturePatient').src= 'uploads/' + obj.profilePic;
									}
									document.getElementById("femaleprofilePicturePatient").style.display = "block";
								}
							}
						});	
			}
		}
	);

	// Table 'pharmacy_billing_voucher' Field 'ModeofPayment'
	$('[data-table=pharmacy_billing_voucher][data-field=x_ModeofPayment]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
						var $row = $(this).fields();
						var ModeofPayment = $row["ModeofPayment"].value();
						if(ModeofPayment=='CARD' || ModeofPayment=='PAYTM' || ModeofPayment=='NEFT')
						{
							document.getElementById("viewBankName").style.display = "block";
							document.getElementById("viewBankDetails").innerText = ModeofPayment + " Details";
						}
						else{
							document.getElementById("viewBankName").style.display = "none";
						}
			}
		}
	);

	// Table 'view_ip_advance' Field 'ModeofPayment'
	$('[data-table=view_ip_advance][data-field=x_ModeofPayment]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
						var $row = $(this).fields();
						var ModeofPayment = $row["ModeofPayment"].value();
						if(ModeofPayment=='CARD' || ModeofPayment=='PAYTM' || ModeofPayment=='NEFT')
						{
							document.getElementById("viewBankName").style.display = "block";
							document.getElementById("viewBankDetails").innerText = ModeofPayment + " Details";
						}
						else{
							document.getElementById("viewBankName").style.display = "none";
						}
			}
		}
	);

	// Table 'depositdetails' Field 'DepositDate'
	$('[data-table=depositdetails][data-field=x_DepositDate]').on(
		{ // keys = event types, values = handler functions

			//"change": function(e) {
				// Your code

		      "change keyup paste mouseup onChangeMonthYear onClose onSelect create picker_event hide changeDate": function (e) {
				var $row = $(this).fields();
				var $DepositDate = $row["DepositDate"].value();
				var res = $DepositDate.split("/");
				var FromDate = res[2] + '-' + res[1] + '-' + res[0] + ' 00:00:00';
				var ToDate = res[2] + '-' + res[1] + '-' + res[0] + ' 23:59:59';
				var CurrentUserName = document.getElementById("createdbyId").value;
				var CurrentUserID = document.getElementById("HospIDId").value;
												var user = [{
													'FromDate': FromDate,
													'ToDate': ToDate,
													'CurrentUserName': CurrentUserName,
													'CurrentUserID': CurrentUserID
												}];
												var jsonString = JSON.stringify(user);
												$.ajax({
													type: "GET",
													url: "ajaxinsert.php?control=TillSearch",
													data: { data: jsonString },
													cache: false,
													success: function (data) {
														let jsonObject = JSON.parse(data);
														var json = jsonObject["records"];
														for (var i = 0; i < json.length; i++) {
															var obj = json[i];
															if(obj.ModeofPayment == "CASH")
															{
																document.getElementById('x_CashCollected').value =  obj.Amount;
															}
															if(obj.ModeofPayment == "CARD")
															{
																document.getElementById('x_Card').value =  obj.Amount;
															}
															if(obj.ModeofPayment == "NEFT")
															{
																document.getElementById('x_NEFTRTGS').value =  obj.Amount;
															}
															if(obj.ModeofPayment == "RTGS")
															{
																document.getElementById('x_RTGS').value =  obj.Amount;
															}
															if(obj.ModeofPayment == "PAYTM")
															{
																document.getElementById('x_PAYTM').value =  obj.Amount;
															}
															if(obj.ModeofPayment == "CHEQUE")
															{
																document.getElementById('x_Cheque').value =  obj.Amount;
															}

															//if(obj.ModeofPayment = "CHEQUE")
															//{
															//	document.getElementById('x_Card').value =  obj.Amount;
															//}

														}
													}
												});
			}
		}
	);

	// Table 'depositdetails' Field 'DepositToBankSelect'
	$('[data-table=depositdetails][data-field=x_DepositToBankSelect]').on(
		{ // keys = event types, values = handler functions
			"click": function(e) {

				// Your code
						var $row = $(this).fields();
						var DepositToBankSelect = $row["DepositToBankSelect"].value();
						if(DepositToBankSelect == "Bank")
						{
								document.getElementById("DepositToBankid").style.visibility = "visible";
								document.getElementById("TransferToid").style.visibility = "hidden";
						}
						if(DepositToBankSelect == "Transfer")
						{
								document.getElementById("DepositToBankid").style.visibility = "hidden";
								document.getElementById("TransferToid").style.visibility = "visible";
						}
			}
		}
	);

	// Table 'depositdetails' Field 'OpeningBalance'
	$('[data-table=depositdetails][data-field=x_OpeningBalance]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateAmount();
			}
		}
	);

	// Table 'depositdetails' Field 'Other'
	$('[data-table=depositdetails][data-field=x_Other]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateAmount();
			}
		}
	);

	// Table 'depositdetails' Field 'TotalTransferDepositAmount'
	$('[data-table=depositdetails][data-field=x_TotalTransferDepositAmount]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateAmount();
			}
		}
	);

	// Table 'depositdetails' Field 'A2000Count'
	$('[data-table=depositdetails][data-field=x_A2000Count]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateAmount();
			}
		}
	);

	// Table 'depositdetails' Field 'A2000Amount'
	$('[data-table=depositdetails][data-field=x_A2000Amount]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateAmount();
			}
		}
	);

	// Table 'depositdetails' Field 'A1000Count'
	$('[data-table=depositdetails][data-field=x_A1000Count]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateAmount();
			}
		}
	);

	// Table 'depositdetails' Field 'A1000Amount'
	$('[data-table=depositdetails][data-field=x_A1000Amount]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				calculateAmount();
			}
		}
	);

	// Table 'depositdetails' Field 'A500Count'
	$('[data-table=depositdetails][data-field=x_A500Count]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
					calculateAmount();
			}
		}
	);

	// Table 'depositdetails' Field 'A500Amount'
	$('[data-table=depositdetails][data-field=x_A500Amount]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
					calculateAmount();
			}
		}
	);

	// Table 'depositdetails' Field 'A200Count'
	$('[data-table=depositdetails][data-field=x_A200Count]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
					calculateAmount();
			}
		}
	);

	// Table 'depositdetails' Field 'A200Amount'
	$('[data-table=depositdetails][data-field=x_A200Amount]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
					calculateAmount();
			}
		}
	);

	// Table 'depositdetails' Field 'A100Count'
	$('[data-table=depositdetails][data-field=x_A100Count]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
					calculateAmount();
			}
		}
	);

	// Table 'depositdetails' Field 'A100Amount'
	$('[data-table=depositdetails][data-field=x_A100Amount]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
					calculateAmount();
			}
		}
	);

	// Table 'depositdetails' Field 'A50Count'
	$('[data-table=depositdetails][data-field=x_A50Count]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
					calculateAmount();
			}
		}
	);

	// Table 'depositdetails' Field 'A50Amount'
	$('[data-table=depositdetails][data-field=x_A50Amount]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
					calculateAmount();
			}
		}
	);

	// Table 'depositdetails' Field 'A20Count'
	$('[data-table=depositdetails][data-field=x_A20Count]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
					calculateAmount();
			}
		}
	);

	// Table 'depositdetails' Field 'A20Amount'
	$('[data-table=depositdetails][data-field=x_A20Amount]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
					calculateAmount();
			}
		}
	);

	// Table 'depositdetails' Field 'A10Count'
	$('[data-table=depositdetails][data-field=x_A10Count]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
					calculateAmount();
			}
		}
	);

	// Table 'depositdetails' Field 'A10Amount'
	$('[data-table=depositdetails][data-field=x_A10Amount]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
					calculateAmount();
			}
		}
	);

	// Table 'view_ip_patient_admission' Field 'patient_id'
	$('[data-table=view_ip_patient_admission][data-field=x_patient_id]').on(
		{ // keys = event types, values = handler functions
		"change keyup": function(e) {

								// Your code
										var $row = $(this).fields();
										var PatId = $row["patient_id"].toNumber();
										var user = [{
											'PatId': PatId
										}];
										var jsonString = JSON.stringify(user);
										$.ajax({
											type: "GET",
											url: "ajaxinsert.php?control=FindivfCoupleReg",
											data: { data: jsonString },
											cache: false,
											success: function (data) {
												let jsonObject = JSON.parse(data);
												var json = jsonObject["records"];
												for (var i = 0; i < json.length; i++) {
													var obj = json[i];
													document.getElementById('x_PartnerID').value =  obj.PartnerPatientID;
													document.getElementById('x_PartnerMobile').value =  obj.Partnermobile_no;
															document.getElementById('x_PartnerName').value =  obj.Partnerfirst_name;
														document.getElementById('x_ReferedByDr').value =  obj.ReferedBy;
															document.getElementById('x_Consultant').value =  obj.Doctor;
															document.getElementById('lu_x_physician_id').value =  obj.DrID;
																if(obj.profilePic == null)
																{
																	$row["profilePic"].value("hims\\profile-picture.png");
																	document.getElementById('patientPropic').src= "uploads/hims\\profile-picture.png";
																}else{
																	$row["profilePic"].value(obj.profilePic);
																	document.getElementById('patientPropic').src= 'uploads/' + obj.profilePic;
																}
												}
											}
										});
				}
		}
	);

	// Table 'view_ip_patient_admission' Field 'AdviceToOtherHospital'
	$('[data-table=view_ip_patient_admission][data-field=x_AdviceToOtherHospital]').on(
		{ // keys = event types, values = handler functions
			"click": function(e) {

				// Your code
				var $row = $(this).fields();
				var AdviceToOtherHospital = $row["AdviceToOtherHospital"].value();
				if(AdviceToOtherHospital == 'Yes')
				{
		document.getElementById("AdviceToOtherHospitalReason").style.display = "block";
				}else{
		document.getElementById("AdviceToOtherHospitalReason").style.display = "none";
				}
			}
		}
	);

	// Table 'view_pharmacytransfer' Field 'LastMonthSale'
	$('[data-table=view_pharmacytransfer][data-field=x_LastMonthSale]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				var $row = $(this).fields();
				var BranchCode = document.getElementById("x_transfer").value; 
				$row["BRCODE"].value(BranchCode);
			}
		}
	);

	// Table 'view_pharmacytransfer' Field 'PrName'
	$('[data-table=view_pharmacytransfer][data-field=x_PrName]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				var $row = $(this).fields();
				var BranchCode = document.getElementById("x_transfer").value; 
				$row["BRCODE"].value(BranchCode);
			}
		}
	);

	// Table 'view_pharmacytransfer' Field 'Quantity'
	$('[data-table=view_pharmacytransfer][data-field=x_Quantity]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
						var $row = $(this).fields();
						var $Quantity = $row["Quantity"].toNumber();
						var $CurStock = $row["CurStock"].toNumber();
		               if($Quantity > $CurStock)
		               {
		               		alert('Your quantity is exceeded current stock...');
		               		$Quantity = $CurStock;
		               		$row["Quantity"].value($Quantity);
		               }
						var $FMRP = $row["MRP"].toNumber();
						var ItemValuevv =    $FMRP *  $Quantity;
						$row["ItemValue"].value(ItemValuevv.toFixed(2));
			}
		}
	);

	// Table 'view_pharmacy_consumption' Field 'ConsQTY'
	$('[data-table=view_pharmacy_consumption][data-field=x_ConsQTY]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
					var $row = $(this).fields();
					var $ConsQTY = $row["ConsQTY"].toNumber();
					var $Stock = $row["Stock"].toNumber();
					if($Stock < $ConsQTY)
					{
		  alert("You cant consume more than stock...");
		  $row["ConsQTY"].value($Stock);
					}
			}
		}
	);

	// Table 'pharmacy_payment' Field 'Customername'
	$('[data-table=pharmacy_payment][data-field=x_Customername]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
						var $row = $(this).fields();
						var $PC = $row["Customername"].value();
						var HospitalID  =  document.getElementById("HospitalIDDD").value;
														var user = [{
															'PC' : $PC,
															'HospitalID' : HospitalID
														}];
														var jsonString = JSON.stringify(user);
														$.ajax({
															type: "GET",
															url: "ajaxinsert.php?control=PharmachyGRNSearch",
															data: { data: jsonString },
															cache: false,
															success: function (data) {
																let jsonObject = JSON.parse(data);
																var json = jsonObject["records"];
																for (var i = 0; i < json.length; i++) {
																	var obj = json[i];
											var	TotalCnt = '';
											var	TotalBill = 0;
											var	BalanceAmount = '';
										var tabbllee = '<table id="customers"><tr><th></th><th>GRN No. </th><th>Bill No. </th><th>Bill Date </th><th>Bill Amount</th><th>Paid Amount</th></tr>';
										for (var i = 0; i < json.length; i++) {
											var obj = json[i];
												var tabbllee = tabbllee + '<tr><td><input type="checkbox" onclick="calulateselectedAmount()" id="select'+i+'" name="select'+i+'"> <input type="hidden" id="Toidcnt'+i+'" name="Toidcnt'+i+'" value="'+ obj.id +'"></td>' +
												'<td id="GRNNO'+i+'" name="GRNNO'+i+'" >'+ obj.GRNNO +'</td>' +
												'<td id="BILLNO'+i+'" name="BILLNO'+i+'" >'+ obj.BILLNO +'</td> <td id="BILLDT'+i+'" name="BILLDT'+i+'" >'+ obj.BILLDT +'</td>' +
												'<td id="BillTotalValue'+i+'" name="BillTotalValue'+i+'"  style="text-align:right">'+ obj.BillTotalValue +'</td>' +
												 '<td style="width:100px;">  <input  style="text-align:right" type="text"  id="PaidAmount'+i+'" name="PaidAmount'+i+'"   onblur="calulateselectedAmount()" value="'+ obj.BillTotalValue +'"/></td></tr>';
													TotalBill = parseInt(TotalBill) + parseInt(obj.BillTotalValue);
										}
										var tabbllee = tabbllee + '<tr><td></td><td></td><td></td><td  style="text-align:right" >Total </td><td  style="text-align:right" >'+ TotalBill.toFixed(2) +'</td><td id="totalAMTtoPay" name="totalAMTtoPay"  style="text-align:right" > 0.00</td></tr></table>';

									//	var tabbllee = tabbllee + '<table style="width:100%"><tr><th>Total Advance = '+TotalAdvance+'</th><th>Total Bill = '+ TotalBill +'</th><th>Balance Amount = '+ BalanceAmount +'</th></tr></table>';
										var tabbllee = tabbllee + ' <input type="hidden" id="Totttlcnt" name="Totttlcnt" value="'+ json.length +'">';
										if(json.length > 0)
										{
											document.getElementById("loadGrnItems").innerHTML =  tabbllee;
										}
																}
															}
														});
			}
		}
	);

	// Table 'view_billing_voucher_print' Field 'ModeofPayment'
	$('[data-table=view_billing_voucher_print][data-field=x_ModeofPayment]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
						var $row = $(this).fields();
						var ModeofPayment = $row["ModeofPayment"].value();
						if(ModeofPayment=='CARD' || ModeofPayment=='PAYTM' || ModeofPayment=='NEFT')
						{
							document.getElementById("viewBankName").style.display = "block";
							document.getElementById("viewBankDetails").innerText = ModeofPayment + " Details";
						}
						else{
							document.getElementById("viewBankName").style.display = "none";
						}
			}
		}
	);

	// Table 'view_billing_voucher_print' Field 'CancelBill'
	$('[data-table=view_billing_voucher_print][data-field=x_CancelBill]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
					var $row = $(this).fields();
						var ModeofPayment = $row["CancelBill"].value();
						if(ModeofPayment=='Cancel NEFT Return' || ModeofPayment=='PAYTM' || ModeofPayment=='NEFT')
						{
							document.getElementById("IIDDCancelBankName").style.display = "block";

							//document.getElementById("viewBankDetails").innerText = ModeofPayment + " Details";
						}
						else{
							document.getElementById("IIDDCancelBankName").style.display = "none";
						}
			}
		}
	);

	// Table 'view_pharmacy_pharled_return' Field 'RT'
	$('[data-table=view_pharmacy_pharled_return][data-field=x_RT]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
								var $row = $(this).fields();
				var $IQ = $row["MRQ"].toNumber();
				var $RT = $row["RT"].toNumber();
				var $DAMT = $IQ * $RT;
				$row["DAMT"].value($DAMT);
				addtotalSum();
			}
		}
	);

	// Table 'view_pharmacy_pharled_return' Field 'MRQ'
	$('[data-table=view_pharmacy_pharled_return][data-field=x_MRQ]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
						var $row = $(this).fields();
				var $IQ = $row["MRQ"].toNumber();
				var $RT = $row["RT"].toNumber();
				var $DAMT = $IQ * $RT;
				$row["DAMT"].value($DAMT);
				addtotalSum();
			}
		}
	);

	// Table 'monitor_treatment_plan' Field 'Treatment'
	$('[data-table=monitor_treatment_plan][data-field=x_Treatment]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
						var $row = $(this).fields();
						var Treatment = $row["Treatment"].value();
						document.getElementById("stIUIDetails").style.display = "none";
						document.getElementById("IVFviewBankName").style.display = "none";
						document.getElementById("FETviewBankName").style.display = "none";
						if(Treatment == "IUI")
						{
							document.getElementById("stIUIDetails").style.display = "block";
							document.getElementById("IVFviewBankName").style.display = "none";
							document.getElementById("FETviewBankName").style.display = "none";
						}
						if(Treatment == "IVF")
						{
							document.getElementById("stIUIDetails").style.display = "none";
							document.getElementById("IVFviewBankName").style.display = "block";
							document.getElementById("FETviewBankName").style.display = "none";
						}
						if(Treatment == "FET")
						{
							document.getElementById("stIUIDetails").style.display = "none";
							document.getElementById("IVFviewBankName").style.display = "none";
							document.getElementById("FETviewBankName").style.display = "block";
						}
						if(Treatment == "NC")
						{
							document.getElementById("stIUIDetails").style.display = "none";
							document.getElementById("IVFviewBankName").style.display = "none";
							document.getElementById("FETviewBankName").style.display = "none";
						}
			}
		}
	);

	// Table 'view_lab_service' Field 'SERVICE_TYPE'
	$('[data-table=view_lab_service][data-field=x_SERVICE_TYPE]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
				   var $row = $(this).fields();
				   var DEPARTMENT = $row["DEPARTMENT"].value();
				   var SERVICE_TYPE = $row["SERVICE_TYPE"].value();
				   var user = [{
									'SERVICETYPE': SERVICE_TYPE
								}];
								var jsonString = JSON.stringify(user);
								$.ajax({
									type: "GET",
									url: "ajaxinsert.php?control=labservicetesttestno",
									data: { data: jsonString },
									cache: false,
									success: function (data) {
										let jsonObject = JSON.parse(data);
										var json = jsonObject["records"];
										for (var i = 0; i < json.length; i++) {
											var obj = json[i];
											var ccountt = parseInt(obj.Count) + parseInt(1);
											var ffcount = obj.SERVICETYPE + String(ccountt).padStart(4, '0');
											document.getElementById('x_CODE').value=ffcount;
										}
									}
								});	
			}
		}
	);

	// Table 'patient_room' Field 'Reception'
	$('[data-table=patient_room][data-field=x_Reception]').on(
		{ // keys = event types, values = handler functions
			"change": function(e) {

				// Your code
								// Your code

								var $row = $(this).fields();
								var Volume = $row["Reception"].toNumber();
								var user = [{
									'patientId': Volume
								}];
								var jsonString = JSON.stringify(user);
								$.ajax({
									type: "GET",
									url: "ajaxinsert.php?control=patientProPictureMRN",
									data: { data: jsonString },
									cache: false,
									success: function (data) {
										let jsonObject = JSON.parse(data);
										var json = jsonObject["records"];
										for (var i = 0; i < json.length; i++) {
											var obj = json[i];
													document.getElementById('SemPatientId').innerText = 'Patient Id : ' + obj.PatientID;
													document.getElementById('SemPatientPatientName').innerText = 'Patient Name : ' + obj.first_name;
		if(obj.gender == null)
		{
			obj.gender ="";
		}
		if(obj.blood_group == null)
		{
			obj.blood_group ="";
		}
		if(obj.Age == null)
		{
			obj.Age ="";
		}
		if(obj.mobile_no == null)
		{
			obj.mobile_no ="";
		}
		if(obj.PEmail == null)
		{
			obj.PEmail ="";
		}
		if(obj.mrnNo == null)
		{
			obj.mrnNo ="";
		}
													document.getElementById('SemPatientGender').innerText = 'Gender : ' + obj.gender;
													document.getElementById('SemPatientBloodGroup').innerText = 'Blood Group : ' + obj.blood_group;
													var picurl = "";
													if (obj.profilePic == "" || obj.profilePic == null) {
														picurl = "hims/profile-picture.png";
													} else {
														picurl = obj.profilePic;
													}
													document.getElementById('profilePicturePatient').src = 'uploads/' + picurl;
													document.getElementById('SemPatientAge').innerText = 'Age : ' + obj.Age;
													document.getElementById('SemPatientMobile').innerText = 'Mobile : ' + obj.mobile_no;
													document.getElementById('SemPatientEmail').innerText = 'MRN No : ' + obj.mrnNo;
		document.getElementById('x_Reception').value = obj.Reception;
		document.getElementById('x_PatientId').value = obj.patientIdOne;
		document.getElementById('x_mrnno').value = obj.mrnNo;
		document.getElementById('x_PatientName').value = obj.first_name;
		document.getElementById('x_Age').value = obj.Age;
		document.getElementById('x_Gender').value = obj.gender;
		document.getElementById('x_profilePic').value = picurl;
		document.getElementById('x_PatID').value = obj.PatientID;
		document.getElementById('x_MobileNumber').value = obj.mobile_no;
										}
									}
								});
			}
		}
	);
})(jQuery);
