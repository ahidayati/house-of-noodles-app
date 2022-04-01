
// to test if jquery available
// if (typeof jQuery === 'undefined') {
//     alert("jQuery is NOT available");
// } else {
//     alert("jQuery is available")
// }

// const testdiv = document.getElementById("test-div");
// const testbtn = document.getElementById("test-btn");
// let pageCounter = 1;
//
// testbtn.addEventListener("click", function () {
//     const ourRequest = new XMLHttpRequest();
//     ourRequest.open("GET", "https://learnwebcode.github.io/json-example/animals-"+pageCounter+".json");
//     ourRequest.onload = function (){
//         // console.log(ourRequest.responseText);
//         let ourData = JSON.parse(ourRequest.responseText);
//         // console.log(ourData[0]);
//         renderHTML(ourData);
//         pageCounter++;
//         if(pageCounter > 3){
//             testbtn.classList.add("d-none");
//         }
//     };
//     ourRequest.send();
// });
//
// function renderHTML(data){
//     htmlString = "";
//
//     for(i=0; i<data.length; i++){
//         htmlString += "<p>"+ data[i].name+" is a "+data[i].species+" that likes to eat ";
//
//         for(ii=0; ii<data[i].foods.likes.length; ii++){
//             if ( ii == 0){
//                 htmlString += data[i].foods.likes[ii];
//             } else {
//                 htmlString += " and "+data[i].foods.likes[ii];
//             }
//         }
//
//         htmlString += ".</p>";
//     }
//
//     testdiv.insertAdjacentHTML('beforeend', htmlString);
// };

//script exist only on homepage
if ($("page").data("title") === "homepage") {

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
                contactSubmitBtn.setAttribute('disabled', 'true');
                document.getElementById("contactMessageResult").innerHTML=xhr.responseText;
            }
        }
        xhr.send("name="+nameValue+"&email="+emailValue+"&phone="+phoneValue+"&subject="+subjectValue+"&message="+messageValue);

    });
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
        xhr.open("POST", "/src/model/check-admin-login.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange=function () {

            if(xhr.readyState == 4 && xhr.status == 200) {
                if(xhr.responseText === "Success"){
                    window.location.href = "/dashboard";
                } else {
                    messages.innerHTML=xhr.responseText;
                }

            }
        }
        xhr.send("username="+usernameValue+"&password="+passwordValue);
    });
};

//script exist only on dashboard page
if ($("page").data("title") === "dashboard") {

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

    //admin logout button
    const adminLogoutBtn = document.getElementById("adminLogout");
    adminLogoutBtn.addEventListener("click", function(e) {
        e.preventDefault();

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "/src/model/admin-logout.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange=function () {
            if(xhr.readyState == 4 && xhr.status == 200) {
                if(xhr.responseText === "Logout"){
                    window.location.href = "/admin-login";
                } else {
                    console.log("response="+xhr.responseText);
                }

            }
        }
        xhr.send("logout=true");
    });
};