/*

let convertMetric = function(lbs) {
    if lbs > 5 return lbs * 0.453592 + "kgs"
    else if lbs < 5 return lbs * 453.592 + "grams"
};

console.log(convertMetric(4));


*/


function sumFactors (number) {
    sum = 0;
    for (i=1, i<=number, i++) {
        let sumI = i++;
        if (number % i === 0)
            return sumI;
    }

};

console.log(sumFactors(10));

//declare sum in scope of function