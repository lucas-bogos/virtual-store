const price = document.querySelectorAll("tr #price #real");
const total = document.querySelector("#total-pay #real");
const totalField = document.querySelector("#total-pay #real-field");
const quantity = document.querySelectorAll("input[id='quantity']");
const button = document.querySelectorAll("#quantity-control div button");
const subTotal = document.querySelector("#subtotal #value-real");

// const totalValue = parseFloat(price.dataset.price * quantity.value);
let totalValue = 0;
let service = 10;

price.forEach(value => {
    totalValue += parseFloat(value.textContent);
});

total.innerHTML = totalValue + service;
subTotal.innerHTML = totalValue;
totalField.value = totalValue + service;

// let valueByItem = 0;

Array.from(button).forEach(element => {
    element.addEventListener("click", () => {
        totalValue = 0;
        console.log(totalValue);
        let prices = Array.from(price);
        let quantities = Array.from(quantity);
        let pricesConverted = [];
        let quantitiesConverted = [];
        
        prices.forEach((p) => {
            pricesConverted.push(parseFloat(p.textContent));
        });
        
        quantities.forEach((q) => {
            quantitiesConverted.push(parseFloat(q.value));
        });

        for(let i = 0; i < pricesConverted.length; i++) {
            totalValue += pricesConverted[i] * quantitiesConverted[i];
        }
        
        total.innerHTML = totalValue + service;
        totalField.value = totalValue + service;
        subTotal.innerHTML = totalValue;
    });
})

