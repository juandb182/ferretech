import {Search} from "./export_search.js";

const mysearchp = document.querySelector("#mysearch");
const ul_add_lip = document.querySelector("#showlist");
const myurlp = "/myurl";
const searchProduct = new Search(myurlp,mysearchp,ul_add_lip);







searchProduct.InputSearch();



