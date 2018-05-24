
let btn_group = document.querySelector("div.btn-group");
let div_results = document.querySelector("div#div_results");

for (let i = 0; i < btn_group.childElementCount; i++) {

    btn_group.children[i].addEventListener("click", function(){

        for (let j = 0; j < div_results.childElementCount; j++) {

            if(j == i){
                btn_group.children[j].classList.add("active");

                div_results.children[j].selfShow();

            }
            else{
                btn_group.children[j].classList.remove("active");

                div_results.children[j].selfHide();


            }
        }
    });
}

