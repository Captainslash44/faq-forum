base_api = "http://localhost/";


onload =() => {
    console.log("loaded");
    const loadCard = async() => {
        const response = await axios.post(base_api+"faq-forum/Server/apis/v1/loadCards.php");
        const faqs = response.data;
        console.log(faqs);
        faqs.forEach((faq) =>{
            const {question, answer} = faq;
            const info_card = `<div class="cards-container full-width flex wrap">
            <div class="flex wrap secondary-bg solid-border black-border rounded-border padding-one side-margin">
                <h3>${question}</h3>
                <p class="margin-top-small">${answer}</p>`;
                document.getElementById("faq-container").innerHTML += info_card;
        })
    }
    loadCard();
};

const add_button = document.getElementById("plus-button");

add_button.addEventListener("click",(e) =>{
    e.preventDefault();

    window.location.href = "./faq.html";

});

const logout_btn = document.getElementById("logout-btn");

logout_btn.addEventListener("click", (e) => {
    e.preventDefault();

    localStorage.clear();
    window.location.href = "./index.html";

})

