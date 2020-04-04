/**
 * @return {boolean}
 */
function PrimeAlgorithm(number) {
    let isPrime = true;
    for (let i = 2; i < number; i++) {
        if (number % i === 0) return false;
    }
    return true;
}

function isPrimeNumber(data) {
    let isPrime;
    if (typeof data === "object") {
        for (let value of Object.values(data)) {
            if (typeof value === "number") {
                isPrime = PrimeAlgorithm(value);
                if (isPrime) {
                    console.log(value + " is prime number");
                }
                else {
                    console.log(value + " is not prime number");
                }
            }
            else {
                console.log("Not correct value = " + value);
            }
        }
    }
    else if (typeof data === "number") {
        isPrime = PrimeAlgorithm(data);
        if (isPrime) {
            console.log(data + " is prime number");
        }
        else {
            console.log(data + " is not prime number");
        }
    }
    else {
        return console.log("Not correct input data.");
    }
}
