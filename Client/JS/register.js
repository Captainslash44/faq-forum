const base_api = "http://localhost/";

const signup_button = document.getElementById("signup-button");

signup_button.addEventListener("click", (e) =>{
    e.preventDefault();

    const data = new FormData();
    const fullname = document.getElementById("fullname").value;
    const email = document.getElementById("email").value;
    const password = document.getElementById("pass").value;
    const pass_confirm = document.getElementById("pass-confirm").value;

    if(!validateEmail(email)){
        alert("Invalid email format");

    }else{
        if(pass_confirm != password){
            alert ("passwords don't match");
        }else{

        data.append("fullname", fullname);
        data.append("email", email);
        data.append("password", password);

        const createUser = async () =>{
            const response = await axios.post(base_api+"faq-forum/Server/apis/v1/signup.php", data);
            if(response.data.response == true){
                console.log(response.data.response);
                window.location.href = "./index.html";
            }else{
                alert("User already exists");
            }
        }

        createUser();



        }
    }
})

const validateEmail = (email)=> {
    
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        
    return emailPattern.test(email);
        
};