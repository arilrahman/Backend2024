const tambah = (a, b) => {
    console.log (a + b);

}

const kurang = (a, b) =>{
    console.log (a - b);

}

const calculator = (a, b, operator) => {
    return operator(a,b);

}

calculator(10, 5, kurang);

//


