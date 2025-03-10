const base_api = "http://localhost/";

const signin_button = document.getElementById("signin-button");

signin_button.addEventListener("click", (e) =>{
    e.preventDefault();

    const data = new FormData();
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    if(validateEmail(email)){
        data.append("email", email);
    }else{
        alert("Enter a valid email");
    }

    data.append("password", password);

    const checkLogin = async () =>{
        const response = await axios.post(base_api + "faq-forum/Server/apis/v1/login.php");
        if (response.data.id > 0){
            localStorage.setItem("id", response.data.id);
            window.location.href = "./home.html";
        }else{
            alert("Wrong credentials");
            console.log(response.data.id);
        }
    }
    
    checkLogin();


});

const validateEmail = (email)=> {
    
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        
    return emailPattern.test(email);
        
};