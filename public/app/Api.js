function send(data) {
    console.log(data)
    return fetch('/send', {
        method: 'POST',
        headers: {
            'Content-type' : 'application/json'
        },
        body: JSON.stringify(data)
    }).then(response => response.json())

}

function sendAnswers(data) {
    console.log(data)
    return fetch('/sendAnswers', {
        method: 'POST',
        headers: {
            'Content-type' : 'application/json'
        },
        body: JSON.stringify(data)
    }).then(response => response.json())

}


const Api = {
    send
}

export default Api;