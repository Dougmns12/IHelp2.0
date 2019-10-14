var btnEntrar = document.querySelector("#entrar");
var btnConta = document.querySelector("#conta");

var body = document.querySelector("body");

btnEntrar.addEventListener("click", function entrar () {
	body.className = "entrar-js";
})

btnConta.addEventListener("click", function cadastrar () {
	body.className = "cadastrar-js"
})