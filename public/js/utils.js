


class Utils
{
    /* Validation of email */
    static validateEmail()
    {
        var email = document.getElementById('email');
        email.addEventListener('keyup', function(){
            axios.post('/api/email-checker', {
                email: document.getElementById('email').value
            })
                .then((response) => {
                    if(response.data === true){
                        document.getElementById('email').classList.add("border", "border-danger");
                        document.getElementById('invalidEmailMsg').style.display = 'block';
                    }else if(response.data === false){
                        document.getElementById('email').classList.remove("border", "border-danger");
                        document.getElementById('email').classList.add("border", "border-success");
                        document.getElementById('invalidEmailMsg').style.display = 'none';
                    }else{
                        document.getElementById('invalidEmailMsg').style.display = 'none';
                    }

                })
        });
    }
    /* End of validation of email */

    static validateMobile()
    {
        var mobile = document.getElementById('mobile');
        mobile.addEventListener('keyup', function(){
            axios.post('/api/mobile-checker', {
                email: document.getElementById('mobile').value
            })
                .then((response) => {
                    if(response.data === true){
                        document.getElementById('mobile').classList.add("border", "border-danger");
                        document.getElementById('invalidMobileMsg').style.display = 'block';
                    }else if(response.data === false){
                        document.getElementById('mobile').classList.remove("border", "border-danger");
                        document.getElementById('mobile').classList.add("border", "border-success");
                        document.getElementById('invalidMobileMsg').style.display = 'none';
                    }else{
                        document.getElementById('invalidMobileMsg').style.display = 'none';
                    }

                })
        });
    }
}





// function sendPost(id){
//     let elementId = document.getElementById(id);
// }



// elementId.onchange = function () {

//     let http = new XMLHttpRequest();
//     let params = "country_id=" + countryId.value;
//     const url = "/api/v1/get-cities-for-country";
//     http.open('POST', url, true);

//     http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

//     http.onreadystatechange = function(){
//         if(http.readyState == 4 && http.status == 200){
//             let cities = JSON.parse(http.responseText);
//             var selectNode = document.getElementById('city--id');
//             if(selectNode.hasChildNodes()){
//                 selectNode.childNodes.forEach(function(n){
//                     n.replaceWith('');
//                 })
//             }

//             cities.forEach(function(city){
//                 let optionNode = document.createElement('option');
//                 optionNode.appendChild(document.createTextNode(city.arabic));
//                 optionNode.value = city.id;
//                 selectNode.appendChild(optionNode);
//             });
//         }
//     };

//     http.send(params);
// }
