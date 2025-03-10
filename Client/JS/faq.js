base_api = "http://localhost/";


const submit_button = document.getElementById("sub-button");

submit_button.addEventListener("click", (e) => {
    e.preventDefault();

    const question = document.getElementById("question").value;
    const answer = document.getElementById("answer").value;

    const data = new FormData();
    data.append("user_id", localStorage.getItem("id"));
    data.append("question", question);
    data.append("answer", answer);

    const sendFrom = async () => {
        console.log("yes");
        const response = await axios.post(base_api+"faq-forum/Server/apis/v1/addFaq.php", data);
        console.log(response.data);
        if(response.data.response != 1){
            alert ("something went wrong :(");

        }else{
            window.location.href = "./home.html";
        }
    }

    sendFrom();
})