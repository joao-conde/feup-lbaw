let btn_result_users = document.querySelector("button#btn_result_users");
let btn_result_bands = document.querySelector("button#btn_result_bands");

let list_users_result = document.querySelector("div#list_users_result");
let list_bands_result = document.querySelector("div#list_bands_result");

btn_result_users.addEventListener("click", function(){

    btn_result_bands.classList.remove("active");
    btn_result_users.classList.add("active");

    list_users_result.classList.remove("d-none");
    list_users_result.classList.add("d-block");

    list_bands_result.classList.remove("d-block");
    list_bands_result.classList.add("d-none");
});

btn_result_bands.addEventListener("click", function(){

    btn_result_users.classList.remove("active");
    btn_result_bands.classList.add("active");

    list_users_result.classList.remove("d-block");
    list_users_result.classList.add("d-none");

    list_bands_result.classList.remove("d-none");
    list_bands_result.classList.add("d-block");
});

