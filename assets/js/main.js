
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


if ($("page").data("title") === "homepage") {
    const contactSubmitBtn = document.getElementById("contactSubmit");

    let nameContact = document.getElementById("contactName");
    let emailContact = document.getElementById("contactEmail");
    let phoneContact = document.getElementById("contactPhone");
    let subjectContact = document.getElementById("contactSubject");
    let messageContact = document.getElementById("contactMessage");


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
        xhr.open("POST", "/assets/php/contact-form-treat.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange=function () {
            if(xhr.readyState == 4 && xhr.status ==200) {
                contactSubmitBtn.setAttribute('disabled', 'true');
                document.getElementById("contactMessageResult").innerHTML=xhr.responseText;
            }
        }
        xhr.send("name="+nameValue+"&email="+emailValue+"&phone="+phoneValue+"&subject="+subjectValue+"&message="+messageValue);

    });
};

if ($("page").data("title") === "admin-login") {
    const adminSubmitBtn = document.getElementById("adminSubmit");

    let adminUsername = document.getElementById("adminUsername");
    let adminPassword = document.getElementById("adminPassword");
    let messages = document.getElementById("adminFormMessages");

    adminSubmitBtn.addEventListener("click", function(e){
        e.preventDefault();

        // get input values
        let usernameValue = adminUsername.value;
        let passwordValue = adminPassword.value;


        const xhr = new XMLHttpRequest();
        xhr.open("POST", "/assets/php/check-admin-login.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange=function () {

            if(xhr.readyState == 4 && xhr.status ==200) {
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