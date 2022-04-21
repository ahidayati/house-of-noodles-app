
// to test if jquery available
// if (typeof jQuery === 'undefined') {
//     alert("jQuery is NOT available");
// } else {
//     alert("jQuery is available")
// }


//script exist only on homepage
if ($("page").data("title") === "homepage") {


    //RESERVATION FORM
    const reserveSubmitBtn = document.getElementById("reserveSubmit");

    let nameReserve = document.getElementById("reserveName");
    let emailReserve = document.getElementById("reserveEmail");
    let phoneReserve = document.getElementById("reservePhone");
    let personReserve = document.getElementById("reservePerson");
    let dateReserve = document.getElementById("reserveDate");
    let hourReserve = document.getElementById("reserveHour");

    //to submit data on reservation form
    reserveSubmitBtn.addEventListener("click", function (e){
        e.preventDefault();

        // get input values
        let nameValue = nameReserve.value;
        let emailValue = emailReserve.value;
        let phoneValue = phoneReserve.value;
        let personValue = personReserve.value;
        let dateValue = dateReserve.value;
        let hourValue = hourReserve.value;

        // console.log(nameContact);
        console.log(nameValue, emailValue, phoneValue, personValue, dateValue, hourValue);

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "/reserve-form-post", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange=function () {
            if(xhr.readyState == 4 && xhr.status == 200) {

                let responseObject  = JSON.parse(xhr.responseText);
                if (responseObject.status == "OK"){
                    reserveSubmitBtn.setAttribute('disabled', 'true');
                    document.getElementById("reserveMessageResult").innerHTML="<h3>We have received your request for a table," +
                        "</br>we'll get back to you as soon as possible!</h3>";
                    document.getElementById("reserveForm").reset();
                } else {
                    document.getElementById("reserveMessageResult").innerHTML=responseObject.message;
                    console.log(responseObject);
                }
            }
        }
        xhr.send("name="+nameValue+"&email="+emailValue+"&phone="+phoneValue+"&person="+personValue+"&date="+dateValue+"&hour="+hourValue);
    });

    //CONTACT FORM
    const contactSubmitBtn = document.getElementById("contactSubmit");
    let nameContact = document.getElementById("contactName");
    let emailContact = document.getElementById("contactEmail");
    let phoneContact = document.getElementById("contactPhone");
    let subjectContact = document.getElementById("contactSubject");
    let messageContact = document.getElementById("contactMessage");

    //to submit data on contact form
    contactSubmitBtn.addEventListener("click", function (e){
        e.preventDefault();

        // get input values
        let nameValue = nameContact.value;
        let emailValue = emailContact.value;
        let phoneValue = phoneContact.value;
        let subjectValue = subjectContact.value;
        let messageValue = messageContact.value;

        // console.log(nameContact);
        // console.log(nameValue, emailValue, phoneValue, subjectValue, messageValue);

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "/contact-form-post", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange=function () {
            if(xhr.readyState == 4 && xhr.status == 200) {

                let responseObject  = JSON.parse(xhr.responseText);
                if (responseObject.status == "OK"){
                    contactSubmitBtn.setAttribute('disabled', 'true');
                    document.getElementById("contactMessageResult").innerHTML="<h3>Thanks, we have received your message!</h3>";
                    document.getElementById("contactForm").reset();
                } else {
                    document.getElementById("contactMessageResult").innerHTML=responseObject.message;
                    console.log(responseObject);
                }
            }
        }
        xhr.send("name="+nameValue+"&email="+emailValue+"&phone="+phoneValue+"&subject="+subjectValue+"&message="+messageValue);
    });

    // menu-section buttons
    let menuButtons = document.getElementsByClassName("menu-section-btn");
    for (let i = 0; i < menuButtons.length; i++) {
        menuButtons[i].addEventListener("click", function () {
                let darkButton = document.querySelector(".btn-dark");
            if (this.classList.contains("btn-outline-dark")) {
                // change class name to change button color
                this.classList.replace("btn-outline-dark", "btn-dark");
                darkButton.classList.replace("btn-dark", "btn-outline-dark");



            }
        });
    }

    function getMenu($id) {
        //console.log($id)

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "/menu-category", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {

            if (xhr.readyState == 4 && xhr.status == 200) {

                let responseObject = JSON.parse(xhr.responseText);
                // console.log(responseObject);
                // console.log(responseObject[0]['menuItem'])

                renderHTML(responseObject);
            }
        }
        xhr.send("id=" + $id);
    }

    let menuItemsBox = document.getElementById('menuItemsBox');
    function renderHTML(data) {
        // menuItemsBox.removeChild();

        let htmlString = "";
        for (let i = 0; i < data.length; i++) {

            // htmlString += "<p>" + data[i].menuItem + " " + data[i].menuDescription + "</p>";
            htmlString += "<div> <div class='d-flex justify-content-between'> <span class='menu-item-title'>" + data[i].menuItem +"</span> <span>"+ data[i].price +"€</span> </div> <p>"+ data[i].menuDescription +"</p> </div>";
            // console.log(data[i].menuItem);

        }
        menuItemsBox.innerHTML = htmlString;
    };



};

