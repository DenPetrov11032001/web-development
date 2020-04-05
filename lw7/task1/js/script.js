function PrimeAlgorithm(number) {
    let isPrime = false;
    if (number > 1) {
        isPrime = true;
        for (let i = 2; i < number; i++) {
            if (number % i === 0) isPrime = false;
        }
    }
    return isPrime;
}


function isPrimeNumber(data) {
    if (Array.isArray(data)) {
        for (let elem of data) {
            if (typeof elem === 'number') {
                if (PrimeAlgorithm(elem)) {
                    console.log(elem + ' is prime number');
                } else {
                    console.log(elem + ' is not prime number');
                }
            } else {
                console.log('Not correct value = ' + elem);
            }
        }
    }
    if (typeof data === 'number') {
        if (PrimeAlgorithm(data)) {
            console.log(data + ' is prime number');
        } else {
            console.log(data + ' is not prime number');
        }
    }
    if ((typeof data !== 'number') && (!Array.isArray(data))) {
        console.log('Not correct input data.');
    }
}
