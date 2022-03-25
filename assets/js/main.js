
// to test if jquery available
// if (typeof jQuery === 'undefined') {
//     alert("jQuery is NOT available");
// } else {
//     alert("jQuery is available")
// }

// $.ajax({
//     method: 'POST',
//     url: 'https://formsubmit.co/ajax/hidayati.ann@email.com',
//     dataType: 'json',
//     accepts: 'application/json',
//     data: {
//         name: "FormSubmit",
//         message: "I'm from Devro LABS"
//     },
//     success: (data) => console.log(data),
//     error: (err) => console.log(err)
// });

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

const contactSubmitBtn = document.getElementById("contactSubmit");

// // get input values
let nameContact = document.getElementById("contactName").value;
let emailContact = document.getElementById("contactEmail").value;
let phoneContact = document.getElementById("contactPhone").value;
let subjectContact = document.getElementById("contactSubject").value;
let messageContact = document.getElementById("contactMessage").value;
// let formData = {contactName: nameContact, contactEmail: emailContact, contactPhone: phoneContact, contactSubject: subjectContact, contactMessage: messageContact};

contactSubmitBtn.addEventListener("click", function (){


    const xhr = new XMLHttpRequest();
    xhr.open("POST", "/assets/php/contact-form-treat.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange=function () {
        if(xhr.readyState == 4 && xhr.status ==200) {
            document.getElementById("contactMessageResult").innerHTML=xhr.responseText;
        }
    }
    xhr.send("name="+nameContact+"&email="+emailContact+"&phone="+phoneContact+"&subject="+subjectContact+"&message="+messageContact);

});

// contactSubmitBtn.addEventListener("click", function (){
//     const data = new FormData();
//     data.append("nameContact", nameContact);
//     data.append("emailContact", emailContact);
//     data.append("phoneContact", phoneContact);
//     data.append("subjectContact", subjectContact);
//     data.append("messageContact", messageContact);
//
//
//     const xhr = new XMLHttpRequest();
//     xhr.open("POST", "http://localhost/assets/php/contact-form-treat.php", true);
//     xhr.send(data);
// })

// function submitForm()
// {
//     var contactName = $('input[name=contactName]').val();
//     var contactEmail = $('input[name=contactEmail]').val();
//     var contactPhone = $('input[name=contactPhone]').val();
//     var contactSubject = $('input[name=contactSubject]').val();
//
//     if(contactName != '' && contactEmail!= '' && contactPhone != '')
//     {
//         var formData = {contactName: contactName, contactEmail: contactEmail, contactPhone: contactPhone, contactSubject: contactSubject};
//         $('#contactMessageResult').html('<span style="color: red">Processing form. . . please wait. . .</span>');
//         $.ajax({url: "http://localhost/assets/php/contact-form-treat.php", type: 'POST', data: formData, success: function(response)
//             {
//                 var res = JSON.parse(response);
//                 console.log(res);
//                 if(res.success == true)
//                     $('#contactMessageResult').html('<span style="color: green">Form submitted successfully</span>');
//                 else
//                     $('#contactMessageResult').html('<span style="color: red">Form not submitted. Some error in running the database query.</span>');
//             }
//         });
//     }
//     else
//     {
//         $('#contactMessageResult').html('<span style="color: red">Please fill all the fields</span>');
//     }
// }