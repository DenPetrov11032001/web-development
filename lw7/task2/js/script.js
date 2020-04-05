function getIndexes(data, element) {
    let arraySpaces = [];
    let i = 0;
    let index = 0;
    for (i; i <= data.length; i++) {
        index = data.indexOf(element, i);
        if (index === -1) break;
        i = index;
        arraySpaces.push(index);
    }
    return arraySpaces;
}

function getValueExpression(data) {
    let indexSpaces = getIndexes(data, ' ');
    if (data[0] === '+') {
        return (Number(data.slice(indexSpaces[0], indexSpaces[1])) + Number(data.slice(indexSpaces[1], data.length)));
    }
    if (data[0] === '-') {
        return (Number(data.slice(indexSpaces[0], indexSpaces[1])) - Number(data.slice(indexSpaces[1], data.length)));
    }
    if (data[0] === '*') {
        return (Number(data.slice(indexSpaces[0], indexSpaces[1])) * Number(data.slice(indexSpaces[1], data.length)));
    }
    if (data[0] === '/') {
        return (Number(data.slice(indexSpaces[0], indexSpaces[1])) / Number(data.slice(indexSpaces[1], data.length)));
    }
}

function calcBraceExpression(data) {
    let indexStart = getIndexes(data, '(');
    let countBrace = indexStart.length;

    let indexSpaces = getIndexes(data, ' ');
    let countSpaces = indexSpaces.length;

    if (countBrace > 1) {
        data = data.replace(data.slice(indexStart[0] + 1, indexSpaces[countSpaces - 1] - 1),
                            calcBraceExpression(data.slice(indexStart[0] + 1, indexSpaces[countSpaces - 1] - 1)));
        return data;
    }
    if (countBrace === 1) {
        data = data.replace(data.slice(indexStart[0], indexSpaces[countSpaces - 1]),
                            ' ' + calcBraceExpression(data.slice(indexStart[0] + 1, indexSpaces[countSpaces - 1] - 1)));
        return data;
    } else {
        return getValueExpression(data);
    }
}

function calc(data) {
    if (typeof data === 'string') {
        if ((data[0] === '+') || (data[0] === '-') || (data[0] === '*') || (data[0] === '/')) {
            if ((data[1] === '(') || (data[2] === '(')) {
                data = calcBraceExpression(data);
                let indexNextBrace = getIndexes(data, '(');
                let countBrace = indexNextBrace.length;
                for (countBrace; countBrace !== 0; countBrace--) {
                    data = calcBraceExpression(data);
                }
                data = getValueExpression(data);
                return data;
            } else {
                return getValueExpression(data);
            }
        } else {
            return console.log('Not correct input data.');
        }
    } else {
        return console.log('Not correct input data.');
    }
}
