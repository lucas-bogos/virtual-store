const cpf1 = document.querySelector('input[name="cpf"]');
const cpf2 = document.querySelector('input[name="cpf2"]');
const errorCPF = document.querySelector('#errorCPF');

const cpfValidate = () => {
	let cpf = (cpf1.value + cpf2.value).replace(/\D/g, '');	
    if(cpf.toString().length != 11 || /^(\d)\1{10}$/.test(cpf)) return false;
    var result = true;
    [9,10].forEach(function(j){
        var soma = 0, r;
        cpf.split(/(?=)/).splice(0,j).forEach(function(e, i){
            soma += parseInt(e) * ((j+2)-(i+1));
        });
        r = soma % 11;
        r = (r <2)?0:11-r;
        if(r != cpf.substring(j, j+1)) result = false;
    });
    return result; 
}

cpf2.addEventListener("keyup", () => {
    if(! cpfValidate() && cpf2.value.toString().length === 2) {
        cpf1.style.backgroundColor = '#E1706A60';
        cpf2.style.backgroundColor = '#E1706A60';
        errorCPF.style.display = 'inline-block';
    } else {
        cpf1.style.backgroundColor = 'white';
        cpf2.style.backgroundColor = 'white';
        errorCPF.style.display = 'none';
    }
});
