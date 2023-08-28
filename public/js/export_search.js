export class Search {
    constructor(myurlp, mysearchp, ul_add_lip) {
        this.url = myurlp;
        this.mysearch = mysearchp;
        this.ul_add_lip = ul_add_lip;
        this.idil = "mylist";
        this.pcantidad = document.querySelector("#pcantidad");
    }

    InputSearch() {
        this.mysearch.addEventListener("input", (e) => {
            e.preventDefault();

            try {
                let token = document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content");
                let minLetras = 0;
                let valor = this.mysearch.value;
                /* console.log(valor); */

        

                if (valor.length > minLetras) {
                    let dataSearch = new FormData();
                    dataSearch.append("valor", valor);
                    console.log(token)
                    console.log(this.url);
                    fetch(this.url, {
                        headers: {
                            "X-CSRF-TOKEN": token,
                        },
                        method:"post",
                        body:dataSearch,
                    })
                    
                        .then((data) => data.json())
                        .then((data) => {
                            
                            /* this.Showlist(data,valor); */
                            console.log(data);
                        })
                        .catch(function(error){
                            console.error("Error:", error);
                        })
                } else {

                }
            } catch (error) {
                console.log(error);
            }
        });
    }
}