//script exist only on admin-login page
if ($("page").data("title") === "admin-login") {

    const adminSubmitBtn = document.getElementById("adminSubmit");

    let adminUsername = document.getElementById("adminUsername");
    let adminPassword = document.getElementById("adminPassword");
    let messages = document.getElementById("adminFormMessages");

    //admin login function
    adminSubmitBtn.addEventListener("click", function(e){
        e.preventDefault();

        // get input values
        let usernameValue = adminUsername.value;
        let passwordValue = adminPassword.value;


        const xhr = new XMLHttpRequest();
        xhr.open("POST", "/check-login", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange=function () {

            if(xhr.readyState == 4 && xhr.status == 200) {

                let responseObject = JSON.parse(xhr.responseText);
                if (responseObject.status == "OK") {
                    window.location.href = "/dashboard/";
                } else {
                    messages.innerHTML = responseObject.message;
                    console.log(responseObject);
                }

            }
        }
        xhr.send("username="+usernameValue+"&password="+passwordValue);
    });
};

//script exist only on dashboard page
if ($("page").data("title") === "dashboard") {

    // to change button color on click
    // TODO
    // add class to local storage on the client side, so when user click to go to other page, button color will be changed
    // let dashboardMenuButtons = document.getElementsByClassName("dashboard-menu-btn");
    // for (let menuButton in dashboardMenuButtons) {
    //     dashboardMenuButtons[menuButton].addEventListener("click", function(){
    //         let lightButton = document.querySelector(".btn-light");
    //
    //         if(this.classList.contains("btn-outline-light")) {
    //             lightButton.classList.replace("btn light", "btn-outline-light");
    //             this.classList.remove("btn-outline-light");
    //             this.classList.add("btn-light");
    //         }
    //     })
    // };

    //update header section
    const updateHeaderBtn = document.getElementById("headerSubmit");
    updateHeaderBtn.addEventListener("click", function(e) {
        e.preventDefault();

        // get input values
        let headingValue = document.getElementById('header-heading').value;
        let subheadingValue = document.getElementById('header-subheading').value;


        const xhr = new XMLHttpRequest();
        xhr.open("POST", "/dashboard/update/header-section", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange=function () {
            if(xhr.readyState == 4 && xhr.status == 200) {
                //console.log(xhr.responseText);
                document.getElementById("headerMessageResult").innerHTML=xhr.responseText;
            }
        }
        xhr.send("headerHeading="+headingValue+"&headerSubheading="+subheadingValue);
    });

    //update hours section
    const updateHoursBtn = document.getElementById("hoursSubmit");
    updateHoursBtn.addEventListener("click", function(e) {
        e.preventDefault();

        // get input values
        let text1Value = document.getElementById('hours-text1').value;
        let text2Value = document.getElementById('hours-text2').value;
        let text3Value = document.getElementById('hours-text3').value;
        let text4Value = document.getElementById('hours-text4').value;
        let text5Value = document.getElementById('hours-text5').value;


        const xhr = new XMLHttpRequest();
        xhr.open("POST", "/dashboard/update/hours-section", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange=function () {
            if(xhr.readyState == 4 && xhr.status == 200) {
                //console.log(xhr.responseText);
                document.getElementById("hoursMessageResult").innerHTML=xhr.responseText;
            }
        }
        xhr.send("text1="+text1Value+"&text2="+text2Value+"&text3="+text3Value+"&text4="+text4Value+"&text5="+text5Value);
    });

    // admin logout button
    const adminLogoutBtn = document.getElementById("adminLogout");
    adminLogoutBtn.addEventListener("click", function(e) {
        e.preventDefault();

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "/check-logout", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange=function () {
            if(xhr.readyState == 4 && xhr.status == 200) {

                let responseObject = JSON.parse(xhr.responseText);
                if (responseObject.status == "OK") {
                    window.location.href = "/admin-login";
                } else {
                    console.log(responseObject);
                }

            }
        }
        xhr.send("logout=true");
    });
};

//script exist only on dashboard-menu page
if ($("page").data("title") === "dashboard-menu") {


};

//script exist only on dashboard-menu-add page
if ($("page").data("title") === "dashboard-menu-add") {


    //add new item button
    const newItemSubmitBtn = document.getElementById("newItemSubmit");
    newItemSubmitBtn.addEventListener("click", function(e) {
        e.preventDefault();

        // get input values
        let menuItemValue = document.getElementById('menu-item').value;
        let menuDescriptionValue = document.getElementById('menu-description').value;
        let menuPriceValue = document.getElementById('menu-price').value;
        let menuCategories = document.querySelectorAll('.menu-categories');



        console.log(menuItemValue, menuDescriptionValue, menuPriceValue);
        console.info(menuCategories);

        // const xhr = new XMLHttpRequest();
        // xhr.open("POST", "/src/model/admin-logout.php", true);
        // xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        // xhr.onreadystatechange=function () {
        //     if(xhr.readyState == 4 && xhr.status == 200) {
        //         document.getElementById("hoursMessageResult").innerHTML=xhr.responseText;
        //     }
        // }
        // xhr.send("logout=true");
    });
};

//script exist only on dashboard-reservation page
if ($("page").data("title") === "dashboard-reservation") {

    let selectForm = "";
    let statusId = "";
    let reserveId = "";
    function getValues(selectOnChange) {
        selectForm = selectOnChange;
        //console.log("status value="+ selectForm.value+"  reserve id="+ selectForm.id);

        statusId = selectForm.value;
        reserveId = selectForm.id;

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "/dashboard/reservation/update", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                //console.log(xhr.responseText);
                document.getElementById("reservationResult"+reserveId).innerHTML = xhr.responseText;
            }
        }
        xhr.send("statusId=" + statusId + "&reserveId=" + reserveId);
    }

}

//script exist only on dashboard-user page
if ($("page").data("title") === "dashboard-user") {

    //update user profile
    const userUpdateBtn = document.getElementById("userSubmit");
    userUpdateBtn.addEventListener("click", function (e) {
        e.preventDefault();

        // get input values
        let usernameValue = document.getElementById('username').value;
        let firstNameValue = document.getElementById('firstName').value;
        let lastNameValue = document.getElementById('lastName').value;
        let emailValue = document.getElementById('email').value;
        let idValue = document.getElementById('userId').value;


        const xhr = new XMLHttpRequest();
        xhr.open("POST", "/dashboard/update/user", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                //console.log(xhr.responseText);
                document.getElementById("userMessageResult").innerHTML = xhr.responseText;
            }
        }
        xhr.send("username=" + usernameValue + "&firstName=" + firstNameValue + "&lastName=" + lastNameValue + "&email=" + emailValue + "&userId=" + idValue);
    });

}