function send(mail) {
    return fetch('/', {
        method: 'POST',
        headers: {
            'Content-type' : 'application/json'
        },
        body: JSON.stringify(mail)
    }).then(response => response.json())

}

const Api = {
    send
}

export default Api;